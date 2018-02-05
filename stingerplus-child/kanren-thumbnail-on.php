<div class="kanren <?php st_marugazou_class(); //サムネイルを丸くする ?>">
	<?php
	if ( trim( $GLOBALS["stdata56"] ) !== '' ) {
		$kanrenpost_no = $GLOBALS["stdata56"];
	} else {
		$kanrenpost_no = 5;
	}
	$categories = get_the_category( $post->ID );
	$category_ID = array();
	foreach ( $categories as $category ):
		array_push( $category_ID, $category->cat_ID );
	endforeach;
	$args = array(
		'post__not_in' => array( $post->ID ),
		'posts_per_page' => $kanrenpost_no,
		'category__in' => $category_ID,
		'orderby' => 'rand',
	);
	$st_query = new WP_Query( $args ); ?>
	<?php
	if ( $st_query->have_posts() ): ?>
		<?php
		while ( $st_query->have_posts() ) : $st_query->the_post(); ?>
			<dl class="clearfix">
				<dt><a href="<?php the_permalink() ?>">
					<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
					<?php
							$thumbnail_id = get_post_thumbnail_id();
							$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'medium' );?>
					<div class="thumbnail" style="background: url('<?php echo $eye_img[0]; ?>') no-repeat center center;background-size: cover;">
					<?php else: // サムネイルを持っていないときの処理 ?>
					<div class="thumbnail" style="background: url('<?php echo get_template_directory_uri(); ?>/images/no-img.png') no-repeat center center;background-size: cover;">
						<?php endif; ?>
					</div>
					<span><?php $cat = get_the_category(); ?>
						<?php $cat = $cat[0]; ?>
						<?php echo get_cat_name($cat->term_id); ?></span>

					</a></dt>
				<dd>
					<p class="date"><?php the_time( 'Y/m/d' ); ?></p>
					<h5><a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a></h5>
					<p class="tags"><?php the_tags('', ''); ?></p>
				</dd>
			</dl>
		<?php endwhile; ?>
	<?php else: ?>
		<p>関連記事はありませんでした</p>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</div>