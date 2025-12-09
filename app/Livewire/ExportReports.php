<?php

namespace App\Livewire;

use App\Exports\GenericExport;
use App\Models\EconomicGroup;
use App\Models\Employee;
use App\Models\Flag;
use App\Models\Unit;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ExportReports extends Component
{
    public $entity = '';
    public $search = '';
    public $alertMessage = '';
    public $showAlert = false;

    public $entities = [
        'Employee' => Employee::class,
        'Unit' => Unit::class,
        'EconomicGroup' => EconomicGroup::class,
        'Flag' => Flag::class,
    ];

    public function export()
    {
        if (!$this->entity) {
            $this->alertMessage = 'Selecione uma entidade para exportar.';
            $this->showAlert = true;
            return;
        }

        $this->showAlert = false;

        $modelClass = $this->entities[$this->entity];
        $model = new $modelClass;
        $query = $modelClass::query();

        $fillable = $model->getFillable();

        if ($this->search) {
            if (in_array('name', $fillable)) {
                $query->where('name', 'like', "%{$this->search}%");
            } elseif (in_array('nome_fantasia', $fillable)) {
                $query->where('nome_fantasia', 'like', "%{$this->search}%");
            }
        }

        $columns = $fillable;

        if (!in_array('id', $columns)) {
            array_unshift($columns, 'id');
        }

        if ($model->usesTimestamps()) {
            if (!in_array('created_at', $columns)) {
                $columns[] = 'created_at';
            }
        }

        $headings = array_map(
            fn($col) => ucfirst(str_replace('_', ' ', $col)),
            $columns
        );

        return Excel::download(
            new GenericExport($query, $columns, $headings),
            strtolower($this->entity) . '.xlsx'
        );
    }

    public function updatedEntity()
    {
        $this->showAlert = false;
        $this->alertMessage = '';
    }

    public function render()
    {
        return view('livewire.export-reports');
    }
}
