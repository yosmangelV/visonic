<?php

class CodelessImportCore{
	public $type = '';
	public function __construct(){
		
		
		$this->message = '';
        $this->type = 'demos';
        $this->save_type = 'download';
	}

		function save($file, $content){

			$dir = CODELESS_BASE . 'includes/dummy_data/backups/'.time().'/';
			if(!is_dir($dir)){
				mkdir($dir); 
			}
			if(!file_put_contents($dir.$file, $content)){
				$this->message = __("Can't write file", "redux-framework");
				return false;
			}
			return true;		

		}

		public function read_file($file){
			$content = "";
			
			$file = get_template_directory() . '/includes/dummy_data/'.$this->type.'/'. $file;
			
			if ( file_exists($file) ) {
				$content = $this->get_content($file);
			} else {
				$this->message = __("File doesn't exist", "redux-framework");
			}
			
			if ($content) {
				$unserialized_content = unserialize(base64_decode($content));

				if ($unserialized_content) {

					return $unserialized_content;
				}
			}
			return false;
		}

		function get_content( $file ) {
			$content = '';
			if ( function_exists('realpath') )
				$filepath = realpath($file);
			if ( !$filepath || !@is_file($filepath) )
				return '';

			if( ini_get('allow_url_fopen') ) {
				$method = 'fopen';
			} else {
				$method = 'file_get_contents';
			}
			if ( $method == 'fopen' ) {
				$handle = fopen( $filepath, 'rb' );

				if( $handle !== false ) {
					while (!feof($handle)) {
						$content .= fread($handle, 8192);
					}
					fclose( $handle );
				}
				return $content;
			} else {
				return file_get_contents($filepath);
			}
		}

		function get_backups(){
			$final_dirs = array();
			$dirs = scandir(CODELESS_BASE . 'includes/dummy_data/backups');

			foreach($dirs as $dir)
				if(is_dir(CODELESS_BASE . 'includes/dummy_data/backups/'.$dir) && $dir != '.' && $dir != '..')
					$final_dirs[] = $dir; 
			return $final_dirs;
		}


        /* ---------------------------------------------------- CONTENT --------------------------------------------------------*/

        function codeless_import_content($file, $attachments){
			
				ob_start();
				
				$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				
				require_once($class_wp_importer);
				require_once(get_template_directory() . '/admin/inc/fields/codeless_import/class.wordpress-importer.php');
			
				$wp_import = new WP_Import();
				set_time_limit(0);
				
				$path = get_template_directory() . '/includes/dummy_data/'.$this->type.'/' . $file.'.xml';

				$wp_import->fetch_attachments = $attachments;
				$value = $wp_import->import($path);
				ob_get_clean();
				if(is_wp_error($value)){
					$this->message .= __("Error during Import. Try Again", "redux-framework");
					return 2;
				}
				else {
					$this->message .= __("Content has been imported successfully ", "redux-framework");
					return 1;
				}
				
		}


		function codeless_export_content(){
			ob_start();
			if (!function_exists('export_wp')) {
				$export = ABSPATH . 'wp-admin/includes/export.php';
				
				require_once($export);
			}
			export_wp();

			$output = ob_get_clean();

			if($this->save('content.xml', $output)){
				$this->message = __("Content exported successfully", "redux-framework");
				return 1;
			}else{
				return 2;
			}
				
		}

		

		/* ---------------------------------------------------- END CONTENT --------------------------------------------------------*/


		/* ---------------------------------------------------- OPTIONS ------------------------------------------------------------*/

		public function codeless_import_options($file){
			$options = $this->read_file($file);
			if($options){
				update_option('cl_redata', $options);
				$this->message .= '<br />'.__("Options imported successfully", "redux-framework");
				return 1;
			}else{
				$this->message .= '<br />'.__("Your backup doesn't contain options.txt file.", "redux-framework");
				return 2;
			}
		}

		public function codeless_import_options2($file){
			$file = unserialize( base64_decode($file ));
			if(!empty($file ) ){
				update_option('cl_redata', $file);
				$this->message .= '<br />'.__("Options imported successfully", "redux-framework");
				return 1;
			}else{
				$this->message .= '<br />'.__("Your backup doesn't contain options.txt file.", "redux-framework");
				return 2;
			}
		}
		

