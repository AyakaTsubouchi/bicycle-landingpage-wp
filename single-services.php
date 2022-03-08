<?php get_header(); ?>
<?php

if (have_posts()) :

	while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if (has_post_thumbnail()) : ?>

				<div class="thumbnail" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>); background-size:cover;"></div>

			<?php endif; ?>
			<div class="container">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				<small><?php the_category(' '); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>
				<?php the_content(); ?>

				<hr>

				<div class="row">
					<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
					<div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
				</div>
		<?php endwhile;

endif;

		?>

			</div>

		</article>
		<?php get_footer(); ?>