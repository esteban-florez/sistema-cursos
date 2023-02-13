<?php

function generateAlerts($resource) {
    $baseMsg = fn($op, $res) => "¡$res se ha $op con éxito!";

    return [
        'created' => $baseMsg('creado', $resource),
        'updated' => $baseMsg('editado', $resource),
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
    'user-role' => generateAlerts('El rol del usuario'),
    'approval' => generateAlerts('La aprobación'),
];
