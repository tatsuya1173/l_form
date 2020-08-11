<?php //固定ページをフロントページとして使用(front-page.php)
/*
 Shakenkan Theme - Version: 1.1
*/
get_header(); ?>

		<div class="inner">

			<div class="page_title">
				<h1>お知らせ</h1>
			</div>

			<div class="wrap">

				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>

						<article class="post">
							<time><a href="<?php the_permalink(); ?>" class="clear_fix"><i class="fas fa-caret-square-right"></i><?php the_time('Y.m.d'); ?></a></time>
							<h1><a href="<?php the_permalink(); ?>" class="clear_fix"><?php the_title(); ?></a></h1>
							<div class="content">
								<?php the_content(); ?>
							</div>
						</article>

					<?php endwhile; ?>
				<?php else: ?>
					<p>記事がありません</p>
				<?php endif; ?>

				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

			</div>

		</div>

<?php get_footer(); ?>