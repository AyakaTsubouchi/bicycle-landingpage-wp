<div class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-item active">
				<div class="carousel-inner">
					<?php
					$args = array('post_type' => 'reviews', 'post_per_page' => 1);
					$loop = new WP_Query($args);

					if ($loop->have_posts()) :

						while ($loop->have_posts()) : $loop->the_post(); ?>
							<div class="review-header d-flex justify-content-between">
								<div class="title d-inline-block">
									<h5><?php the_title(); ?></h5>
								</div>
								<div class="meta d-inline-block">
									<p><?php echo get_the_date(); ?></p>
									<p><?php echo get_the_author(); ?></p>
								</div>
							</div>
							<div class="contents">
								<p><?php the_content(); ?></p>
							</div>

					<?php endwhile;

					endif;
					wp_reset_postdata();
					?>
				</div>
			</div>

			<?php
			$args = array('post_type' => 'reviews', 'post_per_page' => 3, 'offset' => 1);
			$loop = new WP_Query($args);

			if ($loop->have_posts()) :

				while ($loop->have_posts()) : $loop->the_post(); ?>
					<div class="carousel-item">
						<div class="carousel-inner">
							<div class="review-header d-flex justify-content-between">
								<div class="title d-inline-block">
									<h5><?php the_title(); ?></h5>
								</div>
								<div class="meta d-inline-block">
									<p><?php echo get_the_date(); ?></p>
									<p><?php echo get_the_author(); ?></p>
								</div>
							</div>
							<div class="contents">
								<p><?php the_content(); ?></p>
							</div>
						</div>
					</div>
			<?php endwhile;

			endif;
			wp_reset_postdata();
			?>
		</div>