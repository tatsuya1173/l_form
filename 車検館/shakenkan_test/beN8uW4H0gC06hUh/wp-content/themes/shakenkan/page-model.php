<?php 
/*
 Template Name: model
*/
get_header(); ?>

<div class="inner">
	<div class="wrap_bnr">
		<div class="bnr_cmp">
			<a href="https://shaken-yoyaku.com/index.php">
				<img src="<?php echo HOME; ?>img/model/bnr_reserve.jpg" alt="予約バナー">
			</a>
		</div>
	</div>
</div>

<?php
$first = true;
if(have_posts()):
  while(have_posts()):
    the_post();

  if($first){
    $first = false;
remove_filter('the_content','wpautop');
the_content();
add_filter('the_content','wpautop');
  }
  else
    the_excerpt();
  endwhile;
endif;
?>

<div class="inner">
	<div class="wrap_bnr bt">
		<div class="bnr_cmp">
			<a href="https://shaken-yoyaku.com/index.php">
				<img src="<?php echo HOME; ?>img/model/bnr_reserve.jpg" alt="予約バナー">
			</a>
		</div>
		<div class="bnr_search">
			<a href="<?php echo HOME; ?>shoplist/">
				<img src="<?php echo HOME; ?>img/model/bnr_search.png" alt="店舗を探す">
			</a>
		</div>
		<div class="bnr_others">
			<div class="bnr_must">
				<a href="<?php echo HOME; ?>documents/">
					<img src="<?php echo HOME; ?>img/model/bnr_must.png" alt="車検に必要なもの">
				</a>
			</div>
			<div class="bnr_flow">
				<a href="<?php echo HOME; ?>workflow/">
					<img src="<?php echo HOME; ?>img/model/bnr_flow.png" alt="車検の流れはこちら">
				</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>