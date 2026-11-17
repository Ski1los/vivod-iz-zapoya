<?
global $wp_query;

$id = $wp_query->queried_object_id;

$bPageShowSaleSlider = get_field('page-show-sale-slider', $id);
$saleSliderItems = get_field('page-sale-slider-items', $id);
$bPageShowSaleWide = get_field('page-show-sale-wide', $id);
$saleWideItem = get_field('page-sale-wide-items', $id);

$bPageShowCallback = get_field('page-show-callback', $id);
$bPageShowCert = get_field('page-show-cert', $id);
$bPageShowContacts = get_field('page-show-contacts', $id);
$bPageShowFaq = get_field('page-show-faq', $id);
$bPageShowReviews = get_field('page-show-reviews', $id);
$bPageShowCalculator = get_field('page-show-calculator', $id);
$bPageShowServicesCategories = get_field('page-show-services-categories', $id);
?>

<?if ($bPageShowSaleSlider && !empty($saleSliderItems)):?>
    <?require(TEMPLATEPATH . '/blocks/sale-slider.php');?>
<?endif;?>

<?if ($bPageShowSaleWide && !empty($saleWideItem)):?>
    <?require(TEMPLATEPATH . '/blocks/sale-wide.php');?>
<?endif;?>

<?if ($bPageShowCallback):?>
    <?require(TEMPLATEPATH . '/blocks/callback.php');?>
<?endif;?>

<?if ($bPageShowCert):?>
    <?require(TEMPLATEPATH . '/blocks/cert.php');?>
<?endif;?>

<?if ($bPageShowReviews):?>
    <?require(TEMPLATEPATH . '/blocks/reviews.php');?>
<?endif;?>

<?if ($bPageShowCalculator):?>
    <?require(TEMPLATEPATH . '/blocks/calculator.php');?>
<?endif;?>

<?if ($bPageShowServicesCategories):?>
    <?require(TEMPLATEPATH . '/blocks/services-categories.php');?>
<?endif;?>

<?if ( is_front_page() || is_singular('service') ):?>
	<?require(TEMPLATEPATH . '/blocks/doctors.php');?>
	<?require(TEMPLATEPATH . '/blocks/carousel.php');?>
<?endif;?>

<?if ($bPageShowFaq):?>
    <?require(TEMPLATEPATH . '/blocks/faq.php');?>
<?endif;?>

<?if ($bPageShowContacts):?>
    <?require(TEMPLATEPATH . '/blocks/contacts.php');?>
<?endif;?>

<?if (get_post_type($id) == 'service' || is_page(11)):?>
    <?$content = get_the_content();?>

    <?if (!empty($content)):?>
        <div class="section">
            <div class="container">
                <div class="text">
                    <?=apply_filters('the_content', $content);?>
                </div>
            </div>
        </div>
    <?endif;?>
<?endif;?>

