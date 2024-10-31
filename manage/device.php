<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/***
 * デバイス対応
***/

function is_mobile() {
$useragents = array(
	
	'iPhone',
	'iPod',
	'Android',
	'dream',
	'CUPCAKE',
	'blackberry',
	'webOS',
	'incognito',
	'webmate'
);
$pattern = '/'.implode('|', $useragents).'/i';
return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}