import { getSerialized } from './utils.js'

const label = document.querySelector('#amountLabel')
const amount = document.querySelector('[name="amount"]');
const course = getSerialized('course')

const usdToBs = Number(localStorage.getItem('usd-price'))
const priceOnBs = (course.total_price - course.reserv_price).toFixed(2)
const priceOnUsd = (Number(priceOnBs) / usdToBs).toFixed(2)

$('[name="type"]').on('change', (e) => {
  const value = e.target.selectedOptions[0].value

  if (value === 'Efectivo ($)') {
    amount.value = priceOnUsd
  } else {
    amount.value = priceOnBs
  }
})

function format(str, curr) {
  return `${str.replace('.', ',')} ${curr}`
}

label.innerHTML = `${format(priceOnUsd, '$')}  -----  ${format(priceOnBs, 'Bs.D.')}`