<div class="section contacts">
    <div class="container">
        <div class="contacts__list">
            <?if (!empty(THEME_SETTINGS['DATA']['PHONE'])):?>
               
<div class="contacts__item">
    <a class="contacts__item-link" href="tel:+79006701670"></a>
    <div class="contacts__item-icon" style="background-image: url('<?=get_template_directory_uri();?>/assets/image/phone-fill-2.svg');"></div>
    <div class="contacts__item-value">8 (900) 670-16-70</div>
    <div class="contacts__item-description">Горячая линия для звонков по России</div>
</div>


<div class="contacts__item">
    <a class="contacts__item-link" href="tel:+73812501670"></a>
    <div class="contacts__item-icon" style="background-image: url('<?=get_template_directory_uri();?>/assets/image/phone-fill-2.svg');"></div>
    <div class="contacts__item-value">8 (381) 250-16-70</div>
    <div class="contacts__item-description">Городской номер клиники</div>
</div>
            <?endif;?>

            <?if (!empty(THEME_SETTINGS['DATA']['EMAIL'])):?>
                <div class="contacts__item">
                    <a class="contacts__item-link" href="mailto:<?=THEME_SETTINGS['DATA']['EMAIL']?>"></a>
                    <div class="contacts__item-icon" style="background-image: url('<?=get_template_directory_uri();?>/assets/image/mail-fill-2.svg');"></div>
                    <div class="contacts__item-value"><?=THEME_SETTINGS['DATA']['EMAIL']?></div>
                    <div class="contacts__item-description">Консультации по электронной почте</div>
                </div>
            <?endif;?>

            <?if (!empty(THEME_SETTINGS['DATA']['ADDRESS'])):?>
                <div class="contacts__item">
                    <div class="contacts__item-icon" style="background-image: url('<?=get_template_directory_uri();?>/assets/image/address-fill-2.svg');"></div>
                    <div class="contacts__item-value"><?=THEME_SETTINGS['DATA']['ADDRESS']?></div>
                    <div class="contacts__item-description">Адрес клиники</div>
                </div>
            <?endif;?>

            <?/*
            <?if (!empty(THEME_SETTINGS['SOCIAL']['WHATSAPP'])):?>
                <div class="contacts__item">
                    <a class="contacts__item-link" href="<?=THEME_SETTINGS['SOCIAL']['WHATSAPP']?>"></a>
                    <div class="contacts__item-icon" style="background-image: url('<?=get_template_directory_uri();?>/assets/image/whatsapp-fill.svg');"></div>
                    <div class="contacts__item-value">Whatsapp</div>
                    <div class="contacts__item-description">Бесплатные консультации в Whatsapp</div>
                </div>
            <?endif;?>

            <?if (!empty(THEME_SETTINGS['SOCIAL']['TELEGRAM'])):?>
                <div class="contacts__item">
                    <a class="contacts__item-link" href="<?=THEME_SETTINGS['SOCIAL']['TELEGRAM']?>"></a>
                    <div class="contacts__item-icon" style="background-image: url('<?=get_template_directory_uri();?>/assets/image/telegram-fill.svg');"></div>
                    <div class="contacts__item-value">Telegram</div>
                    <div class="contacts__item-description">Бесплатные консультации в Telegram</div>
                </div>
            <?endif;?>
            */?>

            <?if (!empty(THEME_SETTINGS['DATA']['MAP'])):?>
                <div class="contacts__map">
                    <?=THEME_SETTINGS['DATA']['MAP']?>
                </div>
            <?endif;?>
        </div>
    </div>
</div>