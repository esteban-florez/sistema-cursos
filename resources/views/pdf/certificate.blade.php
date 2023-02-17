<head>
  <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    .container {
      padding: 2rem;
    }

    .bold {
      font-weight: bold;
    }

    .normal {
      font-weight: normal;
    }

    img {
      position: absolute;
    }

    #logo {
      top: 2rem;
      left: 12rem;
      width: 6rem;
    }

    #certificate-bg {
      top: -48px;
      left: -48px;
      height: 120%;
      width: 110%;
      z-index: -2;
    }

    .italic {
      font-style: italic;
    }

    .name {
      font-size: 3rem;
      font-family: serif;
    }

    .sub {
      font-size: 2rem;
      margin-bottom: -0.5rem;
    }

    .course {
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

    table {
      margin-top: 5rem;
    }

    table, tr {
      width: 100%;
    }

    td {
      width: 32%;
    }

    td div {
      width: 100%;
      text-align: center;
    }

    .small {
      font-size: 0.8rem;
    }
  </style>
</head>
<body>
  <img id="certificate-bg" src="data:image/png;base64, {{ $bg }}">
  <div class="container">
    <img id="logo" src="data:image/png;base64, {{ $logo }}"/>
    <header>
      <p>REPUBLICA BOLIVARIANA DE VENEZUELA</p>
      <p>MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA</p>
      <p class="bold-italic">UNIVERSIDAD POLITÉCNICA TERRITORIAL DEL ESTADO ARAGUA</p>
      <p class="bold-italic">"FEDERICO BRITO FIGUEROA"</p>
      <p class="bold-italic header-title">DEPARTAMENTO DE VINCULACIÓN SOCIO INTEGRAL</p>
    </header>
    <section style="margin-top: 3rem;">
      <p class="bold">Otorga el presente:</p>
      <h2 class="normal sub">Certificado a:</h2>
      <h1 class="italic name">{{ $student->full_name }}</h1>
      <p class="italic bold" style="margin-bottom: 2rem;">Documento de Identidad: {{ $student->full_ci }}</p>
  
      <p>Por haber <span class="bold">APROBADO</span> el curso:</p>
      <h2 class="bold course">"{{ $course->name }}"</h2>
      <p>La Victoria, Estado Aragua, desde el {{ spanishDate($course->start_course) }} al {{ spanishDate($course->end_course) }}.</p>
      <p>Duración: {{ $course->duration }} horas académicas.</p>
    </section>
    <table>
      <tr>
        <td>
          <div>
            ____________________
            <p class="bold-italic small">Ing. Edeblangel Vanegas</p>
            <p class="bold-italic small">Jefe del Departamento de Vinculación Social</p>
          </div>
        </td>
        @if($course->area->pnf->name === 'Extensión Universitaria')
          <td>
          </td>
          <td>
            <div>
              ____________________
              <p class="bold-italic small">Ing. {{ $course->instructor->full_name }}</p>
              <p class="bold-italic small">Instructor del curso</p>
            </div>
          </td>  
        @else
          <td>
            <div>
              ____________________
              <p class="bold-italic small">Dra. Bettys Muñoz</p>
              <p class="bold-italic small">Rectora de la UPTA La Victoria</p>
            </div>
          </td>
          <td>
            <div>
              ____________________
              <p class="bold-italic small">Ing. {{ $course->area->pnf->leader }}</p>
              <p class="bold-italic small">Jefe del Departamento de {{ $course->area->pnf->name }}</p>
            </div>
          </td>
        @endif
      </tr>
    </table>
  </div>
</body>