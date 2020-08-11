				<?php $news_posts = new WP_Query( 'posts_per_page=10' ); if ( $news_posts->have_posts() ) : ?>
				<section id="news">
					<h1><img src="<?php echo HOME ;?>img/index/title_05.png" alt="お知らせ"></h1>
					<div class="news_inner">
						<ul>
							<?php while ( $news_posts->have_posts() ) : $news_posts->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>" class="clear_fix">
									<dl>
										<dt><time><?php the_time('Y.m.d'); ?></time></dt>
										<dd><?php the_title(); ?></dd>
									</dl>
									<span class="more">＞もっと詳しく</span>
								</a>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<div class="illust"><img src="<?php echo HOME ;?>img/index/illust_07.png" alt="男性と店員とPITくんの後ろ姿"></div>
				</section>
				<!-- //news -->
				<?php wp_reset_postdata(); else : echo '<p>まだ記事はありません。</p>'; endif; ?>