<?php  
/*
Ajax search handler
*/
if ($_GET['get_posts_by_query'] ?? false){
  get_template_part('page-templates/blog_inner');
  exit;
}
/*
Create link from array
*/
function getLink($field,$classes=''){
  echo '<a class="'.$classes.'" href="'.$field['url'].'" target="'.(($field['target']=='_blank') ? '_blank' : '_self').'">'.$field['title'].'</a>';
}
/*
Create image with attributes from array
*/
function getImage($field,$classes=''){
  echo '<img class="'.$classes.'" src="'.$field['url'].'" alt="'.$field['alt'].'" loading="lazy">';
}
/*
Loading resources from assets
*/
function get_res(){
  include('assets/assets-manifest.php');
  $js_files=(PathsToFiles::$jsFiles);
  $css_files=(PathsToFiles::$cssFiles); 
  /*
  Adding css
  */ 
  foreach($css_files as $key=>$css){
    echo '<link rel="stylesheet" href="'.get_template_directory_uri() .'/'.str_replace('\\', '/', $css).'">';
  } 
  /*
  Adding scripts
  */ 
  foreach($js_files as $key=>$js){
    echo '<script defer src="'.get_template_directory_uri() .'/'.str_replace('\\', '/', $js).'"></script>';
  }
}
/*
Add support of post thumbnails
*/
add_theme_support('post-thumbnails');
if ( function_exists('add_theme_support') ){
  add_theme_support('post-thumbnails');
}
/*
Add custom logo support
*/
add_theme_support( 'custom-logo' );
/*
Remove jQuery Migrate Script from header and Load jQuery from Google API
*/
function crunchify_stop_loading_wp_embed_and_jquery() {
  if (!is_admin()) {
    wp_deregister_script('wp-embed');
    wp_deregister_script('jquery');  // Bonus: remove jquery too if it's not required
  }
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');
/*
Add asc options page
*/
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title'  => 'Theme settings',
    'menu_title'  => 'Theme settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}  
/*
Disable unused styles and scripts
*/
wp_dequeue_style( 'wp-block-library' );
wp_dequeue_style( 'wp-block-library-theme' );
function my_deregister_styles_and_scripts() {
  wp_dequeue_style('wp-block-library');
}
add_action( 'wp_print_styles', 'my_deregister_styles_and_scripts', 100 );
/*
Disable the emoji's
*/
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
/*
Filter function used to remove the tinymce emoji plugin.
*/
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
/*
Remove emoji CDN hostname from DNS prefetching hints.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  return $urls;
}
/*
Create nav menu
*/
if(function_exists('register_nav_menus')){
  register_nav_menus(
    array( // создаЄм любое количество областей
      'main_menu' => 'Main menu',
      'footer_menu_1' => 'Footer menu 1',
      'footer_menu_2' => 'Footer menu 2',
      'footer_menu_3' => 'Footer menu 3',
      'footer_bottom_menu' => 'Footer bottom menu',
    )
  );
}
/*
Truncate post content
*/
function the_truncated_post($symbol_amount) {
  $filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
  echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}
/*
Deregiser core scripts
*/
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );
/*
Remove attr Type on wp scripts and styles
*/
add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
function sj_remove_type_attr($tag)
{
  return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}
/*
Fully Disable Gutenberg editor.
*/
add_filter('use_block_editor_for_post_type', '__return_false', 10);
/*
Don't load Gutenberg-related stylesheets.
*/
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
  wp_dequeue_style( 'wp-block-library' ); // Wordpress core
  wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
  wp_dequeue_style( 'wc-block-style' ); // WooCommerce
  wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}
/*
Truncate string
*/
function truncate($string,$length=100,$append="&hellip;") {
  $string = trim($string);
  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }
  return $string;
}
?>