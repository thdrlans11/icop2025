<?

return [

    'select' => [
        'setting' => [ 'Y' => '설정함', 'N' => '설정안함' ],
        'hide' => [ 'Y' => '비공개', 'N' => '공개' ],
        'skin' => [ '1' => '스킨1', '2' => '스킨2' ],
        'content' => [ '1' => '공지 내용과 동일', '2' => '팝업 내용 새로 작성' ]
    ],

    'notice' => [
        'MAIN_NUM' => '1',
        'SUB_NUM' =>'5',
        'LoginCheck' => false, //회원만 접근
        'Skin' => 'basic',        
        'PermitList' => [ 'N' ],
        'PermitView' => [ 'N' ],
        'PermitPost' => [ 'M' ],
        'PermitReply' => [ 'M' ],
        'PermitComment' => [ 'M' ],
        'UseNotice' => false,
        'UseHide' => true,
        'UsePopup' => false,
        'UseMain' => true,
        'UseReply' => true,
        'UseLink' => true,
        'UseFile' => true,
        'UseCategory' => false,
        'Category' => [ 'A' => '라라벨', 'B' => 'CI' ],
        'UseComment' => true,
        'Search' => [ 'subject'=>'Subject', 'content'=>'Content']
    ],

]

?>