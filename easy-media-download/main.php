<?php
/*
Plugin Name: Easy Media Download
Version: 1.1.11
Plugin URI: https://noorsplugin.com/easy-media-download-plugin-for-wordpress/
Author: naa986
Author URI: https://noorsplugin.com/
Description: Easily embed download buttons for your digital media files
Text Domain: easy-media-download
Domain Path: /languages
*/

if(!defined('ABSPATH')) exit;
if(!class_exists('EASY_MEDIA_DOWNLOAD'))
{
    class EASY_MEDIA_DOWNLOAD
    {
        var $plugin_version = '1.1.11';
        var $plugin_url;
        var $plugin_path;
        function __construct()
        {
            define('EASY_MEDIA_DOWNLOAD_VERSION', $this->plugin_version);
            define('EASY_MEDIA_DOWNLOAD_SITE_URL',site_url());
            define('EASY_MEDIA_DOWNLOAD_URL', $this->plugin_url());
            define('EASY_MEDIA_DOWNLOAD_PATH', $this->plugin_path());
            $this->plugin_includes();
        }
        function plugin_includes()
        {
            if (is_admin()) {
                include_once('extensions/easy-media-download-extensions.php');
            }
            add_action('plugins_loaded', array($this, 'plugins_loaded_handler'), 10, 2 );
            add_action('admin_menu', array($this, 'add_options_menu'));
            add_shortcode('easy_media_download','easy_media_download_handler');
            add_shortcode('easy_media_download2','easy_media_download2_handler');
        }
        function plugin_url()
        {
            if($this->plugin_url) return $this->plugin_url;
            return $this->plugin_url = plugins_url( basename( plugin_dir_path(__FILE__) ), basename( __FILE__ ) );
        }
        function plugin_path(){ 	
            if ( $this->plugin_path ) return $this->plugin_path;		
            return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
        }
        function plugin_action_links($links, $file) {
            if ($file == plugin_basename(dirname(__FILE__) . '/main.php')) {
                $links[] = '<a href="options-general.php?page=easy-media-download-settings">'.__('Settings', 'easy-media-download').'</a>';
            }
            return $links;
        }
        function plugins_loaded_handler()
        {
            if(is_admin() && current_user_can('manage_options')){
                add_filter('plugin_action_links', array($this, 'plugin_action_links'), 10, 2);
            }
            load_plugin_textdomain( 'easy-media-download', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
        }
        function add_options_menu() {
            if (is_admin()) {
                add_options_page(__('Easy Media Download Settings', 'easy-media-download'), __('Easy Media Download', 'easy-media-download'), 'manage_options', 'easy-media-download-settings', array($this, 'options_page'));
            }
        }
        function options_page() {
            $plugin_tabs = array(
                'easy-media-download-settings' => __('General', 'easy-media-download'),
                'easy-media-download-settings&action=extensions' => __('Extensions', 'easy-media-download')
            );
            $url = "https://noorsplugin.com/easy-media-download-plugin-for-wordpress/";
            $link_text = sprintf(wp_kses(__('Please visit the <a target="_blank" href="%s">Easy Media Download</a> documentation page for usage instructions.', 'easy-media-download'), array('a' => array('href' => array(), 'target' => array()))), esc_url($url));          
            echo '<div class="wrap">';               
            echo '<h2>Easy Media Download - v'.$this->plugin_version.'</h2>';
            echo '<div class="notice notice-info">'.$link_text.'</div>';
            echo '<div id="poststuff"><div id="post-body">';

            if (isset($_GET['page'])) {
                $current = sanitize_text_field($_GET['page']);
                if (isset($_GET['action'])) {
                    $current .= "&action=" . sanitize_text_field($_GET['action']);
                }
            }
            $content = '';
            $content .= '<h2 class="nav-tab-wrapper">';
            foreach ($plugin_tabs as $location => $tabname) {
                if ($current == $location) {
                    $class = ' nav-tab-active';
                } else {
                    $class = '';
                }
                $content .= '<a class="nav-tab' . $class . '" href="?page=' . $location . '">' . $tabname . '</a>';
            }
            $content .= '</h2>';
            echo $content;

            if(isset($_GET['action']))
            { 
                switch ($_GET['action'])
                {
                    case 'extensions':
                        easy_media_download_display_extensions();
                        break;
                }
            }
            else
            {
                $this->general_settings();
            }

            echo '</div></div>';
            echo '</div>';
        }

        function general_settings() 
        {
            if (isset($_POST['easy_media_download_update_settings'])) {
                $nonce = sanitize_text_field($_REQUEST['_wpnonce']);
                if (!wp_verify_nonce($nonce, 'easy_media_download_general_settings_nonce')) {
                    wp_die(__('Error! Nonce Security Check Failed! please save the general settings again.', 'easy-media-download'));
                }
                $post = $_POST;
                do_action('easy_media_download_general_settings_submitted', $post);
                echo '<div id="message" class="updated fade"><p><strong>';
                echo __('Settings Saved', 'easy-media-download').'!';
                echo '</strong></p></div>';
            }
            $settings_fields = '';
            $settings_fields = apply_filters('easy_media_download_general_settings_fields', $settings_fields);
            if(!empty($settings_fields)){
                           
            ?>
            <table class="emd-general-settings-table">
                <tbody>
                    <tr>
                        <td valign="top">
                            <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                <?php wp_nonce_field('easy_media_download_general_settings_nonce'); ?>
                                <table class="form-table">

                                    <tbody>
                                        <?php
                                            
                                            echo $settings_fields;

                                        ?>
                                    </tbody>

                                </table>

                                <p class="submit"><input type="submit" name="easy_media_download_update_settings" id="easy_media_download_update_settings" class="button button-primary" value="<?Php _e('Save Changes', 'easy-media-download');?>"></p>
                            </form>
                        </td>
                    </tr>  
                </tbody> 
            </table>        
            <?php
            }
        }
    }
    $GLOBALS['easy_media_download'] = new EASY_MEDIA_DOWNLOAD();
}

function easy_media_download_handler($atts)
{
    $atts = shortcode_atts(array(
        'url' => '',
        'text' => 'Download Now',
        'width' => '153',
        'height' => '41',
        'color' => 'red_darker',
        'target' => '_self',
        'force_dl' => '',
        'rel' => '',
        'class' => '',
        'parent_class' => '',
    ), $atts);
    $atts = array_map('sanitize_text_field', $atts);
    if(empty($atts['url'])){
        return __('Please specify the URL of your file', 'easy-media-download');
    }   
    $url = $atts['url'];
    $text = $atts['text']; 
    $width = $atts['width'];
    $height = $atts['height'];
    $color = $atts['color'];
    $target = $atts['target'];
    $force_dl = $atts['force_dl'];
    $rel = $atts['rel'];
    $class = $atts['class'];
    $parent_class = $atts['parent_class'];
    
    $core_class = "emd_dl_".$color;
    $inset = "f5978e";
    $start_color = "f24537";
    $end_color = "c62d1f";
    $border = "d02718";
    $dl_color = "ffffff";
    $text_shadow = "810e05";
    if($color=="grey") 
    {
        $inset = "ffffff";$start_color = "ededed";$end_color = "dfdfdf";$border = "dcdcdc";$dl_color = "777777";$text_shadow = "ffffff";
    }
    if($color=="grey_light") 
    {
        $inset = "ffffff";$start_color = "f9f9f9";$end_color = "e9e9e9";$border = "dcdcdc";$dl_color = "666666";$text_shadow = "ffffff";
    }
    if($color=="red") 
    {
        $inset = "f29c93";$start_color = "fe1a00";$end_color = "ce0100";$border = "d83526";$dl_color = "ffffff";$text_shadow = "b23e35";
    }
    if($color=="green_dark") 
    {
        $inset = "caefab";$start_color = "77d42a";$end_color = "5cb811";$border = "268a16";$dl_color = "306108";$text_shadow = "aade7c";
    }
    if($color=="green_light") 
    {
        $inset = "c1ed9c";$start_color = "9dce2c";$end_color = "8cb82b";$border = "83c41a";$dl_color = "ffffff";$text_shadow = "689324";
    }
    if($color=="green") 
    {
        $inset = "d9fbbe";$start_color = "b8e356";$end_color = "a5cc52";$border = "83c41a";$dl_color = "ffffff";$text_shadow = "86ae47";
    }
    if($color=="blue") 
    {
        $inset = "bbdaf7";$start_color = "79bbff";$end_color = "378de5";$border = "84bbf3";$dl_color = "ffffff";$text_shadow = "528ecc";
    }
    if($color=="blue_two") 
    {
        $inset = "cae3fc";$start_color = "79bbff";$end_color = "4197ee";$border = "469df5";$dl_color = "ffffff";$text_shadow = "287ace";
    }
    if($color=="blue_three") 
    {
        $inset = "bee2f9";$start_color = "63b8ee";$end_color = "468ccf";$border = "3866a3";$dl_color = "14396a";$text_shadow = "7cacde";
    }
    if($color=="blue_four") 
    {
        $inset = "97c4fe";$start_color = "3d94f6";$end_color = "1e62d0";$border = "337fed";$dl_color = "ffffff";$text_shadow = "1570cd";
    }
    if($color=="orange") 
    {
        $inset = "fce2c1";$start_color = "ffc477";$end_color = "fb9e25";$border = "eeb44f";$dl_color = "ffffff";$text_shadow = "cc9f52";
    }
    if($color=="orange_two") 
    {
        $inset = "fceaca";$start_color = "ffce79";$end_color = "eeaf41";$border = "eeb44f";$dl_color = "ffffff";$text_shadow = "ce8e28";
    }
    if($color=="orange_light") 
    {
        $inset = "fcf8f2";$start_color = "fae4bd";$end_color = "eac380";$border = "eeb44f";$dl_color = "ffffff";$text_shadow = "cc9f52";
    }
    if($color=="orange_dark") 
    {
        $inset = "fed897";$start_color = "f6b33d";$end_color = "d29105";$border = "eda933";$dl_color = "ffffff";$text_shadow = "cd8a15";
    }
    if($color=="purple") 
    {
        $inset = "d197fe";$start_color = "a53df6";$end_color = "7c16cb";$border = "9c33ed";$dl_color = "ffffff";$text_shadow = "7d15cd";
    }
    if($color=="purple_dark") 
    {
        $inset = "e184f3";$start_color = "c123de";$end_color = "a20dbd";$border = "a511c0";$dl_color = "ffffff";$text_shadow = "9b14b3";
    }
    if($color=="purple_light") 
    {
        $inset = "e6cafc";$start_color = "c579ff";$end_color = "a341ee";$border = "a946f5";$dl_color = "ffffff";$text_shadow = "8628ce";
    }
    if($color=="yellow_red") 
    {
        $inset = "f9eca0";$start_color = "f0c911";$end_color = "f2ab1e";$border = "e65f44";$dl_color = "c92200";$text_shadow = "ded17c";
    }
    if($color=="hot_pink") 
    {
        $inset = "fbafe3";$start_color = "ff5bb0";$end_color = "ef027d";$border = "ee1eb5";$dl_color = "ffffff";$text_shadow = "c70067";
    }
    if($color=="pink") 
    {
        $inset = "f4cafc";$start_color = "eea1fc";$end_color = "d441ee";$border = "dd5df4";$dl_color = "ffffff";$text_shadow = "b63dcc";
    }
    $styles = <<<EOT
    <style type="text/css">
    .$core_class {
        -moz-box-shadow:inset 0px 1px 0px 0px #$inset;
        -webkit-box-shadow:inset 0px 1px 0px 0px #$inset;
        box-shadow:inset 0px 1px 0px 0px #$inset;
        background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #$start_color), color-stop(1, #$end_color) );
        background:-moz-linear-gradient( center top, #$start_color 5%, #$end_color 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#$start_color', endColorstr='#$end_color');
        background-color:#$start_color;
        -webkit-border-top-left-radius:0px;
        -moz-border-radius-topleft:0px;
        border-top-left-radius:0px;
        -webkit-border-top-right-radius:0px;
        -moz-border-radius-topright:0px;
        border-top-right-radius:0px;
        -webkit-border-bottom-right-radius:0px;
        -moz-border-radius-bottomright:0px;
        border-bottom-right-radius:0px;
        -webkit-border-bottom-left-radius:0px;
        -moz-border-radius-bottomleft:0px;
        border-bottom-left-radius:0px;
        text-indent:0;
        border:1px solid #$border;
        display:inline-block;
        color:#$dl_color !important;
        font-family:Georgia;
        font-size:15px;
        font-weight:bold;
        font-style:normal;
        height:{$height}px;
        line-height:{$height}px;
        width:{$width}px;
        text-decoration:none;
        text-align:center;
        text-shadow:1px 1px 0px #$text_shadow;
    }
    .$core_class:hover {
        background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #$end_color), color-stop(1, #$start_color) );
        background:-moz-linear-gradient( center top, #$end_color 5%, #$start_color 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#$end_color', endColorstr='#$start_color');
        background-color:#$end_color;
    }.$core_class:active {
        position:relative;
        top:1px;
    }
    </style>
EOT;

    $css_class = '';       
    if(preg_match("/http/", $text)){
        if(!empty($class)){
            $css_class = ' class="'.esc_attr($class).'"';
        }
        $text = '<img src="'.esc_url($text).'">';
    }
    else{
        if(!empty($class)){
            $class = ' '.$class;
        }
        $css_class = ' class="'.esc_attr($core_class.$class).'"';
        $text = esc_html($text);
    }
    if(isset($rel) && !empty($rel)){
        $rel = ' rel="'.esc_attr($rel).'"';
    }
    else{
        $rel = '';
    }
    if($force_dl=="1"){
        $force_dl = " download";
    }
    else{
        $force_dl = '';
    }
    $custom_attr = apply_filters('emd_custom_link_attributes', '', esc_url_raw($url));
    $output = 
    '<div class="'.esc_attr($parent_class).'"><a href="'.esc_url($url).'" target="'.esc_attr($target).'"'.$rel.$css_class.$force_dl.$custom_attr.'>'.$text.'</a></div>';
    $output .= <<<EOT
    $styles
EOT;
    return $output;
}

function easy_media_download2_handler($atts)
{
    $atts = shortcode_atts(array(
        'url' => '',
        'text' => 'Download Now',
        'bg_color' => '#3498db',
        'font_color' => '#ffffff',
        'hover_bg_color' => '',
        'font_family' => '',
        'font_size' => '15px',
        'target' => '_self',
        'force_dl' => '',
        'rel' => '',
        'class' => '',
        'parent_class' => '',
    ), $atts);
    $atts = array_map('sanitize_text_field', $atts);
    if(empty($atts['url'])){
        return __('Please specify the URL of your file', 'easy-media-download');
    }   
    $url = $atts['url'];
    $text = $atts['text']; 
    $bg_color = $atts['bg_color'];
    $font_color = $atts['font_color'];
    $hover_bg_color = $atts['hover_bg_color'];
    $font_family = $atts['font_family'];
    $font_size = $atts['font_size'];
    $target = $atts['target'];
    $force_dl = $atts['force_dl'];
    $rel = $atts['rel'];
    $class = $atts['class'];
    $parent_class = $atts['parent_class'];
    
    if(isset($hover_bg_color) && !empty($hover_bg_color)){
        $hover_bg_color = 'background: '.$hover_bg_color.' !important;';
    }
    if(!isset($font_family) || empty($font_family)){
        $font_family = 'Georgia';
    }
    $id = uniqid();
    $core_class = "emd_".$id;
    $styles = <<<EOT
    <style type="text/css">
    .$core_class {
        font-family: {$font_family} !important;
        color: {$font_color} !important;
        font-size: {$font_size} !important;
        font-weight: bold !important;
        background: {$bg_color} !important;
        padding: 10px 20px 10px 20px;
        text-decoration: none !important;
        border-bottom: none !important;
        box-shadow: none !important;
    }
    .$core_class:hover {
        color: {$font_color} !important;
        text-decoration: none !important;
        $hover_bg_color
    }
    </style>    
EOT;
        
    $css_class = '';       
    if(preg_match("/http/", $text)){
        if(!empty($class)){
            $css_class = ' class="'.esc_attr($class).'"';
        }
        $text = '<img src="'.esc_url($text).'">';
    }
    else{
        if(!empty($class)){
            $class = ' '.$class;
        }
        $css_class = ' class="'.esc_attr($core_class.$class).'"';
        $text = esc_html($text);
    }
    if(isset($rel) && !empty($rel)){
        $rel = ' rel="'.esc_attr($rel).'"';
    }
    else{
        $rel = '';
    }
    if($force_dl=="1"){
        $force_dl = " download";
    }
    else{
        $force_dl = '';
    }
    $custom_attr = apply_filters('emd_custom_link_attributes', '', esc_url_raw($url));
    $output = 
    '<div class="'.esc_attr($parent_class).'"><a href="'.esc_url($url).'" target="'.esc_attr($target).'"'.$rel.$css_class.$force_dl.$custom_attr.'>'.$text.'</a></div>';
    $output .= <<<EOT
    $styles
EOT;
    return $output;
}

