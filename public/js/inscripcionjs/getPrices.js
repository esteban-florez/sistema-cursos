function getPrices(currency) {
	const form = document.querySelector('[data-amount]')
	const amount = +form.dataset.amount
	
	if (currency !== '$') {
		const currentPrice = +localStorage.getItem('usd-price') 
		return (amount * currentPrice).toFixed(2)
	}

	return amount
}

export default getPrices