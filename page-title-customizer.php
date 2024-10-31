<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*
Plugin Name: Page Title Customizer for Twenty series
Plugin URI: https://global-s-h.com/page_title_cm/en/index.php
Description: This plugin can customize each page and post title with css and html for Twenty Nineteen and the other Twenty series theme. It works on Gutenberg and Classic editor. Changable design to smartphone, tablet, and PC .
Author: Kazuki Yanamoto
Version: 1.0.7
License: GPLv2 or later
*/

class PageTitleCustomizer
{
    public $textdomain = 'page-title-customizer-for-twenty-series';
    public $plugins_url = '';

    public function __construct()
    {

        //アンインストール
        if (function_exists('register_uninstall_hook')) {
            register_uninstall_hook(__FILE__, $this, 'uninstallHook');
        }
        
        //header()jqueryのフック
        add_action('wp_enqueue_scripts', array($this, 'page_title_script_add'));

        //header()のフック
        	add_action('wp_head', array($this, 'filter_header'));

        // カスタムフィールドの追加
			add_action( 'admin_menu', array($this, 'add_custom_field'));
			 
		// カスタムフィールドの保存
			add_action( 'save_post', array($this, 'save_custom_field'));
        
        //footer()のフッック
        add_filter('wp_footer', array($this, 'filter_footer'));

        //init
        add_action('init', array($this, 'init'));

        //ローカライズ
        add_action('init', array($this, 'load_textdomain'));

        //管理画面について
        add_action('admin_menu', array($this, 'page_title_admin_menu'));

    }


    /**
     * init
     */
     public function init()
     {
         $this->plugins_url = untrailingslashit(plugins_url('', __FILE__));
     }
     
     
    /***
     * 管理画面
    ***/
    public function page_title_admin_menu()
    {
        add_options_page(
            'Page Title Customizer', 
            __('Page Title setting', $this->textdomain), 
            'manage_options',
            'page_title_customizer_admin_menu',
            array($this, 'page_title_admin')
        );
    }


    /***
     * 管理画面を表示
    ***/
    public function page_title_admin()
    {
        // Include the settings page
        if ( class_exists( 'PageTitleCustomizer' ) ) {
        	include(sprintf("%s/manage/admin.php", dirname(__FILE__)));
        }
    }
    
    
	 // カスタムフィールドのHTMLを追加する時の処理
	 
	 // タイトルのHTML処理
	 public function add_custom_field() {
		$post_types = array('post', 'page'); //ポストとページの両方を配列で
	    add_meta_box( 'custom-word_title', __( 'Title HTML', 'page-title-customizer-for-twenty-series' ),array( $this, 'create_word_title'), $post_types, 'normal' );
	    add_meta_box( 'custom-word_check_html', __( 'Title Media HTML', 'page-title-customizer-for-twenty-series' ),array( $this, 'create_word_check_html'), $post_types, 'normal' );
	    
	    add_meta_box( 'custom-word_title2', __( 'Title HTML2', 'page-title-customizer-for-twenty-series' ),array( $this, 'create_word_title2'), $post_types, 'normal' );
	    add_meta_box( 'custom-word_check_html2', __( 'Title Media HTML2', 'page-title-customizer-for-twenty-series' ),array( $this, 'create_word_check_html2'), $post_types, 'normal' );
	    
	    add_meta_box( 'custom-word_css', __( 'Title CSS', 'page-title-customizer-for-twenty-series' ),array( $this, 'create_word_css'), $post_types, 'normal' );
	    add_meta_box( 'custom-word_check_css', __( 'Title Media CSS', 'page-title-customizer-for-twenty-series' ),array( $this, 'create_word_check_css'), $post_types, 'normal' );
	    
	    add_meta_box( 'custom-word_css2', __( 'Title CSS2', 'page-title-customizer-for-twenty-series' ),array( $this, 'create_word_css2'), $post_types, 'normal' );
	    add_meta_box( 'custom-word_check_css2', __( 'Title Media CSS2', 'page-title-customizer-for-twenty-series' ),array( $this, 'create_word_check_css2'), $post_types, 'normal' );
	 }
	 public function create_word_title() {
	    $keyname = 'title_custom_word';
	    
	    // 保存されているカスタムフィールドの値を取得
	    global $post;
	    $get_value = get_post_meta( $post->ID, $keyname, true );
	 
	    // nonceの追加
	    wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
	 
	    // HTMLの出力
	    echo _e( 'Input HTML to the title ( ex.  Hello&lt;br&gt;World! )&nbsp;&nbsp; Please use single quotation( ex. &lt;div id=&lsquo;sample&lsquo;&gt;)', 'page-title-customizer-for-twenty-series' );
	    ?>
		<input name="<?php echo $keyname ?>" value="<?php if ($get_value == true){echo $get_value;}if ($get_value == false){echo get_the_title();}?>" style="width:85%;font-size:20px;">
		    
	 <?php
 	 }
 	 
