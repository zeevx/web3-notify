<?php

return [
    'commands' => [
        'Route cache'      => ['run' => 'route:cache', 'type' => 'info', 'group' => 'Cache'],
        'Config cache'     => ['run' => 'config:cache', 'type' => 'info', 'group' => 'Cache'],
        'View cache'       => ['run' => 'view:cache', 'type' => 'info', 'group' => 'Cache'],

        'Route clear'     => ['run' => 'route:clear', 'type' => 'warning', 'group' => 'Clear Cache'],
        'Config clear'    => ['run' => 'config:clear', 'type' => 'warning', 'group' => 'Clear Cache'],
        'View clear'      => ['run' => 'view:clear', 'type' => 'warning', 'group' => 'Clear Cache'],

        'Up'   => ['run' => 'up', 'type' => 'success', 'group' => 'Maintenance'],
        'Down' => ['run' => 'down', 'options' => ['--secret' => 'backdoor'], 'type' => 'dark', 'group' => 'Maintenance'],

        'Push Slack' => ['run' => 'send:slack', 'type' => 'success', 'group' => 'Notifications'],
        'Push Telegram' => ['run' => 'send:telegram', 'type' => 'success', 'group' => 'Notifications'],
        'Push Twitter' => ['run' => 'send:twitter', 'type' => 'success', 'group' => 'Notifications'],
    ],
    'history'  => 10,
];
