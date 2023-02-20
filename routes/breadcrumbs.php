<?php

use App\Models\Club;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
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

Breadcrumbs::for('config', function (Trail $trail) {
    $trail->push('Configuración');
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
    $trail->parent('courses.index');
    $trail->push($course->name, route('courses.show', $course->id));
});

Breadcrumbs::for('courses.edit', function (Trail $trail, Course $course) {
    $trail->parent('courses.show', $course);
    $trail->push('Editar curso');
});

Breadcrumbs::for('available-courses.index', function (Trail $trail) {
    $trail->parent('courses');
    $trail->push('Lista de cursos');
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
    $trail->parent('users.index');
    $trail->push('Perfil', route('users.show', $user->id));
});

Breadcrumbs::for('profile', function (Trail $trail) {
    $trail->push('Perfil');
});

Breadcrumbs::for('users.edit', function (Trail $trail, User $user) {
    $trail->parent('users.show', $user);
    $trail->push('Editar perfil');
});

Breadcrumbs::for('users.payments.index', function (Trail $trail, User $user) {
    $trail->parent('payments');
    $trail->push('Mis pagos', route('users.payments.index', $user));
});

Breadcrumbs::for('users.enrollments.index', function (Trail $trail, User $user) {
    $trail->parent('courses');
    $trail->push('Mis cursos', route('users.enrollments.index', $user));
});

Breadcrumbs::for('users.courses.index', function (Trail $trail, User $user) {
    $trail->parent('courses');
    $trail->push('Cursos dictados', route('users.courses.index', $user));
});

Breadcrumbs::for('payments.index', function (Trail $trail) {
    $trail->parent('payments');
    $trail->push('Lista de pagos', route('payments.index'));
});

Breadcrumbs::for('payments.edit', function (Trail $trail, Payment $payment) {
    $trail->parent('users.payments.index', Auth::user());
    $trail->push('Editar pago', route('payments.edit', $payment->id));
});

Breadcrumbs::for('pending-payments.index', function (Trail $trail) {
    $trail->parent('payments');
    $trail->push('Pagos pendientes', route('pending-payments.index'));
});

Breadcrumbs::for('unfulfilled-payments.index', function (Trail $trail, User $user) {
    $trail->parent('payments');
    $trail->push('Cuotas restantes', route('unfulfilled-payments.index', ['user' => $user->id]));
});

Breadcrumbs::for('unfulfilled-payments.edit', function (Trail $trail, $user) {
    $trail->parent('unfulfilled-payments.index', $user);
    $trail->push('Pagar cuota restante');
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
    $trail->parent('clubs.index');
    $trail->push($club->name, route('clubs.show', $club->id));
});

Breadcrumbs::for('clubs.edit', function (Trail $trail, Club $club) {
    $trail->parent('clubs.show', $club);
    $trail->push('Editar club', route('clubs.edit', $club->id));
});

Breadcrumbs::for('available-clubs.index', function (Trail $trail) {
    $trail->parent('clubs');
    $trail->push('Lista de clubs');
});

Breadcrumbs::for('enrollments.index', function (Trail $trail, Course $course) {
    $trail->parent('courses.show', $course);
    $trail->push('Matrícula', route(
        'enrollments.index', ['course' => $course->id]
    ));
});

Breadcrumbs::for('enrollments.create', function (Trail $trail, Course $course) {
    $trail->parent('courses.show', $course);
    $trail->push('Inscripción en curso', route(
        'enrollments.create', ['course' => $course->id]
    ));
});

Breadcrumbs::for('enrollments.success', function (Trail $trail, Enrollment $enrollment) {
    $trail->parent('courses.show', $enrollment->course);
    $trail->push('Inscripción en curso', route('enrollments.success', $enrollment->id));
});

Breadcrumbs::for('enrollments.show', function (Trail $trail, Enrollment $enrollment) {
    $trail->parent('users.enrollments.index', $enrollment->student);
    $trail->push($enrollment->course->name, route('enrollments.show', $enrollment));
});

Breadcrumbs::for('credentials.index', function (Trail $trail) {
    $trail->parent('config');
    $trail->push('Credenciales de pago', route('credentials.index'));
});

Breadcrumbs::for('home', function (Trail $trail) {
    $trail->push('Inicio', route('home'));
});

Breadcrumbs::for('users.enrollments.index', function (Trail $trail, User $user) {
    $trail->parent('courses');
    $trail->push('Mis cursos', route('users.enrollments.index', $user));
});
