<header class="header">
    <div class="container">
        <div class="header__top">
            <?if (!empty(THEME_SETTINGS['DATA']['LOGO_BIG_URL'])):?>
                <a href="/" class="header__logo header__logo_big">
                    <img src="<?=THEME_SETTINGS['DATA']['LOGO_BIG_URL'];?>" alt="Logo">
                </a>
            <?endif;?>

            <?if (!empty(THEME_SETTINGS['DATA']['LOGO_SMALL_URL'])):?>
                <a href="/" class="header__logo header__logo_small">
                    <img src="<?=THEME_SETTINGS['DATA']['LOGO_SMALL_URL'];?>" alt="Logo">
                </a>
            <?endif;?>

            <?if (!empty(THEME_SETTINGS['PAGE']['SEARCH'])):?>
                <div class="header__search">
                    <form action="<?=get_permalink(THEME_SETTINGS['PAGE']['SEARCH']);?>" method="GET" class="search-title">
                        <input class="search-title__input" type="search" name="search" placeholder="Поиск по сайту">
                        <button class="btn btn_small btn_white search-title__button">
                            <img src="<?=get_template_directory_uri();?>/assets/image/search.svg" alt="Button">
                        </button>
                    </form>
                </div>
            <?endif;?>

            <div class="header__contacts">
                <?if (!empty(THEME_SETTINGS['PAGE']['SEARCH'])):?>
                    <a href="<?=get_permalink(THEME_SETTINGS['PAGE']['SEARCH']);?>" class="btn btn_middle btn_white header__search-button">
                        <img src="<?=get_template_directory_uri();?>/assets/image/search.svg" alt="Search">
                    </a>
                <?endif;?>

                <?if (!empty(THEME_SETTINGS['DATA']['PHONE'])): ?>
					<?if (!empty(THEME_SETTINGS['SOCIAL']['WHATSAPP'])):?>
					<a href="<?=THEME_SETTINGS['SOCIAL']['WHATSAPP']?>" target="_blank" class="btn btn_white btn_middle header__phone-button">
						<img src="<?=get_template_directory_uri();?>/assets/image/whatsapp-fill.svg" alt="Whatsapp">
					</a>
					<?endif;?>
                    <a href="tel:<?=clearPhone(THEME_SETTINGS['DATA']['PHONE']);?>" class="btn btn_middle btn_red header__phone">
                        <img src="<?=get_template_directory_uri();?>/assets/image/phone-white-fill.svg" alt="Phone">
                        <span><?=THEME_SETTINGS['DATA']['PHONE']?></span>
                    </a>
                <?endif;?>

                <?# showSocial('header__social');?>
<!-- Рейтинг клиники в хедере -->
<div class="header__rating">
    <div class="header__rating-stars">★★★★★</div>
    <div class="header__rating-info">
        <span class="header__rating-score">4.9</span>
        <span class="header__rating-label">рейтинг клиники</span>
    </div>
</div>
                <button class="btn btn_middle btn_fill header__callback-button js-create-modal" data-modal-id="callback" data-modal-title="Узнать стоимость лечения">
                    <span>Узнать стоимость лечения</span>
                </button>

                <button class="btn btn_middle btn_fill header__menu-button js-open-menu">
                    <img src="<?=get_template_directory_uri();?>/assets/image/burger-white.svg" alt="Menu">
                </button>
            </div>
        </div>
		<div class="header__mobile">
			<div class="header__mobile-wrapper">
			<a href="tel:<?=clearPhone(THEME_SETTINGS['DATA']['PHONE']);?>" class="btn btn_middle btn_red header__phone">
				<img src="<?=get_template_directory_uri();?>/assets/image/phone-white-fill.svg" alt="Phone">
				<span><?=THEME_SETTINGS['DATA']['PHONE']?></span>
			</a>
			<button class="btn btn_middle btn_fill header__callback-button js-create-modal" data-modal-id="callback" data-modal-title="Приедем в течении 20 минут!">
				<span>Заказать срочный вызов!</span>
			</button>
			</div>
			<div class="header__mobile-text">
				Cкидка 20% - оставьте заявку сейчас
			</div>
		</div>
    </div>

    <?if (!empty(THEME_MENU['HEADER'])):?>
        <div class="header__bottom">
            <nav class="wide-menu">
                <?foreach (THEME_MENU['HEADER'] as $menuItem):?>
                    <div class="wide-menu__item">
                        <a href="<?=$menuItem['URL']?>" class="wide-menu__link <?if (!empty($menuItem['ITEMS'])):?>wide-menu__link_catalog<?endif;?>"><?=$menuItem['TITLE']?></a>

                        <?if (!empty($menuItem['ITEMS'])):?>
                            <div class="wide-submenu">
                                <div class="wide-submenu__list">
                                    <?foreach ($menuItem['ITEMS'] as $submenu):?>
                                        <a href="<?=$submenu['URL']?>" class="wide-submenu__item js-wide-submenu-item" data-submenu-id="<?=$submenu['ID']?>"><?=$submenu['TITLE']?></a>
                                    <?endforeach;?>
                                </div>
                                <div class="wide-submenu__content">
                                    <?foreach ($menuItem['ITEMS'] as $submenu):?>
                                        <?if (empty($submenu['ITEMS'])) continue;?>

                                        <div class="wide-submenu__content-item js-wide-submenu-content" data-submenu-id="<?=$submenu['ID']?>">
                                            <div class="wide-submenu__content-item-title"><?=$submenu['TITLE']?></div>
                                            <div class="wide-childmenu">
                                                <?foreach ($submenu['ITEMS'] as $childmenu):?>
                                                    <div class="wide-childmenu__item">
                                                        <a href="<?=$childmenu['URL']?>" class="wide-childmenu__item-link"><?=$childmenu['TITLE']?></a>
                                                    </div>
                                                <?endforeach;?>
                                            </div>
                                        </div>
                                    <?endforeach;?>
                                </div>
                            </div>
                        <?endif;?>
                    </div>
                <?endforeach;?>
            </nav>
        </div>
    <?endif;?>
