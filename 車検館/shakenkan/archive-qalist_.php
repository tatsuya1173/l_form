<?php
/*
 Shakenkan Theme - Version: 1.1
*/
get_header(); ?>

		<div class="inner">

			<div class="page_title">
				<h1>Q&amp;A<span class="icon"><img src="<?php echo HOME; ?>img/common/icon_qalist_01_pc.png" alt="？のアイコン" srcset="<?php echo HOME; ?>img/common/icon_qalist_01_pc.png 1x, <?php echo HOME; ?>img/common/icon_qalist_01_sp.png 679w"></span></h1>
			</div>

			<div class="wrap">

				<section id="mainvisual">
					<h3><img src="../img/qalist/mainvisual_01.png" alt="お客様からいただいたよくある質問を紹介いたします。"></h3>
				</section>
				<!-- //gmap -->

				<section id="qa">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<dl>
								<dt><?php the_title(); ?></dt>
								<dd>
									<?php if( get_field('txt_a') ) { ?><b><?php the_field('txt_a') ?></b><?php } ?>
									<?php if( get_field('txt_e') ) { ?><?php the_field('txt_e') ?><?php } ?>
								</dd>
							</dl>
						<?php endwhile; ?>
					<?php else: ?>
						<p>店舗が登録されていません</p>
					<?php endif; wp_reset_postdata(); ?>
				</section>
				<!-- //qa -->

				<div class="btn estimate">
					<a href="<?php echo HOME; ?>shoplist/"><img src="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png" srcset="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png 1x, <?php echo HOME; ?>img/common/btn_estimate_02_sp.png 679w" alt="無料見積もりのご予約はコチラ"></a>
				</div>

			</div>

		</div>

<?php get_footer(); ?>