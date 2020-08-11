<?php
/*
 Shakenkan Theme - Version: 1.1
*/
get_header(); ?>

		<div class="inner">
			
			<?php while (have_posts()) : the_post(); ?>
			<div class="page_title">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="wrap post_content">

				<?php the_content(); ?>

				<div class="btn estimate">
					<a href="<?php echo HOME; ?>shoplist/"><img src="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png" srcset="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png 1x, <?php echo HOME; ?>img/common/btn_estimate_02_sp.png 679w" alt="無料見積もりのご予約はコチラ"></a>
				</div>
			</div>
			<?php endwhile; ?>

		</div>

<?php get_footer(); ?>