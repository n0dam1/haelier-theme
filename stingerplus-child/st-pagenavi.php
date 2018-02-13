<div class="st-pagelink">
	<?php $args = array(
		'end_size'           => 1,
		'mid_size'           => 1,
		'prev_next'          => True,
		'prev_text'          => __('前へ' , 'affinger'),
		'next_text'          => __('次へ' , 'affinger'),
		'type'               => 'plain',
		);
	echo paginate_links( $args ); ?>
</div>