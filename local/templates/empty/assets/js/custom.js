Modernizr.load([{
	test: Modernizr.input.placeholder,
	nope: 'js/jquery.placeholder.js',
	complete: function () {
		$(function () {
			if (!Modernizr.input.placeholder) {
				$('[placeholder]').placeholder();
			}
		});
	}
}]);


$(function () {
	// выделение пунктов меню при скролле страницы
	//scrollSpy(75);

	//Стилизация селектов
	$.ikSelect.extendDefaults({autoWidth: false, ddFullWidth: false, dynamicWidth: false, extractLink: false,
		onInit: function (inst) {
			if (inst.$el.hasClass('novalidate')) {
				inst.$link.addClass('novalidate');
			}
		}
	});
	$('select.select-style1').ikSelect({
		customClass: 'select-style1', onHide: function () {
			$('select.select-style1').ikSelect('redraw');
		}
	});

	jsTel('.js-tel');

	//Обрезка текста
	$('.txt-fix').dotdotdot({
		watch: "window"
	});

	//Масштабирование изображений
	$("img.scale").imageScale({rescaleOnResize: true});

	function dotScaleOwl(element) {
		$(element).find('.txt-fix').dotdotdot();
		$(element).find('img.scale').imageScale('scale');
	}

	// фиксируем хедер при скролле
	if ($(window).width() >= 450) {
		$('.header').stickMe({triggerAtCenter: false, topOffset: 227});
	} else {
		$('.header').stickMe({triggerAtCenter: false});
	}

	// to top
	toTop('.to-top', 600);

	//Scroll
	var apis = [];

	function scrollPane() {
		if (apis.length) {
			$.each(apis, function (i) {
				this.destroy();
			});
			apis = [];
		}
		if (Modernizr.mq('(min-width: 768px)')) {
			$('.scroll-pane').each(function () {
				apis.push($(this).jScrollPane({
					verticalDragMinHeight: 20,
					//verticalDragMaxHeight: 20,
					horizontalDragMinWidth: 20,
					//horizontalDragMaxWidth: 20,
					verticalGutter: 40, horizontalGutter: 0
				}).data('jsp'));
			});
		}
	}

	$(window).load(function() {
		footerResize();
	});
	$(window).resize(function () {
		$('select.select-style1').ikSelect('redraw');
		//Footer on resize
		footerResize();

		scrollPane();
	});
	$(window).resize();

	function footerResize() {
		$('.wrap-site').css('padding-bottom', $('.footer').outerHeight());
	}

	//Nav
	$('.toggle-nav').on('click', function () {
		$(this).toggleClass('opened');
		$('.main-nav').toggleClass('opened');
		return false;
	});

	//Carousel1
	$('.carousel1').owlCarousel({
		items: 1,
		lazyLoad: true,
		loop: false,
		dots: false,
		nav: true,
		navText: [],
		rewind: true,
		autoplay:true,
		autoplayHoverPause:true,
		URLhashListener: true,
		responsive: {},
		onInitialized: function (event) {
			setTimeout(function () {
				dotScaleOwl(event.target);
				countDown(event.target);
			}, 100);
		},
		onResized: function (event) {
			dotScaleOwl(event.target);
		},
		onChanged: function (event) {
			var oldSlide = $(event.target).find('.active');
			if (oldSlide.find('.tubular-player').length > 0) {
				$(event.target).find('.tubular-container').addClass('hide');
			} else {
				$(event.target).find('.tubular-container').removeClass('hide');
			}
		}
	});


	function videoSlide(property) {
		var current = property.item.index,
			slide = $(property.target).find(".owl-item").eq(current),
			video = slide.find('video');
		if (video.length) {
			// video.get(0).load();
			video.get(0).play();
		}
	};
	function countDown(element) {
		var $countdown = $(element).find('.countdown');
		$.each($countdown, function() {
			var countDownOptions = $.extend({}, window.countDownInit, window.countDown[$(this).data('countdown-id')]);
			$(this).final_countdown(countDownOptions);
		});
	}

	$('.info-item .icon-i-i').on('click', function () {
		$('.info-item .icon-i-i').removeClass('active');
		$(this).addClass('active');
		$('.txt-i-i-box .txt-i-i').removeClass('active').eq($('.info-item .icon-i-i').index(this)).addClass('active');
		return false;
	});

	//Carousel2
	$('.carousel2').owlCarousel({
		items: 1,
		lazyLoad: true,
		loop: false,
		dots: false,
		nav: true,
		navText: [],
		rewind: true,
		autoplay: false,
		autoHeight: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			},
			1024: {
				items: 4
			},
			1230: {
				items: 5
			}
		}
	});

	//Tabs
	tabsInit();
	function tabsInit() {
		$('.tabs').each(function () {
			$(this).find('.ctrl-tabs').eq(0).addClass('active');
			$(this).find('.item-tabs').hide().eq(0).show();
		});
	}

	$('body').on('click', '.tabs .ctrl-tabs', function () {
		var i = $(this).closest('.tabs').find('.ctrl-tabs').index(this);
		$(this).addClass('active').siblings('.ctrl-tabs').removeClass('active');
		$(this).closest('.tabs').find('.item-tabs').hide().eq(i).fadeIn(150).find('.write-item2.showed').removeClass('showed').addClass('hidden-xs').end().find('.show-events').show();
		scrollPane();
		return false;
	});

	$('body').on('click', '.show-events', function () {
		$(this).fadeOut(150).closest('.item-tabs').find('.write-item2.hidden-xs').removeClass('hidden-xs').addClass('showed').hide().slideDown(150);
		return false;
	});

	$('body').on('click', '.show-partners', function () {
		$(this).fadeOut(150);
		$('.partner-item.hidden-xs').removeClass('hidden-xs').hide().slideDown(150);
		return false;
	});

	//Carousel3
	$('.carousel3').owlCarousel({
		items: 1,
		lazyLoad: true,
		loop: false,
		dots: false,
		nav: true,
		navText: [],
		rewind: true,
		autoplay: false,
		autoHeight: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			}
		}
	});

	//Carousel4
	$('.carousel4').owlCarousel({
		items: 1,
		lazyLoad: true,
		loop: false,
		dots: false,
		nav: true,
		navText: [],
		rewind: true,
		autoplay: false,
		autoHeight: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			},
			1024: {
				items: 3
			}
		},
		onInitialized: function (event) {
			dotScaleOwl(event.target);
		},
		onResized: function (event) {
			dotScaleOwl(event.target);
		} //,
		//onLoadedLazy: function(event){dotScaleOwl(event.target)}
	});

	//Carousel5
	$('.carousel5').owlCarousel({
		items: 1,
		loop: false,
		dots: false,
		margin: 20,
		nav: true,
		navText: [],
		rewind: true,
		autoplay: false,
		autoHeight: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 3
			},
			1024: {
				items: 4
			}
		}
	});
	//Carousel6
	$('.carousel6').owlCarousel({
		items: 1,
		loop: false,
		dots: false,
		nav: true, 
		navText: [],
		rewind: true,
		autoplay: false,
		responsive: {
			0: {
				items: 1
			},
			640: {
				items: 2
			},
			768: {
				items: 3
			},
			1024: {
				items: 4
			},
			1230: {
				items: 5
			}
		}
	});
	//Carousel7
	$('.carousel7').owlCarousel({
		items: 1,
		loop: false,
		dots: false,
		nav: true,
		navText: [],
		rewind: true,
		autoplay: false,
		responsive: {
			0: {
				items: 2
			},
			640: {
				items: 2
			},
			768: {
				items: 2
			},
			1024: {
				items: 2
			},
			1230: {
				items: 2
			}
		}
	});

	$('body').on('click', '.question-item .title-q-i', function () {
		$(this).toggleClass('opened').next('.answer-item').slideToggle(150);
		return false;
	});

	//Модальные окна
	$.arcticmodal('setDefault', {
		overlay: {
			css: {
				backgroundColor: '#000',
				opacity: 0.8
			}
		},
		afterLoadingOnShow: function (data, el) {
			if (!Modernizr.input.placeholder) {
				$('.modal-box [placeholder]').placeholder();
			}
			$('.modal-box select.select-style1').ikSelect({customClass: 'select-style1'});
			jsTel('.js-tel');
		}
	});

	$('body').on('click', '.show-modal', function () {
		var url = $(this).attr('href');
		$.arcticmodal({
			type: 'ajax',
			url: url
		});
		return false;
	});

	$('.show-modal-program').on('click', function () {
		var url = $(this).attr('href');
		$.arcticmodal({
			type: 'ajax',
			url: url,
			afterLoadingOnShow: function() {
				tabsInit();
				scrollPane();
				galleryInit();
			}
		});
		return false;
	});

	// ------------------------------style switcher

	// open style switcher
	$(document).on('click', '.style-switcher__icon', function () {
		$(this).closest('.style-switcher').toggleClass('active');

		if ($("#colorpicker").hasClass('active')) {
			$('.sp-replacer').addClass('active');
		}
	});
	// do on click switcher-job
	$(document).on('click', '.style-switcher__block a, .style-switcher__reset-btn', function () {
		setThemeColor($(this).data('theme-color'));
		return false;
	});
	// close on focus lost
	$(document).click(function (e) {
		var $trg = $(e.target);
		if (!$trg.closest('.style-switcher').length) {
			$('.style-switcher').removeClass('active');
		}
	});
	// init colorpicker
	if ($("#colorpicker").length) {
		$("#colorpicker").spectrum({
			color: "#f00",
			change: function(color) {
				setThemeColor(color.toHexString().replace('#', ''));
			}
		});
	}

	function setThemeColor(color) {
		$.get('/ajax/settings.php?theme-color=' + color, function() {
			location.reload();
		});
	}


	// fix form ajax reload
	BX.addCustomEvent('onAjaxSuccess', function(){
		$('select.select-style1').ikSelect({
			customClass: 'select-style1', onHide: function () {
				$('select.select-style1').ikSelect('redraw');
			}
		});
		jsTel('.js-tel');
	});

	if ($(window).width() >= 1230) {
		linkScroller(80);
	} else {
		linkScroller(69);
	}
	// активные пункты меню при скролле
	onScroll();
	$(document).on("scroll", onScroll);
});

