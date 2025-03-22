// Полифилл для метода forEach для NodeList
if (window.NodeList && !NodeList.prototype.forEach) {
	NodeList.prototype.forEach = function (callback, thisArg) {
		thisArg = thisArg || window;
		for (var i = 0; i < this.length; i++) {
			callback.call(thisArg, this[i], i, this);
		}
	};
}

document.querySelectorAll('.sort').forEach(function (sortWrapper) {
	const dropDownBtn = sortWrapper.querySelector('.sort__button');
	const dropDownList = sortWrapper.querySelector('.sort__list');
	const dropDownItem = dropDownList.querySelectorAll('.sort__item')
	const dropDownInput = sortWrapper.querySelector('.sort__button-input_hidden');
	
	// Клик по кнопке. Открыть/Закрыть select
	dropDownBtn.addEventListener('click', function () {
		dropDownList.classList.toggle('sort__list_visible');
		//this.classList.toggle('sort__button_active');
	});
	
	// Выбор элемента списка. Запомнить выбранное значение. Закрыть дропдаун
	dropDownItem.forEach(function (listItem) {
		listItem.addEventListener('click', function (e) {
			e.stopPropagation();
			dropDownBtn.innerText = this.innerText;
			dropDownBtn.focus();
			dropDownInput.value = this.dataset.value;
			dropDownList.classList.remove('sort__list_visible');
            $.cookie('sort', this.dataset.value, { expires: 7, path: '/' });
            document.location.reload();
			//document.querySelector('.sort__button').classList.remove('sort__button_active');
		});
	});
	
	// Клик снаружи дропдауна. Закрыть дропдаун
	document.addEventListener('click', function (e) {
		if (e.target !== dropDownBtn)
			dropDownList.classList.remove('sort__list_visible');
		//dropDownBtn.classList.remove('sort__button_active');
		
	});
	
	// Нажатие на Tab или Escape. Закрыть дропдаун
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Tab' || e.key === 'Escape') {
			//dropDownBtn.classList.remove('sort__button_active');
			dropDownList.classList.remove('sort__list_visible');
		}
	});
});