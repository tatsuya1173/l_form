<?php
/*
 Shakenkan Theme - Version: 1.1
*/
get_header(); ?>

		<div class="inner">

			<div class="page_title">
				<h1 class="icon_reason">車検館のサービス・メンテナンス<span class="icon"><img src="<?php echo HOME; ?>img/common/icon_reason_01_pc.png" alt="握手のアイコン" srcset="<?php echo HOME; ?>img/common/icon_reason_01_pc.png 1x, <?php echo HOME; ?>img/common/icon_reason_01_sp.png 679w"></span></h1>
			</div>

			<div class="wrap">

				<section id="promise">
					<h3 class="title"><img src="<?php echo HOME; ?>img/service/lead_01_pc.jpg" alt="お客様の笑顔のためにお約束すること" srcset="<?php echo HOME; ?>img/service/lead_01_pc.jpg 1x, <?php echo HOME; ?>img/service/lead_01_sp.jpg 679w"></h3>
					<ul class="just_layout">
						<li class="just_item"><img src="<?php echo HOME; ?>img/service/promise_01_pc.jpg" alt="無料立会い見積り 無料立会い見積りでお支払い金額を確定します。" srcset="<?php echo HOME; ?>img/service/promise_01_pc.jpg 1x, <?php echo HOME; ?>img/service/promise_01_sp.jpg 679w"></li>
						<li class="just_item"><img src="<?php echo HOME; ?>img/service/promise_02_pc.jpg" alt="きちんとご説明します。 「車検合格に必要な整備」と「後日でもOKな整備を」きちんとご説明します。" srcset="<?php echo HOME; ?>img/service/promise_02_pc.jpg 1x, <?php echo HOME; ?>img/service/promise_02_sp.jpg 679w"></li>
						<li class="just_item"><img src="<?php echo HOME; ?>img/service/promise_03_pc.jpg" alt="キッズコーナー完備 キッズコーナー完備で、お子様連れのお客様も安心です。" srcset="<?php echo HOME; ?>img/service/promise_03_pc.jpg 1x, <?php echo HOME; ?>img/service/promise_03_sp.jpg 679w"></li>
					</ul>
					<div class="btn estimate mt30">
					<a href="<?php echo HOME; ?>shoplist/"><img src="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png" srcset="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png 1x, <?php echo HOME; ?>img/common/btn_estimate_02_sp.png 679w" alt="無料見積もりのご予約はコチラ"></a>
				</div>
				</section>
				<!-- //promise -->

				<section id="sec_01">
					<h4 class="title bg_green"><img src="<?php echo HOME; ?>img/service/sublead_01_pc.gif" alt="メンテナンスメニュー" srcset="<?php echo HOME; ?>img/service/sublead_01_pc.gif 1x, <?php echo HOME; ?>img/service/sublead_01_sp.gif 679w"></h4>

					<div class="container">
						<strong>車検館では、車検や点検だけでなく、様々なメンテナンスメニューをご用意しております。<br>
						皆様の愛車のメンテナンスはすべて車検館にお任せ下さい。</strong>
						<p clas="notes">※取扱商品は店舗ごとに異なります。詳しくは、各店舗にお問合せください。</p>
						<p clas="notes">※価格は消費税抜きの価格です。記載されている価格は代表的な車種の価格であり、車種・車両の状態などにより価格が異なる場合がございます。詳細は担当者にご確認下さい。</p>

						<dl class="category_list">
							<dt><img src="<?php echo HOME; ?>img/service/category_01_pc.jpg" alt="ボディケア" srcset="<?php echo HOME; ?>img/service/category_01_pc.jpg 1x, <?php echo HOME; ?>img/service/category_01_sp.jpg 679w"></dt>
							<dd>
								<ul class="flex">
									<?php $args = array(
										'post_type' => 'service', //投稿タイプの指定
										'posts_per_page'=> -1,
										'tax_query' => array(
											array(
												'taxonomy' => 'service_cat',
												'field' => 'slug',
												'terms' => array(
													'body-care'
												),
											),
										)
									);
									$customPosts = get_posts($args);
									if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>
										<li>
											<a href="<?php the_permalink(); ?>">
												<?php if (has_post_thumbnail()) : ?>
													<span class="thumb" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></span>
												<?php else : ?>
													<span class="thumb" style="background-image: url(<?php echo HOME ;?>img/common/no_img.jpg)"></span>
												<?php endif ; ?>
												<span class="title"><?php the_title(); ?></span>
											</a>
										</li>
									<?php endforeach; ?>
									<?php else : //記事が無い場合 ?>
										 <li>記事はまだありません。</li>
									<?php endif;
									wp_reset_postdata(); //クエリのリセット ?>
								</ul>
							</dd>

							<dt><img src="<?php echo HOME; ?>img/service/category_02_pc.jpg" alt="オイル、バッテリー、タイヤなど" srcset="<?php echo HOME; ?>img/service/category_02_pc.jpg 1x, <?php echo HOME; ?>img/service/category_02_sp.jpg 679w"></dt>
							<dd>
								<ul class="flex">
									<?php $args = array(
										'post_type' => 'service', //投稿タイプの指定
										'posts_per_page'=> -1,
										'tax_query' => array(
											array(
												'taxonomy' => 'service_cat',
												'field' => 'slug',
												'terms' => array(
													'oil-battery-tire'
												),
											),
										)
									);
									$customPosts = get_posts($args);
									if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>
										<li>
											<a href="<?php the_permalink(); ?>">
												<?php if (has_post_thumbnail()) : ?>
													<span class="thumb" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></span>
												<?php else : ?>
													<span class="thumb" style="background-image: url(<?php echo HOME ;?>img/common/no_img.jpg)"></span>
												<?php endif ; ?>
												<span class="title"><?php the_title(); ?></span>
											</a>
										</li>
									<?php endforeach; ?>
									<?php else : //記事が無い場合 ?>
										 <li>記事はまだありません。</li>
									<?php endif;
									wp_reset_postdata(); //クエリのリセット ?>
								</ul>
							</dd>
							<dt><img src="<?php echo HOME; ?>img/service/category_03_pc.jpg" alt="ボディリペア" srcset="<?php echo HOME; ?>img/service/category_03_pc.jpg 1x, <?php echo HOME; ?>img/service/category_03_sp.jpg 679w"></dt>
							<dd>
								<ul class="flex">
									<?php $args = array(
										'post_type' => 'service', //投稿タイプの指定
										'posts_per_page'=> -1,
										'tax_query' => array(
											array(
												'taxonomy' => 'service_cat',
												'field' => 'slug',
												'terms' => array(
													'body-repair'
												),
											),
										)
									);
									$customPosts = get_posts($args);
									if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>
										<li>
											<a href="<?php the_permalink(); ?>">
												<?php if (has_post_thumbnail()) : ?>
													<span class="thumb" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></span>
												<?php else : ?>
													<span class="thumb" style="background-image: url(<?php echo HOME ;?>img/common/no_img.jpg)"></span>
												<?php endif ; ?>
												<span class="title"><?php the_title(); ?></span>
											</a>
										</li>
									<?php endforeach; ?>
									<?php else : //記事が無い場合 ?>
										 <li>記事はまだありません。</li>
									<?php endif;
									wp_reset_postdata(); //クエリのリセット ?>
								</ul>
							</dd>
						</dl>
					</div>
					<div class="btn estimate mt30">
					<a href="<?php echo HOME; ?>shoplist/"><img src="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png" srcset="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png 1x, <?php echo HOME; ?>img/common/btn_estimate_02_sp.png 679w" alt="無料見積もりのご予約はコチラ"></a>
				</div>
				</section>
				<!-- //sec_01 -->
				

				
				<section id="sec_02">
					<h4 class="title bg_green"><img src="<?php echo HOME; ?>img/service/sublead_02_pc.jpg" alt="法定点検" srcset="<?php echo HOME; ?>img/service/sublead_02_pc.jpg 1x, <?php echo HOME; ?>img/service/sublead_02_sp.jpg 679w"></h4>
					<div class="container">
						<div class="flex outline">
							<div class="img"><img src="<?php echo HOME; ?>img/service/image_01_pc.jpg" alt="点検中のイラスト" srcset="<?php echo HOME; ?>img/service/image_01_pc.jpg 1x, <?php echo HOME; ?>img/service/image_01_sp.jpg 679w"></div>
							<div class="txt">
								<h5>車検だけでなく、１２ヶ月の法定点検も車検館にお任せください。</h5>
								<p>車検を2年に1回の人間ドックに例えるならば、法定点検は年に一度の健康診断です</p>
								<div class="btn blue arrow_r"><a href="<?php echo HOME; ?>service/new-system/">法定点検ページへ</a></div>	
							</div>
						</div>
					</div>
				</section>
				<!-- //sec_02 -->

				<section id="sec_03">
					<h4 class="title bg_green"><img src="<?php echo HOME; ?>img/service/sublead_03_pc.jpg" alt="自動車保険" srcset="<?php echo HOME; ?>img/service/sublead_03_pc.jpg 1x, <?php echo HOME; ?>img/service/sublead_03_sp.jpg 679w"></h4>
					<div class="container">
						<div class="flex outline">
							<div class="img"><img src="<?php echo HOME; ?>img/service/image_02_pc.jpg" alt="家族のイラスト" srcset="<?php echo HOME; ?>img/service/image_02_pc.jpg 1x, <?php echo HOME; ?>img/service/image_02_sp.jpg 679w"></div>
							<div class="txt">
								<h5>自動車保険も車検館にお任せください。</h5>
								<p>車検館では、車検を受ける際に必要な自賠責保険（自動車損害賠償責任保険）だけでなく、任意保険（自動車保険）も取り扱っております。</p>
								<div class="btn blue arrow_r"><a href="<?php echo HOME; ?>service/carinsurance/">自動車保険ページへ</a></div>	
							</div>
						</div>
					</div>
				</section>
				<!-- //sec_03 -->

				<section id="sec_04">
					<h4 class="title bg_green"><img src="<?php echo HOME; ?>img/service/sublead_04_pc.jpg" alt="住所変更（変更登録）" srcset="<?php echo HOME; ?>img/service/sublead_04_pc.jpg 1x, <?php echo HOME; ?>img/service/sublead_04_sp.jpg 679w"></h4>
					<div class="container">
						<div class="flex outline">
							<div class="img"><img src="<?php echo HOME; ?>img/service/image_03_pc.jpg" alt="自宅のイラスト" srcset="<?php echo HOME; ?>img/service/image_03_pc.jpg 1x, <?php echo HOME; ?>img/service/image_03_sp.jpg 679w"></div>
							<div class="txt">
								<h5>お車の住所変更の手続きについても、車検館がサポートをさせていただきます。</h5>
								<div class="btn blue arrow_r"><a href="<?php echo HOME; ?>service/change-address/">住所変更の手続きページへ</a></div>	
							</div>
						</div>
					</div>
				</section>
				<!-- //sec_03 -->

				<div class="btn estimate">
					<a href="<?php echo HOME; ?>shoplist/"><img src="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png" srcset="<?php echo HOME; ?>img/common/btn_estimate_02_pc.png 1x, <?php echo HOME; ?>img/common/btn_estimate_02_sp.png 679w" alt="無料見積もりのご予約はコチラ"></a>
				</div>
			</div>	

		</div>

<?php get_footer(); ?>