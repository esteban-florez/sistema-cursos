const inscritosChart = new Chart(
  document.querySelector('#inscritosChart'),
  {
    type: 'bar',
    data: {
      labels: [
        'Inscritos',
        'No inscritos',
        'Total'
      ],
      datasets: [
        {
          label: 'Estudiantes', 
          data: [300, 200, 500],
          backgroundColor: [
            '#16a085',
            '#3498db',
            '#8e44ad'
          ],
        }
      ]
    },
    options: {}
  }
);

const porCursoChart = new Chart(
  document.querySelector('#porCursoChart'),
  {
    type: 'pie',
    data: {
      labels: [
        'Programación Web',
        'Diseño Gráfico',
        'Excel Básico',
        'Marketing y Emprendimiento',
        'Inglés'
      ],
      datasets: [{
        data: [40, 20, 10, 15, 15],
        backgroundColor: [
          '#2980B9',
          '#F4D03F',
          '#28B463',
          '#E74C3C',
          '#A569BD'
        ],
      }]
    },
    options: {}
  }
);

const ingresosCursoChart = new Chart(
  document.querySelector('#ingresosCursoChart'),
  {
    type: 'bar',
    data: {
      labels: [
        'Programación Web',
        'Diseño Gráfico',
        'Excel Básico',
        'Marketing y Emprendimiento',
        'Inglés',
      ],
      datasets: [{
        label: 'Ingresos ($)',
        data: [5, 3, 0.6, 2, 1.4],
        backgroundColor: [
          '#2980B9',
          '#F4D03F',
          '#28B463',
          '#E74C3C',
          '#A569BD'
        ],
      }]
    },
    options: {}
  }
);

const aprobadosChart = new Chart(
  document.querySelector('#aprobadosChart'),
  {
    type: 'doughnut',
    data: {
      labels: [
        'Aprobados',
        'No aprobados',
        'Retirados'
      ],
      datasets: [{
        label: 'Ingresos ($)',
        data: [450, 30, 20],
        backgroundColor: [
          '#27ae60',
          '#c0392b',
          '#7f8c8d'
        ],
      }]
    },
    options: {}
  }
);