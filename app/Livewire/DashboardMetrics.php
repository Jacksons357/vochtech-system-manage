<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Unit;
use App\Models\EconomicGroup;
use App\Models\Flag;
use Carbon\Carbon;

class DashboardMetrics extends Component
{
    public $metrics = [];

    public function mount()
    {
        $this->metrics = [
            'employees' => [
                'total' => Employee::count(),
                'last_30_days' => Employee::where('created_at', '>=', now()->subDays(30))->count(),
            ],
            'units' => [
                'total' => Unit::count(),
                'last_30_days' => Unit::where('created_at', '>=', now()->subDays(30))->count(),
            ],
            'economic_groups' => [
                'total' => EconomicGroup::count(),
                'last_30_days' => EconomicGroup::where('created_at', '>=', now()->subDays(30))->count(),
            ],
            'flags' => [
                'total' => Flag::count(),
                'last_30_days' => Flag::where('created_at', '>=', now()->subDays(30))->count(),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.dashboard-metrics');
    }
}
