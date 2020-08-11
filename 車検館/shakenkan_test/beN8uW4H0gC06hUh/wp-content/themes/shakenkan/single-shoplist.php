<?php
/*
 Shakenkan Theme - Version: 1.1
*/

$strBaseURL = 'https://shaken-yoyaku.com/calendar.php';
$strFormDisplay = "none";
$strTarget = 'target="_blank"';
$bolReserveButtonDisplay = true;
$strShopName = get_the_title();
if ($strShopName == '堀之内店') {
    $strReserveURL = $strBaseURL.'?store_id=1&area_id=1';
} else if ($strShopName == '府中店') {
    $strReserveURL = $strBaseURL.'?store_id=2&area_id=1';
} else if ($strShopName == '西東京田無店') {
    $strReserveURL = $strBaseURL.'?store_id=3&area_id=1';
} else if ($strShopName == '板橋店') {
    $strReserveURL = $strBaseURL.'?store_id=4&area_id=1';
} else if ($strShopName == '稲城店') {
    $strReserveURL = $strBaseURL.'?store_id=5&area_id=1';
} else if ($strShopName == '南町田店') {
    $strReserveURL = $strBaseURL.'?store_id=7&area_id=1';
} else if ($strShopName == '江戸川中央店') {
    $strReserveURL = $strBaseURL.'?store_id=8&area_id=1';
} else if ($strShopName == '大和店') {
    $strReserveURL = $strBaseURL.'?store_id=9&area_id=2';
} else if ($strShopName == '立川店') {
    $strReserveURL = $strBaseURL.'?store_id=6&area_id=1';
} else if ($strShopName == '春日部店') {
    $strReserveURL = $strBaseURL.'?store_id=10&area_id=3';
} else if ($strShopName == '柏店') {
    $strReserveURL = $strBaseURL.'?store_id=11&area_id=4';
} else {
    $strReserveURL = '#estimate_form';
    //$strFormDisplay = "";
    $strTarget = "";
    $bolReserveButtonDisplay = false;
}

