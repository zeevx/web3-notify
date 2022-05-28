<?php

namespace App\Http\Controllers;

use App\Models\User;
use Elliptic\EC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use kornrunner\Keccak;

class Web3Controller extends Controller
{
    private $user;

    public function generateMessage(Request $request): \Illuminate\Http\JsonResponse
    {
        $nonce = Str::random(12);
        $message = "Sign this message to confirm you own this wallet address. This action will not cost any gas fees.";
        $message .= "\nNonce: {$nonce}";

        $message = Cache::remember("{$request->ip()}_nonce",5, function () use ($message) {
            return $message;
        });

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function verifyMessage(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'signature' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ], 422);
        }

        $ip_address = $request->ip();
        $data = $validator->validated();
        $message = Cache::get("{$ip_address}_nonce");

        $verify = $this->verify($message, $data['signature'], $data['address']);

        if (!$verify){
            return response()->json([
                'success' => false,
                'message' => 'Verification failed'
            ], 500);
        }

        DB::transaction(function() use ($ip_address, $data) {

            $this->user = User::updateOrCreate([
                'wallet' => $data['address'],
                'name' => Str::limit($data['address'], 8, '....')
            ],
            [
                'signature' => $data['signature'],
                'last_login' => now(),
                'ip_address' => $ip_address
            ]);

        });

        Auth::login($this->user, true);

        return response()->json([
            'success' => true,
            'message' => 'Verification successful'
        ]);
    }

    private function verify($message, $signature, $address): bool
    {
        $hash = Keccak::hash(sprintf("\x19Ethereum Signed Message:\n%s%s", strlen($message), $message), 256);
        $sign = [
            'r' => substr($signature, 2, 64),
            's' => substr($signature, 66, 64),
        ];
        $recid = ord(hex2bin(substr($signature, 130, 2))) - 27;

        if ($recid != ($recid & 1)) {
            return false;
        }

        $pubkey = (new EC('secp256k1'))->recoverPubKey($hash, $sign, $recid);
        $derived_address = '0x' . substr(Keccak::hash(substr(hex2bin($pubkey->encode('hex')), 1), 256), 24);

        return (Str::lower($address) === $derived_address);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return back();
    }
}
