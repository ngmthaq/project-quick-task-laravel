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

$common['task']['description'][$common['task']['status']['in_progress']] = 'In Progress';
$common['task']['description'][$common['task']['status']['completed']] = 'Completed';

return $common;
