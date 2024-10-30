=== Lightning Flow iFrame ===
Author URI: https://threelevers.com
Plugin URI: https://threelevers.com/plugins/iframe-embed/
Contributors: jasonbest
Tags: Salesforce, iframe
Requires at least: 4.9
Tested up to: 6.1.1
Stable tag: 1.0.0
Requires PHP: 5.2.4
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Shortcode to embed a scalable Salesforce Lightning Flow iframe.

== Description ==


Lightning Flow iFrame is a Wordpress plugin that provides a way to embed Salesforce Lightning Flows in a scalable iframe using a simple shortcode.

At a glance, this plugin provides the following features:

 * Auto height adjustment based on content of flow.
 * Set finish URL 
 * Pass all querystring values to iframe
 * Manually set iframe querystring in shortcode 
 

 

== Frequently Asked Questions ==

= How do I set up the Salesforce Flow to be embeded? =

The flow must be rendered as a Lightning component on a Visualforce page. That Visualforce page must be added to a Salesforce site with proper guest permissions. See details at [https://threelevers.com/plugins/iframe-embed/#instruct](https://threelevers.com/plugins/iframe-embed/#instruct)

= Querystring values are not being passed as input variables =
Your Visualforce page must capture the querystring and pass it to the lightning component in the inputVariables collection. See details at [https://threelevers.com/plugins/iframe-embed/#instruct](https://threelevers.com/plugins/iframe-embed/#instruct)


== Installation ==

1. Go to `Plugins` in the Admin menu
2. Click on the button `Add new`
3. Search for `Lightning Flow iFrame` and click 'Install Now' or click on the `upload` link to upload `lightning-flow-iframe.zip`
4. Click on `Activate plugin`
5. Prepare your Salesforce environment as detailed in [https://threelevers.com/plugins/iframe-embed/#instruct](https://threelevers.com/plugins/iframe-embed/#instruct)

== Changelog ==

= 1.0.0: January 6, 2023 =
* Birthday of iFrame Lightning Flow