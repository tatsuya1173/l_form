<?php
/*
 Shakenkan Theme - Version: 1.1
*/
get_header(); ?>

		<div class="inner">

			<div class="page_title">
				<h1>Q&amp;A<span class="icon"><img src="<?php echo HOME; ?>img/common/icon_qalist_01_pc.png" alt="" srcset="<?php echo HOME; ?>img/common/icon_qalist_01_pc.png 1x, <?php echo HOME; ?>img/common/icon_qalist_01_sp.png 679w"></span></h1>
			</div>

			<div class="wrap">

				<?php while (have_posts()) : the_post(); ?>

					<article class="post clear_fix">
						<h1><?php the_title(); ?></h1>
						<div class="content">
							<?php if( get_field('txt_e') ) { ?>
								<?php the_field('txt_e') ?>
							<?php } ?>
						</div>
					</article>

				<?php endwhile; ?>

				<?php locate_template( array( 'template-parts/pagenavi.php' ), true, true ); ?>

			</div>

		</div>


<?php get_footer(); ?>