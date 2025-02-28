<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'sid';

    protected $guarded = [
        'sid'
    ];

    protected $dates = [
        'complete_at',
        'payComplete_at'
    ];      

    protected $casts = [
        'oneDay' => 'object'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'ccode','cc');
    }

    public function getOneDay($action)
    {
        $oneDayString = "";

        if( $action == 'key' ){
            foreach( $this->oneDay ?? [] as $key => $val ){
                $oneDayString .= ($key>0?',':'').$val;
            }
        }else{
            foreach( $this->oneDay ?? [] as $key => $val ){
                $oneDayString .= ($key>0?',':'').' June '.config('site.registration.oneDay')[$val];
            }
        }
        
        return $oneDayString;
    }

    public function makeTitle()
    {
        $title = config('site.registration.title')[$this->title];
        if( $this->title == 'Z' ){
            $title .= ' ('.$this->title_etc.')';
        }
        return $title;
    }

    public function makeName()
    {
        return $this->firstName.' '.$this->lastName;
    }

    public function makeTotalText($action = null)
    {
        $unit = config('site.registration.unit')[$this->lang];
        $priceText = "";
        $totalPrice = 0;

        if( $this->category && $this->attendType ){
            if( $this->attendType == 'F' ){
                $categoryPrice = config('site.registration.categoryPrice')[$this->lang][$this->type][$this->category];                 
                $priceText .= ' - '.config('site.registration.category')[$this->category].' - '.$unit.' '.number_format($categoryPrice).'<br>';
                $totalPrice += $categoryPrice;
            }else{
                if( $this->oneDay ){
                    $oneDayArray = explode(',',$this->getOneDay('key'));
                    $oneDayString = '';
                    foreach( $oneDayArray as $key => $val ){
                        $oneDayString .= ($key>0?',':'').config('site.registration.oneDay')[$val];
                    }

                    $categoryPrice = config('site.registration.oneDayPrice')[$this->lang]*count($oneDayArray);                 
                    $priceText .= ' - '.config('site.registration.category')[$this->category].' - One day - June '.$oneDayString.' - '.$unit.' '.number_format($categoryPrice).'<br>';
                    $totalPrice += $categoryPrice;
                }
            }
        }

        if( $this->accompanying && $this->accompanying != 'N' ){
            $accompanyingPrice = config('site.registration.accompanyingPrice')[$this->lang]*$this->accompanying;
            $priceText .= ' - '.'Accompanying Person - '.config('site.registration.accompanying')[$this->accompanying].' - '.$unit.' '.number_format($accompanyingPrice).' <br>';
            $totalPrice += $accompanyingPrice;

            if( $action == 'accompanying' ){
                return config('site.registration.accompanying')[$this->accompanying].' - '.$unit.' '.number_format($accompanyingPrice);
            }
        }

        if( $this->banquet && $this->banquet != 'N' ){
            $banquetPrice = config('site.registration.banquetPrice')[$this->lang]*$this->banquet;
            $priceText .= ' - '.'Banquet - '.config('site.registration.banquet')[$this->banquet].' - '.$unit.' '.number_format($banquetPrice).' <br>';
            $totalPrice += $banquetPrice;

            if( $action == 'banquet' ){
                return config('site.registration.banquet')[$this->banquet].' - '.$unit.' '.number_format($banquetPrice);
            }
        }

        if( $this->tour && $this->tour != 'N' ){
            $tourPrice = config('site.registration.tourPrice')[$this->lang];
            $priceText .= ' - '.'Field Trip - '.config('site.registration.tour')[$this->tour].' - '.$unit.' '.number_format($tourPrice).' <br>';
            $totalPrice += $tourPrice;

            if( $action == 'tour' ){
                return config('site.registration.tour')[$this->tour].' - '.$unit.' '.number_format($tourPrice);
            }
        }

        return $unit.' '.number_format($totalPrice).'<br>'.$priceText;
    }

    public function registrationAvg()
    {
        $optionAvg = Registration::selectRaw("
        count(*) as totalCount,
        sum( case when lang='KOR' then 1 else 0 end ) as countryK,
        sum( case when lang='ENG' then 1 else 0 end ) as countryE,

        sum( case when payStatus in ('Y') then 1 else 0 end ) as payStatusY,
        sum( case when payStatus in ('N') then 1 else 0 end ) as payStatusN,
        sum( case when payStatus in ('F') then 1 else 0 end ) as payStatusF,

        sum( case when payMethod in ('C') then 1 else 0 end ) as payMethodC,
        sum( case when payMethod in ('B') then 1 else 0 end ) as payMethodB,
        sum( case when payMethod in ('F') then 1 else 0 end ) as payMethodF,

        sum( case when category in ('A') then 1 else 0 end ) as categoryA,
        sum( case when category in ('B') then 1 else 0 end ) as categoryB,

        sum( case when attendType in ('F') then 1 else 0 end ) as attendTypeF,
        sum( case when attendType in ('O') then 1 else 0 end ) as attendTypeO")->where('year', config('site.common.default.year'))->first();

        $data['optionAvg'] = $optionAvg;

        //나라별
        $countryList = (new Country())->countryList();
        foreach( $countryList as $key => $val ){
            $count = Registration::where('ccode',$key)->count();
            if( $count > 0 ){
                $data['countryAvg'][$key] = array( 'cn'=>$val['cn'], 'count'=>$count );
            }
        }
        
        if( !isset($data['countryAvg']) ){ $data['countryAvg'] = []; }

        return $data;
    }
}
