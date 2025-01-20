<?php

namespace App\Services\Util;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
/**
 * Class ExcelService
 * @package App\Services
 */
class WordService
{
    private $row;


    public function makeWord($query, $type = 'symposium')
    {
        if($type == 'symposium'){
            $phpWord = $this->symposiumWordFile($query);

            // 파일명을 설정하고 파일을 서버에 저장하지 않고 직접 다운로드하도록 설정
            $fileName = $type.'.docx';
            $temp_file = tempnam(sys_get_temp_dir(), $fileName);

            // 파일 작성
            $writer = IOFactory::createWriter($phpWord, 'Word2007');
            $writer->save($temp_file);

            // 파일 다운로드
            return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
        }
    }
    public function symposiumWordFile($query)
    {
        // 새로운 PHPWord 객체 생성
        $phpWord = new PhpWord();
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];  // 허용되는 이미지 확장자 목록
        $pregReplace = '/<[^a-zA-Z_]/'; // XML 에러 발생해서 추가

        foreach ($query->lazy() as $row) {
            // 새로운 섹션 추가
            $section = $phpWord->addSection();

            \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true); // < 등의 태그 사용

            $section->addText(
                'Submission No.: '.$row->rnum ?? '',
                array('name' => 'Arial', 'size' => 12, 'bold' => true),
                array('alignment' => 'left'),
            );
            $section->addTextBreak(); // 줄바꿈

            $section->addText(
                'Country : '.$row->country->cn ?? '',
                array('name' => 'Arial', 'size' => 10, 'bold' => true),
                array('alignment' => 'left'),
            );
            $section->addText(
                'Name : '.($row->firstName ?? '').' '.($row->lastName ?? ''),
                array('name' => 'Arial', 'size' => 10, 'bold' => true),
                array('alignment' => 'left'),
            );
            $section->addText(
                'Affiliation : '.$row->affiliation ?? '',
                array('name' => 'Arial', 'size' => 10, 'bold' => true),
                array('alignment' => 'left'),
            );
            $section->addText(
                'Email : '.$row->email ?? '',
                array('name' => 'Arial', 'size' => 10, 'bold' => true),
                array('alignment' => 'left'),
            );
            $section->addText(
                'Phone Number : +'.($row->cnum ?? '').' '.($row->mobile ?? ''),
                array('name' => 'Arial', 'size' => 10, 'bold' => true),
                array('alignment' => 'left'),
            );
            $section->addTextBreak(); // 줄바꿈

            $section->addText(
                'Symposium Title : ',
                array('name' => 'Arial', 'size' => 10, 'bold' => true),
                array('alignment' => 'left'),
            );
            $title = strip_tags($row->title ?? ''); // 허용되는 태그 제외 나머지 태그 지우기
            $title = preg_replace($pregReplace, '', $title); // XML 에러 발생해서 추가

            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $title, false, false);

            $section->addTextBreak(); // 줄바꿈

            $section->addText(
                'Brief synopsis of topic : ',
                array('name' => 'Arial', 'size' => 10, 'bold' => true),
                array('alignment' => 'left'),
            );
            $topic = strip_tags($row->topic ?? ''); // 허용되는 태그 제외 나머지 태그 지우기
            $topic = preg_replace($pregReplace, '', $topic); // XML 에러 발생해서 추가

            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $topic, false, false);

            $section->addTextBreak(); // 줄바꿈
        }

        // 파일 작성
        return $phpWord;
    }
}