<footer class="footer footer--extended">
    <div class="container">
        <div class="footer__grid">
			
            
            <!-- Колонка 1: Услуги -->
            <div class="footer__col">
                <h4 class="footer__col-title">Услуги</h4>
                <nav class="footer__menu">
					
                    <a href="/service/" class="footer__menu-link">Все услуги</a>
					<a href="/video-otzyvy-i-usloviya-oplaty-vyvod-iz-zapoya/" class="footer__menu-link">Видео, отзывы и условия оплаты | Вывод из запоя</a>
                    <a href="/service/vyvod-iz-zapoya/" class="footer__menu-link">Вывод из запоя</a>
                    <a href="/service/kodirovanie/" class="footer__menu-link">Кодирование</a>
                    <a href="/service/narkomaniya/" class="footer__menu-link">Лечение наркомании</a>
                    <a href="/service/raskodirovanie/" class="footer__menu-link">Реабилитация</a>
                    <a href="/service/raskodirovanie/" class="footer__menu-link">Раскодирование</a>
                    <a href="/service/tabakokurenie/" class="footer__menu-link">Лечение табакокурения</a>
                    <a href="/service/terapiya/" class="footer__menu-link">Психотерапия</a>
                </nav>
            </div>
            
            <!-- Колонка 2: О клинике -->
            <div class="footer__col">
                <h4 class="footer__col-title">О клинике</h4>
                <nav class="footer__menu">
                    <a href="/about/" class="footer__menu-link">О нас</a>
                    <a href="/about/" class="footer__menu-link">Врачи</a>
                    <a href="/price/" class="footer__menu-link">Цены</a>
                    <a href="/price/" class="footer__menu-link">Акции</a>
                    <a href="/otzivy/" class="footer__menu-link">Отзывы</a>
                    <a href="/liczenziii/" class="footer__menu-link">Лицензии</a>
                    <a href="/blog/" class="footer__menu-link">Блог</a>
                    <a href="/contacts/" class="footer__menu-link">Контакты</a>
					<a href="/dostizhenia/" class="footer__menu-link">Достижения</a>
                </nav>
            </div>
            
            <!-- Колонка 3: Информация -->
            <div class="footer__col">
                <h4 class="footer__col-title">Информация</h4>
                <nav class="footer__menu">
                    <a href="/#calculator" class="footer__menu-link">Калькулятор стоимости</a>
                    <a href="/faq" class="footer__menu-link">Частые вопросы</a>
                    <a href="/kak-dobratsya/" class="footer__menu-link">Как добраться</a>
                    <a href="/oplata/" class="footer__menu-link">Способы оплаты</a>
                    <a href="/anonimnost/" class="footer__menu-link">Гарантии анонимности</a>
                    <a href="/rodstvennikam" class="footer__menu-link">Родственникам</a>
                </nav>
            </div>
            
            <!-- Колонка 4: Правовая информация -->
            <div class="footer__col">
                <h4 class="footer__col-title">Правовая информация</h4>
                <nav class="footer__menu">
                    <?if (!empty(THEME_SETTINGS['PAGE']['POLICY'])):?>
                        <a href="<?=get_permalink(THEME_SETTINGS['PAGE']['POLICY']);?>" class="footer__menu-link">Политика конфиденциальности</a>
                    <?endif;?>
                    <a href="/personal-data/" class="footer__menu-link">Согласие на обработку ПД</a>
                    <a href="/user-agreement/" class="footer__menu-link">Пользовательское соглашение</a>
                    <a href="/cookie-policy/" class="footer__menu-link">Политика cookies</a>
                    <a href="/disclaimer/" class="footer__menu-link">Отказ от ответственности</a>
                    <a href="/karta-sajta/" class="footer__menu-link">Карта сайта</a>
                </nav>
            </div>
            
            <!-- Колонка 5: Контакты -->
            <div class="footer__col footer__col_contacts">
                <h4 class="footer__col-title">Контакты</h4>
                <div class="footer__contacts-block">
                    <?if (!empty(THEME_SETTINGS['DATA']['LOGO_BIG_URL'])):?>
                        <a href="/" class="footer__logo">
                            <img src="<?=THEME_SETTINGS['DATA']['LOGO_BIG_URL']?>" alt="Logo">
                        </a>
                    <?endif;?>

                    <?if (!empty(THEME_SETTINGS['DATA']['PHONE'])):?>
                        <a class="footer__phone" href="tel:<?=clearPhone(THEME_SETTINGS['DATA']['PHONE'])?>">
                            <?=THEME_SETTINGS['DATA']['PHONE']?>
                        </a>
                    <?endif;?>

                    <div class="footer__address">
                        <strong>Адрес:</strong><br>
                        644049, г. Омск,<br>
                        ул. Лермонтова, 41
                    </div>

                    <div class="footer__email">
                        <strong>Email:</strong><br>
                        <a href="mailto:info@vivod-iz-zapoya-omsk.ru">info@vivod-iz-zapoya-omsk.ru</a>
                    </div>

                    <div class="footer__schedule">
                        <strong>График работы:</strong><br>
                        Круглосуточно, 24/7
                    </div>

                    <div class="footer__button">
                        <button class="btn btn_red btn_middle footer__button-item js-create-modal" data-modal-id="callback" data-modal-title="Вызвать врача">
                            <span>Вызвать врача</span>
                        </button>
                        <button class="btn btn_stroke-red btn_middle footer__button-item js-create-modal" data-modal-id="callback" data-modal-title="Рассчитать стоимость">
                            <span>Рассчитать стоимость</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Колонка 6: Соцсети и реквизиты -->
            <div class="footer__col footer__col_wide">
                <div class="footer__wrapper">
                    <h4 class="footer__col-title">Мы в соцсетях</h4>
                    <div class="footer__social-links">
                        <a href="https://vk.com/vivod_iz_zapoya_omsk" target="_blank" class="footer__social-link" rel="nofollow noopener" title="ВКонтакте">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.785 16.241s.288-.032.436-.194c.136-.148.132-.427.132-.427s-.02-1.304.587-1.496c.598-.189 1.366 1.26 2.18 1.817.615.422 1.083.33 1.083.33l2.177-.03s1.14-.071.6-.97c-.044-.073-.314-.661-1.617-1.87-1.364-1.264-1.182-1.059.462-3.246.999-1.332 1.398-2.146 1.273-2.494-.12-.332-.856-.244-.856-.244l-2.45.015s-.182-.025-.317.056c-.132.079-.217.263-.217.263s-.39 1.037-.91 1.92c-1.096 1.86-1.534 1.96-1.713 1.842-.415-.27-.311-1.085-.311-1.663 0-1.808.274-2.562-.534-2.756-.268-.065-.465-.107-1.15-.114-.878-.009-1.622.003-2.043.209-.28.138-.496.444-.365.462.163.022.531.1.727.365.253.342.244 1.111.244 1.111s.145 2.127-.34 2.389c-.333.181-.79-.189-1.77-1.886-.502-.87-.88-1.828-.88-1.828s-.073-.178-.203-.274c-.158-.116-.378-.153-.378-.153l-2.327.015s-.35.01-.478.162c-.114.135-.009.413-.009.413s1.838 4.304 3.92 6.472c1.907 1.987 4.072 1.856 4.072 1.856h.982z"/></svg>
                        </a>
                        <a href="https://ok.ru/vivod_iz_zapoya_omsk" target="_blank" class="footer__social-link" rel="nofollow noopener" title="Одноклассники">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M14.505 17.44a11.03 11.03 0 0 0 3.045-1.337 1.003 1.003 0 1 0-1.107-1.674 9.02 9.02 0 0 1-2.17.993l2.227 2.018zM12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm3.536-10.5a3.5 3.5 0 0 0-3.536-3.5 3.5 3.5 0 0 0-3.536 3.5 3.5 3.5 0 0 0 3.536 3.5 3.5 3.5 0 0 0 3.536-3.5zm-5.001 0a1.5 1.5 0 1 1 3.001 0 1.5 1.5 0 0 1-3.001 0z"/></svg>
                        </a>
                        <a href="https://t.me/vivod_iz_zapoya_omsk" target="_blank" class="footer__social-link" rel="nofollow noopener" title="Telegram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                        </a>
                        <a href="https://wa.me/79006701670" target="_blank" class="footer__social-link" rel="nofollow noopener" title="WhatsApp">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                        </a>
                    </div>
                    
                    <div class="footer__requisites">
                        <strong>Реквизиты:</strong><br>
                        ООО "Наркологическая клиника"<br>
                        ИНН: 5500000000<br>
                        ОГРН: 1155500000000<br>
                        Лицензия: № ЛО-55-01-005678
                    </div>

                    <div class="footer__payment-system">
                        <img src="<?=get_template_directory_uri();?>/assets/image/visa.svg" alt="Visa">
                        <img src="<?=get_template_directory_uri();?>/assets/image/mastercard.svg" alt="Mastercard">
                        <img src="<?=get_template_directory_uri();?>/assets/image/maestro.svg" alt="Maestro">
                        <img src="<?=get_template_directory_uri();?>/assets/image/mir.svg" alt="Mir">
                    </div>
                </div>
            </div>
            
            <!-- Колонка 7: Юр. предупреждение -->
            <div class="footer__col footer__col_wide">
                <div class="footer__text">Постановка диагноза и назначение курса лечения может осуществляться только врачом. Сайт оказывает исключительно общую информационную поддержку, не может использоваться для назначения курсов лечения и постановки диагнозов. Сайт не является публичной офертой. Информационный ресурс принадлежит частному лицу и не размещает рекламу. Услуги оказываются по адресу лицензии.</div>
            </div>
            
            <!-- Колонка 8: Копирайт и seomove -->
            <div class="footer__col footer__col_wide">
                <div class="footer__wrapper">
                    <div class="footer__copyright">
                        © <?=date('Y');?> Наркологическая клиника «Вывод из запоя Омск»
                    </div>

                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* ===== НОВЫЙ ФУТЕР ===== */
