<?php $args = array(
	'numberposts' => 5, //表示（取得）する記事の数
	'post_type' => 'works' //投稿タイプの指定
);
$customPosts = get_posts($args);
if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>
<li class="clickable">
	<dl>
		<dt><a href="<?php the_permalink() ?>"><?php $lists = wp_get_post_terms($post->ID,'works-cat'); ?><?php foreach($lists as $list): ?><?php echo esc_attr($list->name); ?><?php endforeach; ?></a></dt>
		<?php if( get_field('after_img') ) { ?>
		<?php $after_img = wp_get_attachment_image_src(get_field('after_img'), 'thumbnail'); ?>
		<dd class="photo"><img src="<?php echo $after_img[0]; ?>" alt="" /></dd>
		<?php } else { ?>
		<dd class="photo"><img src="<?php echo HOME; ?>img/thumbnail/no_img.jpg" alt="no image" /></dd>
		<?php } ?>
		<dd class="text"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time><br><?php the_title(); ?></dd>
	</dl>
</li>
<?php endforeach; ?>
<?php else : //記事が無い場合 ?>
	 <li>記事はまだありません。</li>
<?php endif;
wp_reset_postdata(); //クエリのリセット ?>