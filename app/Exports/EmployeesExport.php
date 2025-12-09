<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }

    public function collection()
    {
        $query = Employee::query();

        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('cpf', 'like', "%{$this->search}%");
        }

        return $query->with('unit')->get([
            'id',
            'name',
            'email',
            'cpf',
            'unit_id',
            'created_at',
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Email',
            'CPF',
            'Unidade',
            'Criado em',
        ];
    }
}
