<?php 
/*
 Shakenkan Theme - Version: 1.1
*/
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6 lt_ie10 lt_ie9 lt_ie8 lt_ie7" lang="ja" prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if IE 7 ]> <html class="ie7 lt_ie10 lt_ie9 lt_ie8" lang="ja" prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if IE 8 ]> <html class="ie8 lt_ie10 lt_ie9" lang="ja" prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if IE 9 ]> <html class="ie9 lt_ie10" lang="ja" prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ja" prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml"> <!--<![endif]-->
<head>
<!-- Google Tag Manager 2020.3-->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KR8ZHFK');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NHJH23B');</script>
<!-- End Google Tag Manager -->

<meta charset="UTF-8">
<title></title>

<?php if(is_post_type_archive( 'shoplist' ) ) { /*カスタム投稿投稿タイプservice｜カスタムタクソノミーservice_cat*/ ?>
<meta name="description"  content="車検館の店舗一覧。お近くの車検館店舗の住所、電話番号、フリーダイヤルの一覧がございます。無料見積りのご予約もこちらからどうぞ。" />
<?php } ?>

<?php if(is_post_type_archive( 'service' ) ) { /*カスタム投稿投稿タイプservice｜カスタムタクソノミーservice_cat*/ ?>
<meta name="description"  content="10年以上にわたり、地域の皆様よりご愛顧を頂いている車検専門店「車検館」。このページを見れば、その理由がわかります。当日も車検後もおトクな車検なら車検館へ。" />
<?php } ?>

<?php if(is_post_type_archive( 'qalist' ) ) { /*カスタム投稿投稿タイプservice｜カスタムタクソノミーservice_cat*/ ?>
<meta name="description"  content="車検に関するさまざまな疑問をQ&A形式で解説。車検館は車検の専門店です。全店、最新設備を揃えた指定工場で国家資格検査員がその場で検査します。安心して整備をお任せ下さい。インターネットからの無料見積り予約、1年間または1万キロの整備保証実施中です。" />
<?php } ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">
	var ua = navigator.userAgent;
	if((ua.indexOf('Android') > 0 && ua.indexOf('Mobile') == -1) || ua.indexOf('iPad') > 0 || ua.indexOf('Kindle') > 0 || ua.indexOf('Silk') > 0){
		document.write('<meta name="viewport" content="width=1100, user-scalable=1">');
	}else{
		document.write('<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1">');
	}
</script>
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="shortcut icon" href="<?php echo HOME; ?>favicon.ico">
<?php wp_head(); ?>

<?php if(is_singular( 'shoplist' ) || is_tax( 'shoplist_cat' ) ) { /*カスタム投稿投稿タイプshoplist｜カスタムタクソノミーshoplist_cat*/ ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<?php } ?>

<?php $q = filemtime( 'css/style.css'); ?>
<link rel="stylesheet" href="<?php echo HOME; ?>css/style.css?<?php echo $q ?>">
<link rel="stylesheet" href="<?php echo HOME; ?>css/slick.css">
<link rel="stylesheet" id="awesome-css" href="<?php echo HOME; ?>css/fontawesome-all.min.css" type="text/css" media="all">
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) 2020.3-->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KR8ZHFK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->	
<noscript><div class="noscript"><p>当サイトを快適にご利用いただくには、ブラウザでJavaScriptを有効にしてください。</p></div></noscript>
<div class="legacy_ie_message"><p>お使いのブラウザはサポート対象外です。推奨のブラウザをご利用ください。</p></div>

<header class="site_header">
	<div class="inner clear_fix">
		<div class="site_id"><a href="<?php echo HOME; ?>"><img src="<?php echo HOME; ?>img/common/logo.png" alt="PIT 45 SHAKEN 車検館"></a></div>
		<div class="btn_estimate"><a href="<?php echo HOME; ?>shoplist/"><img src="<?php echo HOME; ?>img/common/btn_estimate_01_pc.png" alt="無料見積もりのご予約はコチラ"></a></div>
		<nav class="header_nav">
			<ul>
				<li><a href="https://www.shakenkan.co.jp/lp/" target="_blank">車検館とは</a></li>
				<li><a href="<?php echo HOME; ?>cost/">車検の費用</a></li>
				<li><a href="<?php echo HOME; ?>workflow/">車検の流れ</a></li>
				<li><a href="<?php echo HOME; ?>shoplist/">店舗</a></li>
				<li><a href="<?php echo HOME; ?>voice/">お客様の声</a></li>
				<li><a href="<?php echo HOME; ?>qalist/">Q&amp;A</a></li>
				<li><a href="<?php echo HOME; ?>service/">メンテナンスメニュー</a></li>
				<li><a href="<?php echo HOME; ?>recruit/">採用情報</a></li>
			</ul>
		</nav>
		<div class="sp_menu sp_inline_block"><a src="javascript:void(0);" class="btn_menu"><span></span><span></span><span></span></a></div>
	</div>
</header>

<main role="main">

	<?php if(is_front_page() && !is_paged()) { /*トップページ*/ ?>

		<!-- home_content -->
		<section class="home_content">

	<?php } else { ?>

		<!-- page_content -->
		<section class="page_content">
		
			<?php if(!is_front_page()){ //パンくず表示開始 ?>
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
			<?php } //パンくず表示終わり?>

	<?php } ?>
