<head>
  <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/pdf2.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/pdf-header-footer.css') }}">
</head>
<body>
  <x-pdf.header :logo="$logo" />
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
        $student = $membership->student;
      @endphp
        <tr>
          <td>{{ $student->full_name }}</td>
          <td>{{ $student->full_ci }}</td>
          <td>{{ $student->upta }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <x-pdf.footer />
</body>