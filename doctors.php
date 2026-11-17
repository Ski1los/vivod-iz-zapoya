<?php
$args = array(
    'post_type'      => 'doctors',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

$doctors_query = new WP_Query($args);
?>
<section class="section doctors">
	<div class="container">
		<div class="section__header">
			<h2 class="section__title">
				Наши врачи
			</h2>
		</div>
		<?php
		if ($doctors_query->have_posts()) :
			echo '<div class="doctors__list">';
			while ($doctors_query->have_posts()) : $doctors_query->the_post();
				echo '<div class="doctor__item">';

				if (has_post_thumbnail()) {
    $doctor_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $doctor_name = get_the_title();
    echo '<div class="doctor__thumbnail">';
        echo '<a href="' . esc_url($doctor_image_url) . '" data-fancybox="doctors" data-caption="' . esc_attr($doctor_name) . '">';
            the_post_thumbnail('full');
        echo '</a>';
    echo '</div>';
}

				echo '<h3 class="doctor__title">' . get_the_title() . '</h3>';

				echo '<div class="doctor__content">';
					echo '<div class="doctor__spec">';
						echo get_field('specialty', get_the_ID());
					echo '</div>';
					echo '<div class="doctor__exp">';
						echo 'Стаж: ' . get_field('experience', get_the_ID());
					echo '</div>';
				echo '</div>';

				echo '</div>';
			endwhile;
			echo '</div>';
		else :
			echo '<p>Врачи не найдены.</p>';
		endif;

		wp_reset_postdata();
		?>
		</div>
</section>