var isScroller = false;
function linkScroller(offset) {
	var headerHeight = offset;
	$('a[href*="#"]:not([href="#"])').click(function (e) {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target[0] ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target[0]) {

				isScroller = true;
				$('.main-nav a').removeClass('active');
				$(this).addClass('active');

				$('html, body').stop().animate({
					scrollTop: target.offset().top - headerHeight
				}, 1000, function() {
					isScroller = false;
					if ($(window).width() < 1230) {
						$('.main-nav').removeClass('opened');
						$('.toggle-nav').removeClass('opened');
					}
				});
				e.preventDefault();
			}
		}
	});
}
function onScroll() {
	var indent = 100;
	if (isScroller) {
		return false;
	}
	var $menuLinks = $('.main-nav a');
	var scrollPos = $(document).scrollTop();
	$menuLinks.each(function () {
		var currLink = $(this);
		var currLinkID = $(this).data('id');
		var refElement = $(currLink.attr("href"));
		if (refElement.length > 0) {
			if (
				refElement.position().top <= (scrollPos + indent)
				&&
				refElement.position().top + refElement.height() > (scrollPos + indent)
			) {
				$menuLinks.removeClass("active");
				currLink.addClass("active");
			}
			else {
				currLink.removeClass("acvite");
			}
		}
	});
}



