<?php 
/*
 Shakenkan Theme - Version: 1.1
*/
?>
		
	</section>
	<!-- //home_content page_content -->

</main>

<div class="page_top"><a href="#" onclick="PUNITED.useful.jumpToPageTop();return false;"><i class="fas fa-chevron-up"></i></a></div>

<footer class="site_footer">

	<div class="shoplist">
		<div class="inner">
			<ul class="flex">
				<li>
					<a href="<?php echo HOME; ?>shoplist/horinouchi/">堀之内店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-45-7170" class="tel">0120-45-7170</a></dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="<?php echo HOME; ?>shoplist/fuchu/">府中店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-45-7180" class="tel">0120-45-7180</a></dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="<?php echo HOME; ?>shoplist/tanashi/">西東京田無店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-45-7160" class="tel">0120-45-7160</a></dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="<?php echo HOME; ?>shoplist/itabashi/">板橋店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-45-7191" class="tel">0120-45-7191</a></dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="<?php echo HOME; ?>shoplist/inagi/">稲城店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-45-7175" class="tel">0120-45-7175</a></dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="<?php echo HOME; ?>shoplist/tachikawa/">立川店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-16-4571" class="tel">0120-16-4571</a></dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="<?php echo HOME; ?>shoplist/edogawa/">江戸川中央店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-45-7110" class="tel">0120-45-7110</a></dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="<?php echo HOME; ?>shoplist/minamimachida/">南町田店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-45-7188" class="tel">0120-45-7188</a></dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="<?php echo HOME; ?>shoplist/yamato/">大和店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-52-8810" class="tel">0120-52-8810</a></dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="<?php echo HOME; ?>shoplist/kasukabe/">春日部店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0120-45-1989" class="tel">0120-45-1989</a></dd>
						</dl>
					</a>
				</li>
<li>
					<a href="<?php echo HOME; ?>shoplist/kashiwa/">柏店</a>
						<dl>
							<dt>ご予約・お問合せ</dt>
							<dd><a href="tel:0800-800-6225" class="tel">0800-800-6225</a></dd>
						</dl>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="flinks">
		<div class="inner">
			<aside>
				<ul class="clear_fix">
					<li><a href="<?php echo HOME; ?>">トップページ</a></li>
					<li><a href="<?php echo HOME; ?>cost/">車検の費用</a></li>
					<li><a href="<?php echo HOME; ?>workflow/">車検の流れ</a></li>
					<li><a href="<?php echo HOME; ?>documents/">必要書類</a></li>
					<li><a href="<?php echo HOME; ?>shoplist/">店舗案内</a></li>
					<li><a href="<?php echo HOME; ?>voice/">お客様の声</a></li>
					<li><a href="<?php echo HOME; ?>qalist/">Q&amp;A</a></li>
					<li><a href="<?php echo HOME; ?>service/">車検館のサービス・メンテナンス</a></li>
					<li><a href="<?php echo HOME; ?>news/">お知らせ</a></li>
					<li><a href="<?php echo HOME; ?>company/">会社概要</a></li>
					<li><a href="<?php echo HOME; ?>ir/">決算公告</a></li>
					<li><a href="<?php echo HOME; ?>privacy/">プライバシーポリシー</a></li>
					<li><a href="<?php echo HOME; ?>recruit/">自動車整備士 採用情報</a></li>
					<li><a href="<?php echo HOME; ?>inquiry/">お問合せ・ご質問</a></li>
				</ul>
			</aside>
		</div>
		<div class="copyright">Copyright Shakenkan CO.LTD.</div>
	</div>

</footer>

<script src="<?php echo HOME; ?>js/script.js"></script>
<script src="<?php echo HOME; ?>js/slick.min.js"></script>

<?php if(is_front_page() && !is_paged()) { /*トップページ*/ ?>
<script src="<?php echo HOME; ?>js/top.js"></script>
<?php } elseif(is_singular( 'shoplist' )) { ?>
<script>
$(function(){
	$('.slideshow ul').slick({
		autoplay: true,
		autoplaySpeed: 4000,
		centerMode: true,
		centerPadding: '5px',
		variableWidth: true,
		dots: true,
		dotsClass: 'slick-dots',
		arrows: true,
		infinite: true,
		slidesToShow: 1,
		appendArrows: '#arrows',
		prevArrow: '.slick-prev',
		nextArrow: '.slick-next',
		responsive: [
			{
				breakpoint: 679,
				settings: {
					centerPadding: '0',
					centerMode: false,
					variableWidth: false,
					slidesToShow: 1
				}
			}
	    ]
	});

	if( PUNITED.useful.isSmartPhone() ) {
		PUNITED.common.togglePosFix();
	}
});
</script>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>