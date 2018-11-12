<?php
/**
 * mwm_aalAdminPanel - Admin Section for Better Anchor Links
 * 
 * @package Better Anchor Links
 * @author Luděk Melichar
 * @copyright 2011
 * @since 1.1.0
 */
if ($this->options['loc-nicer']) {$locnic=($this->options['loc-nicer']);} else {$locnic="en_US";}
$locnic = $locnic.".UTF8";
setlocale(LC_ALL, $locnic);
if (!class_exists('mwm_aal')) {
	class mwm_aal{
		var $links= array();
		var $findh = true;
		var $findAnchor = true;
		var $options = "";
		var $tag = "mwm-aal-display";
		var $htmltag = "<!--mwm_aal_display-->";
		var $isTagUsed = false;
			
		function mwm_aal(){
			$this->options = get_option('lm_bal_options');
			add_action('wp_print_styles', array(&$this, 'load_styles'));
			add_filter('the_content', array(&$this,'find_content_links'));
			add_filter('the_excerpt', array(&$this,'remove_excerpt_display'));
			add_shortcode($this->tag, array(&$this,'output_content_links'));
			add_shortcode($this->htmltag, array(&$this,'output_content_links')); 
		}
		
		function load_styles() {
		
			if ($this->options['activateCSS']){
				wp_enqueue_style('MWM-AAL-FRONT-CSS', MWMAAL_URLPATH.'css/mwm-aal.css', false, '1.2.0', 'screen');
			}
		}
		
		function find_content_links($content){
		
			$this->find_content_name_links($content);
			$content= $this->add_anchors_to_content($content);

			if($this->options['is_backlink'] and $this->isTagUsed){
				$content= $this->add_backlinks_to_content($content);
			}

			if($this->options['autoDisplayInContent'] and !$this->isTagUsed){
				if ((is_home()		and $this->options['is_home']) or
				    (is_single()	and $this->options['is_single']) or
				    (is_page()		and $this->options['is_page']) or
				    (is_category()	and $this->options['is_category']) or
					(is_tag()		and $this->options['is_tag']) or
				    (is_date()		and $this->options['is_date']) or
					(is_author()	and $this->options['is_author']) or
				    (is_search()	and $this->options['is_search'])) {

					if($this->options['is_backlink']) {
						$content= $this->add_backlinks_to_content($content);
					}
					$content = $this->auto_output_content_links($content);
				}
			}
	
			return $content;
		}
		
		function find_content_name_links($content){
			$pattern='#<h(['.$this->options['is_headHi'].'-'.$this->options['is_headLo'].'])(?: [^>]+)?>(.+?)</h\1>#is';
			preg_match_all($pattern,$content, $matches, PREG_SET_ORDER);
			$this->links = $matches;

			if(strpos($content, $this->tag)){
				$this->isTagUsed = true;
			}
			
			return $content;
		}
		
		function add_anchors_to_content($content){
			if(count($this->links) >= 1){
				foreach ($this->links as $val) {
					$rtext='<a class="mwm-aal-item" name="'.urlencode($this->toAscii(strip_tags($val[2]))).'"></a>';
					$pos = strpos($content, $val[0]);
					$content = substr_replace($content, $rtext, $pos, 0);
				}
			}
			return $content;
		
		}
		
		function add_backlinks_to_content($content){
		if (!$this->options['is_backlinkfront']){
			$linkback = '<a title="'.$this->options['backlink_text'].'" href="#Content-bal-title"> '.$this->options['backlink_char'].'</a>';
		} else {
			$linkback = '<a title="'.$this->options['backlink_text'].'" href="#Content-bal-title">'.$this->options['backlink_char'].' </a>';
		}
			if(count($this->links) >= 1){
				foreach ($this->links as $val) {
					$delka = (strlen($val[0])-5);
					$posstart = ((strpos($val[0], ">"))+1);
					if (!$this->options['is_backlinkfront']){
						$posend = strpos($content, $val[0])+$delka;
					} else {
						$posend = strpos($content, $val[0])+$posstart;
					}
					$content = substr_replace($content, $linkback, $posend, 0);
				}
			}
			return $content;
		
		}
		
		function auto_output_content_links($content){
			if(count($this->links) >= 1){
				$output = $this->output_content_links();
				if(strpos($content, $this->htmltag)){
					$content = $output.$content;
				} else {
					$content = $output.$content;
				}
			}
			return $content;
		}
		
		function output_content_links(){
			$info = "";
			if ($this->options['is_numbering']) {$seznam="ol";} else {$seznam="ul";}
			if(count($this->links) >= 1){
				$title = __($this->options['displayTitle'],'mwmall');
				$info = '<div class="mwm-aal-container">';
				$info.= "<a class='mwm-aal-item' name='Content-bal-title'></a><div class='mwm-aal-title'>$title</div><$seznam>";
				foreach ($this->links as $val) {
					if ($this->options['is_indent']) {
						if(empty($minule)) {
							$minule = $val[1];
							$prvni = $val[1];
							$ind = --$prvni;
						}else{$ind = $val[1]-$minule;}
						while ($ind > 0) {$info .='<'.$seznam.'>'; $ind-- ;}
						while ($ind < 0) {$info .='</'.$seznam.'>'; $ind++ ;}
						$minule = $val[1];
					}
					$urlval = urlencode($this->toAscii(strip_tags($val[2])));
					$info.='<li><a href="#'.$urlval.'">'.strip_tags($val[2]).'</a></li>';
				}
            if ($this->options['is_indent']) {
            	$ind = (++$prvni)-$minule;
				while ($ind < 0) {$info .='</'.$seznam.'>'; $ind++ ;}
			}
			$info .= '</'.$seznam.'></div>';
			}
			return $info;
		} 
		
		function output_sidebar_links(){
			
			if ((count($this->links) >= 1) and	((is_single()   and $this->options['is_single']) or
				    (is_page()     and $this->options['is_page']))){
				    $title = __($this->options['displayTitle'],'mwmall');
			$info = '<div class="mwm-aal-sidebar-container">';
			$info .= "<h2>$title</h2><ul>";
			foreach ($this->links as $val) {
			$urlval = urlencode($this->toAscii(strip_tags($val[2])));
				$info.='<li><a href="#'.$urlval.'">'.strip_tags($val[2]).'</a></li>';
			}
			$info .= '</ul></div>';
			echo $info;
			}
		}
		
		function remove_excerpt_display($excerpt){
			$data = __($this->options['displayTitle'],'mwmall');
			foreach ($this->links as $val) {
				$data .= strip_tags($val[2]);
			}
			
			$excerpt = str_replace($data, '', $excerpt);
			$excerpt = str_replace($tag, '', $excerpt);
			$excerpt = str_replace($htmltag, '', $excerpt);
			return $excerpt;
		}
		
		function toAscii($str, $replace=array(), $delimiter='-') {
			if( !empty($replace) ) {
				$str = str_replace((array)$replace, ' ', $str);
			}

			$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
			$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
			$clean = strtolower(trim($clean, '-'));
			$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

			return $clean;
		}
	
	}
	
	//Start Loader
	global $mwm_aal;
	$mwm_aal = new mwm_aal();
	
}
?>
