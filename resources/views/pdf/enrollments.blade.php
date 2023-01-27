<head>
  <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
  <style>
    body {
      padding: 2rem;
    }

    h1 {
      margin-top: 2rem;
    }

    ul {
      display: flex;
      justify-content: space-between;
      padding: 0 12rem;
    }

    table {
      margin: 2rem auto 0;
      text-align: center;
      width: 80%;
      border-collapse: collapse;
    }
  
    td, th {
      border: 1px solid black;
    }

    span {
      font-weight: bold;
    }

    img {
      position: absolute;
      top: 2rem;
      left: 3rem;
      width: 6rem;
    }
  </style>
</head>
<body>
  <img src="data:image/png;base64, {{ $logo }}"/>
  <header>
    <p>REPUBLICA BOLIVARIANA DE VENEZUELA</p>
    <p>MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA</p>
    <p class="bold-italic">UNIVERSIDAD POLITÉCNICA TERRITORIAL DEL ESTADO ARAGUA</p>
    <p class="bold-italic">"FEDERICO BRITO FIGUEROA"</p>
    <p class="bold-italic header-title">DEPARTAMENTO DE VINCULACIÓN SOCIO INTEGRAL</p>
  </header>
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
        <th>¿Aprobado?</th>
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
          <td>{{ $enrollment->approved }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>