<?
global $wp_query;

$id = $wp_query->queried_object_id;

$title = get_the_title($id);

$heroActive = get_field('hero-active', $id);

$heroTitle = get_field('hero-title', $id);
if (empty($heroTitle)) $heroTitle = $title;

$heroText = get_field('hero-text', $id);
if (!empty($heroText)) $heroText = apply_filters('the_content', $heroText);

$heroImage = get_field('hero-image', $id);
if (!empty($heroImage['sizes']['large'])) $heroImage = $heroImage['sizes']['large'];

$heroTooltipText = get_field('hero-tooltip-text', $id);

$heroBtnActive = get_field('hero-btn-active', $id);
$heroBtnText = get_field('hero-btn-text', $id);
$heroBtnOpenModal = get_field('hero-btn-open-modal', $id);
$heroBtnLink = get_field('hero-btn-link', $id);

$bFrontPage = is_front_page();
?>
<?if (!$bFrontPage):?>
<?if ($heroActive):?>
    <section class="section hero" style="background-image: url('<?=get_template_directory_uri();?>/assets/image/hero-1.jpg');">
        <div class="container">
            <div class="hero__inner">
                <div class="hero__content">
                    <?if (!empty($heroTitle)):?>
                        <h1 class="hero__title">
                            <?=$heroTitle?>
                        </h1>
                    <?endif;?>

                    <?if (!empty($heroText)):?>
                        <div class="hero__text text">
                            <?=$heroText?>
                        </div>
                    <?endif;?>

                    <?if ($heroBtnActive):?>
                        <?if ($heroBtnOpenModal):?>
                            <button class="btn btn_middle btn_red hero__button js-create-modal" data-modal-id="callback" data-modal-title="<?=$heroBtnText?>">
                                <span><?=$heroBtnText?></span>
                            </button>
                        <?else:?>
                            <a href="<?=$heroBtnLink?>" class="btn btn_middle btn_red hero__button">
                                <span><?=$heroBtnText?></span>
                            </a>
                        <?endif;?>
                    <?endif;?>
                </div>
                <div class="hero__image">
                    <?if (!empty($heroTooltipText)):?>
                        <div class="hero__tooltip"><?=$heroTooltipText?></div>
                    <?endif;?>

                    <?if (!empty($heroImage)):?>
                        <img src="<?=$heroImage;?>" alt="Hero Image">
                    <?endif;?>
					<?php if (is_singular('service')): ?>
						<div class="hero__label">
							Иванов Сергей Владимирович<br>
							Главный врач клиники<br>
							Врач нарколог<br>
						</div>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?if (!$bFrontPage):?>
        <?showBreadcrumbs();?>
    <?endif;?>
<?else:?>
    <?if (!$bFrontPage):?>
        <?showBreadcrumbs();?>

        <div class="title">
            <div class="container">
                <h1><?=$title?></h1>
            </div>
        </div>
    <?endif;?>
<?endif;?>
<?else:?>
<section class="section hero hero_index" style="background-image: url('<?=get_template_directory_uri();?>/assets/image/hero-1.jpg');">
	<div class="container">
		<div class="hero__inner">
				<?if (!empty($heroImage)):?>
				<div class="hero__image">
					<img src="<?=$heroImage;?>" alt="Hero Image">
				</div>
				<?endif;?>
                <div class="hero__content">
					<?if (!empty($heroTitle)):?>
                        <h1 class="hero__title">
                            <?=$heroTitle?>
                        </h1>
                    <?endif;?>
					<div class="hero__utp">
						<b>Скидка 20%</b> - Позвоните и оставьте заявку сейчас и&nbspполучите скидку на вывод из запоя
					</div>
					<div class="hero__pluses">
						<div class="hero__pluses-item hero__pluses-item_f">
							<div class="hero__pluses-item-heading">
								Анонимно 100%
							</div>
							<div class="hero__pluses-item-text">
								Снимаем симптомы похмелья за 60 минут
							</div>
						</div>
						<div class="hero__pluses-item">
							<div class="hero__pluses-item-heading">
								<b>30</b> минут
							</div>
							<div class="hero__pluses-item-text">
								Занимает приезд врача
							</div>
						</div>
						<div class="hero__pluses-item">
							<div class="hero__pluses-item-heading">
								<b>9</b> бригад
							</div>
							<div class="hero__pluses-item-text">
								Лицензированных врачей
							</div>
						</div>
					</div>
					<a href="tel:<?=clearPhone(THEME_SETTINGS['DATA']['PHONE']);?>" class="hero__call">
						<div class="hero__call-icon">
							<img src="<?=get_template_directory_uri();?>/assets/image/phone-fill-2.svg" alt="Phone">
						</div>
						<div class="hero__call-text">
							<div class="hero__call-phone"><?=THEME_SETTINGS['DATA']['PHONE']?></div>
							<div class="hero__call-open">Круглосуточно 24/7</div>
						</div>
					</a>

				</div>
		</div>
	</div>
</section>
<?endif;?>