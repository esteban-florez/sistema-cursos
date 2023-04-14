import { URL, getBarsDatasets } from './shared.js'

async function paymentsPerType() {
  const response = await fetch(`${URL}/payments-per-type`)
  const data = await response.json()
  const datasets = getBarsDatasets(data)

  new Chart(document.querySelector('#paymentsPerType'), {
    type: 'bar',
    data: {
      labels: Object.keys(data),
      datasets,
    },
  })
}

paymentsPerType()