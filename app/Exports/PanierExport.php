<?php

namespace App\Exports;

use App\Models\Intermediaire;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PanierExport implements FromQuery, WithHeadings
{
    
    use Exportable;

    public function __construct($type)
    {
        $this->type = $type;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'Compte a crediter',
            'Intitule compte a crediter',
            'Montant',
            'cni'
        ];
    }

    public function query()
    {
        
        if($this->type==350){
            return Intermediaire::query()->where('rib', 'like', '350%')->select('rib','nom_prenom', 'montant', 'cni');
        }
        
        else{
            $help= Intermediaire::where('rib', 'like', '350%')->select('rib')->get();
            return Intermediaire::query('nom_prenom')->whereNotIn('rib', $help)->select('rib','nom_prenom', 'montant', 'cni');
        }
    }

   
}