@inject('Route', 'Illuminate\Support\Facades\Route')
@aware(['subtitle'])

<div class="d-flex gap-2 py-2 @isset($subtitle)align-self-start @endisset">
  <a href="#">Cursos</a>
  /
  <span>Áreas de formación</span>
</div>