get_header(); ?>

		<?php while (have_posts()) : the_post(); ?>

		<div class="inner">

			<div class="page_title">
				<h1><?php the_title(); ?><span class="icon"><img src="<?php echo HOME; ?>img/common/icon_shopinfo_01_pc.png" alt="店舗情報アイコン" srcset="<?php echo HOME; ?>img/common/icon_shopinfo_01_pc.png 1x, <?php echo HOME; ?>img/common/icon_shopinfo_01_sp.png 679w"></span></h1>
			</div>

			<section id="contact_info">
				<div class="btn estimate">
					<?php if ($bolReserveButtonDisplay) { ?>
					<a href="<?php echo $strReserveURL; ?>"<?php echo $strTarget; ?> class="scroll"><img src="<?php echo HOME; ?>img/common/btn_estimate_03_pc.png" srcset="<?php echo HOME; ?>img/common/btn_estimate_03_pc.png 1x, <?php echo HOME; ?>img/common/btn_estimate_03_sp.png 679w" alt="無料見積もりのご予約はコチラ"></a>
					<?php } ?>
				</div>

				<?php if( get_field('shop_freedial') ) { ?>
				<dl>
					<dt>お電話でのご予約・お問い合わせはこちら</dt>
					<dd><a href="tel:<?php the_field('shop_freedial') ?>" class="tel_num"><?php the_field('shop_freedial') ?></a></dd>
				</dl>
				<?php } ?>
			</section>
			<!-- //contact_info -->

			<?php if( get_field('kuchikomi_url') ) { ?>
			<section id="reputation">
				<a href="<?php the_field('kuchikomi_url') ?>" target="_blank"><i class="fas fa-comments"></i>店舗の評判・口コミ<i class="fas fa-external-link-alt"></i></a>
			</section>
			<?php } ?>
			<!-- //contact_info -->

			<?php if( have_rows('shop_slideshow') ): ?>
			<section id="shop_image" class="wrap">
				<div class="slideshow_in">
					<div class="slideshow">
						<ul>
							<?php while ( have_rows('shop_slideshow') ) : the_row(); ?>
								<?php if(get_sub_field('shop_slideshow_item')): ?>
									<?php $img = wp_get_attachment_image_src(get_sub_field('shop_slideshow_item'), 'large' ); ?>
									<li><img src="<?php echo $img[0]; ?>" alt="<?php echo $strShopName; ?>"></li>
								<?php endif; ?>
							<?php endwhile; ?>
						</ul>
					</div>
					<div id="arrows">
						<div class="slick-prev"><img src="<?php echo HOME; ?>img/common/icon_arrow_l_01.png" alt=""></div>
						<div class="slick-next"><img src="<?php echo HOME; ?>img/common/icon_arrow_r_01.png" alt=""></div>
					</div>
					<div class="illust"><img src="<?php echo HOME; ?>img/shoplist/illust_01.png" alt="イラスト" srcset="<?php echo HOME; ?>img/shoplist/illust_01.png 1x, <?php echo HOME; ?>img/shoplist/illust_01.png 679w"></div>
				</div>
			</section>
			<!-- //shop_image -->
			<?php endif; ?>

			<?php if( get_field('shop_address') || get_field('shop_freedial') || get_field('shop_tel') || get_field('shop_fax') || get_field('shop_hours') || get_field('shop_holiday') || get_field('shop_freearea') ) { ?>
			<section id="shop_info" class="wrap">
				<h3 class="title bg_green">店舗情報</h3>

				<div class="info">
					<table>
						<?php if( get_field('shop_address') ) { ?>
						<tr>
							<th>所在地</th>
							<td><?php the_field('shop_address') ?></td>
						</tr>
						<?php } ?>
						<?php if( get_field('shop_freedial') ) { ?>
						<tr>
							<th>フリーダイヤル</th>
							<td><?php the_field('shop_freedial') ?></td>
						</tr>
						<?php } ?>
						<?php if( get_field('shop_tel') ) { ?>
						<tr>
							<th>TEL</th>
							<td><?php the_field('shop_tel') ?></td>
						</tr>
						<?php } ?>
						<?php if( get_field('shop_fax') ) { ?>
						<tr>
							<th>FAX</th>
							<td><?php the_field('shop_fax') ?></td>
						</tr>
						<?php } ?>
						<?php if( get_field('shop_hours') ) { ?>
						<tr>
							<th>営業時間</th>
							<td><?php the_field('shop_hours') ?></td>
						</tr>
						<?php } ?>
						<?php if( get_field('shop_holiday') ) { ?>
						<tr>
							<th>定休日</th>
							<td><?php the_field('shop_holiday') ?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<!-- //info -->

				<?php if( get_field('shop_freearea') ) { ?>
				<div class="extra">
					<?php the_field('shop_freearea') ?>
				</div>
				<!-- //extra -->
				<?php } ?>

			</section>
			<!-- //shop_image -->
			<?php } ?>

			<?php if( get_field('shop_mapimg') || get_field('shop_gmapurl') || get_field('shop_accessinfo')) { ?>
			<section id="access" class="wrap">
				<h3 class="title bg_green">アクセスマップ</h3>
				<div class="flex">
					<div class="img">
						<?php if( get_field('shop_mapimg') ) { ?>
						<?php $shop_mapimg = wp_get_attachment_image_src(get_field('shop_mapimg'), 'large' ); ?>
						<figure><img src="<?php echo $shop_mapimg[0]; ?>" alt="<?php echo $strShopName; ?>"></figure>
						<?php } ?>

						<?php if( get_field('shop_gmapurl') ) { ?>
						<div class="btn blue"><a href="<?php the_field('shop_gmapurl') ?>" target="_blank">Google MAPでみる</a></div>
						<?php } ?>
					</div>
					<div class="txt">
						<?php if( get_field('shop_accessinfo') ) { ?>
						<?php the_field('shop_accessinfo') ?>
						<?php } ?>
					</div>
				</div>

				<div class="btn estimate">
					<?php if ($bolReserveButtonDisplay) { ?>
					<a href="<?php echo $strReserveURL; ?>"<?php echo $strTarget; ?> class="scroll"><img src="<?php echo HOME; ?>img/common/btn_estimate_03_pc.png" srcset="<?php echo HOME; ?>img/common/btn_estimate_03_pc.png 1x, <?php echo HOME; ?>img/common/btn_estimate_03_sp.png 679w" alt="無料見積もりのご予約はコチラ"></a>
					<?php } ?>
				</div>
			</section>
			<!-- //shop_image -->
			<?php } ?>

			<section id="campaign" class="wrap">
				
				<?php if( have_rows('shop_campaign') ): ?>
				<h3 class="title bg_green">キャンペーン情報</h3>
					
					<?php while ( have_rows('shop_campaign') ) : the_row(); ?>

						<div class="box">
							<?php if(get_sub_field('campaign_title')): ?>
								<h4><?php the_sub_field('campaign_title') ?></h4>
							<?php endif; ?>
							<div class="table">
								<?php if(get_sub_field('campaign_img')): ?>
									<div class="table_cell img">
										<?php $campaign_img = wp_get_attachment_image_src(get_sub_field('campaign_img'), 'large' ); ?>
										<img src="<?php echo $campaign_img[0]; ?>" alt="<?php the_sub_field('campaign_title') ?>">
									</div>
								<?php endif; ?>
								<?php if(get_sub_field('campaign_contents')): ?>
									<div class="table_cell txt">
										<?php the_sub_field('campaign_contents') ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<!-- //box -->
						
					<?php endwhile; ?>
				<?php endif; ?>

				<div class="option"><!--
					<?php if( have_rows('group_card') ): ?>
						<?php while ( have_rows('group_card') ) : the_row(); ?>
							<?php if( get_sub_field('option_card') ): ?>
							--><dl class="card" data-mh="group-option">
								<dt><?php the_sub_field('option_card_title') ?></dt>
								<dd>
									<p><?php the_sub_field('option_card_txt') ?></p>
									<figure>
										<?php $option_card_img = wp_get_attachment_image_src(get_sub_field('option_card_img'), 'large' ); ?>
										<img src="<?php echo $option_card_img[0]; ?>" alt="<?php the_sub_field('option_card_title') ?>">
									</figure>
								</dd>
							</dl><!--
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if( have_rows('group_environment') ): ?>
						<?php while ( have_rows('group_environment') ) : the_row(); ?>
							<?php if( get_sub_field('option_environment') ): ?>
							--><dl class="environment" data-mh="group-option">
								<dt><?php the_sub_field('option_environment_title') ?></dt>
								<dd>
									<p><?php the_sub_field('option_environment_txt') ?></p>
									<figure>
										<?php $option_environment_img = wp_get_attachment_image_src(get_sub_field('option_environment_img'), 'large' ); ?>
										<img src="<?php echo $option_environment_img[0]; ?>" alt="<?php the_sub_field('option_environment_title') ?>">
									</figure>
								</dd>
							</dl><!--
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if( have_rows('group_wifi') ): ?>
						<?php while ( have_rows('group_wifi') ) : the_row(); ?>
							<?php if( get_sub_field('option_wifi') ): ?>
							--><dl class="wifi" data-mh="group-option">
								<dt><?php the_sub_field('option_wifi_title') ?></dt>
								<dd>
									<p><?php the_sub_field('option_wifi_txt') ?></p>
									<figure>
										<?php $option_wifi_img = wp_get_attachment_image_src(get_sub_field('option_wifi_img'), 'large' ); ?>
										<img src="<?php echo $option_wifi_img[0]; ?>" alt="<?php the_sub_field('option_wifi_title') ?>">
									</figure>
								</dd>
							</dl><!--
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				--></div>
				<!-- //extra -->

			</section>
			<!-- //shop_image -->

			<section id="estimate_form" class="wrap" style="display:<?php echo $strFormDisplay; ?>">
				<h3 class="title bg_green">無料見積もりのご予約はカンタン</h3>
				<p>無料見積もりのご予約・ご用命は、1分でご入力完了のかんたんメールフォーム、<br>
				もしくはフリーダイヤルにて、お気軽にご相談ください。</p>

				<div id="form">
					<div class="form_inner">
						<div class="step">
							申し込みフォーム送信後の手順は以下の通りです。
							<ol>
								<li><img src="<?php echo HOME; ?>img/common/icon_no_01.png" alt="1">店舗からの電話で入庫の日時を確定</li>
								<li><img src="<?php echo HOME; ?>img/common/icon_no_02.png" alt="2">ご来店、点検の上、お見積もりの作成</li>
								<li><img src="<?php echo HOME; ?>img/common/icon_no_03.png" alt="3">車検実施（見積もりだけでもＯＫ）</li>
							</ol>
						</div>
						<?php the_content(); ?>
					</div>
				</div>

				<div class="banner_tel pc_none"><div class="inner"><a href="tel:<?php the_field('shop_freedial') ?>"><img src="<?php echo HOME; ?>img/common/btn_tel_01.png" alt="こちらの店舗に電話をかける"></a></div></div>
				
			</section>
			<!-- //shop_image -->

		</div>

		<?php endwhile; ?>

<?php get_footer(); ?>