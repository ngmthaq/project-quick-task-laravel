<?php

$common = [
    'task' => [
        'status' => [
            'in_progress' => 0,
            'completed' => 1
        ],
        'description' => []
    ]
];

$common['task']['description'][$common['task']['status']['in_progress']] = 'Đang làm';
$common['task']['description'][$common['task']['status']['completed']] = 'Đã hoàn thành';

return $common;
