$(document).ready(function() {

	function serviceWidgetOpening () {
		$('.services__text-wrap').on('click', function (e) {
			console.log(this)
			console.log("Номер выбранного виджета: ", this.dataset.serviceId)

			document.getElementById('js-widget__company-info').style.display = "flex";
			document.body.className = "lock-position";

			var el = document.getElementsByClassName('widget__company-info')[0];

			if (parseInt(window.getComputedStyle(el, null).height) >= window.innerHeight) {
				document.getElementById('js-widget__company-info').style.alignItems = "flex-start";
				document.getElementById('js-widget__company-info').style.paddingTop = "30px";
				document.getElementById('js-widget__company-info').style.paddingBottom = "30px";
			}
		})
	}

	// making square shape of services images
	function heightWindow () {
		var servicesImages = $('.js-services__img');

		$.each(servicesImages, function(key, element) {
			$(this).css("height", $(this).parent().width());

			var servicesTextWrap = this.parentNode.parentNode.querySelector('.services__text-wrap');
				servicesTextWrap.style.height = $(this).parent().width() + 'px';

			// $('.services__text-wrap').css("height", $(this).parent().width());
		});

	}
	heightWindow();
	// making square shape of services images



	// making square shape of services blocks

	$(window).resize(function() {
		heightWindow();

		serviceWidgetOpening(); // that's is need because of changing the dom-position of 'service block' element
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

	// scrolling page to the neccessary position 
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

				$('body,html').animate({scrollTop: top}, 1500);
			}
		});
	}
	changingWindowOffset();
	// scrolling page to the neccessary position 



	// showing fixed top menu
	const headerHeight = $('.header__top-wrap').outerHeight();
	var isHeaderFixed = false;

	$(window).scroll(function(){
	  var element = $('.header__top-wrap'),
	      scroll = $(window).scrollTop(),
	      img = $('.header__logo');

	  if ((scroll >= headerHeight) && !isHeaderFixed){
	  	img.attr('src', img.attr('src').replace('logo.png', 'logo_blue.png'));

	  	element.addClass('fixed__header');

	  	isHeaderFixed = !isHeaderFixed;
	  } else if ((scroll < headerHeight) && isHeaderFixed) {
		  	img.attr('src', img.attr('src').replace('logo_blue.png', 'logo.png'));

		  	element.removeClass('fixed__header');
		  	isHeaderFixed = !isHeaderFixed;
	  }
	});
	// showing fixed top menu
	

	// виджеты
	$(".js-widget__close").on("click", function (e) {
		this.parentNode.parentNode.style.display = "none";
		document.body.className = "";
	});


	serviceWidgetOpening(); // open services widget 

	// $('.services__text-wrap').on('click', function (e) {
	// 	console.log('bum')
	// 	document.getElementById('js-widget__company-info').style.display = "flex";
	// 	document.body.className = "lock-position";

	// 	var el = document.getElementsByClassName('widget__company-info')[0];

	// 	if (parseInt(window.getComputedStyle(el, null).height) >= window.innerHeight) {
	// 		document.getElementById('js-widget__company-info').style.alignItems = "flex-start";
	// 		document.getElementById('js-widget__company-info').style.paddingTop = "30px";
	// 		document.getElementById('js-widget__company-info').style.paddingBottom = "30px";
	// 	}
	// })

	// closing widget when clicking outside
	$(document).mouseup(function (e){

		// widget of the company info
		var widget__company = document.getElementsByClassName('widget__company-info')[0];

		// widget of the contact info
		var widget__contact = document.getElementsByClassName('widget__contact-info')[0];


		//fixing bugs..
		if ((widget__company != undefined) && widget__company.contains(e.target))
			return;
		
		if ((widget__contact != undefined) && widget__contact.contains(e.target))
			return;

		if ((widget__company != undefined) && !(widget__company == e.target) && !widget__company.contains(e.target) && !$('.js-widget__close').is(e.target)) {
			document.getElementById('js-widget__company-info').style.display = "none";
			document.body.className = "";
		}
		// widget of the company info


		// widget of the contact info
		
		if ((widget__contact != undefined) && !(widget__contact == e.target) && !widget__contact.contains(e.target) && !$('.js-widget__close').is(e.target)) {
			document.getElementById('js-widget__contact-info').style.display = "none";
			document.body.className = "";
		}
		// widget of the contact info
	})
	// closing widget when clicking outside
})
