<div class="kanren">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<dl class="clearfix">
			<dt><a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
				<?php
						$thumbnail_id = get_post_thumbnail_id();
						$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'medium' );?>
				<div class="thumbnail" style="background: url('<?php echo $eye_img[0]; ?>') no-repeat center center;background-size: cover;">
				<?php else: // サムネイルを持っていないときの処理 ?>
				<div class="thumbnail" style="background: url('<?php echo get_template_directory_uri(); ?>/images/no-img.png') no-repeat center center;background-size: cover;">
				<?php endif; ?>
					<span><?php $cat = get_the_category(); ?>
						<?php $cat = $cat[0]; ?>
						<?php echo get_cat_name($cat->term_id); ?></span>
				</a>
			</dt>
			<dd>
				<p class="time"><?php the_time( 'Y/m/d' ); ?></p>
				<h3><a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a></h3>
				<p class="tags"><?php the_tags('', ''); ?></p>
			</dd>
		</dl>
	<?php endwhile;
	else: ?>
		<p>記事がありません</p>
	<?php endif; ?>
</div>
