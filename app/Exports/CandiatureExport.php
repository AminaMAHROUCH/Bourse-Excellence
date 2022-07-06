<?php

namespace App\Exports;

use App\Models\Candidature;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnLimit;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;

class CandiatureExport implements FromQuery , WithHeadings , WithMapping, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
      
    use Exportable ; 
    // function __construct($id)
    // {
    //     $this->id = $id ;  
    // }

    public function headings(): array
    {
        return  [
                    'رقم مسار',
                    'ر.ب.و',
                    'الاسم الكامل',
                    'العنوان الشخصي',
                    'البريد الإلكتروني',
                    'الهاتف 1',
                    '2 الهاتف',
                    'اسم القيم الديني(ة)',
                    'اسم الزوج(ة)',
                    'عنوان الآباء',
                    'تاريخ الازدياد',
                    'مكان الازدياد',
                    'الحالة العائلية',
                    'الجنس',
                    'مهنة القيم الديني(ة)',
                    'هاتف الاب',
                    'هاتف الام',
                    'الجامعة',
                    'المؤسسة أو الكلية',
                    'الحالة الجسدية',
                    'الشعبة',
                    'السنة الدراسية',
                    'مهنة الزوج(ة)',
                    'رقم الانخراط',
                    'ر.ب.و للقيم الديني(ة)',
                    'الميزة',
                    'سنة الحصول على البكالوريا',
                    'النقطة المحصل عليها',
                    'عدد الإخوة',
                    'أحد الأبوين متوفي',
                    'الجهة',
                    'الإقليم',
            
        ];
    } 
    public function map($row): array
    {
        
        $region= Region::where("id",$row->region_id_etud)->first() ;
        // dd($region);
      $province = Province::where("id", $row-> province_id_etud)->first() ;
        $fields = [
            $row->cne,
            $row->cni,
            $row-> nom_prenomArab,
            $row-> adresse,
            $row-> email,
            $row-> telephone_1,
            $row-> telephone_2,
            $row-> full_name_f,
            $row-> full_name_m,
            $row-> adresse_parents,
            $row-> date_naissance,
            $row-> lieu_naissance,
            $row-> situation,
            $row-> sex,
            $row-> profession_f,
            $row-> tel_f,
            $row-> tel_m,
            $row->universite,
            $row->school,
            $row-> etat,
            $row-> filiere,
            $row-> anneUniversitaire,
            $row-> profession_m,
            $row-> matricule,
            $row-> cniP,
            $row-> mention,
            $row-> anne_bac,
            $row-> note,
            $row-> nbr,
            $row-> deces, 
            $region->nom_region,
            $province->nom_province,
        ];
        return $fields;
    } 

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()
                    ->getStyle('A1:W1')
                    ->getAlignment('center')
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
   

    public function query()
    {
        // ->whereIn('id', $this->id )
      return Candidature::query(); 
        
    }
}