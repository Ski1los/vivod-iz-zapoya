<?php
	$photos = get_field('photos_clinic', 'options');
	
?>

<section class="section carousel-clinic">
	<div class="container">
		<div class="section__header">
			<h2 class="section__title">
				Фото клиники
			</h2>
		</div>
		
		<div class="carousel-clinic__slider owl-carousel owl-theme">
			<?php foreach ($photos as $photo):?>
			<div class="carousel-clinic__slide item">
				<img src="<?php echo $photo['url'];?>" alt="<?php echo $photo['alt'];?>"/>
			</div>
			<?php endforeach;?>
		</div>
		
	</div>
</section>