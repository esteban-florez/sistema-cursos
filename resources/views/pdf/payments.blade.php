<head>
  <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/pdf2.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/pdf-header-footer.css') }}">
  <style>
    table {
      width: 100% !important;
    }

    td {
      padding-left: 3px;
      padding-right: 3px;
    }
  </style>
</head>
<body>
  <x-pdf.header :logo="$logo" />
  <h1>Reporte de Pagos</h1>
  <ul class="style-none">
    <li><span>Fecha:</span> {{ $date }}</li>
  </ul>
  <table>
    <thead>
      <tr>
        <th>Estudiante</th>
        <th>Curso</th>
        <th>Monto</th>
        <th>Fecha</th>
        <th>Categoría</th>
        <th>Ref.</th>
        <th>Tipo</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($payments as $payment)
        <tr>
          <td> {{ $payment->enrollment->student->full_ci }} </td>
          <td> {{ $payment->enrollment->course->name }} </td>
          <td> {{ $payment->full_amount }} </td>
          <td> {{ $payment->updated_at->format(DF) }} </td>
          <td> {{ $payment->category }} </td>
          <td> {{ $payment->ref ?? '----' }} </td>
          <td> {{ $payment->type }} </td>
          <td> {{ $payment->status }} </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <x-pdf.footer />
</body>