<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<?php if(!(is_home() or is_category())): ?>
	<?php if($title_html_word2== true): ?>
		<script type="text/javascript">
			jQuery(function($) {
			   var page_title_word2 = $('.page_title_word2').html();
			   
			   $('.entry-title').each(function() {
			          $(this).html(page_title_word2);
			   });
			});
		</script>
	<?php endif; ?>
<?php endif; ?>