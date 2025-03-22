$(document).ready(function(){
	//Скрол по клику
	$('.header__menu li a').click( function(){ // ловим клик по ссылке вложенную в селектор header__menu
		var scroll_el = $(this).attr('href'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
		if ($(scroll_el).length != 0) { // проверим существование элемента, чтобы избежать ошибки
			$('html, body').animate({ scrollTop: $(scroll_el).offset().top-130}, 500); // анимируем скроолинг к
			// элементу scroll_el
		}
		return false; // выключаем стандартное действие
	});
	
	//Slick Slider кастомная навигация и счетчик слайдов
	// О бытовках
	$('#slider__about-bit .slider__list').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		autoplay: true,
		autoplaySpeed: 7000,
		prevArrow: '<button type="button" class="navigation-prev button-arrow__blue fal fa-chevron-left"></button>',
		nextArrow: '<button type="button" class="navigation-next button-arrow__blue fal fa-chevron-right"></button>',
		appendDots:$('#slider-dots__about-bit'),
		customPaging: function (slider, i)
		{
			return '<button></button>';
		},
		responsive: [
			{
				breakpoint: 481,
				settings: {
					arrows: false,
					dots: true,
				}
			}
		]
	});
	$("#slider__about-bit .slider__list").on('init reInit beforeChange', function(event, slick, currentSlide, nextSlide) {
		var i = (nextSlide ? nextSlide : 0) + 1;
		$('#slider__about-bit .slider__count span').html(i);
	});
	
	// О нас
	$('#slider__about-as .slider__list').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		autoplay: true,
		autoplaySpeed: 7000,
		prevArrow: '<button type="button" class="navigation-prev button-arrow__blue fal fa-chevron-left"></button>',
		nextArrow: '<button type="button" class="navigation-next button-arrow__blue fal fa-chevron-right"></button>',
		appendDots:$('#slider-dots__about-as'),
		customPaging: function (slider, i)
		{
			return '<button></button>';
		},
		responsive: [
			{
				breakpoint: 481,
				settings: {
					arrows: false,
					dots: true,
				}
			}
		]
	});
	$("#slider__about-as .slider__list").on('init reInit beforeChange', function(event, slick, currentSlide, nextSlide) {
		var i = (nextSlide ? nextSlide : 0) + 1;
		$('#slider__about-as .slider__count span').html(i);
	});
	
	
	var slick_view = document.querySelectorAll('.card__img-slider');
	for (var i = 0; i < slick_view.length; i++) {
		$(slick_view[i]).slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: false,
			autoplay: true,
			autoplaySpeed: 5000,
		});
	}
	
});


$(document).ready(function() {
	let selectedType = null;
	let selectedFuel = null;
	
	// Функция для фильтрации товаров
	function filterItems() {
		let hasVisibleItems = false;
		
		$('.card__item').each(function() {
			const itemType = $(this).data('type');
			const itemFuel = $(this).data('fuel');
			
			// Проверка условий фильтрации
			const matchesType = selectedType === null || itemType === selectedType;
			const matchesFuel = selectedFuel === null || itemFuel === selectedFuel;
			
			if (matchesType && matchesFuel) {
				$(this).show();
				hasVisibleItems = true;  // Найден подходящий товар
			} else {
				$(this).hide();
			}
		});
		
		// Показать/скрыть сообщение, если нет подходящих товаров
		if (hasVisibleItems) {
			$('.card-no-results').hide();
		} else {
			$('.card-no-results').show();
		}
	}
	
	// Обработчик клика для фильтров типа
	$('.filter-type__item').click(function() {
		const targetType = $(this).data('target');
		selectedType = selectedType === targetType ? null : targetType;
		
		// Добавляем/удаляем класс .active
		$('.filter-type__item').removeClass('active');
		if (selectedType) {
			$(this).addClass('active');
		}
		
		filterItems();
	});
	
	// Обработчик клика для фильтров топлива
	$('.filter-fuel__item').click(function() {
		const targetFuel = $(this).data('target');
		selectedFuel = selectedFuel === targetFuel ? null : targetFuel;
		
		// Добавляем/удаляем класс .active
		$('.filter-fuel__item').removeClass('active');
		if (selectedFuel) {
			$(this).addClass('active');
		}
		
		filterItems();
	});
	
	// Обработчик клика для кнопки сброса
	$('.filter-cancel').click(function() {
		selectedType = null;
		selectedFuel = null;
		
		// Сбрасываем классы .active
		$('.filter-type__item, .filter-fuel__item').removeClass('active');
		
		filterItems();
	});
	
	// Показать все товары по умолчанию
	filterItems();
});