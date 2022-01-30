<?php

namespace App\Http\Livewire;

use App\Models\Platform;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SearchBox extends Component
{
    public $search, $result;

    public function updatedSearch()
    {
        $search = $this->search;

        if (str_word_count($search) < 1){
            $this->result = [];
            return;
        }

        $platforms = [];
        $platforms = Platform::query()
                        ->where('name', 'LIKE', "%{$search}%")
                        ->get(['name','url', 'code']);

        if (count($platforms) > 0){
            $this->result = json_decode($platforms);
            return;
        }

        return;
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
