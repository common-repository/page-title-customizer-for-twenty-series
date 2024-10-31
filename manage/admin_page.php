<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/***
 * ポストとページのフィールドセット
***/

	//タイトルCSSとタイトルHTMLの値取得
	global $post;
		$title_html_word = get_post_meta($post->ID, title_custom_word, true);
	    $title_custom_word_css = get_post_meta($post->ID, title_custom_word_css, true);
	    $title_custom_word_check = get_post_meta($post->ID, title_custom_word_check, true);
	    $title_custom_word_check_css = get_post_meta($post->ID, title_custom_word_check_css, true);
	    
	    $title_html_word2 = get_post_meta($post->ID, title_custom_word2, true);
	    $title_custom_word_css2 = get_post_meta($post->ID, title_custom_word_css2, true);
	    $title_custom_word_check2 = get_post_meta($post->ID, title_custom_word_check2, true);
	    $title_custom_word_check_css2 = get_post_meta($post->ID, title_custom_word_check_css2, true);

	/***
	 * デバイス切り替え
	***/


	if ( class_exists( 'PageTitleCustomizer' ) ) {
    	include(sprintf("%s/device.php", dirname(__FILE__)));
    }


	//jQueryでページタイトルのHTML処理

		//スマートフォンに適用
		if($title_custom_word_check[0]  == "Smartphone"){
			if(is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_html.php", dirname(__FILE__)));
				}
			}
		}
		//PCに適用
		if($title_custom_word_check[0]  == "PC and Tablet" or $title_custom_word_check[1]  == "PC and Tablet"){
			if(!is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_html.php", dirname(__FILE__)));
				}
			}
		}
		
		//スマートフォンに適用
		if($title_custom_word_check2[0]  == "Smartphone"){
			if(is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_html2.php", dirname(__FILE__)));
				}
			}
		}
		//PCに適用
		if($title_custom_word_check2[0]  == "PC and Tablet" or $title_custom_word_check2[1]  == "PC and Tablet"){
			if(!is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_html2.php", dirname(__FILE__)));
				}
			}
		}
		

	//ページタイトルのCSS処理

	//全体のCSS
	if (get_option('pt_title_css_value_all')) {

		if (get_option('pt_title_css_value_all_smart')) {
			if(is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_css_all.php", dirname(__FILE__)));
				}
			}
		}
		if (get_option('pt_title_css_value_all_pc')) {
			if(!is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_css_all.php", dirname(__FILE__)));
				}
			}
		}
	}
	if (get_option('pt_title_css_value_all2')) {

		if (get_option('pt_title_css_value_all_smart2')) {
			if(is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_css_all2.php", dirname(__FILE__)));
				}
			}
		}
		if (get_option('pt_title_css_value_all_pc2')) {
			if(!is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_css_all2.php", dirname(__FILE__)));
				}
			}
		}
	}


	//カテゴリーのCSS
	if (get_option('pt_title_css_value_category')) {

		if (get_option('pt_title_css_value_category_smart')) {
			if(is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_css_category.php", dirname(__FILE__)));
				}
			}
		}
		if (get_option('pt_title_css_value_category_pc')) {
			if(!is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_css_category.php", dirname(__FILE__)));
				}
			}
		}
	}
	if (get_option('pt_title_css_value_category2')) {

		if (get_option('pt_title_css_value_category_smart2')) {
			if(is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_css_category2.php", dirname(__FILE__)));
				}
			}
		}
		if (get_option('pt_title_css_value_category_pc2')) {
			if(!is_mobile()){
				if ( class_exists( 'PageTitleCustomizer' ) ) {
					include(sprintf("%s/insert_css_category2.php", dirname(__FILE__)));
				}
			}
		}
	}
	//ポストページのCSS
	if (get_option('pt_title_css_value_post')) {
		if(is_home()){
		
			if (get_option('pt_title_css_value_post_smart')) {
				if(is_mobile()){
					if ( class_exists( 'PageTitleCustomizer' ) ) {
						include(sprintf("%s/insert_css_post.php", dirname(__FILE__)));
					}
				}
			}
			if (get_option('pt_title_css_value_post_pc')) {
				if(!is_mobile()){
					if ( class_exists( 'PageTitleCustomizer' ) ) {
						include(sprintf("%s/insert_css_post.php", dirname(__FILE__)));
					}
				}
			}
	    }
	}
	if (get_option('pt_title_css_value_post2')) {
		if(is_home()){
		
			if (get_option('pt_title_css_value_post_smart2')) {
				if(is_mobile()){
					if ( class_exists( 'PageTitleCustomizer' ) ) {
						include(sprintf("%s/insert_css_post2.php", dirname(__FILE__)));
					}
				}
			}
			if (get_option('pt_title_css_value_post_pc2')) {
				if(!is_mobile()){
					if ( class_exists( 'PageTitleCustomizer' ) ) {
						include(sprintf("%s/insert_css_post2.php", dirname(__FILE__)));
					}
				}
			}
	    }
	}



	//ブログトップページとカテゴリーページは除く

			//スマートフォンに適用
			if($title_custom_word_check_css[0]  == "Smartphone"){
				if(is_mobile()){
					if ( class_exists( 'PageTitleCustomizer' ) ) {
						include(sprintf("%s/insert_css.php", dirname(__FILE__)));
					}
				}
			}
			//PCに適用
			if($title_custom_word_check_css[0]  == "PC and Tablet" or $title_custom_word_check_css[1]  == "PC and Tablet"){
				if(!is_mobile()){
					if ( class_exists( 'PageTitleCustomizer' ) ) {
						include(sprintf("%s/insert_css.php", dirname(__FILE__)));
					}
				}
			}
			
			//スマートフォンに適用
			if($title_custom_word_check_css2[0]  == "Smartphone"){
				if(is_mobile()){
					if ( class_exists( 'PageTitleCustomizer' ) ) {
						include(sprintf("%s/insert_css2.php", dirname(__FILE__)));
					}
				}
			}
			//PCに適用
			if($title_custom_word_check_css2[0]  == "PC and Tablet" or $title_custom_word_check_css2[1]  == "PC and Tablet"){
				if(!is_mobile()){
					if ( class_exists( 'PageTitleCustomizer' ) ) {
						include(sprintf("%s/insert_css2.php", dirname(__FILE__)));
					}
				}
			}
