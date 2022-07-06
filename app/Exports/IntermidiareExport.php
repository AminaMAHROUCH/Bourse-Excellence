<?php

namespace App\Exports;

use App\Models\Intermediaire;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class IntermidiareExport implements FromQuery
{
    use Exportable;

    public function __construct(int $numero)
    {
        $this->numero = $numero;
    }

    public function query()
    {
        return Intermediaire::query()->whereCode($this->numero);
    }
}