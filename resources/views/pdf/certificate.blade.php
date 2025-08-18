<head>
  <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/certificado-pdf.css') }}">
</head>
<body>
  <img id="certificate-bg" src="data:image/png;base64, {{ $bg }}">
  <div class="container">
    <x-pdf.header :logo="$logo" />
    <section style="margin-top: 2rem;">
      <p class="bold">Otorga el presente:</p>
      <h2 class="normal sub">Certificado a:</h2>
      <h1 class="italic name">{{ $student->full_name }}</h1>
      <p class="italic bold" style="margin-bottom: 2rem;">Documento de Identidad: {{ $student->full_ci }}</p>
  
      <p>Por haber <span class="bold">APROBADO</span> el curso:</p>
      <h2 class="bold course">"{{ $course->name }}"</h2>
      <p>Desde el {{ spanishDate($course->start_course) }} al {{ spanishDate($course->end_course) }}.</p>
      <p>Duración: {{ $course->duration }} horas académicas.</p>
    </section>
    <table>
      <tr>
        <td>
          <div>
            ____________________
            <p class="bold-italic small">Ing. Mario Villegas</p>
            <p class="bold-italic small">Jefe del Departamento de la Carrera</p>
          </div>
        </td>
        @if($course->area->pnf->name === 'Extensión Universitaria')
          <td>
          </td>  
        @else
          <td>
            <div>
              ____________________
              <p class="bold-italic small">Dra. Luisa Díaz</p>
              <p class="bold-italic small">Rectora de la Universidad</p>
            </div>
          </td>
        @endif
        <td>
          <div>
            ____________________
            <p class="bold-italic small">Ing. {{ $course->instructor->full_name }}</p>
            <p class="bold-italic small">Instructor del curso</p>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <x-pdf.footer />
</body>
