<?php

namespace App\Services\Util;

use Spatie\SimpleExcel\SimpleExcelWriter;
/**
 * Class ExcelService
 * @package App\Services
 */
class ExcelService
{
    private $row;

    public function RegistrationExcel($lists, $totCnt)
    {        
        $excel = SimpleExcelWriter::streamDownload('registration.csv');
        $excel->noHeaderRow();

        // Header
        $header = [
            'No',
            '등록타입',
            '접수번호',
            '국가',
            '이메일',
            'Title',
            'Degree',
            '영문이름',
            '국문이름',
            'Department',
            'Affiliation',
            'Mobile',
            'Category',
            'Attendance Type',
            'OneDay',
            'Accompanying Person',
            'Banquet',
            'File upload',
            '결제방법',
            '입금자',
            '입금일',
            '입금상태',
            '실제입금일',
            '접수상태',
            '접수시작일',
            '접수완료일'
        ];

        // Add header to the CSV
        $excel->addRow($header);

        // Add data to the CSV
        foreach ($lists->lazy(3000) as $key => $apply) {
            $this->row[$key] = [
                ($totCnt - $key),
                config('site.registration.cha')[$apply->type],
                $apply->rnum,
                $apply->country->cn,
                $apply->email,
                $apply->makeTitle(),
                config('site.registration.degree')[$apply->degree],
                $apply->firstName.' '.$apply->lastName,
                $apply->name ?? '',
                $apply->department,
                $apply->affiliation,
                '+'.$apply->cnum.' '.$apply->mobile,
                $apply->category ? config('site.registration.category')[$apply->category] : '',
                $apply->attendType ? config('site.registration.attendType')[$apply->attendType] : '',
                $apply->attendType == 'O' ? $apply->getOneDay('value') : '',
                $apply->accompanying ? $apply->accompanying == 'N' ? config('site.registration.accompanying')[$apply->accompanying] : $apply->makeTotalText('accompanying') : '',
                $apply->banquet ? $apply->banquet == 'N' ? config('site.registration.banquet')[$apply->banquet] : $apply->makeTotalText('banquet') : '',
                $apply->category == 'B' ? $apply->filename : '',
                $apply->payMethod ? config('site.registration.payMethod')[$apply->payMethod] : '',
                $apply->payMethod == 'B' ? $apply->payDate : '',
                $apply->payMethod == 'B' ? $apply->payName : '',
                config('site.registration.payStatus')[$apply->payStatus],
                $apply->payComplete_at ?? '',
                config('site.registration.status')[$apply->status],
                $apply->created_at ?? '',
                $apply->complete_at ?? ''
            ];

            // 특수문자 때문에
            $this->row[$key] = excelEntity($this->row[$key]);

            $excel->addRow($this->row[$key]);
        }

        // Download the CSV
        return $excel->toBrowser();
    }

