$(document).ready(function() {
    $('.js-cert-slider').owlCarousel({
        loop: false,
        nav: true,
        navContainer: '.js-cert-slider-nav',
        dots: true,
        dotsEach: true,
        dotsContainer: '.js-cert-slider-dots',
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 2,
                margin: 10,
            },
            768: {
                items: 3,
                margin: 20,
            },
            1024: {
                items: 4,
                margin: 30,
            },
        }
    });

    $('.js-sale-slider').owlCarousel({
        loop: false,
        nav: true,
        navContainer: '.js-sale-slider-nav',
        dots: true,
        dotsEach: true,
        dotsContainer: '.js-sale-slider-dots',
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1,
                margin: 20,
                nav: false,
            },
            768: {
                items: 2,
                margin: 30,
            },
        }
    });
	
	$('.carousel-clinic__slider').owlCarousel({
		loop: true,
		items: 1,
		nav: true,
		margin: 30,
		responsive: {
			768: {
                items: 2,
                margin: 30,
            },
            1024: {
                items: 3,
                margin: 30,
            },
        }
	})
});