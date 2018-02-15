<?php

		global $wp_query;
		if( isset ( $wp_query ) ){
			if( is_single() or is_page() ){
				$postID = get_the_ID();
				$column1 = get_post_meta( $postID, 'columnck', true );
			}else{
				$column1 = '';
			}

		$stdata11 = get_option( 'st-data11' );
		if ( ( is_home() && $stdata11 === 'yes' ) || ( $column1 === 'yes' && !is_home() && !is_archive() ) ) {
		} elseif ( ( is_home() && $stdata11 === 'lp' ) || ( $column1 === 'lp' && !is_home() && !is_archive() ) ) {
		} else {
	
	?>
<div id="side">
	<aside>

		<?php if ( is_active_sidebar( 10 ) ) { ?>
			<div class="side-topad">
				<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 10 ) ) : else : //サイドバートップのみのウィジェット ?>
				<?php endif; ?>
			</div>
		<?php } ?>



		<?php get_template_part( 'kanren' ); ?>

		<div id="mybox">
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 1 ) ) : else : //サイドウイジェット読み込み ?>
			<?php endif; ?>
		</div>

		<div id="scrollad">
			<?php get_template_part( 'popular-thumbnail-sc' ); //任意のエントリ ?>
			<?php get_template_part( 'scroll-ad' ); //追尾式広告 ?>
			<?php if ( isset($GLOBALS['stplus']) && $GLOBALS['stplus'] === 'yes' ) {
				get_template_part( 'st-rank-side' ); //ランキング
			} ?>

		</div>
	</aside>
</div>
<!-- /#side -->
<?php }
} ?>
