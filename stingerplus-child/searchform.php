<div id="search">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label class="hidden" for="s">
			<?php _e( '', 'affinger' ); ?>
		</label>
		<input class="search-field" type="text" placeholder="検索したいキーワードを入力" value="<?php the_search_query(); ?>" name="s" id="s" />
		<input type="image" class="search-icon" src="<?php echo get_template_directory_uri(); ?>-child/images/svg/search.svg" alt="検索" id="searchsubmit" />
	</form>
</div>
<!-- /stinger -->
