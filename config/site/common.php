<?
return [

    // ================= api =================
    'api' => [
        'url' => env('APP_URL') . '/api',
    ],

    // ================= admin =================
    'admin' => [
        'url' => env('APP_URL') . '/admin',
    ],

    // ================= web =================
    'web' => [
        'url' => env('APP_URL'),
    ],

    'info' => [                
        'siteName' => 'ICOP/ISOP 2025',
        'name' => 'ICOP/ISOP 2025',
        'email' => 'icop2025org@gmail.com',
        'email2' => 'a01083691020@gmail.com',        
        'url' => env('APP_URL'),
        'ecareNum' => '399',
        'eventDay' => '2025-06-22'
    ],

    'default' => [
        'year' => '2025',
        'adminReceive' => false, //사무국 메일 활성화
        'mailReceive' => true, // 기획자 메일 활성화
     ],

    'dayOfWeek' => [
        '0' => '일',
        '1' => '월',
        '2' => '화',
        '3' => '수',
        '4' => '목',
        '5' => '금',
        '6' => '토'
    ],
]
?>