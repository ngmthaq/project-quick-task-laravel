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

$common['task']['description'][$common['task']['status']['in_progress']] = 'In Progress';
$common['task']['description'][$common['task']['status']['completed']] = 'Completed';

$common['user_status']['description'][$common['user_status']['status']['unactive']] = 'Unactive';
$common['user_status']['description'][$common['user_status']['status']['active']] = 'Active';

$common['user_permission']['description'][$common['user_permission']['status']['user']] = 'User';
$common['user_permission']['description'][$common['user_permission']['status']['admin']] = 'Admin';

return $common;
