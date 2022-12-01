function getPrices(currency) {
	const form = document.querySelector('[data-amount]');
	const amount = +form.dataset.amount;
	
	if (currency !== '$') {
		return amount * +document.querySelector('html').dataset.dolarPrice;
	}

	return amount;
}

export default getPrices;