const search = () => {
	const searchInput = document.querySelector('#search');
	const productsRow = document.querySelector('#productsRow');

	const searchValue = searchInput.value.toLowerCase();

	const allCards = productsRow.querySelectorAll('.card');
	for (card of allCards) {
		let cardBody = card.querySelector('.card-body');
		let allParas = cardBody.querySelectorAll('p');
		let prodName = allParas[0].textContent.toLowerCase();
		if (prodName.indexOf(searchValue) > -1) {
			allParas[0].parentElement.parentElement.parentElement.style.display = '';
		} else {
			allParas[0].parentElement.parentElement.parentElement.style.display = 'none';
		}
	}
};
