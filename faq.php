<?
$queryFAQ = new WP_Query([
    'post_type' => 'faq',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);
?>

<?if ($queryFAQ->have_posts()):?>
    <section class="section faq">
        <div class="container">
            <div class="section__header">
                <div class="section__title">Часто задаваемые вопросы</div>
            </div>

            <div class="faq__list">
                <?$counter = 1;?>
                <?foreach ($queryFAQ->posts as $faq):?>
                    <dl class="faq__item js-faq-item">
                        <dt class="faq__item-header">
                            <div class="faq__item-digit">(<?=$counter?>)</div>
                            <div class="faq__item-question"><?=$faq->post_title?></div>
                            <button class="faq__item-button js-faq-button"></button>
                        </dt>
                        <dd class="text faq__item-answer js-faq-answer" style="display: none;">
                            <?if (!empty($faq->post_content)):?>
                                <?=apply_filters('the_content', $faq->post_content);?>
                            <?endif;?>
                        </dd>
                    </dl>

                    <?$counter++;?>
                <?endforeach;?>
            </div>
        </div>
    </section>
<?endif;?>