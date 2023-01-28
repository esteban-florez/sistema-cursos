function fillCategory(mode) {
  const hidden = document.querySelector('[name="category"]')
  hidden.value = mode === 'Pago completo' ? 'Completo' : 'Reservación'
}

function fillAmount(amount) {
  const hidden = document.querySelector('[name="amount"]')
  hidden.value = amount
}

export { fillCategory, fillAmount }