		public function codeless_export_options(){
            $backup_options = get_option('cl_redata');
            $backup_options['redux-backup'] = '1';
            if ( isset( $var['REDUX_imported'] ) ) {
                unset( $var['REDUX_imported'] );
            }
            //if (version_compare(phpversion(), "5.3.0", ">=")) {
            //    $content = json_encode( $backup_options, true ) ;
            //} else {
            $content = base64_encode(serialize( $backup_options ));
			if($this->save("options.txt", $content) ){
				$this->message = __("Options exported successfully", "redux-framework");
				return 1;
			}else{
				return 2;
			}

		}



		/* ---------------------------------------------------- End OPTIONS --------------------------------------------------------*/

		/* ---------------------------------------------------- WIDGETS ------------------------------------------------------------*/

		function codeless_import_widgets($file){
			$options = $this->read_file($file);
			if($options){
				foreach ((array) $options['final_widget'] as $widget => $widget_params) {
					update_option( 'widget_' . $widget, $widget_params );
				}
				$this->codeless_import_sidebars_widgets($file);
				$this->message .= '<br />'.__("Widgets Imported !", "redux-framework");
				return 1;
			}else{
				$this->message .= '<br />'.__("Your backup or demo doesn't contain sidebar_widgets.txt file.", "redux-framework");
				return 2;
			}
			
		}

		function codeless_import_sidebars_widgets($file){
			$widgets = get_option("sidebars_widgets");

			unset($widgets['array_version']);

			$data = $this->read_file($file);
			
			if ( is_array($data['sidebars']) ) {
				$widgets = array_merge( (array) $widgets, (array) $data['sidebars'] );
				
				unset($widgets['wp_inactive_widgets']);
				
				$widgets = array_merge(array('wp_inactive_widgets' => array()), $widgets);
				$widgets['array_version'] = 2;
				wp_set_sidebars_widgets($widgets);
			}
		}

		function codeless_export_widgets_sidebars(){
			global $wp_registered_widgets;
			$data = array();
			$data['sidebars'] = get_option("sidebars_widgets");
			$data['sidebars'] = $this->exclude_sidebar_keys($data['sidebars']); 

			$widgets = array();
			$data['final_widget'] = array();
			foreach ($wp_registered_widgets as $widget => $widget_params) 
				$widgets[] = $widget_params['callback'][0]->id_base; 

			foreach ($widgets as $widget) {
				$widget_ = get_option( 'widget_' . $widget ); 
				if ( !empty($widget_) ) 
					$data['final_widget'][ $widget ] = $widget_;
			}

			$encoded = base64_encode(serialize($data));
			if($this->save("sidebar_widgets.txt", $encoded)){
				$this->message = __("Widgets exported successfully", "redux-framework");
				return 1;
			}else{
				return 2;
			}
		}

		private function exclude_sidebar_keys( $keys = array() ){
			if ( ! is_array($keys) )
				return $keys;

			unset($keys['wp_inactive_widgets']);
			unset($keys['array_version']);
			return $keys;
		}


		/* ---------------------------------------------------- END WIDGETS ------------------------------------------------------------*/

		/* ---------------------------------------------------- Menu -------------------------------------------------------------------*/
		public function codeless_import_menus($file){
			global $wpdb;
			
			$terms = $wpdb->prefix . "terms";
			$menus_data = $this->read_file($file);
			
			if($menus_data){
				$menu_array = array();
				if(is_array($menus_data) && !empty($menus_data)){
					foreach ($menus_data as $registered_menu => $menu_slug) {
						$term_rows = $wpdb->get_results("SELECT * FROM $terms where slug='{$menu_slug}'", ARRAY_A);
						if(isset($term_rows[0]['term_id'])) {
							$term_id_by_slug = $term_rows[0]['term_id'];
						} else {
							$term_id_by_slug = null; 
						}
						$menu_array[$registered_menu] = $term_id_by_slug;
					}
				}
				
				set_theme_mod('nav_menu_locations', array_map('absint', $menu_array ) );
				$this->message .= '<br />'.__("Menu Imported successfully", "redux-framework");
				return 1;
			}else{
				$this->message .= '<br />'.__("Your backup or demo doesn't contain sidebar_widgets.txt file.", "redux-framework");
				return 2;
			}
			

		}

