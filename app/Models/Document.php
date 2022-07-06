<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'be_documents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cne',
        'cni',
        'AttestationBac',
        'RelvesNote',
        'attestProfessionP',
        'salaire',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cni()
    {
        return $this->belongsTo(Candidature::class, 'cni_id');
    }

    public function cne()
    {
        return $this->belongsTo(Candidature::class, 'cne_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}