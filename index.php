<?php get_header(); ?>

<section class="hero">
	<div class="container">

		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="text-wrapper">
					<h1>For the mobility of the future.</h1>
				</div>
				<a href="#find-stores" class="button-red">Find Store</a>
			</div>
			<div class="col-md-6 col-sm-12">

			</div>
		</div>
	</div>
</section>
<section class="elementor-section">
	<div class="container">
		<?php the_content(); ?>

	</div>
</section>
<section class="reviews">
	<div class="container">
		<h1 class="line-title">Reviews</h1>
		<?php
					$args = array('post_type' => 'reviews', 'post_per_page' => 3);
					$loop = new WP_Query($args);

					if ($loop->have_posts()) :

						while ($loop->have_posts()) : $loop->the_post(); ?>
							<div class="review-header d-flex justify-content-between">
								<div class="title d-inline-block">
									<h5><?php the_title(); ?></h5>
								</div>
								<div class="meta d-inline-block">
									<p><?php echo get_the_date(); ?></p>
								</div>
							</div>
							<div class="contents">
								<p><?php the_content(); ?></p>
							</div>
							<hr>

					<?php endwhile;

					endif;
					wp_reset_postdata();
					?>
	</div>
	</div>


</section>
<section id="find-stores">
	<div class="container">
		<h1 class="line-title">Find stores</h1>
		<?php echo do_shortcode('[wpsl]') ?>
	</div>
</section>
</section>

<?php get_footer(); ?>