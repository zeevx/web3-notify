<?php

namespace App\Http\Livewire;

use App\Models\Platform;
use Illuminate\Support\Facades\DB;
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
                        ->join('categories','platforms.category_id', '=', 'categories.id')
                        ->where('platforms.name', 'LIKE', "%{$search}%")
                        ->orWhereHas('category', function ($query) use ($search){
                            return $query->where('categories.name', 'LIKE', "%{$search}%");
                        })->select('platforms.name','url', 'code','color',DB::raw('categories.name AS cat_name'))
                        ->get();

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
