<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbstractRegistration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'sid';
    protected $table = 'abstracts';

    protected $guarded = [
        'sid'
    ];

    protected $dates = [
        'complete_at'
    ];      

    protected $casts = [
        'keyword' => 'object'
    ];

    public function institutions()
    {
        return $this->hasMany(AbstractInstitution::class,'asid');
    }

    public function authors()
    {
        return $this->hasMany(AbstractAuthor::class,'asid');
    }

    public function abstractAvg()
    {
        $optionAvg = AbstractRegistration::selectRaw("
        count(*) as totalCount,
        sum( case when status='N' then 1 else 0 end ) as statusN,
        sum( case when status='Y' then 1 else 0 end ) as statusY,
        sum( case when ptype='O' then 1 else 0 end ) as ptypeO,
        sum( case when ptype='P' then 1 else 0 end ) as ptypeP,
        sum( case when ptype='S' then 1 else 0 end ) as ptypeS")->where('year', config('site.common.default.year'))->first();

        $data['optionAvg'] = $optionAvg;

        //나라별
        $countryList = (new Country())->countryList('KOR');
        foreach( $countryList as $key => $val ){

            $count = AbstractRegistration::whereHas('authors', function($q) use($val){
                $q->where('country', $val['cn'])->where('presentation_author', 'Y');
            })->count();

            if( $count > 0 ){
                $data['countryAvg'][$key] = array( 'cn'=>$val['cn'], 'count'=>$count );
            }
        }
        
        if( !isset($data['countryAvg']) ){ $data['countryAvg'] = []; }

        return $data;
    }

    public function getKeyword()
    {
        $keyword = "" ;
        foreach( $this->keyword as $key => $val ){
            if( $val ){
                $keyword .= ( $key > 0 ? ', ' : '' ).$val;
            }
        }
        return $keyword;
    }

    public function getPresentation()
    {
        $presentation = AbstractAuthor::where('asid', $this->sid)->where('presentation_author', 'Y')->first();
        return $presentation;
    }

    public function getCorresponding()
    {
        $corresponding = AbstractAuthor::where('asid', $this->sid)->where('corresponding_author', 'Y')->first();
        return $corresponding;
    }
}
