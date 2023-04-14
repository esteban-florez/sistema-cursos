<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\History;

class SaveHistory
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $route = Route::currentRouteName();
        $description = collect($this->descriptions)->get($route);

        if (!$description || !Auth::user()) {
            return $response;
        }

        History::create([
            'action' => $description,
            'user_id' => Auth::user()->id,
        ]);

        return $response;
    }

    protected $descriptions = [
        'areas.index' => 'Ver listado de áreas',
        'areas.store' => 'Registrar nueva área',
        'areas.update' => 'Editar área',
        'auth' => 'Iniciar sesión',
        'available-clubs.index' => 'Ver clubes disponibles',
        'available-courses.index' => 'Ver cursos disponibles',
        'backups.upload' => 'Subir un archivo de respaldo',
        'backups.manage' => 'Ver listado de respaldos',
        'backups.generate' => 'Generar un nuevo respaldo',
        'backups.delete' => 'Eliminar un respaldo',
        'backups.download' => 'Descargar un respaldo',
        'clubs.store' => 'Registrar nuevo club',
        'clubs.index' => 'Ver listado de clubs',
        'clubs.update' => 'Editar club',
        'clubs.show' => 'Ver detalles de club',
        'clubs.loans.index' => 'Ver préstamos del club',
        'club.status.update' => 'Habilitar/deshablitar un club',
        'courses.store' => 'Registrar curso',
        'courses.index' => 'Ver listado de cursos',
        'courses.show' => 'Ver detalles de curso',
        'courses.update' => 'Editar curso',
        'credentials.index' => 'Ver credenciales de pago',
        'enrollments.index' => 'Ver matrícula de curso',
        'enrollments.store' => 'Inscribirse en un curso',
        'enrollments.approval.update' => 'Aprobar/reprobar un estudiante',
        'enrollments.confirmation.update' => 'Confirmar inscripción',
        'items.store' => 'Registrar nuevo artículo',
        'items.index' => 'Ver listado de artículos',
        'items.stock.index' => 'Ver estado del inventario',
        'items.update' => 'Editar artículo',
        'loans.store' => 'Registrar nuevo préstamo',
        'loans.index' => 'Ver listado de préstamos',
        'loans.update' => 'Registrar devolución de préstamo',
        'memberships.index' => 'Ver miembros de club',
        'memberships.store' => 'Inscribirse en un club',
        'memberships.destroy' => 'Retirarse de un club',
        'movil.store' => 'Registrar datos para pago móvil',
        'movil.update' => 'Editar datos para pago móvil',
        'operations.index' => 'Ver historial de inventario',
        'operations.store' => 'Registrar operación de inventario',
        'payments.index' => 'Ver listado de pagos',
        'payments.update' => 'Editar datos de pago',
        'payments.status.update' => 'Actualizar estado de un pago',
        'pdf.certificate' => 'Descargar Certificado de Aprobación',
        'pdf.enrollment' => 'Descargar Planilla de Inscripción',
        'pdf.enrollments' => 'Descargar Matrícula de Curso',
        'pdf.items' => 'Descargar Estado de Inventario',
        'pdf.memberships' => 'Descargar Lista de Miembros del Club',
        'pdf.payments' => 'Descargar Reporte de Pagos',
        'pending-payments.index' => 'Ver pagos pendientes',
        'pnfs.index' => 'Ver listado de PNFs y Departamentos',
        'pnfs.store' => 'Registrar PNF o Departamento',
        'pnfs.update' => 'Editar PNF o Departamento',
        'schedule' => 'Ver horario',
        'stats' => 'Ver estadísticas',
        'transfer.update' => 'Editar datos para transferencia',
        'transfer.store' => 'Registrar datos para transferencia',
        'unfulfilled-payments.index' => 'Ver cuotas restantes',
        'unfulfilled-payments.update' => 'Cancelar cuota restante',
        'password.update' => 'Cambiar de contraseña',
        'users.store' => 'Registrar nuevo usuario',
        'users.index' => 'Ver listado de usuarios',
        'users.enrollments.show' => 'Ver detalle de curso',
        'users.memberships.show' => 'Ver detalle de club',
        'users.show' => 'Ver perfil',
        'users.update' => 'Editar perfil',
        'users.clubs.index' => 'Ver "Mis clubes"',
        'users.courses.index' => 'Ver "Mis cursos"',
        'users.enrollments.index' => 'Ver "Mis cursos"',
        'users.memberships.index' => 'Ver "Mis clubes"',
        'users.payments.index' => 'Ver "Mis pagos"',
        'users.image.update' => 'Actualizar imagen de perfil',
    ];
}
