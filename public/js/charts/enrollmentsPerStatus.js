import { URL, getPieDatasets } from './shared.js'

async function enrollmentsPerStatus() {
  const response = await fetch(`${URL}/enrollments-per-status`)
  const data = await response.json()

  const datasets = getPieDatasets(data)

  new Chart(document.querySelector('#enrollmentsPerStatus'), {
    type: 'pie',
    data: {
      labels: Object.keys(data),
      datasets,
    },
  })
}

enrollmentsPerStatus()
