<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<?php if(!(is_home() or is_category())): ?>
	<?php if($title_html_word == true): ?>
		<script type="text/javascript">
			jQuery(function($) {
			   var page_title_word = $('.page_title_word').html();
			   
			   $('.entry-title').each(function() {
			          $(this).html(page_title_word);
			   });
			});
		</script>
	<?php endif; ?>
<?php endif; ?>