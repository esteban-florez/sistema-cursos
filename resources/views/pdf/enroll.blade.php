<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $student->full_name }} - Planilla de Inscripción</title>
  <style>
    /* Box sizing rules */
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    /* Remove default margin */
    body,
    h1,
    h2,
    h3,
    h4,
    p,
    figure,
    blockquote,
    dl,
    dd {
      margin: 0;
    }

    /* Remove list styles on ul, ol elements with a list role, which suggests default styling will be removed */
    ul,
    ol {
      list-style: none;
    }

    /* Set core root defaults */
    html:focus-within {
      scroll-behavior: smooth;
    }

    /* Set core body defaults */
    body {
      min-height: 100vh;
      text-rendering: optimizeLegibility;
      line-height: 1.5;
    }

    /* A elements that don't have a class get default styles */
    a:not([class]) {
      text-decoration-skip-ink: auto;
    }

    /* Make images easier to work with */
    img,
    picture {
      max-width: 100%;
    }

    /* Inherit fonts for inputs and buttons */
    input,
    button,
    textarea,
    select {
      font: inherit;
    }
  </style>
  <style>
    body {
      text-align: center;
      padding: 2rem 0;
      width: 700px;
      margin: 0 auto;
    }

    header {
      font-size: 11pt;
      line-height: 13pt;
      width: 700px;
      margin: 0 auto;
      position: relative;
    }

    .bold-italic {
      font-style: italic;
      font-weight: bold;
    }

    .title-box {
      margin: 0 auto;
      width: 33rem;
      border: 1px solid royalblue;
      height: 2rem;
      background-color: #9DA7EE;
      padding-top: 4px;
      border-radius: 4px;
      font-size: 13pt;
    }

    .header-title {
      font-size: 13pt;
      margin-top: 4px;
    }

    h1 {
      font-weight: normal;
      font-size: 15pt;
      margin-top: 3rem;
    }

    section {
      margin-top: 3rem;
      margin-bottom: 3rem;
    }
    
    .data,
    .checks {
      text-align: left;
    }

    .checks li {
      list-style-type: disc; 
    }

    span {
      font-weight: bold;
    }

    .small {
      font-size: 11pt;
      font-weight: bold;
    }
    
    td {
      border: 1px solid black;
      min-width: 120px;
      height: 100px;
      vertical-align: top;
      position: relative;
    }

    table {
      border-collapse: collapse;
      margin: 0 auto;
    }

    .date {
      position: absolute;
      top: 45px;
      left: 25px;
    }

    .seal-title,
    .date-title {
      position: absolute;
      left: 35px;
    }
  </style>
</head>
<body>
  <header>
    <p>REPUBLICA BOLIVARIANA DE VENEZUELA</p>
    <p>MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA</p>
    <p class="bold-italic">UNIVERSIDAD POLITÉCNICA TERRITORIAL DEL ESTADO ARAGUA</p>
    <p class="bold-italic">"FEDERICO BRITO FIGUEROA"</p>
    <div class="title-box">
      <h3>PLANILLA DE INSCRIPCIÓN</h3>
    </div>
    <p class="bold-italic header-title">DEPARTAMENTO DE VINCULACIÓN SOCIO INTEGRAL</p>
  </header>
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
    <section class="checks">
      <ul>
        <li>Copia de Cédula de Identidad</li>
        <li>Partida de Nacimiento</li>
      </ul>
    </section>
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
</body>
</html>