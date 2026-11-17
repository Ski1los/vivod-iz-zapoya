<?
$queryCert = new WP_Query([
    'post_type' => 'cert',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);
?>

<?if ($queryCert->have_posts()):?>
    <section class="section cert">
        <div class="container">
            <div class="section__header">
                <h2 class="section__title">Наши лицензии и сертификаты</h2>
            </div>

            <div class="cert__slider">
                <div class="cert__slider-nav nav js-cert-slider-nav"></div>
                <div class="cert__slider-inner js-cert-slider owl-carousel owl-theme">
                    <?foreach ($queryCert->posts as $cert):?>
                        <?
                        $certImage = get_the_post_thumbnail_url($cert->ID, 'large');
                        ?>
                           <a data-fancybox="licenses" href="<?=$certImage;?>" data-caption="Лицензия" class="cert__slider-item">
                            <img src="<?=$certImage?>" alt="Cert" lazyload>
                        </a>
                    <?endforeach;?>
                </div>
            </div>
            <div class="section__footer cert__slider-dots dots js-cert-slider-dots"></div>
        </div>
    </section>
<?endif;?>