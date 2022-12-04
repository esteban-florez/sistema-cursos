function getPrices(currency) {
	const form = document.querySelector('[data-amount]');
	const amount = +form.dataset.amount;
	
	if (currency !== '$') {
		return amount * +localStorage.getItem('usd-price')
	}

	return amount;
}

export default getPrices;