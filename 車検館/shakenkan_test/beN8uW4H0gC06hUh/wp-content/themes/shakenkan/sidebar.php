<?php 
/*
 Shakenkan Theme - Version: 1.1
*/
?>
<aside id="side">
  <h1>サイドメニュー</h1>
  <nav>
    <h3>検索</h3>
    <?php get_search_form(); ?>
  </nav>
  <nav>
    <h3>カテゴリー別アーカイブ</h3>
    <ul>
      <?php wp_list_categories('title_li='); ?>
    </ul>
  </nav>
  <nav>
    <h3>月別アーカイブ</h3>
    <ul>
      <?php wp_get_archives(); ?>
    </ul>
  </nav>
  <nav>
    <h3>タクソノミー別アーカイブ</h3>
    <ul>
     <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'hoge')); ?>
    </ul>
  </nav>
  <nav>
    <h3>最新記事</h3>
    <div class="new_post">
      <?php $args = array(
        'numberposts' => 3, //表示（取得）する記事の数
        'post_type' => 'post' //投稿タイプの指定
      );
      $news_posts = get_posts($args);
      if($news_posts) : foreach($news_posts as $post) : setup_postdata( $post ); ?>
      
      <a href="<?php the_permalink(); ?>">
        <dl>
          <dt><?php the_time('Y/m/d'); ?></dt>
          <dd><?php the_title(); ?></dd>
        </dl>
      </a>
      <?php endforeach; ?>
      <?php else : //記事が無い場合 ?>
      <p>記事はまだありません。</p>
      <?php endif; 	wp_reset_postdata(); //クエリのリセット ?>
    </div><!-- / .new_post -->
  </nav>
  <nav>
    <h3>投稿カレンダー</h3>
    <?php get_calendar(); ?>
  </nav>
</aside><!-- / #side -->
