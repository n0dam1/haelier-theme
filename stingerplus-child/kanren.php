<?php 
if ( isset($GLOBALS['stdata36']) && $GLOBALS['stdata36'] === 'yes' ) {
}else{
?>

	<?php
		if ( trim( $GLOBALS["stdata63"] ) !== '' ) {
			$kanrenname = esc_html( $GLOBALS["stdata63"] );
		} else {
			$kanrenname = '関連記事';		
		}
		?>
		<h4 class="point"><?php echo "$kanrenname"; ?></h4>
<?php
		if ( isset($GLOBALS['stdata5']) && $GLOBALS['stdata5'] === 'yes' ) {
			get_template_part( 'kanren-thumbnail-off' ); 
		}else{
			get_template_part( 'kanren-thumbnail-on' ); 
		}
}
?>