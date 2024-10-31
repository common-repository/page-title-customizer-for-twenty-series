<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<?php if(!(is_home() or is_category())): ?>
	<?php if($title_custom_word_css == true): ?>
	<style type="text/css">
		.entry-title{
			<?php echo $title_custom_word_css; ?>
		}
	</style>
	<?php endif; ?>
<?php endif; ?>