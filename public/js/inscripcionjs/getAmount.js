import { getSerialized } from '../utils.js'

export default function getAmount({ type, mode }) {
	const course = getSerialized('course')

	const priceOnUSD = course[mode === 'Reservación' ? 'reserv_price' : 'total_price']
	
	if (type !== 'Efectivo ($)') {
		const currentPrice = +localStorage.getItem('usd-price') 
		return +(priceOnUSD * currentPrice).toFixed(2)
	}

	return priceOnUSD
}