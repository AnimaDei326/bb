$(document).ready(function() {

	// making square shape of services images
	function heightWindow () {
		var servicesImages = $('.js-services__img');

		$.each(servicesImages, function(key, element) {
			$(this).css("height", $(this).parent().width());

			$('.services__text-wrap').css("height", $(this).parent().width());
		});

	}
	heightWindow();
	// making square shape of services images



	// making square shape of services blocks
	var _reversed = false;

	function reverseServices () {
		var elements = $('.services__block');

		for (let i = 2; i < elements.length; i+=4) {
			let k = elements[i].innerHTML;
			elements[i].innerHTML = elements[i+1].innerHTML;
			elements[i+1].innerHTML = k;
		}

		_reversed = !_reversed;
	}

	if ((window.innerWidth <= 730) && (window.innerWidth > 480)) {
		reverseServices();
	}

	$(window).resize(function() {
		heightWindow();

		// changing blocks positions depending on the screen width
		if ((window.innerWidth > 730) && _reversed) {
			reverseServices();
		} else if ((window.innerWidth <= 730) && (window.innerWidth > 480) && !_reversed) {
			reverseServices();
		} else if ((window.innerWidth <= 480) && _reversed) {
			reverseServices();
		}
	});
	// making square shape of services blocks


	// showing mobile menu
	$('.switch-mobile__btn').click(function () {
		$('.header__top-mobile').toggleClass('block-active');
	})
	// showing mobile menu
	

	// closing mobile menu when clicking outside
	$(document).mouseup(function (e){
		var div = document.getElementsByClassName('header__top-mobile block-active')[0];
		
		if ((div != undefined) && !(div == e.target) && !div.contains(e.target) && !$('.switch-mobile__btn').is(e.target)) {
			div.className = 'header__top-mobile';
		}
	})
	// closing mobile menu when clicking outside

	// scrolling to the neccessary position 
	function changingWindowOffset () {
		$(".list-menu__link").on("click", function (event) {
			event.preventDefault();

			if ($(this).text() == "Связаться") {
				//открытие виджета
				document.getElementById('js-widget__contact-info').style.display = "flex";
				document.body.className = "lock-position";
			} else {
				var id  = "#" + $(this).attr('href'),
					mg  = $('.fixed__header').outerHeight(),
					top = $(id).offset().top - mg;

				console.log(top)

				$('body,html').animate({scrollTop: top}, 1500);
			}
		});
	}
	changingWindowOffset();
	// scrolling to the neccessary position 



	// showing fixed top menu
	const headerHeight = $('.header__top-wrap').outerHeight();

	$(window).scroll(function(){
	  var element = $('.header__top-wrap'),
	      scroll = $(window).scrollTop();

	  if (scroll >= headerHeight) element.addClass('fixed__header');
	  else element.removeClass('fixed__header');
	});
	// showing fixed top menu
	

	// виджеты
	$(".js-widget__close").on("click", function (e) {
		this.parentNode.parentNode.style.display = "none";
		document.body.className = "";
	});


	$('.services__text-wrap').on('click', function (e) {

		document.getElementById('js-widget__company-info').style.display = "flex";
		document.body.className = "lock-position";

		var el = document.getElementsByClassName('widget__company-info')[0];

		if (parseInt(window.getComputedStyle(el, null).height) >= window.innerHeight) {
			document.getElementById('js-widget__company-info').style.alignItems = "flex-start";
			document.getElementById('js-widget__company-info').style.paddingTop = "30px";
			document.getElementById('js-widget__company-info').style.paddingBottom = "30px";
		}
	})

	// closing widgetuwhen clicking outside
	$(document).mouseup(function (e){

		// widget of the company info
		var widget__company = document.getElementsByClassName('widget__company-info')[0];
		
		if ((widget__company != undefined) && !(widget__company == e.target) && !widget__company.contains(e.target) && !$('.js-widget__close').is(e.target)) {
			document.getElementById('js-widget__company-info').style.display = "none";
			document.body.className = "";
		}
		// widget of the company info


		// widget of the contact info
		var widget__contact = document.getElementsByClassName('widget__contact-info')[0];
		
		if ((widget__contact != undefined) && !(widget__contact == e.target) && !widget__contact.contains(e.target) && !$('.js-widget__close').is(e.target)) {
			document.getElementById('js-widget__contact-info').style.display = "none";
			document.body.className = "";
		}
		// widget of the contact info
	})
	// closing widget when clicking outside
})
