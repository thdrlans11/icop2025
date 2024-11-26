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
}