 	 public function create_word_title2() {
	    $keyname = 'title_custom_word2';
	    
	    // 保存されているカスタムフィールドの値を取得
	    global $post;
	    $get_value = get_post_meta( $post->ID, $keyname, true );
	 
	    // nonceの追加
	    wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
	 
	    // HTMLの出力
	    echo _e( 'Input HTML to the title ( ex.  Hello&lt;br&gt;World! )&nbsp;&nbsp; Please use single quotation( ex. &lt;div id=&lsquo;sample&lsquo;&gt;)', 'page-title-customizer-for-twenty-series' );
	    ?>
		<input name="<?php echo $keyname ?>" value="<?php if ($get_value == true){echo $get_value;}if ($get_value == false){echo get_the_title();}?>" style="width:85%;font-size:20px;">
		    
	 <?php
 	 }
	
	
	 // タイトルHTMLのMedia対応
	 function create_word_check_html() {
	     $keyname = 'title_custom_word_check';
	     global $post;
	     // 保存されているカスタムフィールドの値を取得
	     $get_vals = get_post_meta( $post->ID, $keyname, true );
	     $get_value = $get_vals ? $get_vals : array();
	 
	     // radioの値
	     $datas = ['Smartphone', 'PC and Tablet'];
	 
	     // nonceの追加
	     wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
	  
	     // HTMLの出力
	     echo _e( 'Select media for HTML', 'page-title-customizer-for-twenty-series' )."<br>";
	     foreach( $datas as $data ) {
	         $checked = '';
	         if( in_array( $data, $get_value ) ) $checked = ' checked';
	         echo '<label><input type="checkbox" name="' . $keyname . '[]" value="' . $data . '"' . $checked . ' >' . $data . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
	    }
	}
	
	function create_word_check_html2() {
	     $keyname = 'title_custom_word_check2';
	     global $post;
	     // 保存されているカスタムフィールドの値を取得
	     $get_vals = get_post_meta( $post->ID, $keyname, true );
	     $get_value = $get_vals ? $get_vals : array();
	 
	     // radioの値
	     $datas = ['Smartphone', 'PC and Tablet'];
	 
	     // nonceの追加
	     wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
	  
	     // HTMLの出力
	     echo _e( 'Select media for HTML2', 'page-title-customizer-for-twenty-series' )."<br>";
	     foreach( $datas as $data ) {
	         $checked = '';
	         if( in_array( $data, $get_value ) ) $checked = ' checked';
	         echo '<label><input type="checkbox" name="' . $keyname . '[]" value="' . $data . '"' . $checked . ' >' . $data . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
	    }
	}
	
	
	 // タイトルCSSのMedia対応
	 function create_word_check_css() {
	     $keyname = 'title_custom_word_check_css';
	     global $post;
	     // 保存されているカスタムフィールドの値を取得
	     $get_vals = get_post_meta( $post->ID, $keyname, true );
	     $get_value = $get_vals ? $get_vals : array();
	 
	     // radioの値
	     $datas = ['Smartphone', 'PC and Tablet'];
	 
	     // nonceの追加
	     wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
	  
	     // HTMLの出力
	     echo _e( 'Select media for CSS', 'page-title-customizer-for-twenty-series' )."<br>";
	     foreach( $datas as $data ) {
	         $checked = '';
	         if( in_array( $data, $get_value ) ) $checked = ' checked';
	         echo '<label><input type="checkbox" name="' . $keyname . '[]" value="' . $data . '"' . $checked . ' >' . $data . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
	    }
	}
	
	function create_word_check_css2() {
	     $keyname = 'title_custom_word_check_css2';
	     global $post;
	     // 保存されているカスタムフィールドの値を取得
	     $get_vals = get_post_meta( $post->ID, $keyname, true );
	     $get_value = $get_vals ? $get_vals : array();
	 
	     // radioの値
	     $datas = ['Smartphone', 'PC and Tablet'];
	 
	     // nonceの追加
	     wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
	  
	     // HTMLの出力
	     echo _e( 'Select media for CSS2', 'page-title-customizer-for-twenty-series' )."<br>";
	     foreach( $datas as $data ) {
	         $checked = '';
	         if( in_array( $data, $get_value ) ) $checked = ' checked';
	         echo '<label><input type="checkbox" name="' . $keyname . '[]" value="' . $data . '"' . $checked . ' >' . $data . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
	    }
	}
	
	
	 // タイトルのCSSの処理
	 public function create_word_css() {
	    $keyname = 'title_custom_word_css';
	    global $post;
	    // 保存されているカスタムフィールドの値を取得
	    $get_value = get_post_meta( $post->ID, $keyname, true );
	 
	    // nonceの追加
	    wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
	 
	    // HTMLの出力
	    echo _e( 'Input CSS to design the title.', 'page-title-customizer-for-twenty-series' )."<br>";
	    echo '<textarea name="' . $keyname . '" style="width:85%;height:200px;" placeholder="ex.   color:#000;font-size:14px;">' . $get_value . '</textarea>';
	 }
	 
