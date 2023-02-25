<head>
  <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/pdf2.css') }}">
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
  <h1>Miembros del Club: {{ $club->name }}</h1>
  <ul class="style-none">
    <li><span>Instructor:</span> {{ $club->instructor->full_name }}</li>
    <li><span>Fecha:</span> {{ $date }}</li>
  </ul>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Cédula</th>
        <th>¿UPTA?</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($memberships as $membership)
      @php
        $member = $membership->member;
      @endphp
        <tr>
          <td>{{ $member->full_name }}</td>
          <td>{{ $member->full_ci }}</td>
          <td>{{ $member->upta }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>