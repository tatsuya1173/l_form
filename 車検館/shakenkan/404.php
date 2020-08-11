<?php 
/*
 Shakenkan Theme - Version: 1.1
*/
get_header(); ?>

		<div class="inner">

			<div class="page_title">
				<h1>404 Not Found - ページが見つかりませんでした</h1>
			</div>

			<section id="notfound">
				<p>指定されたページまたは<br class="pc_none">ファイルは存在しません。</p>
				<p>URL、ファイル名にタイプミスがないか<br class="pc_none">ご確認ください。<br>
				指定されたページは削除されたか、<br class="pc_none">移動した可能性があります。</p>
				<div class="btn_area">
						<div class="btn top"><a href="<?php echo HOME ;?>"><img src="<?php echo HOME ;?>img/shoplist/btn_top_01_pc.png" srcset="<?php echo HOME ;?>img/shoplist/btn_top_01_pc.png 1x, <?php echo HOME ;?>img/shoplist/btn_top_01_sp.png 679w" alt="TOPへもどる" /></a></div>
					</div>
			</section>

<?php get_footer(); ?>