<head>
  <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/planilla-pdf.css') }}">
</head>
<body>
  <x-pdf.header :logo="$logo" titleBox/>
  <main>
    <h1>
      Curso de Ampliación Profesional en: 
      <span>{{ $course->name }}</span>
    </h1>
    <section class="data">
      <ul>
        <li>Nombres: <span>{{ $student->names }}</span></li>
        <li>Apellidos: <span>{{ $student->lastnames }}</span></li>
        <li>Cédula: <span>{{ $student->full_ci }}</span></li>
        <li>Edad: <span>{{ $student->age }}</span></li>
        <li>Sexo: <span>{{ $student->gender }}</span></li>
        <li>Grado de Instrucción: <span>{{ $student->grade }}</span></li>
        <li>Dirección: <span>{{ $student->address }}</span></li>
        <li>Teléfono: <span>{{ $student->phone }}</span></li>
        <li>Correo Electrónico: <span>{{ $student->email }}</span></li>
      </ul>
    </section>
    <section class="small">
      <p>Documentos a Consignar</p>
      <p>(Original y Copia)</p>
    </section>
    <div class="checks">
      <ul>
        <li>Copia de Cédula de Identidad</li>
        <li>Partida de Nacimiento</li>
      </ul>
    </div>
  </main>
  <table>
    <tbody>
      <tr>
        <td>
          <span class="date-title">FECHA</span>
          <span class="date">{{ $date }}</span>
        </td>
        <td>
          <span class="seal-title">SELLO</span>
        </td>
        <td>
          <span>FIRMA DEL COORDINADOR</span>
        </td>
        <td>
          <span>FIRMA DEL PARTICIPANTE</span>
        </td>
      </tr>
    </tbody>
  </table>
  <section>
    <p class="note">Nota: Esta planilla debe ser llevada antes del {{ $expires }} al Departamento de Vinculación Social en la UPTA La Victoria, para confirmar la inscripción. </p>
  </section>
  <x-pdf.footer />
</body>