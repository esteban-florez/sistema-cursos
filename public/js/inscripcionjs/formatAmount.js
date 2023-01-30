export default function formatAmount(amount, type) {
  const currency = type === 'Efectivo ($)' ? '$' : 'Bs.D.';
  return `${amount.toFixed(2).replace('.', ',')} ${currency}`
}