const BodyHandler = {
    disableScroll: () => {
        setTimeout(() => {
            if (!document.body.hasAttribute('data-body-scroll-fix')) {
                let scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

                document.body.setAttribute('data-body-scroll-fix', scrollPosition); // CС‚Р°РІРёРј Р°С‚СЂРёР±СѓС‚ СЃРѕ Р·РЅР°С‡РµРЅРёРµРј РїСЂРѕРєСЂСѓС‚РєРё
                document.body.style.overflow = 'hidden';
                document.body.style.position = 'fixed';
                document.body.style.top = '-' + scrollPosition + 'px';
                document.body.style.left = '0';
                document.body.style.width = '100%';
            }
        }, 15);
    },
    enableScroll: () => {
        if (document.body.hasAttribute('data-body-scroll-fix')) {
            let scrollPosition = document.body.getAttribute('data-body-scroll-fix');

            document.body.removeAttribute('data-body-scroll-fix');
            document.body.style.overflow = '';
            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.left = '';
            document.body.style.width = '';
            window.scroll(0, scrollPosition);
        }
    },
    initPhoneMask: () => {
        $("input[type='tel']").mask("+9 (999)-999-99-99");
        $("input[type='tel']").keyup(function () {
            var $input = $(this);
            if ($input.val() == "+8") {
                $input.val("+7");
            }
            if ($input.val() == "+9") {
                $input.val("+7 (9");
            }
        });
    },
};

const OverlayHandler = {
    open: () => {
        $('.js-overlay').addClass('overlay_active');
    },
    close: () => {
        $('.js-overlay').removeClass('overlay_active');
    },
};

const MenuHandler = {
    open: () => {
        $('.js-menu').addClass('menu_active');
    },
    close: () => {
        $('.js-menu').removeClass('menu_active');
    },
};

const Handler = {
    validateEmail: (email) => {
        return String(email).toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
    },
    validatePhone: (phone) => {
        return String(phone).toLowerCase().match(/^(\+\d{1} \(\d{3}\)-\d{3}-\d{2}-\d{2})$/);
    },
    getCookie: (name) => {
        var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    },
    priceFormatter: (price) => {
        const priceFormatter = new Intl.NumberFormat('ru-RU', {
            style: 'decimal',
            currency: 'RUB',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        });

        return priceFormatter.format(price) + " в‚Ѕ";
    },
};

const FormModalHandler = {
    open: (modalID) => {
        $('.js-modal').addClass('modal_active');
        $(`.js-modal-item[data-modal-id="${modalID}"]`).addClass('modal__item_active');
    },
    close: () => {
        $('.js-modal').removeClass('modal_active');
        $('.js-modal-item').removeClass('modal__item_active');
    },
};

$(document).ready(function() {
    BodyHandler.initPhoneMask();
    
    $('.js-price-group-button').on('click', function() {
        const priceGroup = $(this).closest('.js-price-group');

        priceGroup.toggleClass('price__group_active');
        priceGroup.find('.js-price-group-list').slideToggle(300);
    });

    $('.js-faq-button').on('click', function() {
        const faq = $(this).closest('.js-faq-item');

        faq.toggleClass('faq__item_active');
        faq.find('.js-faq-answer').slideToggle(300);
    });

    $('.js-open-submenu').on('click', function() {
        $(this).toggleClass('menu__nav-link_active');
        $(this).siblings('.js-submenu').slideToggle(300);
    });

    $('.js-wide-submenu-item').hover(function() {
        const submenuID = $(this).attr('data-submenu-id');
        
        $(`.js-wide-submenu-content`).removeClass('wide-submenu__content-item_active');
        $(`.js-wide-submenu-content[data-submenu-id="${submenuID}"]`).addClass('wide-submenu__content-item_active');
	});

    $(document).on('click', '.js-modal', function(e) {
        if (e.target !== this) return;

        FormModalHandler.close();
        OverlayHandler.close();
        BodyHandler.enableScroll();
    });

    $('.js-open-modal').on('click', function() {
        const modalID = $(this).attr('data-modal-id');
        
        MenuHandler.close();
        BodyHandler.disableScroll();
        OverlayHandler.open();
        FormModalHandler.open(modalID);
    });

    $('.js-close-modal').on('click', function() {
        FormModalHandler.close();
        OverlayHandler.close();
        BodyHandler.enableScroll();
    });

    $('.js-overlay').on('click', function() {
        MenuHandler.close();
        OverlayHandler.close();
        BodyHandler.enableScroll();
    });

    $('.js-open-menu').on('click', function() {
        BodyHandler.disableScroll();
        OverlayHandler.open();
        MenuHandler.open();
    });

    $('.js-close-menu').on('click', function() {
        MenuHandler.close();
        OverlayHandler.close();
        BodyHandler.enableScroll();
    });

    $("input[type='tel']").mask("+9 (999)-999-99-99");
    $("input[type='tel']").keyup(function () {
        var $input = $(this);
        if ($input.val() == "+8") {
            $input.val("+7");
        }
        if ($input.val() == "+9") {
            $input.val("+7 (9");
        }
    });

    window.addEventListener('scroll', function() {
        let currentPosY = this.scrollY;

        if (currentPosY > 600) {
            $('.js-header-fixed').slideDown(300);
            $('.js-go-up').addClass('go-up_active');
        } else {
            $('.js-header-fixed').slideUp(300);
            $('.js-go-up').removeClass('go-up_active');
        }
    });

    $('.js-go-up').on('click', function() {
        $('html, body').animate({scrollTop: 0}, 400);
    });
});