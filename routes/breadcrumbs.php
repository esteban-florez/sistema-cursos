<?php

use App\Models\Course;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as Trail;

Breadcrumbs::for('courses', function (Trail $trail) {
    $trail->push('Cursos');
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