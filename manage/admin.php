<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/***
 * 管理画面
***/

?>

<div class="wrap"><br/>
	<h1>Page Title Customizer for Twenty series <font size="2">v1.0.7</font></h1>

<?php


	 /***
	   *Saveされた時の処理
	 ***/

     $Page_Title_save = wp_kses(@$_POST['Page_Title_save'], array());
		
		if ( isset( $Page_Title_save )){

		   //nonceチェック
	       if ( isset( $_POST['_wpnonce'] ) && $_POST['_wpnonce'] ) {
	            if ( check_admin_referer( 'Page_Title_save', '_wpnonce' ) ) {

		        	//POST取得
			        $pt_title_css_value_all = wp_kses(@$_POST['pt_title_css_value_all'], array());
			        $pt_title_css_value_all_smart = wp_kses( @$_POST['pt_title_css_value_all_smart'], array());
			        $pt_title_css_value_all_pc = wp_kses( @$_POST['pt_title_css_value_all_pc'], array());

			        $pt_title_css_value_all2 = wp_kses(@$_POST['pt_title_css_value_all2'], array());
			        $pt_title_css_value_all_smart2 = wp_kses( @$_POST['pt_title_css_value_all_smart2'], array());
			        $pt_title_css_value_all_pc2 = wp_kses( @$_POST['pt_title_css_value_all_pc2'], array());

			        $pt_title_css_value_category = wp_kses(@$_POST['pt_title_css_value_category'], array());
			        $pt_title_css_value_category_smart = wp_kses(@$_POST['pt_title_css_value_category_smart'], array());
			        $pt_title_css_value_category_pc = wp_kses(@$_POST['pt_title_css_value_category_pc'], array());
			        
			        $pt_title_css_value_category2 = wp_kses(@$_POST['pt_title_css_value_category2'], array());
			        $pt_title_css_value_category_smart2 = wp_kses(@$_POST['pt_title_css_value_category_smart2'], array());
			        $pt_title_css_value_category_pc2 = wp_kses(@$_POST['pt_title_css_value_category_pc2'], array());
			        
			        $pt_title_css_value_post = wp_kses(@$_POST['pt_title_css_value_post'], array());
			        $pt_title_css_value_post_smart = wp_kses(@$_POST['pt_title_css_value_post_smart'], array());
			        $pt_title_css_value_post_pc = wp_kses(@$_POST['pt_title_css_value_post_pc'], array());

			        $pt_title_css_value_post2 = wp_kses( @$_POST['pt_title_css_value_post2'], array());
			        $pt_title_css_value_post_smart2 = wp_kses( @$_POST['pt_title_css_value_post_smart2'], array());
			        $pt_title_css_value_post_pc2 = wp_kses( @$_POST['pt_title_css_value_post_pc2'], array());
			        
				    
					//データベース登録
					update_option('pt_title_css_value_all', $pt_title_css_value_all);
					update_option('pt_title_css_value_all_smart', $pt_title_css_value_all_smart);
					update_option('pt_title_css_value_all_pc', $pt_title_css_value_all_pc);
					update_option('pt_title_css_value_all2', $pt_title_css_value_all2);
					update_option('pt_title_css_value_all_smart2', $pt_title_css_value_all_smart2);
					update_option('pt_title_css_value_all_pc2', $pt_title_css_value_all_pc2);
					
					
					update_option('pt_title_css_value_category', $pt_title_css_value_category);
					update_option('pt_title_css_value_category_smart', $pt_title_css_value_category_smart);
					update_option('pt_title_css_value_category_pc', $pt_title_css_value_category_pc);
					update_option('pt_title_css_value_category2', $pt_title_css_value_category2);
					update_option('pt_title_css_value_category_smart2', $pt_title_css_value_category_smart2);
					update_option('pt_title_css_value_category_pc2', $pt_title_css_value_category_pc2);


					update_option('pt_title_css_value_post', $pt_title_css_value_post);
					update_option('pt_title_css_value_post_smart', $pt_title_css_value_post_smart);
					update_option('pt_title_css_value_post_pc', $pt_title_css_value_post_pc);
					update_option('pt_title_css_value_post2', $pt_title_css_value_post2);
					update_option('pt_title_css_value_post_smart2', $pt_title_css_value_post_smart2);
					update_option('pt_title_css_value_post_pc2', $pt_title_css_value_post_pc2);
					
				}
			}
		  }


	/***
	 * データを取得
	***/
	//登録データ
	$pt_title_css_value_all = get_option('pt_title_css_value_all');
	$pt_title_css_value_all_smart = get_option('pt_title_css_value_all_smart');
	$pt_title_css_value_all_pc = get_option('pt_title_css_value_all_pc');
	$pt_title_css_value_all2 = get_option('pt_title_css_value_all2');
	$pt_title_css_value_all_smart2 = get_option('pt_title_css_value_all_smart2');
	$pt_title_css_value_all_pc2 = get_option('pt_title_css_value_all_pc2');
	
	
	$pt_title_css_value_category = get_option('pt_title_css_value_category');
	$pt_title_css_value_post = get_option('pt_title_css_value_post');
	$pt_title_css_value_category2 = get_option('pt_title_css_value_category2');
	$pt_title_css_value_post2 = get_option('pt_title_css_value_post2');
	

