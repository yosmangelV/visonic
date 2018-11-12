<?php
/**
 * mwm_aalAdminPanel - Admin Section for Better Anchor Links
 * 
 * @package Better Anchor Links
 * @author Luděk Melichar
 * @copyright 2011
 * @since 1.1.0
 */

class mwm_aalAdminPanel{

	function mwm_aalAdminPanel(){
		add_action('admin_menu', array(&$this,'load_admin_options'));
	}

	function load_admin_options(){
		if (function_exists('add_options_page')) {
            add_options_page('Better Anchor Links Options','B. Anchor Links', 6, MWMAALFOLDER . '/admin/options.php');
        }
	}
}

?>