.footer--extended .footer__grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr) 1.3fr 1.2fr;
    gap: 25px;
    padding: 40px 0 20px;
}

.footer__col-title {
    font-size: 15px;
    font-weight: 700;
    color: #333;
    margin: 0 0 15px 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding-bottom: 8px;
    border-bottom: 2px solid #e74c3c;
    display: inline-block;
}

.footer__menu {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.footer__menu-link {
    color: #555;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.2s;
    line-height: 1.4;
}

.footer__menu-link:hover {
    color: #e74c3c;
    padding-left: 5px;
}

/* Контакты */
.footer__contacts-block {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.footer__logo img {
    max-height: 50px;
    width: auto;
}

.footer__phone {
    font-size: 20px;
    font-weight: 700;
    color: #e74c3c;
    text-decoration: none;
}

.footer__address,
.footer__email,
.footer__schedule {
    font-size: 14px;
    color: #555;
    line-height: 1.5;
}

.footer__address strong,
.footer__email strong,
.footer__schedule strong {
    color: #333;
}

.footer__email a {
    color: #e74c3c;
    text-decoration: none;
}

.footer__email a:hover {
    text-decoration: underline;
}

.footer__button {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 10px;
}

.footer__button .btn {
    width: 100%;
    justify-content: center;
}

/* Соцсети */
.footer__social-links {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.footer__social-link {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0f0f0;
    border-radius: 50%;
    color: #555;
    transition: all 0.3s;
}

.footer__social-link:hover {
    background: #e74c3c;
    color: #fff;
    transform: translateY(-3px);
}

/* Реквизиты */
.footer__requisites {
    font-size: 12px;
    color: #888;
    line-height: 1.6;
    margin-bottom: 15px;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 3px solid #e74c3c;
}

.footer__requisites strong {
    color: #333;
}

/* Платежные системы */
.footer__payment-system {
    display: flex;
    gap: 8px;
    align-items: center;
    flex-wrap: wrap;
}

.footer__payment-system img {
    height: 24px;
    width: auto;
}

/* Юр. текст */
.footer__text {
    font-size: 12px;
    color: #888;
    line-height: 1.6;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

/* Копирайт */
.footer__copyright {
    font-size: 13px;
    color: #666;
    margin-bottom: 15px;
}

.footer__seomove {
    display: flex;
    align-items: center;
    gap: 15px;
    padding-top: 15px;
    border-top: 1px solid #e0e0e0;
}

.footer__seomove-logo img {
    height: 24px;
    width: auto;
}

.footer__seomove-links {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.footer__seomove-link {
    font-size: 11px;
    color: #999;
    text-decoration: none;
}

.footer__seomove-link:hover {
    color: #e74c3c;
}

/* Адаптивность */
@media (max-width: 1200px) {
    .footer--extended .footer__grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 900px) {
    .footer--extended .footer__grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .footer__col_wide {
        grid-column: span 2;
    }
}

@media (max-width: 600px) {
    .footer--extended .footer__grid {
        grid-template-columns: 1fr;
    }
    
    .footer__col_wide {
        grid-column: span 1;
    }
    
    .footer__col-title {
        font-size: 14px;
    }
}
</style>

<style>
a[data-fancybox] {
    cursor: zoom-in;
    display: inline-block;
}
a[data-fancybox]:hover {
    opacity: 0.9;
    transition: opacity 0.3s ease;
}
a[data-fancybox] img {
    transition: transform 0.3s ease;
}
a[data-fancybox]:hover img {
    transform: scale(1.02);
}
</style>

<script>
jQuery(document).ready(function($) {
    $('[data-fancybox="licenses"]').fancybox({
        loop: true,
        buttons: ['zoom', 'close'],
        animationEffect: 'zoom-in-out'
    });

    $('[data-fancybox="doctors"]').fancybox({
        loop: true,
        buttons: ['zoom', 'close'],
        animationEffect: 'zoom-in-out'
    });

    $('.carousel-clinic__slide img, .text img, .entry-content img, .about img, .clinic-photo img, .photo-block img, [class*="photo"] img, [class*="gallery"] img').each(function() {
        var $img = $(this);
        if (!$img.parent().is('a[data-fancybox]')) {
            var imgSrc = $img.attr('src');
            var imgAlt = $img.attr('alt') || 'Фото клиники';
            $img.wrap('<a href="' + imgSrc + '" data-fancybox="clinic" data-caption="' + imgAlt + '" style="cursor: zoom-in; display: inline-block;"></a>');
        }
    });

    $('[data-fancybox="clinic"]').fancybox({
        loop: true,
        buttons: ['zoom', 'close'],
        animationEffect: 'zoom-in-out'
    });
});
</script>