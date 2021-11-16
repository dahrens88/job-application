<?php

declare(strict_types=1);

return [
    'binary' => '/usr/bin/wkhtmltopdf',
    'ignoreWarnings' => true,
    'commandOptions' => [
        'enableXvfb' => true,
        'useExec' => true,
        'procEnv' => [
            'LANG' => 'en_US.utf8',
        ],
    ],
    'encoding' => 'UTF-8',
    'no-outline',
    'margin-top' => 0,
    'margin-right'=> 0,
    'margin-bottom' => 0,
    'margin-left' => 0,
    'disable-smart-shrinking',
];