<footer id="footer">


<?php if ( is_active_sidebar( 11 ) ) { //フッターウィジェットがある場合 ?>
	<div class="footer-wbox clearfix">

		<div class="footer-r">
			<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 11 ) ) : else : //フッターウィジェット ?>
			<?php endif; ?>
		</div>
		<div class="footer-l">
			<?php get_template_part( 'st-footer-content' ); //フッターのメインコンテンツ ?>
		</div>
	</div>
<?php }else{ ?>
	<?php get_template_part( 'st-footer-content' ); //フッターのメインコンテンツ ?>
<?php } ?>
<?php get_template_part( 'st-footer-link' ); //フッターリンク ?>
	<div class="copyright">
		<p>Copyright🄫HAELIER[ハエリエ]</p>
	</div>
</footer>
</div>
<!-- /#wrapper -->
<!-- ページトップへ戻る -->
<div id="page-top"><a href="#wrapper" class="fa fa-angle-up"></a></div>
<!-- ページトップへ戻る　終わり -->
<?php wp_enqueue_script( 'base', get_template_directory_uri() . '/js/base.js', array() ); ?>
<?php if ( st_is_mobile() ) { //PCのみ追尾広告のjs読み込み ?>
<?php } else { ?>
	<?php wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/scroll.js', array() ); ?>
<?php } ?>

<?php wp_footer(); ?>
<!-- ここからオリジナルコード -->
<!-- リマーケティング タグの Google コード -->
<!--
リマーケティング タグは、個人を特定できる情報と関連付けることも、デリケートなカテゴリに属するページに設置することも許可されません。タグの設定方法については、こちらのページをご覧ください。
http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 971919959;
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
	<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/971919959/?guid=ON&amp;script=0"/>
	</div>
</noscript>
<!-- Yahoo Code for your Target List -->
<script type="text/javascript" language="javascript">
	/* <![CDATA[ */
	var yahoo_retargeting_id = '487TEQORBR';
	var yahoo_retargeting_label = '';
	var yahoo_retargeting_page_type = '';
	var yahoo_retargeting_items = [{item_id: '', category_id: '', price: '', quantity: ''}];
	/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="//b92.yahoo.co.jp/js/s_retargeting.js"></script>

<script>
jQuery(function() {
 var topBtn = jQuery('#footer_ban');
 topBtn.hide();
 jQuery(window).scroll(function () {
 	if (jQuery(this).scrollTop() > 200) { // 200pxで表示
 		topBtn.fadeIn();
 	} else {
 		topBtn.fadeOut();
 	}
 });
});
</script>

<!--
<?php if( wp_is_mobile()) : ?>
<div id="footer_ban">
	<img src="http://www.rentracks.jp/adx/p.gifx?idx=0.21818.186880.2334.3575&dna=55425" border="0" height="1" width="1"><a href="http://www.rentracks.jp/adx/r.html?idx=0.21818.186880.2334.3575&dna=55425" rel="nofollow"><img src="http://www.image-rentracks.com/agahair_clinic/468_60.png" width="468" height="60"></a>
</div>
<?php endif; ?>
-->
<!-- ここまでオリジナルコード -->
</body></html>
