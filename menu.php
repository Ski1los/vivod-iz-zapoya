<div class="menu js-menu">
    <div class="menu__inner">
        <button class="close menu__close js-close-menu"></button>

        <?if (!empty(THEME_SETTINGS['PAGE']['SEARCH'])):?>
            <div class="menu__search">
                <form action="<?=get_permalink(THEME_SETTINGS['PAGE']['SEARCH']);?>" method="GET" class="search-title">
                    <input class="search-title__input" type="search" name="search" placeholder="Поиск по сайту">
                    <button class="btn btn_small btn_white search-title__button">
                        <img src="<?=get_template_directory_uri();?>/assets/image/search.svg" alt="Button">
                    </button>
                </form>
            </div>
        <?endif;?>

        <?if (!empty(THEME_MENU['SIDE'])):?>
            <nav class="menu__nav">
                <?foreach (THEME_MENU['SIDE'] as $menuItem):?>
                    <div class="menu__nav-item">
                        <?if (!empty($menuItem['ITEMS'])):?>
                            <button class="menu__nav-link js-open-submenu"><?=$menuItem['TITLE']?></button>

                            <div class="menu__nav-submenu js-submenu">
                                <div class="menu__nav-submenu-inner">
                                    <?foreach ($menuItem['ITEMS'] as $submenu):?>
                                        <a href="<?=$submenu['URL']?>" class="menu__nav-submenu-link"><?=$submenu['TITLE']?></a>
                                    <?endforeach;?>
                                </div>
                            </div>
                        <?else:?>
                            <a href="<?=$menuItem['URL']?>" class="menu__nav-link"><?=$menuItem['TITLE']?></a>
                        <?endif;?>
                    </div>
                <?endforeach;?>
            </nav>
        <?endif;?>

        <div class="menu__contacts">
            <?if (!empty(THEME_SETTINGS['DATA']['PHONE'])):?>
                <a href="tel:<?=clearPhone(THEME_SETTINGS['DATA']['PHONE']);?>" class="btn btn_middle btn_white menu__phone">
                    <img src="<?=get_template_directory_uri();?>/assets/image/phone-fill-2.svg" alt="Button">
                    <span><?=THEME_SETTINGS['DATA']['PHONE']?></span>
                </a>
            <?endif;?>

            <?if (!empty(THEME_SETTINGS['DATA']['EMAIL'])):?>
                <a href="mailto:<?=THEME_SETTINGS['DATA']['EMAIL']?>" class="btn btn_middle btn_white menu__email">
                    <img src="<?=get_template_directory_uri();?>/assets/image/mail-fill-2.svg" alt="Button">
                    <span><?=THEME_SETTINGS['DATA']['EMAIL']?></span>
                </a>
            <?endif;?>

            <?showSocial('menu__social');?>
        </div>

        <button class="btn btn_middle btn_fill btn_small-icon menu__button js-create-modal" data-modal-id="callback" data-modal-title="Оставить заявку">
            <span>Оставить заявку</span>
            <img src="<?=get_template_directory_uri();?>/assets/image/arrow-white.svg" alt="Button">
        </button>
    </div>
</div>