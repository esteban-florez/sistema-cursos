<head>
  <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/pdf2.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/pdf-header-footer.css') }}">
</head>
<body>
  <x-pdf.header :logo="$logo" />
  <h1>Matrícula del Curso: {{ $course->name }}</h1>
  <ul class="style-none">
    <li><span>Instructor:</span> {{ $course->instructor->full_name }}</li>
    <li><span>Fecha:</span> {{ $date }}</li>
    <li><span>Fase del curso:</span> {{ $course->phase }}</li>
  </ul>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Cédula</th>
        <th>¿UPTA?</th>
        <th>Solvencia</th>
        <th>Cupo</th>
        <th>Aprobación</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($enrollments as $enrollment)
      @php
        $student = $enrollment->student;
      @endphp
        <tr>
          <td>{{ $student->full_name }}</td>
          <td>{{ $student->full_ci }}</td>
          <td>{{ $student->upta }}</td>
          <td>{{ $enrollment->solvency }}</td>
          <td>{{ $enrollment->status }}</td>
          <td>{{ $enrollment->approval }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <x-pdf.footer />
</body>