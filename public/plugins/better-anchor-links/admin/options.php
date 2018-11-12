<?php 
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

		if ( $_POST['page_options'] ) {	
			$options = explode(',', stripslashes($_POST['page_options']));
			if ($options) {
				if (strlen($_POST['backlink_char'])==1) {
					if ($_POST['is_headHi']<=$_POST['is_headLo']) {
						if ($_POST['loc-nicer'] == "") {$_POST['loc-nicer'] = "en_US";}
						foreach ($options as $option) {
							$option = trim($option);
							$value = trim($_POST[$option]);
							$mwm_aalLoader->options[$option] = $value;
						}
						// Save options
						/*print_r ($mwm_aalLoader->options); */
						update_option('lm_bal_options', $mwm_aalLoader->options);
						$mwm_aalLoader->show_message(__('Updated Successfully','mwmall'));
					}else{
						$mwm_aalLoader->show_error(__('Options not saved the first heading number should be less or equal than the second ! ','mwmall'));
					}
				}else{
			   		$mwm_aalLoader->show_error(__('Options not saved the backling char have more than one character ','mwmall'));
				}
			}
		}

function headSet($hilo,$numsel) {
	echo "<select name='$hilo' size=1>";
	$i=1; 
	while ($i<7) {
		echo '<option ';
		if ($numsel == $i) {echo 'selected="SELECTED" ';
		}
		echo "value=".$i.">&#60;h".$i."&#62;</option>"; 
		$i++ ;
	}
	echo "</select>";
}
  
