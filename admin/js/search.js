catSearchInput = document.querySelector('#searchByCategory');
nameSearchInput = document.querySelector('#searchByName');

catSearchInput.addEventListener('keyup', (e) => {
	let inputContent = catSearchInput.value.toLowerCase();
	let tbody = document.querySelector('#tbody');
	let all_trs = tbody.querySelectorAll('tr');
	for (tr of all_trs) {
		let all_tds = tr.querySelectorAll('td');
		let category = all_tds[3].innerText.toLowerCase();
		if (category.indexOf(inputContent) > -1) {
			tr.style.display = '';
		} else {
			tr.style.display = 'none';
		}
	}
});

nameSearchInput.addEventListener('keyup', (e) => {
	let inputContent = nameSearchInput.value.toLowerCase();
	let tbody = document.querySelector('#tbody');
	let all_trs = tbody.querySelectorAll('tr');
	for (tr of all_trs) {
		let all_tds = tr.querySelectorAll('td');
		let name = all_tds[2].innerText.toLowerCase();
		if (name.indexOf(inputContent) > -1) {
			tr.style.display = '';
		} else {
			tr.style.display = 'none';
		}
	}
});
