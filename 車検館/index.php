<div class="breadcrumbs">
				<ol>
					<li><a href="<?php echo HOME; ?>"><i class="fas fa-home"></i></a></li>
					<?php if( is_page() && $post->ancestors ) { $parents = array_reverse($post->ancestors); //階層化された固定ページ表示時に親ページをすべて表示
					foreach ($parents as $parent) { ?>
					<li><a href="<?php echo esc_url( get_permalink( $parent ) ); ?>"><?php echo esc_html(get_the_title($parent)); ?></a></li>
					<?php } unset($parent); ?>

					<?php }elseif(is_singular( 'service' ) || is_tax( 'service_cat' ) ) { /*カスタム投稿投稿タイプservice｜カスタムタクソノミーservice_cat*/ ?>
					<li><a href="<?php echo esc_html( get_post_type_archive_link( 'service' ) ); ?>"><?php echo esc_html( get_post_type_object( 'service' )->label ); ?></a></li>

					<?php }elseif(is_singular( 'shoplist' ) || is_tax( 'shoplist_cat' ) ) { /*カスタム投稿投稿タイプshoplist｜カスタムタクソノミーshoplist_cat*/ ?>
					<li><a href="<?php echo esc_html( get_post_type_archive_link( 'shoplist' ) ); ?>"><?php echo esc_html( get_post_type_object( 'shoplist' )->label ); ?></a></li>

					<?php }elseif(is_singular( 'qalist' ) || is_tax( 'qalist_cat' ) ) { /*カスタム投稿投稿タイプshoplist｜カスタムタクソノミーshoplist_cat*/ ?>
					<li><a href="<?php echo esc_html( get_post_type_archive_link( 'qalist' ) ); ?>"><?php echo esc_html( get_post_type_object( 'qalist' )->label ); ?></a></li>

					<?php } elseif (is_single() || is_date()) { $current_cat = get_the_category();  $current_cat = $current_cat[0]->term_id; /*詳細ページ｜日付アーカイブ*/?>
					<li><a href="<?php echo esc_html( get_category_link( $current_cat ) ); ?>"><?php echo esc_html(get_cat_name($current_cat)); ?></a></li>
					<?php } ?>
					<li><?php wp_title('',true,'right'); ?></li>
				</ol>
			</div>