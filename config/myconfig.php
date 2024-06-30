<?php
return [
    // "product_category" => [
    //     "item_per_page" => 8
    // ],
    'my_item_per_page' => env('ITEM_PER_PAGE', 5),
    'vnpay' => [
        'TmnCode' => env('VNPAY_TMN_CODE'),
        'HashSecret' => env('VNPAY_HASH_SECRET'),
        'Url' => env('VNPAY_URL'),
        'Returnurl' => env('VNPAY_RETURNURL'),
        'vnp_apiUrl' => env('VNPAY_VNP_API_URL'),
        'apiUrl' => env('VNPAY_API_URL'),
    ]
];
