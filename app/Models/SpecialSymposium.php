<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialSymposium extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'special_symposiums';
    protected $primaryKey = 'sid';

    protected $guarded = [
        'sid'
    ];

    protected $dates = [
        'complete_at',
    ];      

    protected $casts = [
        'speakers' => 'object'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'ccode','cc');
    }
}
