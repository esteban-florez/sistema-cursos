<head>
  <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/pdf2.css') }}">
  <link rel="stylesheet" href="{{ public_path('css/pdf-header-footer.css') }}">
  <style>
    table {
      width: 80% !important;
    }

    td {
      padding-left: 3px;
      padding-right: 3px;
    }
  </style>
</head>
<body>
  <x-pdf.header :logo="$logo" />
  <h1>Estado de Inventario</h1>
  <ul class="style-none">
    <li><span>Fecha:</span> {{ $date }}</li>
  </ul>
  <table>
    <thead>
      <tr>
        <th>Bien Nacional</th>
        <th>Artículo</th>
        <th>Stock</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item)
        <tr>
          <td> BN {{ $item->code }} </td>
          <td> {{ $item->name }} </td>
          <td> {{ $item->stock }} </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <x-pdf.footer />
</body>