<?php 
/*
 GLOBIS Theme - Version: 1.0
*/

//テーマセットアップ
function gdtheme_setup() {
  
  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );

  // This theme uses a custom image size for featured images, displayed on "standard" posts.
  add_theme_support( 'post-thumbnails' );

  // サムネイルを追加
  //add_image_size( 'square', 480, 480, true );
  //add_image_size( 'rectangle', 480, 320, true );

}
add_action( 'after_setup_theme', 'gdtheme_setup' );

//サムネイル画像の画質(圧縮率)を変更
function jpeg_quality_callback($arg) {
  return (int)100;
}
add_filter('jpeg_quality', 'jpeg_quality_callback');

//プラグインの更新を非表示/
add_action('admin_menu', 'remove_counts');
function remove_counts(){
  global $menu,$submenu;
  $menu[65][0] = 'プラグイン';
  $submenu['index.php'][10][0] = '更新';
}

//wp_head非表示項目
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); //分割ページへのリンク
remove_action('wp_head', 'feed_links_extra',3,0); //RSSフィード
remove_action('wp_head', 'rsd_link'); //Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); //Windows Live Writer
remove_action('wp_head', 'wp_generator'); //WordPressのバージョン
remove_action('wp_head', 'index_rel_link'); //indexへのリンク
remove_action('wp_head', 'parent_post_rel_link'); //分割ページへのリンク
remove_action('wp_head', 'start_post_rel_link'); //分割ページへのリンク
remove_action('wp_head', 'feed_links',2); //サイト全体のフィード
remove_action('wp_head', 'feed_links_extra',3); //その他のフィード
// Since 4.4
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','rest_output_link_wp_head'); //Embed対応
remove_action('wp_head','wp_oembed_add_host_js');
remove_action('template_redirect', 'rest_output_link_header', 11 );

//カテゴリーの階層を保持
function wp_category_terms_checklist_no_top( $args, $post_id = null ) {
  $args['checked_ontop'] = false;
  return $args;
}
add_action( 'wp_terms_checklist_args', 'wp_category_terms_checklist_no_top' );
 
//ヘッダーにcommonを読み込む
function common_scripts() {
  if(!is_admin()){
    // wp_deregister_script( 'jquery' );
    // wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');
    // wp_enqueue_script('useful',esc_url(home_url('/')).'js/useful.js');
    // wp_enqueue_script('como',esc_url(home_url('/')).'js/common.js');
    // wp_enqueue_script('pkgd',esc_url(home_url('/')).'js/imagesloaded.pkgd.min.js');
    // wp_enqueue_script('mheight',esc_url(home_url('/')).'js/jquery.matchHeight-min.js');
  }
}
add_action('wp_print_scripts','common_scripts');

function common_styles() {
  if(!is_admin()){
    //wp_enqueue_style('awesome','https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css');
    //wp_enqueue_style('sasstyle',esc_url(home_url('/')).'css/style.css'); //sassテンプレート
    wp_enqueue_style('builtin',esc_url(get_stylesheet_uri()));
  }
}
add_action('wp_print_styles','common_styles');
 
//年月日アーカイブのタイトル日本語表記を整える
function ja_date_wp_title($title, $sep, $seplocation) {
  $year = get_query_var('year');
  $monthnum = get_query_var('monthnum');
  $day = get_query_var('day');

  // from wp-includes/general-template.php:wp_title()
  if ( is_archive() && !empty($year) ) {
    $title = $year . "年";
    if ( !empty($monthnum) )
      $title .= zeroise($monthnum, 2) . "月";
    if ( !empty($day) )
      $title .= zeroise($day, 2) . "日";

    if ($seplocation == 'right') {
      $title = $title . ' ' . $sep . ' ';
    } else {
      $title = $sep . ' ' . $title . ' ';
    }
  }

  return $title;
}
add_filter('wp_title', 'ja_date_wp_title', 10, 3);
 
// フィルタの登録
add_filter('content_save_pre','tag_save_pre');
 
function tag_save_pre($content){
  global $allowedposttags;

  // iframeとiframeで使える属性を指定する
  $allowedposttags['iframe'] = array('class' => array () , 'src'=>array() , 'width'=>array(),
  'height'=>array() , 'frameborder' => array() , 'scrolling'=>array(),'marginheight'=>array(),
  'marginwidth'=>array());

  return $content;
}

