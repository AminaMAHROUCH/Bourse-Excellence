<?php

namespace App\Exports;

use App\Models\Intermediaire;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PanierExcel implements FromQuery, WithHeadings
{
    
    use Exportable;

    public function __construct($type, $ids)
    {
        $this->type = $type;
        $this->ids= $ids;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'الإسم الكامل بالفرنسية',
            'ر ب ت و',
            'الحساب البنكي',
            'مقدار المنحة',
            'سنة الاستحقاق',
        ];
    }

    public function query()
    {
        if($this->type==350){
            return Intermediaire::query()->where('rib', 'like', '350%')->where('affected', 0)->whereIn('id', $this->ids)->select('nom_prenom', 'cni','rib', 'montant', 'anne_universitaire');
        }
        
        else{
             $help= Intermediaire::where('rib', 'like', '350%')->select('rib')->get();
            return Intermediaire::query('nom_prenom')->whereNotIn('rib', $help)->where('affected', 0)->whereIn('id', $this->ids)->select('nom_prenom', 'cni','rib', 'montant', 'anne_universitaire');
        }
    }

   
}