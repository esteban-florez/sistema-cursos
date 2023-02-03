<?php

use App\Models\Course;
use App\Models\Payment;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as Trail;

Breadcrumbs::for('courses', function (Trail $trail) {
    $trail->push('Cursos');
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
    $trail->push('Cursos');
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

Breadcrumbs::for('users.edit', function (Trail $trail, User $user) {
    $trail->parent('users.show', $user);
    $trail->push('Editar perfil');
});

Breadcrumbs::for('users.payments.index', function (Trail $trail, User $user) {
    $trail->parent('payments');
    $trail->push('Mis pagos', route('users.payments.index', $user));
});

Breadcrumbs::for('pending-payments.index', function (Trail $trail) {
    $trail->parent('payments');
    $trail->push('Pagos pendientes', route('pending-payments.index'));
});

Breadcrumbs::for('payments.index', function (Trail $trail) {
    $trail->parent('payments');
    $trail->push('Lista de pagos', route('payments.index'));
});

Breadcrumbs::for('payments.edit', function (Trail $trail, User $user, Payment $payment) {
    $trail->parent('users.payments.index', $user->id);
    $trail->push('Editar pago', route('payments.edit', $payment->id));
});