// 管理者以外「コメント」「ツール」「固定ページ」「MW-WP-Form」を非表示にする
function remove_menus () {
  if (!current_user_can('level_10')) { //管理者以外のユーザーの場合メニューをunsetする
    global $menu;
    unset($menu[25]); // コメント
    unset($menu[75]); // ツール
    unset($menu[20]); // 固定ページ
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // タグ
    remove_menu_page('edit.php?post_type=mw-wp-form'); // MW-WP-Form
  }
}
add_action('admin_menu', 'remove_menus');

// 管理バーから項目を削除する
function mytheme_remove_item( $wp_admin_bar ) {
  if (!current_user_can('level_10')) { //管理者以外のユーザーの場合メニューをunsetする
    $wp_admin_bar->remove_node('new-page'); // 個別ページ
    $wp_admin_bar->remove_node('edit');//固定ページを編集
  }
}
add_action( 'admin_bar_menu', 'mytheme_remove_item', 1000 );

//改行なし、タグ削除、文字数制限
function strim($str,$size=100,$end="...") {
  return mb_strimwidth(esc_html(strip_tags(strip_shortcodes($str))),0,$size,$end,'utf-8');
}
 
//コピーライト年号取得
function get_year($start){
  $year = date('Y');
  if($start != $year){
    return $start.' - '.$year;
  }else{
    return $start;
  }
}

//カスタム分類のラベルをwp_titleから削除
add_filter( 'wp_title', 'fix_wp_title', 10, 3 );
function fix_wp_title($title, $sep, $seplocation){
  global $wp_query;
  if ( is_tax() ) {
    $term = $wp_query->get_queried_object();
    $term = $term->name;
    $title =$term;
    $t_sep = '%WP_TITILE_SEP%'; // Temporary separator, for accurate flipping, if necessary

    $prefix = '';
    if ( !empty($title) )
      $prefix = " $sep ";
    if ( 'right' == $seplocation ) {
      $title_array = explode( $t_sep, $title );
      $title_array = array_reverse( $title_array );
      $title = implode( " $sep ", $title_array ) . $prefix;
    } else {
      $title_array = explode( $t_sep, $title );
      $title = $prefix . implode( " $sep ", $title_array );
    }
  }
  return $title;
}

// wp_list_pages からtitle属性を削除
function delete_list_page_title_attribute( $output ) {
  $output = preg_replace( '/ title="[^"]*"/', '', $output );
  return $output;
}
add_filter( 'wp_list_pages', 'delete_list_page_title_attribute' );

// wp_list_categories からtitle属性を削除
function delete_list_categories_title_attribute( $output ) {
  $output = preg_replace( '/ title="[^"]*"/', '', $output );
  return $output;
}
add_filter( 'wp_list_categories', 'delete_list_categories_title_attribute' );

/***************************************
カスタムショートコード設定　ここから
***************************************/

//ホームURLを出力するショートコード
function user_fields_shortcode_home_url() { 
  return esc_url( home_url( '/' ) );
}
add_shortcode( 'home_url', 'user_fields_shortcode_home_url' );

//テーマディレクトリURLを出力するショートコード
function user_fields_shortcode_themedir() { 
  return esc_url(get_template_directory_uri()).'/';
}
add_shortcode( 'theme_url', 'user_fields_shortcode_themedir' );

//新着読み込み用ショートコード
function block_news() {
  ob_start();
  get_template_part('template-parts/block_news'); // block_news.phpの内容が表示される
  return ob_get_clean();
}
add_shortcode('block_news', 'block_news');

//カスタム投稿1新着読み込み用ショートコード
function block_post1() {
  ob_start();
  get_template_part('template-parts/block_post1'); // block_post1.phpの内容が表示される
  return ob_get_clean();
}
add_shortcode('block_post1', 'block_post1');

/***************************************
カスタムショートコード設定　ここまで
***************************************/

//ホームURLを定数化
define('HOME',esc_url( home_url( '/' ))); //サイトURL＝HOME
define('THEMEDIR',esc_url(get_template_directory_uri()).'/'); //テーマディレクトリURL＝THEMEDIR

//管理画面のWP更新メッセージを非表示に
add_action('admin_print_styles', 'admin_css_custom');
function admin_css_custom() {
  echo '<style>#update-nag, .update-nag{display: none !important;}</style>';
}

//言語ファイルの自動アップデートを停止
add_filter( 'auto_update_translation', '__return_false' );

//固定ページの編集時のみビジュアルエディタを使用できないようにする
function disable_visual_editor_in_page() {
  global $typenow;
  if ( in_array( $typenow,  array( 'page', 'mw-wp-form' ) ) ) {
    add_filter('user_can_richedit', 'disable_visual_editor_filter');
  }
}
function disable_visual_editor_filter() {
  return false;
}
//add_action('load-post.php', 'disable_visual_editor_in_page');
//add_action('load-post-new.php', 'disable_visual_editor_in_page');