    public function AbstractExcel($lists, $totCnt)
    {        
        $excel = SimpleExcelWriter::streamDownload('abstract.csv');
        $excel->noHeaderRow();

        // Header
        $header = [
            'No',
            '접수번호',
            'Presentation Type',
            'Abstract Topics',
            'Abstract Title',
            'Abstract',
            'Keywords',
            'Do you agree to change your presentation type',
            'Copyright Agreement',
            
            'Presenter First Name',
            'Presenter Last Name',
            'Presenter Email',
            'Presenter Mobile',
            'Presenter Country',
            'Presenter Institution',

            'Corresponding First Name',
            'Corresponding Last Name',
            'Corresponding Email',
            'Corresponding Mobile',
            'Corresponding Country',
            'Corresponding Institution',
            
            '접수상태',
            '접수시작일',
            '접수완료일'
        ];

        // Add header to the CSV
        $excel->addRow($header);

        // Add data to the CSV
        foreach ($lists->lazy(3000) as $key => $apply) {

            $p_author = $apply->getPresentation();
            $c_author = $apply->getCorresponding();

            $this->row[$key] = [
                ($totCnt - $key),
                $apply->rnum,
                config('site.abstract.ptype')[$apply->ptype],
                config('site.abstract.topic')[$apply->topic],
                $apply->subject,
                strip_tags($apply->content),
                $apply->getKeyword(),
                config('site.abstract.answer')[$apply->agree1],
                config('site.abstract.agree')[$apply->agree2],

                $p_author->first_name,
                $p_author->last_name,
                $p_author->email,
                $p_author->mobile,
                $p_author->country,
                $apply->makePresentationInstitution(),

                $c_author->first_name,
                $c_author->last_name,
                $c_author->email,
                $c_author->mobile,
                $c_author->country,
                $apply->makeCorrespondingInstitution(),

                config('site.abstract.status')[$apply->status],
                $apply->created_at ?? '',
                $apply->complete_at ?? ''
            ];

            // 특수문자 때문에
            $this->row[$key] = excelEntity($this->row[$key]);

            $excel->addRow($this->row[$key]);
        }

        // Download the CSV
        return $excel->toBrowser();
    }

    public function SymposiumExcel($lists, $totCnt, $country)
    {        
        $excel = SimpleExcelWriter::streamDownload('SpecialSymposium.csv');
        $excel->noHeaderRow();

        // Header
        $header = [
            'No',
            'RegistNumber',
            'Country',
            'Name',
            'Affiliation',
            'Email',
            'Mobile',
            'Photo',
            'Symposium Title',
            'Brief synopsis of topic',

            'Speaker1 Name',
            'Speaker1 Afflication',
            'Speaker1 Country',
            'Speaker1 Lecture Title',
            'Speaker2 Name',
            'Speaker2 Afflication',
            'Speaker2 Country',
            'Speaker2 Lecture Title',
            'Speaker3 Name',
            'Speaker3 Afflication',
            'Speaker3 Country',
            'Speaker3 Lecture Title',
            'Speaker4 Name',
            'Speaker4 Afflication',
            'Speaker4 Country',
            'Speaker4 Lecture Title',
            
            '접수시작일',
            '접수완료일'
        ];

        // Add header to the CSV
        $excel->addRow($header);

        // Add data to the CSV
        foreach ($lists->lazy(3000) as $key => $apply) {
            $this->row[$key] = [
                ($totCnt - $key),
                $apply->rnum,
                $apply->country->cn,
                $apply->firstName.' '.$apply->lastName,
                $apply->affiliation,
                $apply->email,
                '+'.$apply->cnum.' '.$apply->mobile,
                $apply->filename,
                $apply->title,
                $apply->topic,

                $apply->speakers[0]->fname.' '.$apply->speakers[0]->lname, 
                $apply->speakers[0]->affi,
                $country[$apply->speakers[0]->ccode]['cn'],
                $apply->speakers[0]->title,
                
                $apply->speakers[1]->fname.' '.$apply->speakers[0]->lname, 
                $apply->speakers[1]->affi,
                $country[$apply->speakers[1]->ccode]['cn'],
                $apply->speakers[1]->title,

                $apply->speakers[2]->fname.' '.$apply->speakers[0]->lname, 
                $apply->speakers[2]->affi,
                $country[$apply->speakers[2]->ccode]['cn'],
                $apply->speakers[2]->title,

                $apply->speakers[3]->fname.' '.$apply->speakers[0]->lname, 
                $apply->speakers[3]->affi,
                $country[$apply->speakers[3]->ccode]['cn'],
                $apply->speakers[3]->title,
                
                $apply->created_at ?? '',
                $apply->complete_at ?? ''
            ];

            // 특수문자 때문에
            $this->row[$key] = excelEntity($this->row[$key]);

            $excel->addRow($this->row[$key]);
        }

        // Download the CSV
        return $excel->toBrowser();
    }
}
