<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    
    protected $table = "countrys";
    protected $primaryKey = 'sid';

    protected $guarded = [
        'sid'
    ];

    public function countryList()
    {
        $countryList = Country::orderByRaw("CASE cc WHEN 'KR' THEN 1 ELSE 2 END, cn ASC")->get();
        
        $cc = [];

        foreach( $countryList as $index => $country ){
            if( $country->cc == 'KR' ){ continue; }
            $cc[$country->cc] = array( 'cn'=>$country->cn, 'cnum'=>$country->cnum );
        }	

        return $cc;
    }
}