//「URL/login」「URL/admin」「URL/dashboard」へのリダイレクト禁止
remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );

//カスタムポストタイプでも管理画面でタクソノミーのドロップダウン
function todo_restrict_manage_posts() {
  global $typenow;
  $args=array( 'public' => true, '_builtin' => false );
  $post_types = get_post_types($args);
  if ( in_array($typenow, $post_types) ) {
    $filters = get_object_taxonomies($typenow);
    foreach ($filters as $tax_slug) {
      $tax_obj = get_taxonomy($tax_slug);
      wp_dropdown_categories(array(
        'show_option_all' => __( $tax_obj->label ),
        'taxonomy' => $tax_slug,
        'name' => $tax_obj->name,
        'orderby' => 'term_order',
        'selected' => $_GET[$tax_obj->query_var],
        'hierarchical' => $tax_obj->hierarchical,
        'show_count' => false,
        'hide_empty' => true
      ));
    }
  }
}
function todo_convert_restrict($query) {
  global $pagenow;
  global $typenow;
  if ($pagenow=='edit.php') {
    $filters = get_object_taxonomies($typenow);
    foreach ($filters as $tax_slug) {
      $var = &$query->query_vars[$tax_slug];
      if ( isset($var) ) {
        $term = get_term_by('id',$var,$tax_slug);
        $var = $term->slug;
      }
    }
  }
  return $query;
}
add_action( 'restrict_manage_posts', 'todo_restrict_manage_posts' );
add_filter('parse_query','todo_convert_restrict');

//記事の表示順を管理画面の並び順にする
function customize_main_query($query) {
  if ( is_admin() || ! $query->is_main_query() )
    return;

  if ( $query->is_search() || $query->is_post_type_archive( array( 'slug1', 'slug2', 'slug3' ) ) || is_tax( array( 'hoge-cat1', 'hoge-cat2', 'hoge-cat3') ) ) {
    $query->set( 'orderby', 'menu_order' );
    $query->set( 'order', 'ASC' );
  }
}
add_action( 'pre_get_posts', 'customize_main_query' );

//固定ページ一覧にスラッグを表示
function add_page_columns_name($columns) {
  $columns['slug'] = "スラッグ";
  return $columns;
}

function add_page_column($column_name, $post_id) {
  if( $column_name == 'slug' ) {
    $post = get_post($post_id);
    $slug = $post->post_name;
    echo attribute_escape($slug);
  }
}
add_filter( 'manage_pages_columns', 'add_page_columns_name');
add_action( 'manage_pages_custom_column', 'add_page_column', 10, 2);

//エディター用CSSを有効にする
function wpdocs_theme_add_editor_styles() {
  add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

//アーカイブの記事数をリンクに含める
add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $output ) {
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$output);
  return $output;
}

//カスタム投稿アーカイブのtitleを書き換える
function my_title($title){
  if(is_post_type_archive('hoge')){
    $title = 'タイトル';
  }
  return $title;
}
add_filter('aioseop_title', 'my_title');

//カスタム投稿アーカイブのdescriptionを書き換える
function my_description($description){
  if(is_post_type_archive('hoge')){
    $description = 'タイトル';
  }
  return $description;
}
add_filter('aioseop_description', 'my_description');

//body_classに現在のページ（スラッグ名）を追加
function pagename_class($classes = '') {
    if (is_page()) {
        $page = get_page(get_the_ID());
        $classes[] = $page->post_name;
    }
    return $classes;
}
add_filter('body_class','pagename_class');

//body_classに祖先のページのスラッグ名を追加
function add_ancestor_class($classes) {
    global $post;
    if (is_page() && (!is_front_page()) ){
        if($post->ancestors){
            foreach($post->ancestors as $post_anc_id){
                $post_id = $post_anc_id;
            }
        } else {
            $post_id = $post->ID;
        }
        $ancestor_post = get_page($post_id);
        $ancestorSlug = $ancestor_post->post_name;
        $classes[] = $ancestorSlug;
    }
    return $classes;
}
add_filter('body_class','add_ancestor_class');

//カテゴリスラッグをbodyクラスに含める ※ 投稿ページのみ
function add_category_slug_to_body_class($classes) {
    global $post;
    if ( is_single() ) {
        foreach((get_the_category($post->ID)) as $category)
            $classes[] = $category->category_nicename;
        }
        return $classes;
    }