</header>

<header class="header-fixed js-header-fixed">
    <div class="container">
        <div class="header-fixed__top">
            <?if (!empty(THEME_SETTINGS['DATA']['LOGO_SMALL_URL'])):?>
                <a href="/" class="header-fixed__logo">
                    <img src="<?=THEME_SETTINGS['DATA']['LOGO_SMALL_URL'];?>" alt="Logo">
                </a>
            <?endif;?>

            <?if (!empty(THEME_SETTINGS['PAGE']['SEARCH'])):?>
                <div class="header-fixed__search">
                    <form action="<?=get_permalink(THEME_SETTINGS['PAGE']['SEARCH']);?>" method="GET" class="search-title">
                        <input class="search-title__input" type="search" name="search" placeholder="Поиск по сайту">
                        <button class="btn btn_small btn_white search-title__button">
                            <img src="<?=get_template_directory_uri();?>/assets/image/search.svg" alt="Button">
                        </button>
                    </form>
                </div>
            <?endif;?>

            <div class="header-fixed__contacts">
                <?if (!empty(THEME_SETTINGS['PAGE']['SEARCH'])):?>
                    <a href="<?=get_permalink(THEME_SETTINGS['PAGE']['SEARCH']);?>" class="btn btn_middle btn_white header-fixed__search-button">
                        <img src="<?=get_template_directory_uri();?>/assets/image/search.svg" alt="Search">
                    </a>
                <?endif;?>

                <?if (!empty(THEME_SETTINGS['DATA']['EMAIL'])):?>
                    <a href="mailto:<?=THEME_SETTINGS['DATA']['EMAIL']?>" class="btn btn_middle btn_white header-fixed__email">
                        <img src="<?=get_template_directory_uri();?>/assets/image/mail-fill-2.svg" alt="Email">
                    </a>
                <?endif;?>

                <?showSocial('header-fixed__social');?>

                <?if (!empty(THEME_SETTINGS['DATA']['PHONE'])):?>
                    <a href="tel:<?=clearPhone(THEME_SETTINGS['DATA']['PHONE']);?>" class="btn btn_middle btn_white header-fixed__phone-button">
                        <img src="<?=get_template_directory_uri();?>/assets/image/phone-fill-2.svg" alt="Phone">
                    </a>

                    <a href="tel:<?=clearPhone(THEME_SETTINGS['DATA']['PHONE']);?>" class="btn btn_middle btn_red header-fixed__phone">
                        <img src="<?=get_template_directory_uri();?>/assets/image/phone-white-fill.svg" alt="Phone">
                        <span><?=THEME_SETTINGS['DATA']['PHONE']?></span>
                    </a>
                <?endif;?>

                <button class="btn btn_middle btn_fill header-fixed__callback-button js-create-modal" data-modal-id="callback" data-modal-title="Узнать стоимость лечения">
                    <span>Узнать стоимость лечения</span>
                </button>

                <button class="btn btn_middle btn_fill header-fixed__menu-button js-open-menu">
                    <img src="<?=get_template_directory_uri();?>/assets/image/burger-white.svg" alt="Menu">
                </button>
            </div>
        </div>
		<div class="header__mobile">
			<div class="header__mobile-wrapper">
				<a href="tel:<?=clearPhone(THEME_SETTINGS['DATA']['PHONE']);?>" class="btn btn_middle btn_red header__phone">
					<img src="<?=get_template_directory_uri();?>/assets/image/phone-white-fill.svg" alt="Phone">
					<span><?=THEME_SETTINGS['DATA']['PHONE']?></span>
				</a>
				<button class="btn btn_middle btn_fill header__callback-button js-create-modal" data-modal-id="callback" data-modal-title="Приедем в течении 20 минут!">
					<span>Заказать срочный вызов!</span>
				</button>
				</div>
			<div class="header__mobile-text">
				Cкидка 20% - оставьте заявку сейчас
			</div>
		</div>
    </div>
	
</header>