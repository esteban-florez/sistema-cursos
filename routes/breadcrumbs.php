<?php

use App\Models\Club;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Item;
use App\Models\Payment;
use App\Models\PNF;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as Trail;
use Illuminate\Support\Facades\Auth;

Breadcrumbs::for('courses', function (Trail $trail) {
    $trail->push('Cursos');
});

Breadcrumbs::for('clubs', function (Trail $trail) {
    $trail->push('Clubes');
});

Breadcrumbs::for('payments', function (Trail $trail) {
    $trail->push('Pagos');
});

Breadcrumbs::for('inventory', function (Trail $trail) {
    $trail->push('Inventario');
});

Breadcrumbs::for('config', function (Trail $trail) {
    $trail->push('Configuración');
});

Breadcrumbs::for('home', function (Trail $trail) {
    $trail->push('Inicio', route('home'));
});

Breadcrumbs::for('areas.index', function (Trail $trail) {
    $trail->parent('courses');
    $trail->push('Áreas de formación', route('areas.index'));
});

Breadcrumbs::for('courses.index', function (Trail $trail) {
    $trail->parent('courses');
    $trail->push('Lista de cursos', route('courses.index'));
});

Breadcrumbs::for('courses.create', function (Trail $trail) {
    $trail->parent('courses');
    $trail->push('Registrar curso', route('courses.create'));
});

Breadcrumbs::for('courses.show', function (Trail $trail, Course $course) {
    if (Auth::user()->can('viewAny', Course::class)) {
        $trail->parent('courses.index');
    } else {
        $trail->parent('available-courses.index');
    }

    $trail->push($course->name, route('courses.show', $course));
});

Breadcrumbs::for('courses.edit', function (Trail $trail, Course $course) {
    $trail->parent('courses.show', $course);
    $trail->push('Editar curso', route('courses.edit', $course));
});

Breadcrumbs::for('available-courses.index', function (Trail $trail) {
    $trail->parent('courses');
    $trail->push('Lista de cursos', route('available-clubs.index'));
});

Breadcrumbs::for('users.index', function (Trail $trail) {
    $trail->parent('config');
    $trail->push('Usuarios', route('users.index'));
});

Breadcrumbs::for('users.create', function (Trail $trail) {
    $trail->parent('users.index');
    $trail->push('Registrar usuario', route('users.create'));
});

Breadcrumbs::for('users.show', function (Trail $trail, User $user) {
    if (Auth::user()->can('viewAny', User::class)) {
        $trail->parent('users.index');
    }
    
    $trail->push('Perfil', route('users.show', $user));
});

Breadcrumbs::for('users.edit', function (Trail $trail, User $user) {
    $trail->parent('users.show', $user);
    $trail->push('Editar perfil', route('users.edit', $user));
});

Breadcrumbs::for('users.payments.index', function (Trail $trail, User $user) {
    $trail->parent('payments');
    $trail->push('Mis pagos', route('users.payments.index', $user));
});

Breadcrumbs::for('users.enrollments.index', function (Trail $trail, User $user) {
    $trail->parent('courses');
    $trail->push('Mis cursos', route('users.enrollments.index', $user));
});

Breadcrumbs::for('users.enrollments.show', function (Trail $trail, Enrollment $enrollment) {
    $trail->parent('users.enrollments.index', $enrollment->student);
    $trail->push($enrollment->course->name, route('users.enrollments.show', $enrollment));
});

Breadcrumbs::for('users.memberships.index', function (Trail $trail, User $user) {
    $trail->parent('clubs');
    $trail->push('Mis clubes', route('users.memberships.index', $user));
});

Breadcrumbs::for('users.memberships.show', function (Trail $trail, $membership) {
    $trail->parent('users.memberships.index', $membership->student);
    $trail->push($membership->club->name, route('users.memberships.show', $membership));
});

Breadcrumbs::for('users.courses.index', function (Trail $trail, User $user) {
    $trail->parent('courses');
    $trail->push('Cursos dictados', route('users.courses.index', $user));
});

Breadcrumbs::for('users.clubs.index', function (Trail $trail, User $user) {
    $trail->parent('clubs');
    $trail->push('Clubes dictados', route('users.clubs.index', $user));
});

Breadcrumbs::for('payments.index', function (Trail $trail) {
    $trail->parent('payments');
    $trail->push('Lista de pagos', route('payments.index'));
});

Breadcrumbs::for('payments.edit', function (Trail $trail, Payment $payment) {
    $trail->parent('users.payments.index', Auth::user());
    $trail->push('Editar pago', route('payments.edit', $payment));
});

Breadcrumbs::for('pending-payments.index', function (Trail $trail) {
    $trail->parent('payments');
    $trail->push('Pagos pendientes', route('pending-payments.index'));
});

