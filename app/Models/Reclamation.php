<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Notifications\Notifiable;
class Reclamation extends Model  implements Searchable
{
    use SoftDeletes;
    use HasFactory;
    use Notifiable;

    public $table = 'be_reclamations';

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'subject',
        'content',
        'published_at',
        'cne',
        'cni',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    // public function cne()
    // {
    //     return $this->belongsTo(User::class, 'cne_id');
    // }

    public function getPublishedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
    
    public function students(){
        $std = Student::where('cni', $this->cni)->where('cne', $this->cne)->first();
        return $std;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function getSearchResult(): SearchResult
    {
       $url = url('/boursier/reclamation/'.$this->id .'/edit');
    
       return new \Spatie\Searchable\SearchResult(
        $this,
       $this,
       $url
    );
    }
}