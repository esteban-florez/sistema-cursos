<?php

function generateAlerts($resource) {
    $baseMsg = function ($op, $res) {
        return "¡$res se ha $op con éxito!";
    };

    return [
        'created' => $baseMsg('creado', $resource),
        'updated' => $baseMsg('editado', $resource),
        'retired' => $baseMsg('retirado', $resource),
    ];
}

return [
    'areas' => generateAlerts('El área'),
    'courses' => generateAlerts('El curso'),
    'clubs' => generateAlerts('El club'),
    'payments' => generateAlerts('El pago'),
    'credentials' => generateAlerts('Las credenciales'),
    'payment-status' => generateAlerts('El estado del pago'),
    'users' => generateAlerts('El usuario'),
    'profile' => generateAlerts('El perfil'),
    'password' => generateAlerts('La contraseña'),
    'user-role' => generateAlerts('El rol del usuario'),
    'approval' => generateAlerts('La aprobación'),
    'fulfilled' => '¡El pago se ha realizado con éxito!', 
    'pnfs' => generateAlerts('El pnf'),
    'items' => generateAlerts('El artículo'),
    'joined' => '¡Se ha unido al club con éxito!',
    'retired' => '¡Se ha retirado del club con éxito!',
    'operations' => '¡La operación se ha registrado con éxito!',
    'loans' => '¡El préstamo se ha registrado con éxito!',
    'confirmed' => '¡La inscripción se ha confirmado con éxito!',
    'backups' => [
        'dumped' => '¡La base de datos se ha respaldado con éxito!',
        'deleted' => '¡El respaldo se ha eliminado con éxito!',
        'recovered' => '¡La base de datos se ha restaurado con éxito!'
    ],
];
