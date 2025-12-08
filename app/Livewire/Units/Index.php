<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'unit-updated' => '$refresh'
    ];

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function clearFilter()
    {
        $this->reset('search');
    }

    public function render()
    {
        $units = Unit::with('flag')
            ->where(function ($query) {
                $query->where('nome_fantasia', 'like', "%{$this->search}%")
                    ->orWhere('razao_social', 'like', "%{$this->search}%")
                    ->orWhere('cnpj', 'like', "%{$this->search}%")
                    ->orWhereHas('flag', function ($q) {
                        $q->where('name', 'like', "%{$this->search}%");
                    });
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.units.index', compact('units'));
    }
}
