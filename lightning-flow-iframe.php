<?php
/**
 * iFrame Lightning Flow
 *
 * @package       IFRAMESFL
 * @author        Jason Best
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Lightning Flow iFrame
 * Plugin URI:    https://threelevers.com/plugins/iframe-embed/
 * Description: Shortcode to embed a VisualForce page with a Lightning enabled Flow.<br/> Instructions:<code>[Lightning-Flow-iFrame iframeurl="https://salesforcesite/VisualForcePageWithFlow" endurl="https://somesite.demo" height="intialheight in pixels ex.50px)" extraqs="inputVariable=value"]</code> <a href="https://threelevers.com/plugins/iframe-embed/" target="_blank">Detailed instructions</a>.
 * Version:       1.0.0
 * Author:        Jason Best
 * Author URI:    https://threelevers.com
 * Text Domain:   iframe-lightning-flow
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with iFrame Lightning Flow. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;


function tlsflfi_iframe_prefs($atts)
{
    wp_enqueue_script('iframe-resizer', plugin_dir_url(__FILE__) . 'js/iframeResizer.min.js');

    ob_start();
    // Attributes
    $atts = shortcode_atts(array(
        'endurl' => '',
        'iframeurl' => 'https://threelevers.com/plugins/iframe-embed',
        'height' => '50px',
		'extraqs' =>'',
		'ease' => 'false',
		'easespeed' =>'.2',
		'lazy' => 'true'
    ) , $atts);
		
    
	$url_raw=add_query_arg( NULL, NULL );
	$url=esc_url_raw(sanitize_url($url_raw));
	$query_string = parse_url($url, PHP_URL_QUERY);
    $iframesrc = esc_url_raw(sanitize_url($atts['iframeurl']));
    $endurl = esc_url_raw(sanitize_url($atts['endurl']));
    $height = sanitize_text_field($atts['height']);
	$extraqs = sanitize_text_field($atts['extraqs']);
	$ease = sanitize_text_field($atts['ease']);
	$es = sanitize_text_field($atts['easespeed']);
	$lazy = sanitize_text_field($atts['lazy']);
	$lazystring = 'loading="lazy"';
	if($lazy!='true'){
		$lazystring = '';
	}
	$content='';
	if($ease=='true'){
		$content .='<style>#tl-iframe {  -moz-transition: height '.$es.'s ease;  -webkit-transition: height '.$es.'s ease;  -o-transition: height '.$es.'s ease;  transition: height '.$es.'s ease;}</style>';
	}
	
    $content .= '<iframe id="tl-iframe" '.$lazystring.' src="' . $iframesrc . '?' . $query_string . '&'.$extraqs.'&endurl=' . $endurl . '" width="100%" scrolling="no" style="height:' . $height . ';" frameborder="0"></iframe>';
    echo html_entity_decode( esc_html($content));
?><script>
window.onmessage = (e) => {
  if (e.data.hasOwnProperty("frameHeight")) {
	  //console.log("Resized");
    document.getElementById("tl-iframe").style.height = `${e.data.frameHeight + 20}px`;
  }
  
};
</script>
	
	<?php
    return ob_get_clean();
}
add_shortcode('Lightning-Flow-iFrame', 'tlsflfi_iframe_prefs');
?>
