import { URL, getBarsDatasets } from './shared.js'

async function coursesPerPhase() {
  const response = await fetch(`${URL}/courses-per-phase`)
  const data = await response.json()
  const datasets = getBarsDatasets(data)

  new Chart(document.querySelector('#coursesPerPhase'), {
    type: 'bar',
    data: {
      labels: Object.keys(data),
      datasets,
    },
  })
}

coursesPerPhase()