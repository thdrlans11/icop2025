<?

return [
    'menu' => [
        '1' => [
            'name' => 'About the Congress',
            'url' => "",
            'route_target' => 'about.overview',
            'route_param' => [],
        ],
        '2' => [
            'name' => 'Program',
            'url' => "",
            'route_target' => 'program.program',
            'route_param' => [],
        ],
        '3' => [
            'name' => 'Abstract',
            'url' => "",
            'route_target' => 'abstract.guide',
            'route_param' => ['mainNum'=>'3', 'subNum'=>'1'],
        ],
        '4' => [
            'name' => 'Registration',
            'url' => "",
			'route_target' => 'registration.guide',
            'route_param' => [],
			
           /*'route_target' => 'ready',
            'route_param' => ['mainNum'=>'4', 'subNum'=>'1']  */
        ],
        '6' => [
            'name' => 'Sponsors',
            'url' => "",
            'route_target' => 'sponsor.ship',
            'route_param' => [],
//            'route_target' => 'ready',
//            'route_param' => ['mainNum'=>'6', 'subNum'=>'1'],
        ],        
        '5' => [
            'name' => 'Location',
            'url' => "",
            'route_target' => 'location.venue',
            'route_param' => [],
        ]
    ],

    'sub_menu' => [
        '1' => [
            '1' => [
                'name' => 'Overview',
                'url' => "",
                'route_target' => 'about.overview',
                'route_param' => [],
            ],
            '2' => [
                'name' => 'Welcome Message',
                'url' => "",
                'route_target' => 'about.welcome',
                'route_param' => [],
            ],
            '3' => [
                'name' => 'About Society',
                'url' => "",
                'route_target' => 'about.society',
                'route_param' => [],
            ],
            '4' => [
                'name' => 'Committee',
                'url' => "",
                'route_target' => 'about.committee',
                'route_param' => [],
            ],
            '5' => [
                'name' => 'Notice',
                'url' => "",
                'route_target' => 'board.list',
                'route_param' => ['code'=>'notice'],
            ],
            '6' => [
                'name' => 'Contact Info',
                'url' => "",
                'route_target' => 'about.contact',
                'route_param' => [],
            ],
        ],
        '2' => [
            '1' => [
                'name' => 'Program at a glance',
                'url' => "",
                'route_target' => 'program.program',
				//'route_target' => 'ready',
                'route_param' => [],
				//'route_param' => ['mainNum'=>'2', 'subNum'=>'1'],
            ],
            '2' => [
                'name' => 'Program in Detail',
                'url' => "",
                'route_target' => 'ready',
                'route_param' => ['mainNum'=>'2', 'subNum'=>'2'],
            ],
            '3' => [
                'name' => 'Plenary Lectures',
                'url' => "",
                'route_target' => 'program.speakers',
                'route_param' => [],
            ],
            '4' => [
                'name' => 'Special Symposia',
                'url' => "",
                'route_target' => 'apply.symposium',
                'route_param' => ['step'=>'1'],
            ]
        ],
        '3' => [
            '1' => [
                'name' => 'Abstract Submission Guidelines',
                'url' => "",
                # 2025-01-31 오픈 'route_target' => 'ready',
                'route_target' => 'abstract.guide',
                'route_param' => ['mainNum'=>'3', 'subNum'=>'1'],
            ],
            '2' => [
                'name' => 'Online Submission',
                'url' => "",
                /* 2025-01-31 오픈
                'route_target' => 'ready',
                'route_param' => ['mainNum'=>'3', 'subNum'=>'2'],
                */
                'route_target' => 'abstract.registration',
                'route_param' => ['step'=>'1'],
            ],
            '3' => [
                'name' => 'Abstract Review & Modification',
                'url' => "",
                /* 2025-01-31 오픈
                'route_target' => 'ready',
                'route_param' => ['mainNum'=>'3', 'subNum'=>'3'],
                */
                'route_target' => 'abstract.registration.search',
                'route_param' => [],
            ],
            '4' => [
                'name' => 'Presentation Guidelines',
                'url' => "",
                'route_target' => 'ready',
                'route_param' => ['mainNum'=>'3', 'subNum'=>'4'],
            ]
        ],
        '4' => [
            '1' => [
                'name' => 'Registration Guidelines',
                'url' => "",
                /* 2025-02-03 닫음
				

				'route_target' => 'ready',
				'route_param' => ['mainNum'=>'4', 'subNum'=>'1'],
				*/
				'route_target' => 'registration.guide',
				'route_param' => [],
                
            ],
            '2' => [
                'name' => 'Go to Register',
                'url' => "",
                /* 
				
				'route_target' => 'ready',
				'route_param' => ['mainNum'=>'4', 'subNum'=>'2'],*/

				'route_target' => 'apply.registration',
                'route_param' => ['step'=>'1'], 
				
            ],
            '3' => [
                'name' => 'Registration Confirmation and Receipt',
                'url' => "",
                /*
				
				'route_target' => 'ready',
				'route_param' => ['mainNum'=>'4', 'subNum'=>'3'],*/

				'route_target' => 'registration.search',
                'route_param' => [],
				
            ],
            '4' => [
                'name' => '등록 가이드라인',
                'url' => "",
                'route_target' => 'registration.guide',
                'route_param' => ['rgubun'=>'KOR'],
            ],
            '5' => [
                'name' => '온라인 등록',
                'url' => "",
                'route_target' => 'apply.registration',
                'route_param' => ['rgubun'=>'KOR', 'step'=>'1'],
            ],
            '6' => [
                'name' => '등록 확인 및 영수증',
                'url' => "",
                'route_target' => 'registration.search',
                'route_param' => ['rgubun'=>'KOR'],
            ],
        ],
        '5' => [
            '1' => [
                'name' => 'Venue',
                'url' => "",
                'route_target' => 'location.venue',
                'route_param' => [],
            ],
            '2' => [
                'name' => 'Map & Transportation',
                'url' => "",
                'route_target' => 'location.map',
                'route_param' => [],
            ],
            '3' => [
                'name' => 'Accommodation',
                'url' => "",
                'route_target' => 'location.accommodation',
                'route_param' => [],
            ],
        ],
        '6' => [            
            '1' => [
                'name' => 'Sponsorship',
                'url' => "",
                'route_target' => 'sponsor.ship',
                'route_param' => [],
            ],
			 '2' => [
                'name' => '후원신청서식',
                'url' => "",
                'route_target' => 'sponsor.info',
                'route_param' => [],
            ]
        ]
    ],
    
    'admin_menu' => [
        '1' => [
            'name' => 'Registration',
            'url' => "",
            'route_target' => 'admin.registration.list',
            'route_param' => [],
        ],
        '2' => [
            'name' => 'Abstract',
            'url' => "",
            'route_target' => 'admin.abstract.list',
            'route_param' => [],
        ],
        '3' => [
            'name' => 'Special Symposium',
            'url' => "",
            'route_target' => 'admin.symposium.list',
            'route_param' => [],
        ],
    ],
]

?>