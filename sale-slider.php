<section class="section sale-slider">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Акции</h2>
        </div>

        <div class="sale-slider__wrapper">
            <div class="sale-slider__nav nav js-sale-slider-nav"></div>
            <div class="sale-slider__inner js-sale-slider owl-carousel owl-theme">
                <?foreach ($saleSliderItems as $sale):?>
                    <?
                    $backgroundImage = get_field('image-background', $sale->ID);
                    if (!empty($backgroundImage['sizes']['medium'])) $backgroundImage = $backgroundImage['sizes']['medium'];
                    
                    $title = $sale->post_title;
                    
                    // Ищем процент скидки
                    $discountPercent = 0;
                    if (preg_match('/(\d+)\s*%/', $title, $matches)) {
                        $discountPercent = intval($matches[1]);
                    }
                    
                    // Ищем сумму в рублях
                    $discountAmount = 0;
                    if (preg_match('/(\d+)\s*(?:руб|₽|rur|рублей)/i', $title, $matches)) {
                        $discountAmount = intval($matches[1]);
                    }
                    
                    // Убираем проценты и суммы из заголовка для чистого отображения
                    $cleanTitle = preg_replace('/\s*-\s*\d+%/i', '', $title);
                    $cleanTitle = preg_replace('/\s*\d+%\s*/i', ' ', $cleanTitle);
                    $cleanTitle = trim($cleanTitle);
                    ?>
                    <article class="sale-slider__item sale-slider__item_with-discount" style="background-image: url('<?=$backgroundImage?>');">
                        
                        <?if ($discountPercent > 0):?>
                            <div class="sale-badge">
                                <span class="sale-badge__minus">−</span>
                                <span class="sale-badge__value"><?=$discountPercent?>%</span>
                            </div>
                        <?endif;?>
                        
                        <h3 class="sale-slider__item-title"><?=$cleanTitle?></h3>
                        
                        <?if ($discountAmount > 0):?>
                            <div class="sale-discount-tag">
                                Экономия <?=$discountAmount?> ₽
                            </div>
                        <?endif;?>
                        
                        <button class="btn btn_red btn_middle sale-slider__item-button js-create-modal" data-modal-id="callback" data-modal-title="Заказать звонок">
                            <span>Заказать звонок</span>
                        </button>
                    </article>
                <?endforeach;?>
            </div>
        </div>
        <div class="section__footer sale-slider__dots dots js-sale-slider-dots"></div>
    </div>
</section>