?>
	
		
<div class="wrap">
	<h2>Better Anchor Links Options (version <?php echo $mwm_aalLoader->version; ?>)</h2>
	
	<form name="generaloptions" method="post">
	<?php wp_nonce_field('ngg_settings') ?>
	<input type="hidden" name="page_options" value="activatePlugin,activateCSS,autoDisplayInContent,displayTitle,displayPosts,displayPages,contentColumnCount,is_home,is_single,is_page,is_category,is_tag,is_date,is_author,is_search,is_numbering,is_indent,is_headHi,is_headLo,loc-nicer,is_backlink,backlink_text,backlink_char,is_backlinkfront" />
		<table class="form-table">
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Activate Plugin','mwmaal') ?></th>
				<td>
				<input type="checkbox" name="activatePlugin" value="1" <?php checked(true, $mwm_aalLoader->options['activatePlugin']); ?> />
						<?php _e('Deactivating this plugin will simply prevent any display.','mwmaal') ?>
				</td>
				<!-- ======= Credits ============= -->
				<td valign="top" rowspan="20" width="200px" >
					<p>Created by:</p>




					<div style="text-align:none;">
					Luděk Melichar <br>
					<a href="http://ludek.org/bal/"><small>ludek.org</small></a>

					<br/>
					</div>
										<h2 style="margin-top:0px;"><?php _e('Like this plugin?','mwmaal'); ?></h2>
					
					<p><?php _e('Why not do the following:','mwmaal'); ?></p>
					
					  <!--  <p><a href="http://www.mindwiremedia.net/products/wordpress/plugins/auto-anchor-links-wordpress-plugin-home/" target="_blank">Plugin Author Homepage</a></p>
						<p><?php _e('Link to it so other folks can find out about it.','mwmaal'); ?></p>
						<p> -->
							<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=48CZMVXER28PE&lc=CZ&item_name=Plugin%20development&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank">
					<img src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</a>
					
						</p>
					<h2 style="margin-top:0px;"><?php _e('Vote','mwmaal'); ?></h2><a href="http://wordpress.org/extend/plugins/better-anchor-links/"><img align=right src="<?php echo plugins_url('vote.jpg', __FILE__);?>" />
                    <p><?php _e('Vote for your combination on plugin home, you help others. ','mwmaal'); ?></a></p> 

		</td>
	   <!--  ======= END Credits ============= -->
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Activate BAL CSS','mwmaal') ?></th>
				<td>
				<input type="checkbox" name="activateCSS" value="1" <?php checked(true, $mwm_aalLoader->options['activateCSS']); ?> />
						<?php _e('Uncheck if you want to use your own CSS.','mwmaal') ?>
				</td>
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('List Output Title','mwmaal') ?></th>
				<td>
				<input type="text" size="35" name="displayTitle" value="<?php echo $mwm_aalLoader->options['displayTitle']; ?>" />
						<span class="setting-description"><?php _e('Title to display above anchor link list.','mwmaal') ?></span>
				</td>
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Auto Display In Content','mwmaal') ?></th>
				<td>
				<input type="checkbox" name="autoDisplayInContent" value="1" <?php checked(true, $mwm_aalLoader->options['autoDisplayInContent']); ?> />
						<?php _e('Do you want to automatically display links to &lt;H&gt; tags at the top of content?','mwmaal') ?>
				</td>
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"></th>
				<td>
				<?php _e('If auto display is on, where do you want the links to display?','mwmaal') ?><br/>
				<BLOCKQUOTE><BLOCKQUOTE>
			<input type="checkbox" name="is_home" value="1" <?php checked($mwm_aalLoader->options['is_home']); ?> /> <?php _e("Front page of the blog (not recommended)", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_single" value="1" <?php checked($mwm_aalLoader->options['is_single']); ?> /> <?php _e("Individual blog posts", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_page" value="1" <?php checked($mwm_aalLoader->options['is_page']); ?> /> <?php _e('Individual WordPress "Pages"', 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_category" value="1" <?php checked($mwm_aalLoader->options['is_category']); ?> /> <?php _e("Category archives", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_tag" value="1" <?php checked($mwm_aalLoader->options['is_tag']); ?> /> <?php _e("Tag listings", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_date" value="1" <?php checked($mwm_aalLoader->options['is_date']); ?> /> <?php _e("Date-based archives", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_author" value="1" <?php checked($mwm_aalLoader->options['is_author']); ?> /> <?php _e("Author archives", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_search" value="1" <?php checked($mwm_aalLoader->options['is_search']); ?> /> <?php _e("Search results", 'mwmaal'); ?><br/>
				</BLOCKQUOTE></BLOCKQUOTE>
				</td>
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('List Output Type','mwmaal') ?></th>
				<td>
			<input type="checkbox" name="is_numbering" value="1" <?php checked($mwm_aalLoader->options['is_numbering']); ?> /> <?php _e("Numerically ordered list (otherwise bulleted list)", 'mwmaal'); ?><br />
		
				</td>
			</tr> 
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Indentation','mwmaal') ?></th>
				<td>
			<input type="checkbox" name="is_indent" value="1" <?php checked($mwm_aalLoader->options['is_indent']); ?> /> <?php _e("Auto Links indentation", 'mwmaal'); ?><br />
		
				</td>
			</tr> 
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Heading','mwmaal') ?></th>
				<td>
			   from <?php headSet('is_headHi',$mwm_aalLoader->options['is_headHi'])?> to <?php headSet('is_headLo',$mwm_aalLoader->options['is_headLo']);
			   _e(' (first heading number should be less or equal than the second)','mwmaal');
				?>
				 
				</td>
			</tr> 
			 <tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Localization source for nicer','mwmaal') ?></th>
				<td>
				<input type="text" size="5" name="loc-nicer" value="<?php echo $mwm_aalLoader->options['loc-nicer']; ?>" />
						<span class="setting-description"><?php _e('.UTF8 (Change only if international characters in anchor URL is cutted. For example cs_CZ for Czech. Default is en_US)','mwmaal') ?></span>
				</td>
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Show backlink next to heading','mwmaal') ?></th>
				<td>
				<input type="checkbox" name="is_backlink" value="1" <?php checked(true, $mwm_aalLoader->options['is_backlink']); ?> />
						<?php _e('Check if you want activate backlink with text ','mwmaal') ?> <input type="text" size="20" name="backlink_text" value="<?php echo $mwm_aalLoader->options['backlink_text']; ?>" /> by char <input type="text" size="1" name="backlink_char" value="<?php echo $mwm_aalLoader->options['backlink_char']; ?>" /> (only one char allowed)<br/>
				<input type="checkbox" name="is_backlinkfront" value="1" <?php checked($mwm_aalLoader->options['is_backlinkfront']); ?> />
						<?php _e('Display backlink at the beginning rather than the end','mwmaal') ?>
				</td>
				
			</tr>
			<!--<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('# of Columns in Content','mwmaal') ?></th>
				<td>
				<input type="text" size="3" name="contentColumnCount" value="<?php echo $mwm_aalLoader->options['contentColumnCount']; ?>" />
						<span class="setting-description"><?php _e('How many columns do you want to break the links displayed in the content into.','mwmaal') ?></span>
				</td>
			</tr>-->
		</table>
		<div class="submit"><input class="button-primary" type="submit" name="updateoption" value="<?php _e('Save Changes') ;?>"/></div> 
	</form>

</div>
