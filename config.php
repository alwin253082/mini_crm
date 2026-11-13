<?php
return [
    'root' => [
        'servidor' => 'localhost',
        'usuario' => 'root',
        'password' => '',
        'base_datos' => 'mini_crm',
        'etiqueta' => 'root (todos los privilegios)',
        'clase' => 'root-root',
    
    ],
    'app' => [
        'servidor' => 'localhost',
        'usuario' => 'app_user',
        'password' => 'PasswordSeguro123!',
        'base_datos' => 'mini_crm',
        'etiqueta' => 'app_user (privilegios minimos)',
        'clase' => 'rol-app',
    ],
];