Breadcrumbs::for('unfulfilled-payments.index', function (Trail $trail, User $user) {
    $trail->parent('payments');
    $trail->push('Cuotas restantes', route('unfulfilled-payments.index', ['user' => $user]));
});

Breadcrumbs::for('unfulfilled-payments.edit', function (Trail $trail, Payment $payment) {
    $trail->parent('unfulfilled-payments.index', $payment->enrollment->student);
    $trail->push('Pagar cuota restante', route('unfulfilled-payments.edit', $payment));
});

Breadcrumbs::for('clubs.index', function (Trail $trail) {
    $trail->parent('clubs');
    $trail->push('Lista de clubes', route('clubs.index'));
});

Breadcrumbs::for('clubs.create', function (Trail $trail) {
    $trail->parent('clubs');
    $trail->push('Registrar club', route('clubs.create'));
});

Breadcrumbs::for('clubs.show', function (Trail $trail, Club $club) {
    if (Auth::user()->can('viewAny', Club::class)) {
        $trail->parent('clubs.index');
    } else {
        $trail->parent('available-clubs.index');
    }

    $trail->push($club->name, route('clubs.show', $club));
});

Breadcrumbs::for('clubs.edit', function (Trail $trail, Club $club) {
    $trail->parent('clubs.show', $club);
    $trail->push('Editar club', route('clubs.edit', $club));
});

Breadcrumbs::for('available-clubs.index', function (Trail $trail) {
    $trail->parent('clubs');
    $trail->push('Lista de clubs', route('available-clubs.index'));
});

Breadcrumbs::for('clubs.loans.index', function (Trail $trail, Club $club) {
    $trail->parent('clubs.show', $club);
    $trail->push('Préstamos', route('clubs.loans.index', $club));
});

Breadcrumbs::for('memberships.index', function (Trail $trail, Club $club) {
    $trail->parent('clubs.show', $club);
    $trail->push('Miembros', route(
        'memberships.index', ['club' => $club]
    ));
});

Breadcrumbs::for('enrollments.index', function (Trail $trail, Course $course) {
    $trail->parent('courses.show', $course);
    $trail->push('Matrícula', route('enrollments.index', ['course' => $course]));
});

Breadcrumbs::for('enrollments.create', function (Trail $trail, Course $course) {
    $trail->parent('courses.show', $course);
    $trail->push('Inscripción en curso', route(
        'enrollments.create', ['course' => $course]));
});

Breadcrumbs::for('enrollments.success', function (Trail $trail, Enrollment $enrollment) {
    $trail->parent('courses.show', $enrollment->course);
    $trail->push('Inscripción en curso', route('enrollments.success', $enrollment));
});

Breadcrumbs::for('credentials.index', function (Trail $trail) {
    $trail->parent('config');
    $trail->push('Credenciales de pago', route('credentials.index'));
});

Breadcrumbs::for('pnfs.index', function (Trail $trail) {
    $trail->parent('config');
    $trail->push('PNFs', route('pnfs.index'));
});

Breadcrumbs::for('pnfs.create', function (Trail $trail) {
    $trail->parent('pnfs.index');
    $trail->push('Añadir PNF', route('pnfs.create'));
});

Breadcrumbs::for('pnfs.edit', function (Trail $trail, PNF $pnf) {
    $trail->parent('pnfs.index');
    $trail->push($pnf->name);
    $trail->push('Editar PNF', route('pnfs.edit', $pnf));
});

Breadcrumbs::for('items.index', function (Trail $trail) {
    $trail->parent('inventory');
    $trail->push('Artículos', route('items.index'));
});

Breadcrumbs::for('items.edit', function (Trail $trail, Item $item) {
    $trail->parent('items.index');
    $trail->push($item->name);
    $trail->push('Editar artículo', route('items.edit', $item));
});

Breadcrumbs::for('items.stock.index', function (Trail $trail) {
    $trail->parent('inventory');
    $trail->push('Inventario actual', route('items.stock.index'));
});

Breadcrumbs::for('operations.create', function (Trail $trail) {
    $trail->parent('items.stock.index');
    $trail->push('Registrar operación', route('operations.create'));
});

Breadcrumbs::for('operations.index', function (Trail $trail) {
    $trail->parent('inventory');
    $trail->push('Historial de inventario', route('operations.index'));
});

Breadcrumbs::for('loans.index', function (Trail $trail) {
    $trail->parent('inventory');
    $trail->push('Préstamo de artículos', route('loans.index'));
});

Breadcrumbs::for('schedule', function (Trail $trail, User $user) {
    $trail->parent('home');
    $trail->push('Horario', route('schedule', $user));
});

Breadcrumbs::for('backups', function (Trail $trail) {
    $trail->parent('config');
    $trail->push('Base de datos', route('backups.manage'));
});

Breadcrumbs::for('stats', function (Trail $trail) {
    $trail->parent('home');
    $trail->push('Estadísticas', route('stats'));
});