?>


	<form method="post" id="pt_page_title_form" action="">
		<?php wp_nonce_field( 'Page_Title_save', '_wpnonce' ); ?>

		<fieldset class="options">
		<table class="form-table">		

			<tr valign="top"> 
				<th width="108" scope="row"><?php _e('CSS for all the title', 'page-title-customizer-for-twenty-series' );?></th> 
				<td>
				<textarea name="pt_title_css_value_all" value="<?php echo esc_attr($pt_title_css_value_all); ?>" placeholder="ex.   color:#000;font-size:14px;" style="width:85%;height:150px;"><?php echo esc_attr($pt_title_css_value_all); ?></textarea><br>
				<?php _e('Smartphone', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_all_smart" value="<?php echo esc_attr('pt_title_css_value_all_smart'); ?>" <?php if(get_option('pt_title_css_value_all_smart') == true) { echo('checked="checked"'); } ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php _e('PC and Tablet', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_all_pc" value="<?php echo esc_attr('pt_title_css_value_all_pc'); ?>" <?php if(get_option('pt_title_css_value_all_pc') == true) { echo('checked="checked"'); } ?> ></td>
			</tr>
			
			<tr valign="top"> 
				<th width="108" scope="row"><?php _e('CSS for all the title2', 'page-title-customizer-for-twenty-series' );?></th> 
				<td>
				<textarea name="pt_title_css_value_all2" value="<?php echo esc_attr($pt_title_css_value_all2); ?>" placeholder="ex.   color:#000;font-size:14px;" style="width:85%;height:150px;"><?php echo esc_attr($pt_title_css_value_all2); ?></textarea><br>
				<?php _e('Smartphone', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_all_smart2" value="<?php echo esc_attr('pt_title_css_value_all_smart2'); ?>" <?php if(get_option('pt_title_css_value_all_smart2') == true) { echo('checked="checked"'); } ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php _e('PC and Tablet', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_all_pc2" value="<?php echo esc_attr('pt_title_css_value_all_pc2'); ?>" <?php if(get_option('pt_title_css_value_all_pc2') == true) { echo('checked="checked"'); } ?> ></td>
			</tr>
			
			<tr valign="top"> 
				<th width="108" scope="row"><?php _e('CSS for the category page and archive page title', 'page-title-customizer-for-twenty-series' );?></th> 
				<td>
				<textarea name="pt_title_css_value_category" value="<?php echo esc_attr($pt_title_css_value_category); ?>" placeholder="ex.   color:#000;font-size:14px;" style="width:85%;height:150px;"><?php echo esc_attr($pt_title_css_value_category); ?></textarea><br>
			    <?php _e('Smartphone', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_category_smart" value="<?php echo esc_attr('pt_title_css_value_category_smart'); ?>" <?php if(get_option('pt_title_css_value_category_smart') == true) { echo('checked="checked"'); } ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php _e('PC and Tablet', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_category_pc" value="<?php echo esc_attr('pt_title_css_value_category_pc'); ?>" <?php if(get_option('pt_title_css_value_category_pc') == true) { echo('checked="checked"'); } ?> ></td>
			</tr>
			
			<tr valign="top"> 
				<th width="108" scope="row"><?php _e('CSS for the category page and archive page title2', 'page-title-customizer-for-twenty-series' );?></th> 
				<td>
				<textarea name="pt_title_css_value_category2" value="<?php echo esc_attr($pt_title_css_value_category2); ?>" placeholder="ex.   color:#000;font-size:14px;" style="width:85%;height:150px;"><?php echo esc_attr($pt_title_css_value_category2); ?></textarea><br>
			    <?php _e('Smartphone', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_category_smart2" value="<?php echo esc_attr('pt_title_css_value_category_smart2'); ?>" <?php if(get_option('pt_title_css_value_category_smart2') == true) { echo('checked="checked"'); } ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php _e('PC and Tablet', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_category_pc2" value="<?php echo esc_attr('pt_title_css_value_category_pc2'); ?>" <?php if(get_option('pt_title_css_value_category_pc2') == true) { echo('checked="checked"'); } ?> ></td>
			</tr>
			
			<tr valign="top"> 
				<th width="108" scope="row"><?php _e('CSS for the post page title', 'page-title-customizer-for-twenty-series' );?></th> 
				<td>
				<textarea name="pt_title_css_value_post" value="<?php echo esc_attr($pt_title_css_value_post); ?>" placeholder="ex.   color:#000;font-size:14px;" style="width:85%;height:150px;"><?php echo esc_attr($pt_title_css_value_post); ?></textarea><br>
			    <?php _e('Smartphone', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_post_smart" value="<?php echo esc_attr('pt_title_css_value_post_smart'); ?>" <?php if(get_option('pt_title_css_value_post_smart') == true) { echo('checked="checked"'); } ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php _e('PC and Tablet', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_post_pc" value="<?php echo esc_attr('pt_title_css_value_post_pc'); ?>" <?php if(get_option('pt_title_css_value_post_pc') == true) { echo('checked="checked"'); } ?> ></td>
			</tr>
			
			<tr valign="top"> 
				<th width="108" scope="row"><?php _e('CSS for the post page title2', 'page-title-customizer-for-twenty-series' );?></th> 
				<td>
				<textarea name="pt_title_css_value_post2" value="<?php echo esc_attr($pt_title_css_value_post2); ?>" placeholder="ex.   color:#000;font-size:14px;" style="width:85%;height:150px;"><?php echo esc_attr($pt_title_css_value_post2); ?></textarea><br>
			    <?php _e('Smartphone', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_post_smart2" value="<?php echo esc_attr('pt_title_css_value_post_smart2'); ?>" <?php if(get_option('pt_title_css_value_post_smart2') == true) { echo('checked="checked"'); } ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php _e('PC and Tablet', 'page-title-customizer-for-twenty-series' );?>&nbsp;&nbsp;<input type="checkbox" name="pt_title_css_value_post_pc2" value="<?php echo esc_attr('pt_title_css_value_post_pc2'); ?>" <?php if(get_option('pt_title_css_value_post_pc2') == true) { echo('checked="checked"'); } ?> ></td>
			</tr>

			<tr>
			    <th width="108" scope="row"><?php _e('Save this setting', 'page-title-customizer-for-twenty-series' );?> :</th> 
			    <td>
				<input type="submit" name="Page_Title_save" value="<?php _e(esc_attr('Save', 'page-title-customizer-for-twenty-series' )); ?>" /><br /></td>
		    </tr>
		</table>
		</fieldset>
	</form>
	</table>

</div>


<div style="margin-top:60px;">


<?php _e('Please see the explanation of this plugin from here!', 'page-title-customizer-for-twenty-series' );?>
<br />
<a href="https://global-s-h.com/page_title_cm/en/" target="_blank">https://global-s-h.com/page_title_cm/en/</a>

<br><a href="https://global-s-h.com/page_title_cm/en/" target="_blank"> <?php _e('Help page for troubles', 'page-title-customizer-for-twenty-series' );?> </a> | <a href="https://global-s-h.com/page_title_cm/en/index.php#donate" target="_blank"> <?php _e('Donate', 'page-title-customizer-for-twenty-series' );?> </a> | 

</div>