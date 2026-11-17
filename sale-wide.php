<?
$subtitle = get_field('subtitle', $saleWideItem);
$sideImage = get_field('side-background', $saleWideItem->ID);
if (!empty($sideImage['sizes']['large'])) $sideImage = $sideImage['sizes']['large'];

$title = $saleWideItem->post_title;

$discountPercent = 0;
if (preg_match('/(\d+)\s*%/', $title, $matches)) {
    $discountPercent = intval($matches[1]);
}

$discountAmount = 0;
if (preg_match('/(\d+)\s*(?:руб|₽|rur|рублей)/i', $title, $matches)) {
    $discountAmount = intval($matches[1]);
}

// Очищаем заголовок от процентов и сумм
$cleanTitle = preg_replace('/\s*-\s*\d+%/i', '', $title);
$cleanTitle = preg_replace('/\s*\d+%\s*/i', ' ', $cleanTitle);
$cleanTitle = trim($cleanTitle);
?>
<section class="section sale">
    <div class="container">
        <div class="sale__inner">
            <div class="sale__content">
                <div class="section__header section__header_left">
                    <?if ($discountPercent > 0):?>
                        <div class="sale-wide-badge">
                            <span class="sale-wide-badge__minus">−</span>
                            <span class="sale-wide-badge__value"><?=$discountPercent?>%</span>
                            <span class="sale-wide-badge__text">скидка</span>
                        </div>
                    <?endif;?>
                    
                    <h2 class="section__title"><?=$cleanTitle?></h2>

                    <?if (!empty($subtitle)):?>
                        <h3 class="section__subtitle"><?=$subtitle?></h3>
                    <?endif;?>
                </div>

                <?if ($discountAmount > 0):?>
                    <div class="sale-wide-discount">
                        💰 Экономия <?=$discountAmount?> ₽
                    </div>
                <?endif;?>

                <button class="btn btn_red btn_middle btn_small-icon sale__button js-create-modal" data-modal-id="callback" data-modal-title="Получить консультацию">
                    <span>Получить консультацию</span>
                    <img src="<?=get_template_directory_uri();?>/assets/image/arrow-white.svg" alt="Button">
                </button>
            </div>

            <?if (!empty($sideImage)):?>
                <div class="sale__image">
                    <img src="<?=$sideImage?>" alt="Sale" lazyload>
                </div>
            <?endif;?>
        </div>
    </div>
</section>
