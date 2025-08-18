@props(['titleBox' => false, 'logo'])

<div id="header">
  <img src="data:image/png;base64, {{ $logo }}" id="logo"/>
  <header>
    <p>REPUBLICA BOLIVARIANA DE VENEZUELA</p>
    <p>MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA</p>
    <p class="bold-italic">UNIVERSIDAD AFILIADA</p>
    @if ($titleBox)
      <div class="title-box">
        <h3>PLANILLA DE INSCRIPCIÓN</h3>
      </div>
    @endif
    <p class="bold-italic header-title">DEPARTAMENTO DE CURSOS Y CLUBES</p>
  </header>
</div>
