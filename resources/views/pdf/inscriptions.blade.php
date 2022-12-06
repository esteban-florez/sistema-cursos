<head>
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
      ul[role="list"],
      ol[role="list"] {
        list-style: none;
      }
  
      /* Set core root defaults */
      html:focus-within {
        scroll-behavior: smooth;
      }
  
      /* Set core body defaults */
      body {
        min-height: 100vh;
        text-rendering: optimizeSpeed;
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
        display: block;
      }
  
      /* Inherit fonts for inputs and buttons */
      input,
      button,
      textarea,
      select {
        font: inherit;
      }
  
      /* Remove all animations and transitions for people that prefer not to see them */
      @media (prefers-reduced-motion: reduce) {
        html:focus-within {
        scroll-behavior: auto;
        }
        *,
        *::before,
        *::after {
          animation-duration: 0.01ms !important;
          animation-iteration-count: 1 !important;
          transition-duration: 0.01ms !important;
          scroll-behavior: auto !important;
        }
      }
  </style>
  <style>
    body {
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 2rem;
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

    .header-title {
      font-size: 13pt;
      margin-top: 4px;
    }

    h1 {
      margin-top: 2rem;
    }

    ul {
      display: flex;
      justify-content: space-between;
      padding: 0 12rem;
      /* text-align: left; */
      /* margin-left: 8rem; */
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
  </style>
</head>
<body>
  <header>
    <p>REPUBLICA BOLIVARIANA DE VENEZUELA</p>
    <p>MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA</p>
    <p class="bold-italic">UNIVERSIDAD POLITÉCNICA TERRITORIAL DEL ESTADO ARAGUA</p>
    <p class="bold-italic">"FEDERICO BRITO FIGUEROA"</p>
    <p class="bold-italic header-title">DEPARTAMENTO DE VINCULACIÓN SOCIO INTEGRAL</p>
  </header>
  <h1>Matrícula del Curso: {{ $course->name }}</h1>
  <ul role="list">
    <li><span>Instructor:</span> {{ $course->instructor->full_name }}</li>
    <li><span>Fecha:</span> {{ $date }}</li>
    <li><span>Fase del curso:</span> {{ $course->status }}</li>
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
      @foreach ($inscriptions as $inscription)
      @php
        $student = $inscription->student;
      @endphp
        <tr>
          <td>{{ $student->full_name }}</td>
          <td>{{ $student->full_ci }}</td>
          <td>{{ $student->is_upta }}</td>
          <td>{{ $inscription->payment->status }}</td>
          <td>{{ $inscription->status }}</td>
          <td>{{ $inscription->approved }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>