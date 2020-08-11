<?php
/*
 Shakenkan Theme - Version: 1.1
*/
get_header(); ?>

		<div class="inner">

			<div class="page_title">
				<h1 class="h1-title">車検館 店舗一覧</h1><span class="shop-img sp-shop-img icon-shop"><img src="<?php echo HOME; ?>img/common/icon_shopinfo_01_pc.png" alt="店舗のアイコン" srcset="<?php echo HOME; ?>img/common/icon_shopinfo_01_pc.png 1x, <?php echo HOME; ?>img/common/icon_shopinfo_01_sp.png 679w"></span>
			</div>

			<section id="gmap">
				<h3>車検館は、東京都、神奈川県、埼玉県、千葉県に<br class="pc_none">全11店舗のネットワーク。
				<b>最寄りの車検館店舗で<br class="pc_none">お待ちしております。</b><span class="icon"><img src="<?php echo HOME; ?>img/shoplist/illust_02_pc.png" alt="お辞儀する店員とPITくん" srcset="<?php echo HOME; ?>img/shoplist/illust_02_pc.png 1x, <?php echo HOME; ?>img/shoplist/illust_02_sp.png 679w"></span></h3>
				<iframe src="https://www.google.com/maps/d/embed?mid=1f4pxMTiI04Xgo-7cIHlhX_X_E-M" width="100%" height="330"></iframe>
			</section>
			<!-- //gmap -->

			<section id="shoplist" class="wrap">
				<h3><span><b>無料見積もりと車検・整備</b>のご予約は<br class="pc_none"><b>各店舗ページ</b>からお願いします。</span></h3>
				<div class="container flex">

					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>

							<div class="shop table" data-mh="group-shop">
								<div class="thumb table_cell">
									<?php if(get_field('shop_img')): ?>
									<figure>
										<?php $shop_img = wp_get_attachment_image_src(get_field('shop_img'), 'large' ); ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo $shop_img[0]; ?>" alt="<?php the_title(); ?>"></a>
									</figure>
									<?php endif; ?>
								</div>
								<div class="txt table_cell">
									<dl>
										<dt><?php the_title(); ?></dt>
										<dd>
											<?php if( get_field('shop_address') ) { ?>
											<div class="address"><?php the_field('shop_address') ?></div>
											<?php } ?>

											<?php if( get_field('shop_freedial') ) { ?>
											<p>フリーダイヤル</p>
											<div class="tel"><a href="tel:<?php the_field('shop_freedial') ?>" class="tel_num"><?php the_field('shop_freedial') ?></a></div>
											<?php } ?>

											<?php if( get_field('shop_hours') ) { ?>
											<p class="hours">[営業時間] <?php the_field('shop_hours') ?></p>
											<?php } ?>

											<?php if( get_field('shop_holiday') ) { ?>
											<p class="holiday">[定休日] <?php the_field('shop_holiday') ?></p>
											<?php } ?>
<div class="btn_estimate"><a href="
<?php
$strTitle = get_the_title();
switch ($strTitle) {
case '堀之内店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=1&area_id=1';
    break;
case '府中店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=2&area_id=1';
    break;
case '西東京田無店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=3&area_id=1';
    break;
case '板橋店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=4&area_id=1';
    break;
case '稲城店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=5&area_id=1';
    break;
case '立川店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=6&area_id=1';
    break;
case '南町田店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=7&area_id=1';
    break;
case '江戸川中央店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=8&area_id=1';
    break;
case '大和店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=9&area_id=2';
    break;
case '春日部店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=10&area_id=3';
    break;
case '柏店' :
    echo 'https://shaken-yoyaku.com/calendar.php?store_id=11&area_id=4';
    break;
}
?>"><img src="<?php echo HOME; ?>img/common/btn_estimate_01_pc.png" alt="無料見積もりのご予約はコチラ"></a></div>
											<div class="btn detail"><a href="<?php the_permalink(); ?>"><img src="<?php echo HOME; ?>img/shoplist/btn_detail_01_pc.png" alt="詳細を見る" srcset="<?php echo HOME; ?>img/shoplist/btn_detail_01_pc.png 1x, <?php echo HOME; ?>img/shoplist/btn_detail_01_sp.png 679w"></a></div>
										</dd>
									</dl>
								</div>
							</div>
							<!-- //shop -->

						<?php endwhile; ?>
					<?php else: ?>
						<p>店舗が登録されていません</p>
					<?php endif; wp_reset_postdata(); ?>

				</div>
		
			</section>
			<!-- //shoplist -->

		</div>

<?php get_footer(); ?>