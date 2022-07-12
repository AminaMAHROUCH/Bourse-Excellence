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
      
  use Exportable;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    public function headings(): array
    {
        return  [
                    'رقم مسار',
                    'ر.ب.و',
                    'الاسم الكامل',
                    'الاسم الكامل بالعربية',
                    'العنوان الشخصي',
                    'البريد الإلكتروني',
                    'مدة الدراسة',
                    'الهاتف 1',
                    '2 الهاتف',
                    'شعبة البكالوريا',
                    'الثانوية',
                    'اسم القيم الديني بالفرنسية',
                    'اسم الزوج(ة) بالفرنسية',
                    'اسم القيم الديني(ة) بالعربية',
                    'اسم الزوج(ة) بالعربية',
                    'عنوان الآباء',
                    'تاريخ الازدياد',
                    'مكان الازدياد',
                    'الجنس',
                    'مهنة القيم الديني(ة)',
                    'هاتف الام',
                    'هاتف الاب',
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
                    'مدينة الدراسة',
                    'عدد الإخوة',
                    'أحد الأبوين متوفي',
                    'أحد الأبوين متوفي',
                    'الفوج',
                    'دخل القيم الديني',
                    'دخل الزوج(ة)',
                    'السن',
                    'الزوج(ة) عامل(ة)',
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
            $row-> nom_prenom, 
            $row->nom_prenomArab,
            $row->adresse, 
            $row->email, 
            $row->duree_etude, 
            $row->telephone_1, 
            $row->telephone_2, 
            $row->filiereBac, 
            $row->lycee, 
            $row->nom_prenom_adherent, 
            $row->nom_prenom_conjoint,
            $row->nom_prenom_adherentAr,
            $row->nom_prenom_conjointAr,
            $row->adresse_parents, 
            $row->date_naissance,
            $row->lieu_naissance, 
            $row->sexe, 
            $row->profession_adherent, 
            $row->telephone_conjoint, 
            $row->telephone_adherent, 
            $row->universite,
            $row->ecole, 
            $row->etat_physique, 
            $row->filiere,
            $row->anne_universitaire, 
            $row->profession_conjoint, 
            $row->matricule ,
            $row->cni_adherent ,
            $row->mention ,
            $row->anne_bac ,
            $row->note ,
            $row->ville ,
            $row->nbr_freres ,
            $row->parents_deces,
            $row->deces,
            $row->promotion ,
            $row->salaire,
            $row->salaire_conjoint ,
            $row->age ,
            $row->profession,
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
        $lists = null;
        
     if($this->status == "global"){
        $lists =   Candidature::query()->select('cne', 
        'cni',
        'nom_prenom',
        'nom_prenomArab',
        'adresse',
        'email',
        'duree_etude',
        'telephone_1',
        'telephone_2',
        'filiereBac',
        'lycee',
        'nom_prenom_adherent',
        'nom_prenom_conjoint',
        'nom_prenom_adherentAr',
        'nom_prenom_conjointAr',
        'adresse_parents',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'profession_adherent',
        'telephone_conjoint',
        'telephone_adherent',
        'universite',
        'ecole',
        'etat_physique',
        'filiere',
        'anne_universitaire',
        'profession_conjoint',
        'matricule',
        'cni_adherent',
        'mention',
        'anne_bac',
        'note',
        'ville',
        'nbr_freres',
        'parents_deces',
        'deces', 
        'promotion', 
        'salaire',
        'salaire_conjoint',
        'age',
        'profession',
        'region_id_etud',
        'province_id_etud');
         
         
     }else{
         
        $lists =  Candidature::query()->whereStatus($this->status)->select('cne', 
        'cni',
        'nom_prenom',
        'nom_prenomArab',
        'adresse',
        'email',
        'duree_etude',
        'telephone_1',
        'telephone_2',
        'filiereBac',
        'lycee',
        'nom_prenom_adherent',
        'nom_prenom_conjoint',
        'nom_prenom_adherentAr',
        'nom_prenom_conjointAr',
        'adresse_parents',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'profession_adherent',
        'telephone_conjoint',
        'telephone_adherent',
        'universite',
        'ecole',
        'etat_physique',
        'filiere',
        'anne_universitaire',
        'profession_conjoint',
        'matricule',
        'cni_adherent',
        'mention',
        'anne_bac',
        'note',
        'ville',
        'nbr_freres',
        'parents_deces',
        'deces', 
        'promotion', 
        'salaire',
        'salaire_conjoint',
        'age',
        'profession',
        'region_id_etud',
        'province_id_etud');
     
         
     }
     return   $lists;
    }
}