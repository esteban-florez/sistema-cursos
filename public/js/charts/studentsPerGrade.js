import { URL, getBarsDatasets } from './shared.js'

async function studentsPerGrade() {
  const response = await fetch(`${URL}/students-per-grade`)
  const data = await response.json()
  const datasets = getBarsDatasets(data)

  new Chart(document.querySelector('#studentsPerGrade'), {
    type: 'bar',
    data: {
      labels: Object.keys(data),
      datasets,
    },
  })
}

studentsPerGrade()