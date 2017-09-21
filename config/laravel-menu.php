<?php

return [
    'default' => [
        'activator' => 'request',
        'render' => 'simple',
    ],

    'activators' => [
        'none' => \Nurmanhabib\Navigator\Activators\NoneActivator::class,
        'request' => \Nurmanhabib\Navigator\Activators\RequestActivator::class,
    ],

    'renders' => [
        'simple' => \Nurmanhabib\Navigator\Renders\NavSimple::class
    ]
];
