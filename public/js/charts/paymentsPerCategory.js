import { URL, getPieDatasets } from './shared.js'

async function paymentsPerCategory() {
  const response = await fetch(`${URL}/payments-per-category`)
  const data = await response.json()

  const datasets = getPieDatasets(data)

  new Chart(document.querySelector('#paymentsPerCategory'), {
    type: 'pie',
    data: {
      labels: Object.keys(data),
      datasets,
    },
  })
}

paymentsPerCategory()
