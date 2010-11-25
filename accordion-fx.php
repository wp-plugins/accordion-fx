<?php
/*
Plugin Name: Accordion FX
Plugin URI: http://www.flashxml.net/accordion.html
Description: One of the most advanced Flash accordion on the web. Fully XML customizable without any Flash knowledge. And it's free!
Version: 0.2.12
Author: FlashXML.net
Author URI: http://www.flashxml.net/
License: GPL2
*/

/* start global parameters */
	$accordionfx_params = array(
		'count'	=> 0, // number of Accordion FX embeds
	);
/* end global parameters */

/* start client side functions */
	function accordionfx_get_embed_code($accordionfx_attributes) {
		global $accordionfx_params;
		$accordionfx_params['count']++;

		$plugin_dir = get_option('accordionfx_path');
		if ($plugin_dir === false) {
			$plugin_dir = 'flashxml/accordion-fx';
		}
		$plugin_dir = trim($plugin_dir, '/');

		$settings_file_name = !empty($accordionfx_attributes[2]) ? $accordionfx_attributes[2] : 'settings.xml';
		$settings_file_path = WP_CONTENT_DIR . "/{$plugin_dir}/{$settings_file_name}";

		if (function_exists('simplexml_load_file')) {
			if (file_exists($settings_file_path)) {
				$data = simplexml_load_file($settings_file_path);
				$width = (int)$data->General_Properties->width->attributes()->value;
				$height = (int)$data->General_Properties->height->attributes()->value;
			}
		} elseif ((int)$accordionfx_attributes[4] > 0 && (int)$accordionfx_attributes[6] > 0) {
			$width = (int)$accordionfx_attributes[4];
			$height = (int)$accordionfx_attributes[6];
		} else {
			return '<!-- invalid Accordion FX width and / or height -->';
		}

		$swf_embed = array(
			'width' => $width,
			'height' => $height,
			'text' => isset($accordionfx_attributes[7]) ? trim($accordionfx_attributes[7]) : '',
			'component_path' => WP_CONTENT_URL . "/{$plugin_dir}/",
			'swf_name' => 'AccordionFX.swf',
		);
		$swf_embed['swf_path'] = $swf_embed['component_path'].$swf_embed['swf_name'];

		if (!is_feed()) {
			$embed_code = '<div id="accordion-fx'.$accordionfx_params['count'].'">'.$swf_embed['text'].'</div>';
			$embed_code .= '<script type="text/javascript">';
			$embed_code .= "swfobject.embedSWF('{$swf_embed['swf_path']}', 'accordion-fx{$accordionfx_params['count']}', '{$swf_embed['width']}', '{$swf_embed['height']}', '9.0.0.0', '', { folderPath: '{$swf_embed['component_path']}'".($settings_file_name != 'settings.xml' ? ", settingsXML: '{$settings_file_name}'" : '')." }, { scale: 'noscale', salign: 'tl', wmode: 'transparent', allowScriptAccess: 'sameDomain', allowFullScreen: true }, {});";
			$embed_code.= '</script>';
		} else {
			$embed_code = '<object width="'.$swf_embed['width'].'" height="'.$swf_embed['height'].'">';
			$embed_code .= '<param name="movie" value="'.$swf_embed['swf_path'].'"></param>';
			$embed_code .= '<param name="scale" value="noscale"></param>';
			$embed_code .= '<param name="salign" value="tl"></param>';
			$embed_code .= '<param name="wmode" value="transparent"></param>';
			$embed_code .= '<param name="allowScriptAccess" value="sameDomain"></param>';
			$embed_code .= '<param name="allowFullScreen" value="true"></param>';
			$embed_code .= '<param name="sameDomain" value="true"></param>';
			$embed_code .= '<param name="flashvars" value="folderPath='.$swf_embed['component_path'].($settings_file_name != 'settings.xml' ? '&settingsXML='.$settings_file_name : '').'"></param>';
			$embed_code .= '<embed type="application/x-shockwave-flash" width="'.$swf_embed['width'].'" height="'.$swf_embed['height'].'" src="'.$swf_embed['swf_path'].'" scale="noscale" salign="tl" wmode="transparent" allowScriptAccess="sameDomain" allowFullScreen="true" flashvars="folderPath='.$swf_embed['component_path'].($settings_file_name != 'settings.xml' ? '&settingsXML='.$settings_file_name : '').'"';
			$embed_code .= '></embed>';
			$embed_code .= '</object>';
		}

		return $embed_code;
	}

	function accordionfx_filter_content($content) {
		return preg_replace_callback('|\[accordion-fx\s*(settings="([^"]+)")?\s*(width="([0-9]+)")?\s*(height="([0-9]+)")?\s*\](.*)\[/accordion-fx\]|i', 'accordionfx_get_embed_code', $content);
	}

	function accordionfx_echo_embed_code($settings_xml_path = '', $div_text = '', $width = 0, $height = 0) {
		echo accordionfx_get_embed_code(array(2 => $settings_xml_path, 7 => $div_text, 4 => $width, 6 => $height));
	}

	function accordionfx_load_swfobject_lib() {
		wp_enqueue_script('swfobject');
	}
/* end client side functions */

/* start admin section functions */
	function accordionfx_admin_menu() {
		add_options_page('Accordion FX Options', 'Accordion FX', 'manage_options', 'accordionfx', 'accordionfx_admin_options');
	}

	function accordionfx_admin_options() {
		  if (!current_user_can('manage_options'))  {
	    wp_die(__('You do not have sufficient permissions to access this page.'));
	  }

	  $accordionfx_default_path = get_option('accordionfx_path');
	  if ($accordionfx_default_path === false) {
	  	$accordionfx_default_path = 'flashxml/accordion-fx';
	  }
?>
<div class="wrap">
	<h2>Accordion FX</h2>
	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>

		<table class="form-table">
			<tr valign="top">
				<th scope="row" style="width: 40em;">SWF and assets path is <?php echo WP_CONTENT_DIR; ?>/</th>
				<td><input type="text" style="width: 25em;" name="accordionfx_path" value="<?php echo $accordionfx_default_path; ?>" /></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="accordionfx_path" />
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>
<?php
	}
/* end admin section functions */

/* start hooks */
	add_filter('the_content', 'accordionfx_filter_content');
	add_action('init', 'accordionfx_load_swfobject_lib');
	add_action('admin_menu', 'accordionfx_admin_menu');
/* end hooks */

?>