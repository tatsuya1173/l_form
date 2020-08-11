				<?php if( get_field('important_regist','option') ): ?>

					<div id="important_regist">
						<dl>
							<dt>重要なお知らせ</dt>
							<dd class="clear_fix">
								<?php if( get_field('notice_image','option') ): ?>
								<div class="img float_l">
									<?php $notice_image = wp_get_attachment_image_src(get_field('notice_image','option'), 'large' ); ?>
									<img src="<?php echo $notice_image[0]; ?>" alt="">
								</div>
								<?php endif; ?>
								<div class="txt">
									<?php the_field('notice_txt', 'option'); ?>
								</div>
							</dd>
						</dl>
					</div>

				<?php endif; ?>