<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class GenericExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $query;
    protected $columns;
    protected $headings;

    public function __construct($query, array $columns, array $headings)
    {
        $this->query = $query;
        $this->columns = $columns;
        $this->headings = $headings;
    }

    public function collection()
    {
        return $this->query->get($this->columns);
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
