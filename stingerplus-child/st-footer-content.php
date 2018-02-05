<!-- フッターのメインコンテンツ -->
<p>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a>
</p>
<h3>
<img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png">
</h3>
<?php get_template_part( 'st-header-widget' ); //電話番号とヘッダー用ウィジェット ?>