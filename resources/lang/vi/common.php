<?php

$common = [
    'task' => [
        'status' => [
            'in_progress' => 0,
            'completed' => 1
        ],
        'description' => []
    ],
    'user_status' => [
        'status' => [
            'unactive' => 0,
            'active' => 1
        ],
        'description' => []
    ],
    'user_permission' => [
        'status' => [
            'user' => 0,
            'admin' => 1
        ],
        'description' => []
    ]
];

$common['task']['description'][$common['task']['status']['in_progress']] = 'Đang làm';
$common['task']['description'][$common['task']['status']['completed']] = 'Đã hoàn thành';

$common['user_status']['description'][$common['user_status']['status']['unactive']] = 'Không kích hoạt';
$common['user_status']['description'][$common['user_status']['status']['active']] = 'Kích hoạt';

$common['user_permission']['description'][$common['user_permission']['status']['user']] = 'Người dùng';
$common['user_permission']['description'][$common['user_permission']['status']['admin']] = 'Quản trị viên';

return $common;
