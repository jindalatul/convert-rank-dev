<?php
$credentials = [
    'GOOGLE_AUTH' => [
                        'GOOGLE_CLIENT_ID'     => '',
                        'GOOGLE_CLIENT_SECRET' => '',
                        'GOOGLE_REDIRECT_URI'  => 'http://localhost/convert-rank/app/google-callback.php',
                        'HOST_NAME'            => 'http://localhost/convert-rank/app'
                        ],
    'DB' => [
                'HOST'     => 'lamp-docker-db-1',
                'DATABASE'     => 'hub-spoke',
                'USERNAME'     => 'root',
                'PASSWORD' => ''
    ],
    'GEMINI_KEY' => '',

    ['OPEN_AI'] => '',

    ['DFS']     =>  [
                        'dfs_login'      =>          '',
                        'dfs_password'      =>       '',
                        'dfs_api_url'       =>       'https://api.dataforseo.com/',
                        //'dfs_api_url'       =>      'https://sandbox.dataforseo.com/',
                    ]
];