var myTimeout = null;
function toTop(itemClass, offset) {
	var $window = $(window),
		$elem = $(itemClass),
		$pos;
	$(window).scroll(function () {
		clearTimeout(myTimeout);
		myTimeout = setTimeout(function () {
			$pos = $window.scrollTop();
			if ($pos >= offset) {
				$elem.addClass('visible');
			} else {
				$elem.removeClass('visible');
			}
		}, 100);
	});
}
function jsTel(className) {
	$(className).mask("+7 (999) 999-99-99", {placeholder: "+7 (___) ___-__-__"});
}

function galleryInit() {
	var $carousel = $('.carousel8');
	if ($carousel.length > 0) {
		$carousel.owlCarousel({
			items: 1,
			loop: false,
			dots: false,
			nav: true,
			navText: [],
			rewind: true,
			autoplay: false,
			responsive: {
				0: {items: 1},
				640: {items: 2},
				768: {items: 3},
				1024: {items: 4},
				1230: {items: 5}
			}
		});

		$carousel.magnificPopup({
			type: 'image',
			delegate: 'a',
			preloader: true,
			preload: [0,2],
			tLoading: '',
			gallery:{
				enabled: true,
				tPrev: '',
				tNext: '',
				tCounter: ''
			},
			closeMarkup: '<button type="button" class="mfp-close fa fa-close"></button>',
			callbacks: {
				buildControls: function() {
					this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
				},
				open: function() {
					$('.mfp-preloader').append($('.loading'));
				}
			}
		});
	}
}


var lastWait = [];
/* non-xhr loadings */
BX.showWait = function (node, msg)
{
	node = BX(node) || document.body || document.documentElement;
	msg = msg || BX.message('JS_CORE_LOADING');

	var container_id = node.id || Math.random();

	var obMsg = node.bxmsg = document.body.appendChild(BX.create('DIV', {
		props: {
			id: 'wait_' + container_id,
			className: 'bx-core-waitwindow'
		},
		text: msg
	}));

	setTimeout(BX.delegate(_adjustWait, node), 10);

	$('#win8_wrapper').show();
	lastWait[lastWait.length] = obMsg;
	return obMsg;
};

BX.closeWait = function (node, obMsg)
{
	$('#win8_wrapper').hide();
	if (node && !obMsg)
		obMsg = node.bxmsg;
	if (node && !obMsg && BX.hasClass(node, 'bx-core-waitwindow'))
		obMsg = node;
	if (node && !obMsg)
		obMsg = BX('wait_' + node.id);
	if (!obMsg)
		obMsg = lastWait.pop();

	if (obMsg && obMsg.parentNode)
	{
		for (var i = 0, len = lastWait.length; i < len; i++)
		{
			if (obMsg == lastWait[i])
			{
				lastWait = BX.util.deleteFromArray(lastWait, i);
				break;
			}
		}

		obMsg.parentNode.removeChild(obMsg);
		if (node)
			node.bxmsg = null;
		BX.cleanNode(obMsg, true);
	}
};

function _adjustWait()
{
	if (!this.bxmsg)
		return;

	var arContainerPos = BX.pos(this),
		div_top = arContainerPos.top;

	if (div_top < BX.GetDocElement().scrollTop)
		div_top = BX.GetDocElement().scrollTop + 5;

	this.bxmsg.style.top = (div_top + 5) + 'px';

	if (this == BX.GetDocElement())
	{
		this.bxmsg.style.right = '5px';
	}
	else
	{
		this.bxmsg.style.left = (arContainerPos.right - this.bxmsg.offsetWidth - 5) + 'px';
	}
}
