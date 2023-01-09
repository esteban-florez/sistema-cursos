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
      width: 100%;
      border-collapse: collapse;
    }
  
    td, th {
      border: 1px solid black;
    }

    td {
      padding-left: 3px;
      padding-right: 3px;
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
        <th>Ref.</th>
        <th>Tipo</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($payments as $payment)
        <tr>
          <td> {{ $payment->inscription->student->full_ci }} </td>
          <td> {{ $payment->inscription->course->name }} </td>
          <td> {{ $payment->amount }} </td>
          <td> {{ $payment->updated_at->format(DF) }} </td>
          <td> {{ $payment->ref }} </td>
          <td> {{ $payment->type }} </td>
          <td> {{ $payment->status }} </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>