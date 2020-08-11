<?php
/*
 Shakenkan Theme - Version: 1.1
*/
get_header(); ?>

		<div class="inner">
		
			<div class="page_title">
				<h1>お知らせ</h1>
			</div>

			<div class="wrap">

				<?php while (have_posts()) : the_post(); ?>

					<article class="post clear_fix">
						<time><i class="fas fa-caret-square-right"></i><?php the_time('Y.m.d'); ?></time>
						<h1><?php the_title(); ?></h1>
						<div class="content">
							<?php the_content(); ?>
						</div>
					</article>

				<?php endwhile; ?>

				<?php locate_template( array( 'template-parts/pagenavi.php' ), true, true ); ?>

			</div>

		</div>


<?php get_footer(); ?>