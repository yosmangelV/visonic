<?php

if( !defined( 'ABSPATH' ) ) exit;
if( !class_exists( 'ReduxFramework_codeless_import' ) ) {

    /**
     * Main ReduxFramework_import_export class
     *
     * @since       1.0.0
     */
	
    
    class ReduxFramework_codeless_import {

    	public function __construct( $field = array(), $value = '', $parent ) {  
            $this->parent = $parent;
            $this->field  = $field;
            $this->value  = $value;
            $this->codeless_core = new CodelessImportCore();
            $this->message = '';
            $this->type = 'demos';
            $this->save_type = 'download';

            /*add_action("wp_ajax_codeless_import_content",              array($this, "ajax_codeless_import_content"));
            add_action("wp_ajax_nopriv_codeless_import_content",       array($this, "ajax_codeless_import_content"));

            add_action("wp_ajax_codeless_import_widgets",              array($this, "ajax_codeless_import_widgets"));
            add_action("wp_ajax_nopriv_codeless_import_widgets",       array($this, "ajax_codeless_import_widgets"));

            add_action("wp_ajax_codeless_import_options",              array($this, "ajax_codeless_import_options"));
            add_action("wp_ajax_nopriv_codeless_import_options",       array($this, "ajax_codeless_import_options"));
 
            add_action("wp_ajax_codeless_import_menus",                array($this, "ajax_codeless_import_menus"));
            add_action("wp_ajax_nopriv_codeless_import_menus",         array($this, "ajax_codeless_import_menus"));*/

            
        }

        public function init(){
        	
        } 

        function render() {
        	$secret     = md5( AUTH_KEY . SECURE_AUTH_KEY );
            echo '</td></tr></table><table class="form-table no-border redux-group-table redux-raw-table" style="margin-top: -20px;"><tbody><tr><td>';
            
            echo '<div id="import_export_default_section_group' . '">';
            
	            echo '<h2>' . __( 'Import Options', 'redux-framework' ) . '</h2>';
	            echo '<div class="redux-section-desc">';
	            	echo '<p class="description">' . __( 'You can import all demo data or only a piece of that. Select one from demo data or select a backup to import', 'redux-framework' )  . '</p>';
	            echo '</div>';
	            echo '<div class="opt_field">';
	            	echo '<span class="title"></span>';
	            	echo '<select id="import_type" name="import_type"><option value="all">All</option><option value="content">Content</option><option value="options">Theme Options</option><option value="widgets">Widgets</option><option value="on_builder">Import From Online Builder</option></select>';
	            echo '</div>';

	            echo '<div class="opt_field">';
	            	echo '<span class="title">'.__('Check to import attachments', 'redux-framework').'</span>';
	            	echo '<input type="checkbox" value="1" name="attachments" id="attachments" />';
	            echo '</div>';

                echo '<div class="opt_field online_builder">';

                    echo '<h4>Import From Online Builder</h4>';
                    echo '<textarea name="online_builder" id="online_builder"></textarea>';
         
                echo '</div>';

	            echo '<div class="opt_field demo">';

	            if(isset($this->field['data']) && is_array($this->field['data']) ){
	            	echo '<h4>Demo Data</h4>';
	            	echo '<select class="demodata" id="demodata">';
	            	foreach($this->field['data'] as $demo):

	            		echo '<option data-parts="'.$demo['parts'].'" data-img-src="'.$demo['image'].'" value="'.$demo['folder'].'">'.$demo['name'].'</option>';

	            	endforeach;
	            	echo '</select>';
	            }
	            echo '</div>';

	            echo '<div class="opt_field backup">';
	            $backups = $this->codeless_core->get_backups();
	            if(isset($backups) && count($backups) > 0 ){
	            	echo '<h4>Backups</h4>';
	            	echo '<select class="backups" id="backups">';
	            	echo '<option value="0">Dont Import Backup</option>';
	            	foreach($backups as $backup):

	            		echo '<option value="'.$backup.'">'.date('r', $backup).'</option>';

	            	endforeach;
	            	echo '</select>';
	            }else{
	            	echo '<h6>No Backups available</h4>';
	            }
	            echo '</div>';

            echo '<p><a href="#" id="import-data" name="import_data" class="button-primary">Import</a><span>' . apply_filters( 'redux-import-warning', __( 'WARNING! This will overwrite all existing option values, please proceed with caution!', 'redux-framework' ) ) . '</span></p>';
            echo '<div class="progressbar"><div id="import_progress" class="bar"></div><span class="text">Loading</span></div>';
            echo '<p class="import_status"></p>';

            echo '<div style="width:100%; float:left;">';


            echo '<h2>' . __( 'Export Options', 'redux-framework' ) . '</h2>';
            echo '<div class="redux-section-desc">';
            	echo '<p class="description">' . __( 'Here you can download your current site data. Keep this safe as you can use it as a backup should anything go wrong, or you can use it to restore your settings on this site (or any other site). You can send your dummy data to Codeless Team too if you want to share with the community', 'redux-framework' ) . '</p>';
            echo '</div>';

            echo '<div class="opt_field">';
	            	echo '<span class="title"></span>';
	            	echo '<select id="import_type2" name="import_type"><option value="all">All</option><option value="content">Content</option><option value="options">Theme Options</option><option value="widgets">Widgets</option></select>';
	        echo '</div>';

	       

            echo '<script type="text/javascript">var secret = "'.$secret.'";</script>';
            echo '<p><a href="#" id="save-backup" class="button-primary">' . __( 'Save as backup', 'redux-framework' ) . '</a> <a href="#" id="send-codeless" class="button-secondary">' . __( 'Send to community', 'redux-framework' ) . '</a></p>';
            echo '<div class="progressbar"><div id="export_progress" class="bar"></div><span class="text">Loading</span></div>';
            echo '<p class="export_status"></p>';
            echo '</div>';
            echo '</div>';
            
           
                echo '</td></tr></table><table class="form-table no-border" style="margin-top: 0;"><tbody><tr style="border-bottom: 0;"><th></th><td>';
            
        }

         


        public function enqueue() {
            wp_enqueue_script(
                'redux-field-import-export-js', 
                ReduxFramework::$_url . 'inc/fields/codeless_import/codeless_import.js', 
                array('jquery'), 
                time(), 
                true
            );

            wp_enqueue_style(
                'redux-field-import-export-css', 
                ReduxFramework::$_url . 'inc/fields/codeless_import/codeless_import.css', 
                time(), 
                true
            ); 
        } 
    }
}

?>