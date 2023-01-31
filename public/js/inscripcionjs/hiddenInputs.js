function fillCategory(mode) {
  const hidden = document.querySelector('[name="category"]')
  hidden.value = mode === 'Un solo pago' ? 'Pago completo' : 'Reservación'
}

function fillAmount(amount) {
  const hidden = document.querySelector('[name="amount"]')
  hidden.value = amount
}

export { fillCategory, fillAmount }