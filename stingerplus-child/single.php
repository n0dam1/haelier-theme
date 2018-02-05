<?php get_header(); ?>

<!--ぱんくず -->
<div id="breadcrumb">
	<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="<?php echo home_url(); ?>" itemprop="url"> <span itemprop="title"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/home.png"></span>
		</a> &gt; </div>
	<?php $postcat = get_the_category(); ?>
	<?php $catid = $postcat[0]->cat_ID; ?>
	<?php $allcats = array( $catid ); ?>
	<?php
			while ( !$catid == 0 ) {
			$mycat = get_category( $catid );
			$catid = $mycat->parent;
			array_push( $allcats, $catid );
			}
			array_pop( $allcats );
			$allcats = array_reverse( $allcats );
			?>
	<?php foreach ( $allcats as $catid ): ?>
	<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="<?php echo get_category_link( $catid ); ?>" itemprop="url">
			<span itemprop="title"><?php echo esc_html( get_cat_name( $catid ) ); ?></span> </a> &gt; </div>
	<?php endforeach; ?>

</div>
<!--/ ぱんくず -->
<div id="content" class="clearfix">
	<div id="contentInner">

		<main <?php st_text_copyck(); ?>>
			<article>
				<div id="post-<?php the_ID(); ?>" <?php st_post_class(); ?>>
					<!--ループ開始 -->
					<?php if (have_posts()) : while (have_posts()) :
					the_post(); ?>

					<div class="title-area">
						<?php //アイキャッチ画像を挿入
								if( is_single() or is_page() ){
								$postID = $wp_query->post->ID;
								$eyecatchset = get_post_meta( $postID, 'eyecatch_set', true );
								}else{
								$eyecatchset = '';
								}
								//if ( has_post_thumbnail() && (( isset($GLOBALS['stdata53']) && $GLOBALS['stdata53'] === 'yes' ) || ( isset( $eyecatchset ) && $eyecatchset === 'yes' ))) { ?>
						<div class="st-eyecatch"><?php the_post_thumbnail('full'); ?></div>
						<?php //} //アイキャッチ画像を挿入ここまで ?>

						<div class="top">

							<?php //カテゴリ表示
									if ( isset($GLOBALS['stdata60']) && $GLOBALS['stdata60'] === 'yes' ) {

									} else {

									$categories = get_the_category();
									$separator = ' ';
									$output = ''; ?>
							<p>
								<?php
										if ( $categories ) {
										foreach( $categories as $category ) {
										$output .= '<span class="' . $category->cat_ID . '">' . $category->cat_name . '</span>' . $separator;
										}
										echo trim( $output, $separator );
										} ?>
							</p>
							<?php } //カテゴリ表示ここまで ?>
							<p class="entry-date date updated"><?php the_time( 'Y.m.d' ); ?>更新</p>
						</div>


						<h1 class="entry-title"><?php the_title(); //タイトル ?></h1>
					</div>

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
	
						<?php get_template_part( 'popular-thumbnail' ); //任意のエントリ ?>

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

						<p class="author">
						<?php
						if ( isset($GLOBALS['stdata17']) && $GLOBALS['stdata17'] === 'yes' ) { ?>
							執筆者：<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
						<?php } ?>
						</p>

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
						<?php get_template_part( 'kanren' ); ?>
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