add_filter('body_class', 'add_category_slug_to_body_class');

//bodyのclassに、カスタム投稿タイプを挿入
add_filter('body_class','add_posttype_classes');
//フィルターフックbody_classで関数「add_posttype_classes」を呼び出し
function add_posttype_classes($classes) {
    $postype = get_query_var('post_type');   //カスタム投稿タイプを取得
    $classes[] = $postype;   //class名としてカスタム投稿タイプを取得
    if(!$postype ==""){   //カスタム投稿タイプが空じゃなかったら
        $m_key = array_search('home', $classes);  //classにhomeが入っていたら
        unset($classes[${'m_key'}]);  //homeはclass名に入れない
    }
    return $classes;  //class名を返す
}

//親ページのスラッグを判定する
function is_parent_slug() {
    global $post;
    if ($post->post_parent) {
        $post_data = get_post($post->post_parent);
        return $post_data->post_name;
    }
}

//管理画面のロゴ変更
function custom_login_logo() { ?>
  <style>
    body.login {
      background-color: #47c3e5;
    }

    .login #login h1 a {
      width: 213px;
      height: 105px;
      background: url('/img/common/logo_01.svg') no-repeat 0 0;
      -webkit-background-size: 100% auto;
      background-size: 100% auto;
    }

    .login #nav {
      display: none;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_logo' );

/**
 * 投稿ラベルを変更
 */
function custom_post_labels( $labels ) {
  $labels->name = 'お知らせ'; // 投稿
  $labels->singular_name = 'お知らせ'; // 投稿
  $labels->add_new = '新規追加'; // 新規追加
  $labels->add_new_item = 'お知らせを追加'; // 新規投稿を追加
  $labels->edit_item = 'お知らせの編集'; // 投稿の編集
  $labels->new_item = '新規投稿'; // 新規投稿
  $labels->view_item = 'お知らせを表示'; // 投稿を表示
  $labels->search_items = 'お知らせを検索'; // 投稿を検索
  $labels->not_found = 'お知らせが見つかりませんでした。'; // 投稿が見つかりませんでした。
  $labels->not_found_in_trash = 'ゴミ箱内にお知らせが見つかりませんでした。'; // ゴミ箱内に投稿が見つかりませんでした。
  $labels->parent_item_colon = ''; // (なし)
  $labels->all_items = 'お知らせ一覧'; // 投稿一覧
  $labels->archives = 'お知らせアーカイブ'; // 投稿アーカイブ
  $labels->insert_into_item = 'お知らせに挿入'; // 投稿に挿入
  $labels->uploaded_to_this_item = 'このお知らせへのアップロード'; // この投稿へのアップロード
  $labels->featured_image = 'アイキャッチ画像'; // アイキャッチ画像
  $labels->set_featured_image = 'アイキャッチ画像を設定'; // アイキャッチ画像を設定
  $labels->remove_featured_image = 'アイキャッチ画像を削除'; // アイキャッチ画像を削除
  $labels->use_featured_image = 'アイキャッチ画像として使用'; // アイキャッチ画像として使用
  $labels->filter_items_list = 'お知らせリストの絞り込み'; // 投稿リストの絞り込み
  $labels->items_list_navigation = 'お知らせリストナビゲーション'; // 投稿リストナビゲーション
  $labels->items_list = 'お知らせリスト'; // 投稿リスト
  $labels->menu_name = 'お知らせ'; // 投稿
  $labels->name_admin_bar = 'お知らせ'; // 投稿
  return $labels;
}
add_filter( 'post_type_labels_post', 'custom_post_labels' );

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => '重要なお知らせ',
		'menu_title' => '重要なお知らせ',
		'menu_slug' => 'theme-options',
		'capability' => 'edit_posts',
		'parent_slug' => '',
		'position' => false,
		'icon_url' => false,
		'redirect' => false
	) );
}

function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
    if ( $query->is_archive('qalist') ) { //カスタム投稿タイプ
        $query->set( 'posts_per_page', '-1' ); //全件表示
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

//srcsetでショートコードを有効にする  
add_filter( 'wp_kses_allowed_html', 'my_wp_kses_allowed_html', 10, 2 );
function my_wp_kses_allowed_html( $tags, $context ) {
  $tags['img']['srcset'] = true;
  return $tags;
}

function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file.php");
    return ob_get_clean();
}
 
add_shortcode('myphp', 'Include_my_php');

function my_tiny_mce_before_init( $init_array ) {
    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    return $init_array;
}
add_filter( 'tiny_mce_before_init' , 'my_tiny_mce_before_init' );
