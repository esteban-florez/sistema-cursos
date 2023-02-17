import { getSerialized } from './utils.js'

const label = document.querySelector('#amountLabel')
const amount = document.querySelector('[name="amount"]');
const course = getSerialized('course')
const priceOnUsd = course.total_price - course.reserv_price
const usdToBs = Number(localStorage.getItem('usd-price'))
const priceOnBs = (priceOnUsd * usdToBs).toFixed(2)

$('[name="type"]').on('change', (e) => {
  const value = e.target.selectedOptions[0].value

  if (value === 'Efectivo ($)') {
    amount.value = priceOnUsd
  } else {
    amount.value = priceOnBs
  }
})

label.innerHTML = `$ ${priceOnUsd},00 - ${priceOnBs.replace('.', ',')} Bs.D.`