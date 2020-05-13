setInterval(() => {
	let tr_list = document.querySelectorAll('#tbody tr');
	qty_array = [];
	for (tr of tr_list) {
		let tds = tr.querySelectorAll('td');
		qty_td = tds[2];
		qty_input = qty_td.querySelector('#qty');
		qty_array.push(qty_input.value);
	}
	let total = document.querySelector('#grandTotal').textContent;
	localStorage.setItem('grandtotal', JSON.stringify(total));
	localStorage.setItem('quantityArray', JSON.stringify(qty_array));
}, 1000);