	 public function create_word_css2() {
	    $keyname = 'title_custom_word_css2';
	    global $post;
	    // 保存されているカスタムフィールドの値を取得
	    $get_value = get_post_meta( $post->ID, $keyname, true );
	 
	    // nonceの追加
	    wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );
	 
	    // HTMLの出力
	    echo _e( 'Input CSS2 to design the title.', 'page-title-customizer-for-twenty-series' )."<br>";
	    echo '<textarea name="' . $keyname . '" style="width:85%;height:200px;" placeholder="ex.   color:#000;font-size:14px;">' . $get_value . '</textarea>';
	 }
	
	
	 // カスタムフィールドの保存
	 public function save_custom_field( $post_id ) {
	    $custom_fields = ['title_custom_word_check','title_custom_word_check_css','title_custom_word_check2','title_custom_word_check_css2'];
	 
	    foreach( $custom_fields as $d ) {
	        if ( isset( $_POST['nonce-' . $d] ) && $_POST['nonce-' . $d] ) {
	            if( check_admin_referer( 'action-' . $d, 'nonce-' . $d ) ) {
	 
	                if( isset( $_POST[$d] ) && $_POST[$d] ) {
	                	$custom_fields_d = wp_kses($_POST[$d], array());
	                    update_post_meta( $post_id, $d, $custom_fields_d );
	                } else {
	                    delete_post_meta( $post_id, $d, get_post_meta( $post_id, $d, true ) );
	                }
	            }
	        }
	 
	    }
	    
	    $custom_fields2 = ['title_custom_word','title_custom_word_css','title_custom_word2','title_custom_word_css2'];
	    
	    foreach( $custom_fields2 as $d ) {
	        if ( isset( $_POST['nonce-' . $d] ) && $_POST['nonce-' . $d] ) {
	            if( check_admin_referer( 'action-' . $d, 'nonce-' . $d ) ) {
	 
	                if( isset( $_POST[$d] ) && $_POST[$d] ) {
	                	$custom_fields_d = wp_filter_post_kses($_POST[$d]);
	                    update_post_meta( $post_id, $d, $custom_fields_d );
	                } else {
	                    delete_post_meta( $post_id, $d, get_post_meta( $post_id, $d, true ) );
	                }
	            }
	        }
	 
	    }
	 }



    /***
     * ローカライズ
    ***/
    public function load_textdomain()
    {
        load_plugin_textdomain('page-title-customizer-for-twenty-series', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }



    /***
     * アンインストール時
    ***/
    public function uninstallHook()
    {
            delete_option('pt_title_css_value_all');
            delete_option('pt_title_css_category_all');
            delete_option('pt_title_css_post_all');
            delete_option('pt_title_css_value_all_smart');
            delete_option('pt_title_css_value_category_smart');
            delete_option('pt_title_css_value_post_smart');
            delete_option('pt_title_css_value_all_pc');
            delete_option('pt_title_css_value_category_pc');
            delete_option('pt_title_css_value_post_pc');
            
            delete_option('pt_title_css_value_all2');
            delete_option('pt_title_css_category_all2');
            delete_option('pt_title_css_post_all2');
            delete_option('pt_title_css_value_all_smart2');
            delete_option('pt_title_css_value_category_smart2');
            delete_option('pt_title_css_value_post_smart2');
            delete_option('pt_title_css_value_all_pc2');
            delete_option('pt_title_css_value_category_pc2');
            delete_option('pt_title_css_value_post_pc2');
            
    }
	
	
    /***
     * head部分にjquery
    ***/
	public function page_title_script_add(){
		wp_enqueue_script( 'jquery' );
	}

	
	public function filter_header()
	{

		// Include the settings page
		if ( class_exists( 'PageTitleCustomizer' ) ) {
        	include(sprintf("%s/manage/admin_page.php", dirname(__FILE__)));
        }

	}


    /***
    * footerの処理
    ***/
    public function filter_footer()
    {
    	global $post;
    	$title_html_word = get_post_meta($post->ID, title_custom_word, true);
    	
    	echo "<div class='page_title_word' style='display:none;'>";
    	echo $title_html_word;
    	echo "</div>";
    	
    	$title_html_word2 = get_post_meta($post->ID, title_custom_word2, true);
    	
    	echo "<div class='page_title_word2' style='display:none;'>";
    	echo $title_html_word2;
    	echo "</div>";
    }
    
}
$PageTitleCustomizer = new PageTitleCustomizer();
