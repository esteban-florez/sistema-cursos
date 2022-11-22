function getPrices(currency) {
	const form = document.querySelector('[data-amount]');
	const amount = +form.dataset.amount;
	
	if (currency !== '$') {
		// TODO -> aqui habría que meter de alguna manera el precio del dolar de hoy
		return amount * 10;
	}

	return amount;
}

export default getPrices;