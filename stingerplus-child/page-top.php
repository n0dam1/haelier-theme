<?php
		/*
		Template Name: top
		*/
		?>

<?php get_header(); ?>

<div id="content" class="clearfix">
	<div id="contentInner">

		<main <?php st_text_copyck(); ?>>
			<article>
				<div id="post-<?php the_ID(); ?>" <?php st_post_class(); ?>>

		<?php //アイキャッチ画像を挿入
		if( is_single() or is_page() ){
			$postID = $wp_query->post->ID;
			$eyecatchset = get_post_meta( $postID, 'eyecatch_set', true );
		}else{
			$eyecatchset = '';
		} 
		if ( has_post_thumbnail() && (( isset($GLOBALS['stdata53']) && $GLOBALS['stdata53'] === 'yes' ) || ( isset( $eyecatchset ) && $eyecatchset === 'yes' ))) { ?>
			<div class="st-eyecatch"><?php the_post_thumbnail('full'); ?>
			</div>
				
		<?php } //アイキャッチ画像を挿入ここまで ?>

					<!--ループ開始 -->
					<?php if (have_posts()) : while (have_posts()) :
					the_post(); ?>
					<div class="mainbox">

						<?php the_content(); //本文 ?>

						<?php //クレジット表示
						if( is_single() or is_page() ){
							$stcopyurl = get_post_meta( $postID, 'st_copyurl', true );
						}else{
							$stcopyurl = '';
						} if( trim( $stcopyurl ) !== '' ) { ?>
							<p class="eyecatch-copyurl"><?php echo stripslashes( $stcopyurl ); ?></p>
						<?php } //クレジット表示ここまで ?>

						<?php if ( is_active_sidebar( 5 ) ) { ?>
							<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 5 ) ) : else : //投稿ページ一括ウィジェット ?>
							<?php endif; ?>
						<?php } ?>

					</div><!-- .mainboxここまで -->
			<aside>
						<!-- 広告枠 -->
						<div class="adbox">
							<?php get_template_part( 'ad' ); //アドセンス読み込み ?>
							<?php if ( st_is_mobile() ) { //スマホの場合 ?>
								<div class="adsbygoogle" style="padding-top:10px;">
								<?php get_template_part( 'st-smartad' ); //スマホ用広告読み込み ?>
								</div>
							<?php } else { //PCの場合 ?>
								<div style="padding-top:10px;">
									<?php get_template_part( 'ad' ); //アドセンス読み込み ?>
								</div>
							<?php } ?>
						</div>
						<!-- /広告枠 -->
						<?php endwhile; else: ?>
							<p>記事がありません</p>
						<?php endif; ?>
						<!--ループ終了-->
						<?php
						//コメント
						if ( ( $GLOBALS["stdata6"] ) === '' ) { ?>
							<?php if ( comments_open() || get_comments_number() ) {
								comments_template();
							} ?>
						<?php } ?>
						<!--関連記事-->

					</aside>

				</div>
				<!--/post-->
			</article>
		</main>
	</div>
	<!-- /#contentInner -->
	<?php get_sidebar(); ?>

</div>
<!--/#content -->
<?php get_footer(); ?>
