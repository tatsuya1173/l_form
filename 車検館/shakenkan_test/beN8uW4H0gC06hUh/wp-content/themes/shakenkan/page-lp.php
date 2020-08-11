<?php
/**
Template Name: LP
 */

function cm_wp_enqueue_scripts() {
    wp_enqueue_style('builtin',esc_url( home_url( '/css/lp-style.css' ) ));
    wp_enqueue_script( 'toggle', home_url( '/js/toggle.js' ), array(), '1.0', true );
    wp_enqueue_script( 'lp', home_url( '/js/lp.js' ), array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'cm_wp_enqueue_scripts', 105 );
?>
  <!DOCTYPE html>
  <html>

  <head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
              new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-KR8ZHFK');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=750, user-scalable=no, target-densitydpi=device-dpi">
      <title>車検館 | Wで楽チン♪ 車検・整備専門店</title>
      <meta name="description" content="車検館は車検の専門店です。全店、最新設備を揃えた指定工場で国家資格検査員がその場で検査します。安心して整備をお任せ下さい。">
      <meta name="keywords" content="車検,検査,自動車,費用,整備,保険,点検">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--datepickercss-->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css">

    <!--webfont-->
    <link href="//fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//use.typekit.net/grv6btt.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css">

    <!--webicon-->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.9.0/css/all.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/js/drawer.min.js"></script>

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
      <?php wp_head(); ?>
  </head>

<body id="body">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KR8ZHFK"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
  <!--datepicker-->
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.drawer').drawer();
    });

  </script>
  <?php wp_footer(); ?>
</body>
</html>
