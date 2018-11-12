<?php
/*
 * Public class
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Plugin public class
 * */
if (!class_exists('CDLOPD_Public')) { // Don't initialise if there's already a class activated

    class CDLOPD_Public {

        public function __construct() {
            //
        }

        /* 		
         * Initialize the class and start calling our hooks and filters		
         * @since 2.0.0		
         */

        public function init() {
            add_filter('body_class', array($this, 'body_class'));
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
            add_action('wp_head', array($this, 'add_css'));
            add_action('wp_footer', array($this, 'add_js'), 1000);
            add_action('wp_footer', array($this, 'add_notification_bar'), 1000);
            add_action('wp_head', array($this, 'check_cookies_header'));
            add_action('wp_footer', array($this, 'check_cookies_footer'));
        }

        /* 		
         * Initialize the class and start calling our hooks and filters		
         * @since 2.0.0		
         */

        public function body_class($classes) {
            return $classes;
        }

        /*
         * Enqueue styles and scripts
         * @since 2.0.0
         */

        public function enqueue_scripts() {
            $exclude = $this->show_bar();
            // Only do all this if post isn't excluded
            if (!empty($exclude)) {
                wp_enqueue_style('cookie-consent-style', CDLOPD_PLUGIN_URL . 'assets/css/style.css', '2.3.0');
                wp_enqueue_script('cookie-consent', CDLOPD_PLUGIN_URL . 'assets/js/click-datos-lopd-js.js', array('jquery'), '2.3.0', true);
                wp_localize_script(
                        'cookie-consent', 'cdlopd_vars', array(
                    'version' => 1,
                        )
                );
            }
        }

        /*
         * Check if post or page is excluded from displaying the bar
         * @since 2.2.0
         */

        public function show_bar() {
            global $post;
            $options = get_option('cdlopd_options_settings');
            if (isset($post->ID)) {
                $post_id = $post->ID;
                $excluded = get_post_meta($post_id, 'cdlopd_exclude', true);
                if ($excluded == 1 && !empty($options['enable_metafield'])) {
                    return false;
                }
            }
            return true;
        }

        /*
         * Add some CSS to the header
         * @since 2.0.0
         */

        public function add_css() {
            $exclude = $this->show_bar();
            // Only do all this if post isn't excluded
            if (!empty($exclude)) {
                $cdlopd_content_settings = get_option('cdlopd_content_settings');
                $position_css = 'position: fixed;
					left: 0;
					top: 0;
					width: 100%;';
                // Figure out the bar position
                if (!isset($cdlopd_content_settings['position'])) {
                    $cdlopd_content_settings['position'] = "";
                }

                if ($cdlopd_content_settings['position'] == 'top-bar') {
                    $position_css = 'position: fixed;
					left: 0;
					top: 0;
					width: 100%;';
                } else if ($cdlopd_content_settings['position'] == 'bottom-bar') {
                    $position_css = 'position: fixed;
					left: 0;
					bottom: 0;
					width: 100%;';
                } else if ($cdlopd_content_settings['position'] == 'top-right-block') {
                    $position_css = 'position: fixed;
					right: 20px;
					top: 6%;
					width: 300px;';
                } else if ($cdlopd_content_settings['position'] == 'top-left-block') {
                    $position_css = 'position: fixed;
					left: 20px;
					top: 6%;
					width: 300px;';
                } else if ($cdlopd_content_settings['position'] == 'bottom-left-block') {
                    $position_css = 'position: fixed;
					left: 20px;
					bottom: 6%;
					width: 300px;';
                } else if ($cdlopd_content_settings['position'] == 'bottom-right-block') {
                    $position_css = 'position: fixed;
					right: 20px;
					bottom: 6%;
					width: 300px;';
                }
                // Get our styles
                if (!isset($cdlopd_content_settings['text_color'])) {
                    $cdlopd_content_settings['text_color'] = '';
                }
                $text_color = $cdlopd_content_settings['text_color'];

                if (!isset($cdlopd_content_settings['bg_color'])) {
                    $cdlopd_content_settings['bg_color'] = '';
                }
                $bg_color = $cdlopd_content_settings['bg_color'];

                if (!isset($cdlopd_content_settings['link_color'])) {
                    $cdlopd_content_settings['link_color'] = '';
                }
                $link_color = $cdlopd_content_settings['link_color'];

                if (!isset($cdlopd_content_settings['button_bg_color'])) {
                    $cdlopd_content_settings['button_bg_color'] = '';
                }
                $button_bg = $cdlopd_content_settings['button_bg_color'];

                if (!isset($cdlopd_content_settings['button_color'])) {
                    $cdlopd_content_settings['button_color'] = '';
                }
                $button_color = $cdlopd_content_settings['button_color'];

                $button_style = 'border: 0; padding: 6px 9px; border-radius: 3px;';

                // Build our CSS
                $css = '<style id="cdlopd-css" type="text/css" media="screen">';
                $css .= '
				#catapult-cookie-bar {
					box-sizing: border-box;
					max-height: 0;
					opacity: 0;
					z-index: 99999;
					overflow: hidden;
					color: ' . $text_color . ';
					' . $position_css . '
					background-color: ' . $bg_color . ';
				}
				#catapult-cookie-bar a {
					color: ' . $link_color . ';
				}
				#catapult-cookie-bar .x_close span {
					background-color: ' . $button_color . ';
				}
				button#catapultCookie {
					background:' . $button_bg . ';
					color: ' . $button_color . ';
					' . $button_style . '
				}
				#catapult-cookie-bar h3 {
					color: ' . $text_color . ';
				}
				.has-cookie-bar #catapult-cookie-bar {
					opacity: 1;
					max-height: 999px;
					min-height: 30px;
				}';
                $css .= '</style>';
                echo $css;
                // Add it to the header
            }
        }

        /*
         * Add some JS to the footer
         * @since 2.0.0
         */

        public function add_js() {

            $exclude = $this->show_bar();
            // Only do all this if post isn't excluded
            if (!empty($exclude)) {
                $cdlopd_content_settings = get_option('cdlopd_content_settings');
                if (!isset($cdlopd_content_settings['position'])) {
                    $cdlopd_content_settings['position'] = '';
                }
                if ($cdlopd_content_settings['position'] == 'top-bar' || $cdlopd_content_settings['position'] == 'bottom-bar') {
                    $type = 'bar';
                } else {
                    $type = 'block';
                }
                ?>

                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        if (catapultReadCookie('catAccCookies') || catapultReadCookie("catAccCookiesDeny") /*|| catapultReadCookie("catAccCookiesUnan")*/) {

                        } else {
                            $("body").addClass("has-cookie-bar");
                            $("body").addClass("cookie-bar-<?php echo $type; ?>");
                        }

//                        if (catapultReadCookie('catAccCookies') || catapultReadCookie("catAccCookiesDeny")) {
//
//                        } else {
//                            setTimeout("cookiesinaceptarnirechazar()", 30000);
//                        }
//
//                        if (catapultReadCookie("catAccCookiesUnan")) {
//                            setTimeout(function () {
//                                $("body").addClass("has-cookie-bar");
//                                $("body").addClass("cookie-bar-<?php //echo $type; ?>");
//                                setTimeout("cookiesinaceptarnirechazar()", 30000);
//                            }, 300000);
//                        }
                    });
                </script>


                <?php
            }
        }

        /*
         * Add the notification bar itself
         * @since 2.0.0
         */

        public function add_notification_bar() {

            $exclude = $this->show_bar();
            // Only do all this if post isn't excluded
            if (!empty($exclude)) {
                $cdlopd_content_settings = get_option('cdlopd_content_settings');
                // Check if it's a block or a bar
                $is_block = true;

                if (!isset($cdlopd_content_settings['position'])) {
                    $cdlopd_content_settings['position'] = '';
                }

                if ($cdlopd_content_settings['position'] == 'top-bar' || $cdlopd_content_settings['position'] == 'bottom-bar') {
                    $is_block = false; // It's a bar
                }

                // Add some classes to the block
                $classes = '';
                $classes .= ' rounded-corners';
                $classes .= ' drop-shadow';

                if (empty($cdlopd_content_settings['display_accept_with_text'])) {
                    $classes .= 'float-accept';
                }

                // Allowed tags
                $allowed = array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array(),
                    'p' => array()
                );

                $content = '';
                $close_content = '';

                // Print the notification bar
                $content = '<div id="catapult-cookie-bar" class="' . $classes . '">';

                // Add a custom wrapper class if specified
                if ($cdlopd_content_settings['position'] == 'top-bar' || $cdlopd_content_settings['position'] == 'bottom-bar') {
                    $content .= '<div class="cdlopd-inner ">';
                    $close_content = '</div><!-- custom wrapper class -->';
                }

                // Add a title if it's a block
                if ($cdlopd_content_settings['position'] != 'top-bar' && $cdlopd_content_settings['position'] != 'bottom-bar') {
                    $heading_text = wp_kses($cdlopd_content_settings['heading_text'], $allowed);
                    $heading_text = apply_filters('cdlopd_heading_text', $heading_text);
                    $content .= sprintf('<span>%s</span>', $heading_text
                    );
                }

                // Make the Read More link
                $more_text = '';
                if ($cdlopd_content_settings['more_info_text']) {
                    // Find what page we're linking to
                    if (!empty($cdlopd_content_settings['more_info_url'])) {
                        // Check the absolute URL first
                        $link = $cdlopd_content_settings['more_info_url'];
                    } else {
                        // Make sure, we get the right page translation, using PolyLang, if pll_get_post function exists
                        $page_id = $cdlopd_content_settings['more_info_page'];
                        if (function_exists('pll_get_post')) {
                            $page_id = pll_get_post($page_id);
                        }
                        // Use the internal page
                        $link = get_permalink($page_id);
                    }
                    $more_info_text = wp_kses($cdlopd_content_settings['more_info_text'], $allowed);
                    $more_info_text = apply_filters('cdlopd_more_info_text', $more_info_text);
                    $more_text = sprintf(
                            '<a class="cdlopd-more-info-link" tabindex=0 target="%s" href="%s">%s</a>', esc_attr($cdlopd_content_settings['more_info_target']), esc_url($link), $more_info_text
                    );
                }

                $button_text = '';
                if (empty($cdlopd_content_settings['x_close'])) {
                    $accept_text = wp_kses($cdlopd_content_settings['accept_text'], $allowed);
                    $accept_text = apply_filters('cdlopd_accept_text', $accept_text);
                    $button_text = sprintf(
                            '<button id="catapultCookie" tabindex=0 onclick="catapultAcceptCookies();">%s</button>', $accept_text
                    );
                }
                $buttonr_text = '';
                if (empty($cdlopd_content_settings['x_close'])) {
                    $deny_text = wp_kses($cdlopd_content_settings['deny_text'], $allowed);
                    $deny_text = apply_filters('cdlopd_deny_text', $deny_text);
                    $buttonr_text = sprintf(
                            '<button id="catapultCookie" tabindex=0 onclick="catapultDenyCookies();">%s</button>', $deny_text
                    );
                }

                // Boton de rechazar o no 

                if (get_post_meta(11122, 'sheader', TRUE) == true || get_post_meta(11123, 'sfooter', TRUE) == true) {
                    $notification_text = wp_kses_post(do_shortcode($cdlopd_content_settings['notification_text']));
                    $notification_text = apply_filters('cdlopd_notification_text', $notification_text);
                    $content .= sprintf(
                            '<span class="cdlopd-left-side">%s %s</span><span class="cdlopd-right-side">%s %s</span>', $notification_text, $more_text, $button_text, $buttonr_text
                    );
                } else {
                    $notification_text = wp_kses_post(do_shortcode($cdlopd_content_settings['notification_text']));
                    $notification_text = apply_filters('cdlopd_notification_text', $notification_text);
                    $content .= sprintf(
                            '<span class="cdlopd-left-side">%s %s</span><span class="cdlopd-right-side">%s</span>', $notification_text, $more_text, $button_text
                    );
                }

                // Close custom wrapper class if used
                $content .= $close_content;

                $content .= '</div><!-- #catapult-cookie-bar -->';

                echo apply_filters('catapult_cookie_content', $content, $cdlopd_content_settings);
            }
        }

        public function check_cookies_header() {
            if (isset($_COOKIE['catAccCookies']) && $_COOKIE['catAccCookies'] == 1) {
                if (get_post_meta(11122, 'sheader', TRUE) == true) {
                    $scriptsheader = get_post_meta(11122, 'sheader', TRUE);
                    echo $scriptsheader;
                }
            }
        }

        public function check_cookies_footer() {
            if (isset($_COOKIE['catAccCookies']) && $_COOKIE['catAccCookies'] == 1) {
                if (get_post_meta(11123, 'sfooter', TRUE) == true) {
                    $scriptsfooter = get_post_meta(11123, 'sfooter', TRUE);
                    echo $scriptsfooter;
                }
            }
        }

    }

}