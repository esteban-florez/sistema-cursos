export default function formatAmount(amount, type) {
  if (type === 'Efectivo ($)') {
    return `$ ${amount},00`
  }

  return `${amount.toFixed(2).replace('.', ',')} Bs.D.`
}