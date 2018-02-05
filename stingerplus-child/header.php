<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>
<html class="i7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>
<html class="ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>>
	<!--<![endif]-->
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
		<meta charset="<?php bloginfo( 'charset' ); ?>" >
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
		<meta name="format-detection" content="telephone=no" >
		
		<?php if ( is_home() && !is_paged() ): ?>
			<meta name="robots" content="index,follow">
		<?php elseif ( is_search() or is_404() ): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( !is_category() && is_archive() ): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( is_paged() ): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( trim($GLOBALS["stdata9"]) !== '' &&  ($GLOBALS["stdata9"]) == $post->ID ): ?>
			<meta name="robots" content="noindex,follow">
		<?php elseif ( is_category() && trim($GLOBALS["stdata15"]) !== ''): ?>
			<meta name="robots" content="noindex,follow">
		<?php endif; ?>

		<link rel="alternate" type="application/rss+xml" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" >
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400' rel='stylesheet' type='text/css'>
		<?php include_once( "st-font.php" ) //googlefont ?>
		<!--[if lt IE 9]>

		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/js/html5shiv.js"></script>
		<![endif]-->
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		<?php wp_head(); ?>
		<?php include_once( "analyticstracking.php" ) //アナリティクスコード ?>
		<?php get_template_part( 'st-ogp' ); //OGP設定 ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri() ?>/js/custom.js"></script>
	</head>
	<body <?php body_class(); ?> >
	
		<div id="wrapper" class="<?php st_wrap_class(); ?>">
			<header id="<?php st_head_class(); ?>">
			<div class="clearfix" id="headbox">
			<!-- アコーディオン -->
			<div class="sp" id="nav-drawer">
					<input id="nav-input" type="checkbox" class="nav-unshown">
					<label id="nav-open" for="nav-input"><span></span></label>
					<label class="nav-unshown" id="nav-close" for="nav-input"></label>
					<div id="nav-content">
						<?php if ( is_active_sidebar( 10 ) ) { ?>
						<div class="side-topad">
							<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 10 ) ) : else : //サイドバートップのみのウィジェット ?>
							<?php endif; ?>
						</div>
						<?php } ?>
					</div>
				</div>
			<!-- /アコーディオン -->
			<a class="sp search-icon" href="#modal-p01"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/svg/search-white.svg" ></a>
				<section class="modal-window" id="modal-p01">
					<div class="modal-inner">
						<?php get_search_form(); ?>
					</div>
					<a href="#!" class="modal-close">&times;</a>
				</section>

			<div id="header-l">
				<!-- ロゴ又はブログ名 -->
				<p class="sitename"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img class="pc" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png" >
						<img class="sp" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-white.png" >
					</a></p>

			</div><!-- /#header-l -->
			<div id="header-r" class="smanone">
				<?php if ( isset($GLOBALS['stdata43']) && $GLOBALS['stdata43'] === 'yes' ) {
					get_template_part( 'st-footer-link' ); //フッターリンク 
				} ?>
				<?php get_template_part( 'st-header-widget' ); //電話番号とヘッダー用ウィジェット ?>
			</div><!-- /#header-r -->
			</div><!-- /#clearfix -->
				<?php get_template_part( 'st-header-image' ); //カスタムヘッダー画像 ?>
				<?php //カテゴリ表示
						if ( isset($GLOBALS['stdata60']) && $GLOBALS['stdata60'] === 'yes' ) {

						} else {

						$categories = get_the_category();
						$separator = ' ';
						$output = ''; ?>
				<p class="st-catgroup sp">
					<?php
							if ( $categories ) {
							foreach( $categories as $category ) {
							$output .= '<a href="' . get_category_link( $category->term_id ) . '" title="'
							. esc_attr( sprintf( "View all posts in %s", $category->name ) )
							. '"><span class="catname st-catid' . $category->cat_ID . '">' . $category->cat_name . '</span></a>' . $separator;
							}
							echo trim( $output, $separator );
							} ?>
				</p>
				<?php
						} //カテゴリ表示ここまで
						?>

			</header>