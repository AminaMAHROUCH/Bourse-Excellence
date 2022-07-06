<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Models\Traits\BelongsToPromotion;

use Illuminate\Foundation\Bus\DispatchesJobs;

class Student extends Model 
{
    use DispatchesJobs;
    use SoftDeletes;
    use HasFactory;
    use BelongsToPromotion;

    public $table = 'be_students';
  

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

      protected $fillable = [
        'cne',
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
        'photo',
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
        'AttestationBac',
        'RelvesNote',
        'attestationProfession_adherent',
        'attestationProfession_conjoint',
        'attest_revenu_mensuel_adh',
        'attest_revenu_mensuel_conj',
        'attestationAdherent',
        'region_id_etud',
        'province_id_etud',
        'ville',
        'cni_image',
        'nbr_freres',
        'parents_deces',
        'dateInscription',
        'promotion',
        'rib',
        'status',
        'valider',
    ];



    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
   
    function bourse()
    { 
        return $this->hasMany(Bourse::class,'cni') ; 
    }
}