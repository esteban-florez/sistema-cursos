import { getSerialized } from '../utils.js'

export default function getAmount({ type, mode }) {
	const course = getSerialized('course')

	const priceOnBs = course[mode === 'Reservación' ? 'reserv_price' : 'total_price']
	
	if (type === 'Efectivo ($)') {
		const currentPrice = +localStorage.getItem('usd-price') 
		return +(priceOnBs / currentPrice).toFixed(2)
	}

	return priceOnBs
}