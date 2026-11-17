<?
function showService($id) {
    $name = get_the_title($id);
    $link = get_permalink($id);
    $thumbnailURL = get_the_post_thumbnail_url($id, 'large');
    if (empty($thumbnailURL)) $thumbnailURL = false;

    $gallery = get_field('gallery', $id);
    if (!empty($gallery[0]['sizes']['medium']) && empty($thumbnailURL)) {
        $thumbnailURL = $gallery[0]['sizes']['medium'];
    }

    if (empty($thumbnailURL)) $thumbnailURL = THEME_SETTINGS['DATA']['PLACEHOLDER_URL'];
    ?>

    <article class="service">
        <div class="service__image">
            <a href="<?=$link?>" class="service__image-inner" style="background-image: url('<?=$thumbnailURL;?>');"></a>
        </div>

        <h4 class="service__title">
            <a href="<?=$link?>"><?=$name;?></a>
        </h4>

        <div class="service__bottom">
            <a href="<?=$link?>" class="btn btn_black btn_middle btn_small-icon">
                <span>Подробнее</span>
                <img src="<?=get_template_directory_uri();?>/assets/image/arrow.svg" alt="Button">
            </a>
        </div>
    </article>
    <?
}

function showCategoryLink($id) {
    $title = getProductCategoryNameByID($id);
    $link = get_category_link($id);

    $bThumbnailNoExist = true;

    $thumbnailURL = get_term_meta($id, 'thumbnail_id', true);
    if (!empty($thumbnailURL)) $thumbnailURL = wp_get_attachment_image_src($thumbnailURL, 'large');
    if (!empty($thumbnailURL[0])) {
        $thumbnailURL = $thumbnailURL[0];
        $bThumbnailNoExist = false;
    }

    if (empty($thumbnailURL)) $thumbnailURL = THEME_SETTINGS['DATA']['PLACEHOLDER_URL'];
    ?>

    <a href="<?=$link?>" class="category-link <?if ($bThumbnailNoExist):?>category-link_cover<?endif;?>">
        <img class="category-link__image" src="<?=$thumbnailURL?>" alt="Category">

        <?if ($bThumbnailNoExist):?>
            <span class="category-link__name"><?=$title?></span>
        <?endif;?>
    </a>

    <?
}

function showCategory($id) {
    $title = getProductCategoryNameByID($id);
    $link = get_category_link($id);

    $bThumbnailNoExist = true;

    $thumbnailURL = get_term_meta($id, 'thumbnail_id', true);
    if (!empty($thumbnailURL)) $thumbnailURL = wp_get_attachment_image_src($thumbnailURL, 'large');
    if (!empty($thumbnailURL[0])) {
        $thumbnailURL = $thumbnailURL[0];
        $bThumbnailNoExist = false;
    }

    if (empty($thumbnailURL)) $thumbnailURL = THEME_SETTINGS['DATA']['PLACEHOLDER_URL'];
    ?>
    <article class="category">
        <a href="<?=$link?>" class="category__image <?if ($bThumbnailNoExist):?>category__image_cover<?endif;?>">
            <img src="<?=$thumbnailURL?>" alt="<?=$title?>">
        </a>

        <h3 class="category__name">
            <a href="<?=$link?>">
                <?=$title?>
            </a>
        </h3>

        <div class="category__bottom">
            <button class="btn btn_fill btn_middle btn_small-icon js-create-modal" data-modal-id="callback">
                <span>Заказать</span>
                <img src="<?=get_template_directory_uri();?>/assets/image/arrow.svg" alt="Button">
            </button>

            <a href="<?=$link?>" class="btn btn_black btn_middle btn_small-icon">
                <span>Подробнее</span>
                <img src="<?=get_template_directory_uri();?>/assets/image/arrow.svg" alt="Button">
            </a>
        </div>
    </article>
    <?
}

function showSmallProduct($id) {
    $product = wc_get_product($id);

    $regularPrice = (int)$product->get_regular_price();
    $salePrice = (int)$product->get_sale_price();

    $arImages = [];
    $image = false;

    $thumbnailID = $product->get_image_id();
    if (!empty($thumbnailID)) $arImages[] = wp_get_attachment_url($thumbnailID);

    $arAttachmentIDs = $product->get_gallery_image_ids();
    foreach ($arAttachmentIDs as $attachmentID) {
        if (!empty($attachmentID)) {
            $arImages[] = wp_get_attachment_url($attachmentID);
        }
    }

    if (!empty($arImages[0])) $image = $arImages[0];
    else $image = THEME_SETTINGS['DATA']['PLACEHOLDER_URL'];
    ?>
    <article class="small-product">
        <div class="small-product__image">
            <img src="<?=$image?>" alt="Product Image" lazyload>
        </div>
        <div class="small-product__content">
            <h3 class="small-product__name"><?=$product->get_title();?></h3>

            <?if (!empty($regularPrice)):?>
                <div class="small-product__price">
                    <?if (!empty($salePrice)):?>
                        <div class="small-product__price-item small-product__price-item_sale"><?=priceFormatter($salePrice);?></div>
                    <?endif;?>

                    <?if (!empty($regularPrice)):?>
                        <div class="small-product__price-item small-product__price-item_regular"><?=priceFormatter($regularPrice);?></div>
                    <?endif;?>
                </div>
            <?endif;?>
        </div>
    </article>
    <?
}

function showSmallService($id) {
    ?>
    <article class="small-service">
        <h3 class="small-product__name"><?=get_the_title($id);?></h3>
    </article>
    <?
}