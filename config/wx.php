<?php

return [
    'app_id' => env('APP_ID'),
    'app_secret' => env('APP_SECRET'),
    'pay_back_url' => env('PAY_BACK_RUL', 'https://la.alrcly.com/aip/pay/notify'),
];