		public function codeless_export_menu(){
			global $wpdb;
			
			$data = array();
			$locations = get_nav_menu_locations();
 
			$terms_table = $wpdb->prefix . "terms";
			foreach ((array)$locations as $location => $menu_id) {
				$menu_slug = $wpdb->get_results("SELECT * FROM $terms_table where term_id={$menu_id}", ARRAY_A);
				$data[ $location ] = $menu_slug[0]['slug'];
			}
			$output = base64_encode(serialize( $data ));
			if($this->save("menu.txt", $output)){
				$this->message = __("Menu exported successfully", "redux-framework");
				return 1;
			}else{
				return 2;
			}

		}

		/* ---------------------------------------------------- End Menu ---------------------------------------------------------------*/
}

/* ------------------------------------------------ AJAX -----------------------------------------------------------------*/
		global $codelessCore;
		$codelessCore = new CodelessImportCore();

        function ajax_codeless_import_content()
		{
			
			global $codelessCore;

			$attachments = false;
			$codelessCore->type = $_POST['type'];
			if ($_POST['import_attachments'] == 1)
				$attachments = true;
				
			$path = "default/";
			if (!empty($_POST['demo']))
				$path = $_POST['demo']."/";

			$status = $codelessCore->codeless_import_content($path.$_POST['xml'], $attachments);
			echo $status.$codelessCore->message;
			die();
		}

		add_action("wp_ajax_codeless_import_content", 'ajax_codeless_import_content' );

		function ajax_codeless_import_widgets()
		{
			global $codelessCore;
			$codelessCore->type = $_POST['type'];
			$path = "default/";
			if (!empty($_POST['demo']))
				$path = $_POST['demo']."/";

			$status = $codelessCore->codeless_import_widgets($path.'sidebar_widgets.txt');
			echo $status.$codelessCore->message;
			die();
		}

		add_action("wp_ajax_codeless_import_widgets", 'ajax_codeless_import_widgets' );

		function ajax_codeless_import_options()
		{
			global $codelessCore;
			$codelessCore->type = $_POST['type'];
			$path = "default/";
			if (!empty($_POST['demo']))
				$path = $_POST['demo']."/";

			$status = $codelessCore->codeless_import_options($path.'options.txt');
			echo $status.$codelessCore->message;
			die();
		}

		add_action("wp_ajax_codeless_import_options", 'ajax_codeless_import_options' );

		function ajax_codeless_import_options2()
		{
			global $codelessCore;
			$codelessCore->type = $_POST['type'];
			
			$val = $_POST['options'];
			$status = $codelessCore->codeless_import_options2($val);
			echo $status.$codelessCore->message;
			die();
		}

		add_action("wp_ajax_codeless_import_options2", 'ajax_codeless_import_options2' );

		function ajax_codeless_import_menu()
		{		
			global $codelessCore;
			$codelessCore->type = $_POST['type'];
			$path = "default/";
			if (!empty($_POST['demo']))
				$path = $_POST['demo']."/";

			$status = $codelessCore->codeless_import_menus($path.'menu.txt');
			echo $status.$codelessCore->message;
			die();
		}

		add_action("wp_ajax_codeless_import_menus", 'ajax_codeless_import_menu' );

		function ajax_codeless_export(){
			global $codelessCore;

			
			$type = $_POST['type'];
			$status = 0;
			$message= '';
			if($type == 'all'){
				$status1 = $codelessCore->codeless_export_content();
				$message .= $codelessCore->message.'<br />';
				$status2 = $codelessCore->codeless_export_options();
				$message .= $codelessCore->message.'<br />';
				$status3 = $codelessCore->codeless_export_widgets_sidebars();
				$message .= $codelessCore->message.'<br />';
				$status4 = $codelessCore->codeless_export_menu();
				$message .= $codelessCore->message.'<br />';
				if($status1 + $status2 + $status3 + $status4 == 4 )
					$status = 1;
				else
					$status = 2;
				echo '0'.$message;
			}else{
				if($type == 'content')
					$status = $codelessCore->codeless_export_content();

				if($type == 'widgets')
					$status = $codelessCore->codeless_export_widgets_sidebars();

				if($type == 'options')
					$status = $codelessCore->codeless_export_options();

				echo $status.$codelessCore->message;
			}

			

			die();
		}

		add_action("wp_ajax_codeless_export", 'ajax_codeless_export' );


?>