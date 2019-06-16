$(document).ready(function() {

	let header_height = 0;

	function serviceWidgetOpening () {
		$('.services__text-wrap').on('click', function (e) {

			var id = this.dataset.serviceId,
				service_widget = document.getElementById('service-id_' + id);

			if (service_widget) {
				console.log("Номер выбранного виджета: ", id)

				service_widget.style.display = "flex";
				document.body.className = "lock-position";

				var el = document.getElementsByClassName('widget__company-info')[0];

				if (parseInt(window.getComputedStyle(service_widget, null).height) >= window.innerHeight) {
					service_widget.style.alignItems = "flex-start";
					service_widget.style.paddingTop = "30px";
					service_widget.style.paddingBottom = "30px";
				}
			} else {
				console.log("widget doesn't exist!")
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

		// serviceWidgetOpening(); // that's is need because of changing the dom-position of 'service block' element
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

				let id  = "#" + $(this).attr('href');
				//let mg  = $('.header__top-wrap').outerHeight();
				let	top = $(id).offset().top - header_height;

                $('body,html').animate({scrollTop: top}, 1500);
			}
		});
	}
	changingWindowOffset();
	// scrolling page to the neccessary position

    function changingWindowOffsetPartner () {
        $(".partner_icon").on("click", function (event) {
            event.preventDefault();

			//открытие виджета
			document.getElementById('js-widget__partner-info').style.display = "flex";
			document.body.className = "lock-position";



        });
    }
    changingWindowOffsetPartner();



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

        header_height = $('.header__top').outerHeight();

	  if($('.fixed__header').outerHeight()) {
          header_height = $('.fixed__header').outerHeight();
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

        // widget of the contact info
        var widget__partner = document.getElementsByClassName('widget__partner-info')[0];

		//fixing bugs..
		if ((widget__company != undefined || widget__partner != undefined) && widget__company.contains(e.target))
			return;
		
		if ((widget__contact != undefined || widget__partner != undefined) && widget__contact.contains(e.target))
			return;

		if ((widget__company != undefined) && !(widget__company == e.target) && !widget__company.contains(e.target) && !$('.js-widget__close').is(e.target)) {			
			$('.js-widget__company-info').css("display", "none");

			// document.getElementById('js-widget__company-info').style.display = "none";
			document.body.className = "";
		}
		// widget of the company info


		// widget of the contact info
		
		if ((widget__contact != undefined) && !(widget__contact == e.target) && !widget__contact.contains(e.target) && !$('.js-widget__close').is(e.target)) {
			document.getElementById('js-widget__contact-info').style.display = "none";
			document.body.className = "";
		}
		// widget of the contact info

        if ((widget__partner != undefined) && !(widget__partner == e.target) && !widget__partner.contains(e.target) && !$('.js-widget__close').is(e.target)) {
            document.getElementById('js-widget__partner-info').style.display = "none";
            document.body.className = "";
        }
	})
	// closing widget when clicking outside




	// scroll to top function

	function scrollToTopFunction () {
		$('body,html').animate({scrollTop: 0}, 1500)
	}

	var toTopElements = document.getElementsByClassName('js-to__top');
	for (let i = 0; i < toTopElements.length; i++) {
		toTopElements[i].addEventListener('click', scrollToTopFunction)
	}

})
