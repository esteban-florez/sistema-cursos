import { URL, getPieDatasets } from './shared.js'

async function paymentsPerStatus() {
  const response = await fetch(`${URL}/payments-per-status`)
  const data = await response.json()

  const datasets = getPieDatasets(data)

  new Chart(document.querySelector('#paymentsPerStatus'), {
    type: 'pie',
    data: {
      labels: Object.keys(data),
      datasets,
    },
  })
}

paymentsPerStatus()
