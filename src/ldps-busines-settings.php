<?php

if ( !defined( 'ABSPATH' ) ) exit;

add_action('admin_init', 'jmr_variables_init' );
add_action('admin_menu', 'jmr_variables_add_page');

// Init plugin options
function jmr_variables_init() {
	register_setting( 'jmr_variables_options', 'jmr_var', 'jmr_variables_validate' );
}

// Add menu page
function jmr_variables_add_page() {
	add_menu_page('Business Settings', 'Business Settings', 'manage_options', 'business_settings', 'jmr_variables_do_page');
}

// Draw the menu page
function jmr_variables_do_page() {
	?>

	<div class="wrap">

		<h2><?php esc_html_e('Variables', 'variables'); ?></h2>

		<form method="post" action="options.php">
			<?php
			settings_fields('jmr_variables_options');
			$options = get_option('jmr_var');
			?>

			<div class="notice notice-info is-dismissible">
				<p><?php esc_html_e('The information entered here can be accessed in your theme files, meaning that you can store site-wide variables in an editable form, instead of hardcoding them.', 'variables'); ?></p>
				<p><?php printf( esc_attr__('Adding a variable doesn’t always mean that it will appear in your theme — your theme must use the functions %s or %s to display and retrieve the values. The variable string is listed below each field label.', 'variables'), '<code>the_variable(<em>string</em>)</code>', '<code>get_the_variable(<em>string</em>)</code>' ); ?></p>
				<p><?php esc_html_e('The plugin also has some fields that, when populated, will generate scripts or metadata on your site including: your Google Analytics tag; domain verification tags; and a JSON-LD block with schema.org data providing machine readable information for search engines.', 'variables'); ?></p>
			</div>

			<h2 class="title"><?php esc_html_e('Contact Details', 'variables'); ?></h2>
			<table class="form-table">
				<tr>
					<th><label for="phone"><?php esc_html_e('Phone Number', 'variables'); ?></label><br><code class="jmr_var">phone</code></th>
					<td>
						<input type="text" class="regular-text" name="jmr_var[phone]" id="phone" value="<?php if ( isset( $options['phone'] ) ) echo $options['phone']; ?>">
						<p class="description"><?php _e('Use this variable to format your phone number for international dialling, eg: +1 555 555 5555, so that this value can also be used in a mobile friendly link.', 'variables'); ?></p>
					</td>
				</tr>
				<tr>
					<th><label for="phone_label"><?php esc_html_e('Phone Number Label', 'variables'); ?></label><br><code class="jmr_var">phone_label</code></th>
					<td>
						<input type="text" class="regular-text" id="phone_label" name="jmr_var[phone_label]" value="<?php if ( isset( $options['phone_label'] ) ) echo $options['phone_label']; ?>">
						<p class="description"><?php _e('This variable can be used to provide a locally formatted phone number, suitable as a label for a link, eg: (01) 5555 5555', 'variables'); ?></p>
					</td>
				</tr>
				<tr>
					<th><label for="fax"><?php esc_html_e('Fax Number', 'variables'); ?></label><br><code class="jmr_var">fax</code></th>
					<td><input type="text" class="regular-text" id="fax" name="jmr_var[fax]" value="<?php if ( isset( $options['fax'] ) ) echo $options['fax']; ?>"></td>
				</tr>
				<tr>
					<th><label for="email"><?php esc_html_e('Email', 'variables'); ?></label><br><code class="jmr_var">email</code></th>
					<td><input type="email" class="regular-text code" id="email" name="jmr_var[email]" value="<?php if ( isset( $options['email'] ) ) echo $options['email']; ?>"></td>
				</tr>
			</table>

			<hr>

			<h2 class="title"><?php esc_html_e('Address Details', 'variables'); ?></h2>
			<div class="notice notice-info inline">
				<p><?php printf( esc_attr__( 'The functions %s and %s will generate a formatted address from these values.', 'variables' ), '<code>get_the_address()</code>', '<code>the_address()</code>' ); ?>.</p>
			</div>
			<table class="form-table">
				<tr>
					<th><label for="address_street"><?php esc_html_e('Street Address', 'variables'); ?></label><br><code class="jmr_var">address_street</code></th>
					<td><input type="text" class="regular-text" id="address_street" name="jmr_var[address_street]" placeholder="123 Main St" value="<?php if ( isset( $options['address_street'] ) ) echo $options['address_street']; ?>"></td>
				</tr>
				<tr>
					<th><label for="address_box"><?php esc_html_e('Post Office Box Number', 'variables'); ?></label><br><code class="jmr_var">address_box</code></th>
					<td><input type="text" class="regular-text" id="address_box" name="jmr_var[address_box]" placeholder="1234" value="<?php if ( isset( $options['address_box'] ) ) echo $options['address_box']; ?>"></td>
				</tr>
				<tr>
					<th><label for="address_locality"><?php esc_html_e('Locality', 'variables'); ?></label><br><code class="jmr_var">address_locality</code></th>
					<td><input type="text" class="regular-text" id="address_locality" name="jmr_var[address_locality]" placeholder="Town" value="<?php if ( isset( $options['address_locality'] ) ) echo $options['address_locality']; ?>"></td>
				</tr>
				<tr>
					<th><label for="address_region"><?php esc_html_e('Region', 'variables'); ?></label><br><code class="jmr_var">address_region</code></th>
					<td><input type="text" class="regular-text" id="address_region" name="jmr_var[address_region]" placeholder="State" value="<?php if ( isset( $options['address_region'] ) ) echo $options['address_region']; ?>"></td>
				</tr>
				<tr>
					<th><label for="address_code"><?php esc_html_e('Postal Code', 'variables'); ?></label><br><code class="jmr_var">address_code</code></th>
					<td><input type="text" class="regular-text code" id="address_code" name="jmr_var[address_code]" placeholder="1234" value="<?php if ( isset( $options['address_code'] ) ) echo $options['address_code']; ?>"></td>
				</tr>
				<tr>
					<th><label for="address_country"><?php esc_html_e('Country', 'variables'); ?></label><br><code class="jmr_var">address_country</code></th>
					<td><input type="text" class="regular-text" id="address_country" name="jmr_var[address_country]" placeholder="Australia" value="<?php if ( isset( $options['address_country'] ) ) echo $options['address_country']; ?>"></td>
				</tr>
			</table>

			<hr>

			<h2 class="title"><?php esc_html_e('Location Details', 'variables'); ?></h2>
			<div class="notice notice-info inline">
				<p><?php esc_html_e('Latitude and longitude data can be input manually or generated using the Google Maps Geocoder, based off the address data in the section above.', 'variables'); ?></p>
				<p><?php printf( esc_attr__('You will need to provide a %s key and enable the %s.', 'variables'), 'Google Maps Geocoding API', 'Google Maps Javascript API' ); ?></p>
				<p><?php esc_html_e('You need to save the key and refresh the page before you can generate the latitude and longitude information.', 'variables'); ?></p>
			</div>
			<table class="form-table">
				<tr>
					<th><label for="geo_lat"><?php esc_html_e('Latitude', 'variables'); ?></label><br><code class="jmr_var">geo_lat</code></th>
					<td><input type="text" class="regular-text code" id="geo_lat" name="jmr_var[geo_lat]" value="<?php if ( isset( $options['geo_lat'] ) ) echo $options['geo_lat']; ?>"></td>
				</tr>
				<tr>
					<th><label for="geo_lng"><?php esc_html_e('Longitude', 'variables'); ?></label><br><code class="jmr_var">geo_lng</code></th>
					<td><input type="text" class="regular-text code" id="geo_lng" name="jmr_var[geo_lng]" value="<?php if ( isset( $options['geo_lng'] ) ) echo $options['geo_lng']; ?>"></td>
				</tr>
				<tr>
					<th><label for="geo_api"><?php esc_html_e('Google Geocoder API', 'variables'); ?></label></th>
					<td><input type="text" class="regular-text code" id="geo_api" name="jmr_var[geo_api]" value="<?php if ( isset( $options['geo_api'] ) ) echo $options['geo_api']; ?>"> <button type="submit" class="button ">Save</button></td>
				</tr>
				<?php if ( isset( $options['geo_api'] ) && false === empty( $options['geo_api'] ) ) : ?>
					<tr>
						<th><?php esc_html_e('Generate location', 'variables'); ?></th>
						<td><button type="button" class="button" id="generateLocation">Generate</button></td>
					</tr>
				<?php endif; ?>
			</table>

			<hr>

			<h2 class="title"><?php esc_html_e('Opening Hours', 'variables'); ?></h2>
			<div class="notice notice-info inline">
				<p><?php esc_html_e('Opening hours must be in 24 hour format, e.g. 6pm will be expressed 18:00', 'variables'); ?></p>
				<hr/>
				<p><?php esc_html_e('You can display open hours either by the day or as a block. Using either code has two options of displaying the hours, in a 24hr format and/or a shortened format (Mon/Tue/Wed). They must be entered in the order of time format followed by day format. By default a 12hr AM/PM formatting is used for time and a full day format for the days.'); ?></p>
				<em><?php esc_html_e("It's good to note that using get_the_hours requires a day written fully (in english) to return the hours"); ?></em>
				<p><code class="jmr_var">get_the_business_hours</code> <code class="jmr_var">get_the_hours</code></p>
				<p><?php esc_html_e('To display in a 24hr format use either the string or integer 24, and to shorten the day format use the string "short". Below are some examples.') ?></p>
				<hr/>
				<p><code class="jmr_var">get_the_hours('monday', 24, 'short')</code> - <b>Mon 10 - 17</b></p>
				<p><code class="jmr_var">get_the_hours('monday')</code> - <b>Monday 10am - 5pm</b></p>
			</div>
			<table class="form-table form-hours">
				<tr>
					<th><?php esc_html_e('Monday', 'variables'); ?> <br></th>
					<td>
						<label>Open: <input type="text" class="regular-text small-text" name="jmr_var[hours_monday_open]" value="<?php if ( isset( $options['hours_monday_open'] ) ) echo $options['hours_monday_open']; ?>"></label>
						<label>Close: <input type="text" class="regular-text small-text" name="jmr_var[hours_monday_close]" value="<?php if ( isset( $options['hours_monday_close'] ) ) echo $options['hours_monday_close']; ?>"></label>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e('Tuesday', 'variables'); ?></th>
					<td>
						<label>Open: <input type="text" class="regular-text small-text" name="jmr_var[hours_tuesday_open]" value="<?php if ( isset( $options['hours_tuesday_open'] ) ) echo $options['hours_tuesday_open']; ?>"></label>
						<label>Close: <input type="text" class="regular-text small-text" name="jmr_var[hours_tuesday_close]" value="<?php if ( isset( $options['hours_tuesday_close'] ) ) echo $options['hours_tuesday_close']; ?>"></label>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e('Wednesday', 'variables'); ?></th>
					<td>
						<label>Open: <input type="text" class="regular-text small-text" name="jmr_var[hours_wednesday_open]" value="<?php if ( isset( $options['hours_wednesday_open'] ) ) echo $options['hours_wednesday_open']; ?>"></label>
						<label>Close: <input type="text" class="regular-text small-text" name="jmr_var[hours_wednesday_close]" value="<?php if ( isset( $options['hours_wednesday_close'] ) ) echo $options['hours_wednesday_close']; ?>"></label>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e('Thursday', 'variables'); ?></th>
					<td>
						<label>Open: <input type="text" class="regular-text small-text" name="jmr_var[hours_thursday_open]" value="<?php if ( isset( $options['hours_thursday_open'] ) ) echo $options['hours_thursday_open']; ?>"></label>
						<label>Close: <input type="text" class="regular-text small-text" name="jmr_var[hours_thursday_close]" value="<?php if ( isset( $options['hours_thursday_close'] ) ) echo $options['hours_thursday_close']; ?>"></label>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e('Friday', 'variables'); ?></th>
					<td>
						<label>Open: <input type="text" class="regular-text small-text" name="jmr_var[hours_friday_open]" value="<?php if ( isset( $options['hours_friday_open'] ) ) echo $options['hours_friday_open']; ?>"></label>
						<label>Close: <input type="text" class="regular-text small-text" name="jmr_var[hours_friday_close]" value="<?php if ( isset( $options['hours_friday_close'] ) ) echo $options['hours_friday_close']; ?>"></label>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e('Saturday', 'variables'); ?></th>
					<td>
						<label>Open: <input type="text" class="regular-text small-text" name="jmr_var[hours_saturday_open]" value="<?php if ( isset( $options['hours_saturday_open'] ) ) echo $options['hours_saturday_open']; ?>"></label>
						<label>Open: <input type="text" class="regular-text small-text" name="jmr_var[hours_saturday_close]" value="<?php if ( isset( $options['hours_saturday_close'] ) ) echo $options['hours_saturday_close']; ?>"></label>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e('Sunday', 'variables'); ?></th>
					<td>
						<label>Open: <input type="text" class="regular-text small-text" name="jmr_var[hours_sunday_open]" value="<?php if ( isset( $options['hours_sunday_open'] ) ) echo $options['hours_sunday_open']; ?>"></label>
						<label>Close: <input type="text" class="regular-text small-text" name="jmr_var[hours_sunday_close]" value="<?php if ( isset( $options['hours_sunday_close'] ) ) echo $options['hours_sunday_close']; ?>"></label>
					</td>
				</tr>
			</table>

			<hr>

			<h2 class="title"><?php esc_html_e('Social Networks', 'variables'); ?></h2>
			<table class="form-table">
				<tr>
					<th><label for="facebook"><?php esc_html_e('Facebook', 'variables'); ?></label><br><code class="jmr_var">facebook</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="facebook" name="jmr_var[facebook]" value="<?php if ( isset( $options['facebook'] ) ) echo $options['facebook']; ?>"></td>
				</tr>
				<tr>
					<th><label for="instagram"><?php esc_html_e('Instagram', 'variables'); ?></label><br><code class="jmr_var">instagram</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="instagram" name="jmr_var[instagram]" value="<?php if ( isset( $options['instagram'] ) ) echo $options['instagram']; ?>"></td>
				</tr>
				<tr>
					<th><label for="youtube"><?php esc_html_e('YouTube', 'variables'); ?></label><br><code class="jmr_var">youtube</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="youtube" name="jmr_var[youtube]" value="<?php if ( isset( $options['youtube'] ) ) echo $options['youtube']; ?>"></td>
				</tr>
				<tr>
					<th><label for="twitter"><?php esc_html_e('Twitter', 'variables'); ?></label><br><code class="jmr_var">twitter</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="twitter" name="jmr_var[twitter]" value="<?php if ( isset( $options['twitter'] ) ) echo $options['twitter']; ?>"></td>
				</tr>
				<tr>
					<th><label for="pinterest"><?php esc_html_e('Pinterest', 'variables'); ?></label><br><code class="jmr_var">pinterest</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="pinterest" name="jmr_var[pinterest]" value="<?php if ( isset( $options['pinterest'] ) ) echo $options['pinterest']; ?>"></td>
				</tr>
				<tr>
					<th><label for="linkedin"><?php esc_html_e('LinkedIn', 'variables'); ?></label><br><code class="jmr_var">linkedin</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="linkedin" name="jmr_var[linkedin]" value="<?php if ( isset( $options['linkedin'] ) ) echo $options['linkedin']; ?>"></td>
				</tr>
				<tr>
					<th><label for="googleplus"><?php esc_html_e('Google+', 'variables'); ?></label><br><code class="jmr_var">googleplus</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="googleplus" name="jmr_var[googleplus]" value="<?php if ( isset( $options['googleplus'] ) ) echo $options['googleplus']; ?>"></td>
				</tr>
				<tr>
					<th><label for="flickr"><?php esc_html_e('Flickr', 'variables'); ?></label><br><code class="jmr_var">flickr</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="flickr" name="jmr_var[flickr]" value="<?php if ( isset( $options['flickr'] ) ) echo $options['flickr']; ?>"></td>
				</tr>
				<tr>
					<th><label for="vimeo"><?php esc_html_e('Vimeo', 'variables'); ?></label><br><code class="jmr_var">vimeo</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="vimeo" name="jmr_var[vimeo]" value="<?php if ( isset( $options['vimeo'] ) ) echo $options['vimeo']; ?>"></td>
				</tr>
				<tr>
					<th><label for="tumblr"><?php esc_html_e('Tumblr', 'variables'); ?></label><br><code class="jmr_var">tumblr</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="tumblr" name="jmr_var[tumblr]" value="<?php if ( isset( $options['tumblr'] ) ) echo $options['tumblr']; ?>"></td>
				</tr>
			</table>

			<hr>

			<h2 class="title"><?php esc_html_e('Development Networks', 'variables'); ?></h2>
			<table class="form-table">
				<tr>
					<th><label for="github"><?php esc_html_e('Github', 'variables'); ?></label><br><code class="jmr_var">github</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="github" name="jmr_var[github]" value="<?php if ( isset( $options['github'] ) ) echo $options['github']; ?>"></td>
				</tr>
				<tr>
					<th><label for="stackexchange"><?php esc_html_e('Stack Exchange', 'variables'); ?></label><br><code class="jmr_var">stackexchange</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="stackexchange" name="jmr_var[stackexchange]" value="<?php if ( isset( $options['stackexchange'] ) ) echo $options['stackexchange']; ?>"></td>
				</tr>
				<tr>
					<th><label for="wordpress"><?php esc_html_e('WordPress Profile', 'variables'); ?></label><br><code class="jmr_var">wordpress</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="wordpress" name="jmr_var[wordpress]" value="<?php if ( isset( $options['wordpress'] ) ) echo $options['wordpress']; ?>"></td>
				</tr>
				<tr>
					<th><label for="jsfiddle"><?php esc_html_e('JSFiddle', 'variables'); ?></label><br><code class="jmr_var">jsfiddle</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="jsfiddle" name="jmr_var[jsfiddle]" value="<?php if ( isset( $options['jsfiddle'] ) ) echo $options['jsfiddle']; ?>"></td>
				</tr>
				<tr>
					<th><label for="codepen"><?php esc_html_e('CodePen', 'variables'); ?></label><br><code class="jmr_var">codepen</code></th>
					<td><input type="url" placeholder="https://" class="regular-text code" id="codepen" name="jmr_var[codepen]" value="<?php if ( isset( $options['codepen'] ) ) echo $options['codepen']; ?>"></td>
				</tr>
			</table>

			<hr>

			<h2 class="title"><?php esc_html_e('Google Analytics', 'variables'); ?></h2>
			<table class="form-table">
				<tr>
					<th><?php esc_html_e('Enable output', 'variables'); ?></th>
					<td><label><input type="checkbox" value="1" name="jmr_var[ga_enabled]" id="ga_enabled"
								<?php if ( isset( $options['ga_enabled'] ) ) checked( $options['ga_enabled'], 1 ); ?>> Insert Google Analytics script</label></td>
				</tr>
				<tr>
					<th><label for="ga_id"><?php esc_html_e('Google Analytics ID', 'variables'); ?></label><br><code class="jmr_var">ga_id</code></th>
					<td><input type="text" placeholder="UA-xxxxxx-xx" class="regular-text code" id="ga_id" name="jmr_var[ga_id]" value="<?php if ( isset( $options['ga_id'] ) ) echo $options['ga_id']; ?>"></td>
				</tr>
				<tr>
					<th><?php esc_html_e('Advanced Features', 'variables'); ?></th>
					<td>
						<label><input type="checkbox" name="jmr_var[ga_ssl]" value="1" <?php if ( isset( $options['ga_ssl'] ) ) checked( $options['ga_ssl'], 1 ); ?>> Force SSL</label>
						<p class="description">Send all data using SSL, even from unsecure (HTTP) pages.</p>
						<br><label><input type="checkbox" name="jmr_var[ga_display]" value="1" <?php if ( isset( $options['ga_display'] ) ) checked( $options['ga_display'], 1 ); ?>> Enable ‘Display Features’</label>
						<p class="description"><?php esc_html_e('The display features plugin can be used to enable Advertising Features in Google Analytics, such as Remarketing, Demographics and Interest Reporting, and more.', 'variables'); ?> <a href="https://support.google.com/analytics/answer/3450482" rel="nofollow"><?php esc_html_e('Learn more', 'variables'); ?>.</a></p>
					</td>
				</tr>
			</table>

			<hr>

			<h2 class="title"><?php esc_html_e('Domain verification', 'variables'); ?></h2>
			<div class="notice notice-info inline">
				<p><?php printf( esc_attr__('Here you can enter your site verification codes for a number services. Meta tags will be inserted to the %s automatically.', 'variables'), '<code>&lt;head&gt;</code>' ); ?></p>
			</div>
			<table class="form-table">
				<tr>
					<th><label for="verify_google"><?php esc_html_e('Google Search Console', 'variables'); ?></label><br><code class="jmr_var">verify_google</code></th>
					<td><input type="text" class="regular-text code" id="verify_google" name="jmr_var[verify_google]" value="<?php if ( isset( $options['verify_google'] ) ) echo $options['verify_google']; ?>"></td>
				</tr>
				<tr>
					<th><label for="verify_bing"><?php esc_html_e('Bing Webmaster Tools', 'variables'); ?></label><br><code class="jmr_var">verify_bing</code></th>
					<td><input type="text" class="regular-text code" id="verify_bing" name="jmr_var[verify_bing]" value="<?php if ( isset( $options['verify_bing'] ) ) echo $options['verify_bing']; ?>"></td>
				</tr>
				<tr>
					<th><label for="verify_pinterest"><?php esc_html_e('Pinterest', 'variables'); ?></label><br><code class="jmr_var">verify_pinterest</code></th>
					<td><input type="text" class="regular-text code" id="verify_pinterest" name="jmr_var[verify_pinterest]" value="<?php if ( isset( $options['verify_pinterest'] ) ) echo $options['verify_pinterest']; ?>"></td>
				</tr>
				<tr>
					<th><label for="verify_yandex"><?php esc_html_e('Yandex Webmaster Tools', 'variables'); ?></label><br><code class="jmr_var">verify_yandex</code></th>
					<td><input type="text" class="regular-text code" id="verify_yandex" name="jmr_var[verify_yandex]" value="<?php if ( isset( $options['verify_yandex'] ) ) echo $options['verify_yandex']; ?>"></td>
				</tr>
			</table>

			<hr>

			<h2 class="title"><?php esc_html_e('Schema Metadata', 'variables'); ?></h2>
			<div class="notice notice-info inline">
				<p><?php esc_html_e('Some additional information is required to output correct metadata for your site. Detailed information about the metadata options is available at', 'variables'); ?> <a href="http://schema.org/Organization" target="_blank">schema.org</a></p>
			</div>
			<table class="form-table">
				<tr>
					<th><?php esc_html_e('Enable output', 'variables'); ?></th>
					<td><label><input type="checkbox" value="1" name="jmr_var[schema_enabled]" id="jmr_var[schema_enabled]"
								<?php if ( isset( $options['schema_enabled'] ) ) checked( $options['schema_enabled'], 1 ); ?>> Insert schema metadata</label></td>
				</tr>
				<tr>
					<th><label for="schema_description"><?php esc_html_e('Description', 'variables'); ?></label><br><code class="jmr_var">schema_description</code></th>
					<td>
						<textarea cols="60" rows="6" class="regular-text" id="schema_description" name="jmr_var[schema_description]"><?php if ( isset( $options['schema_description'] ) ) echo $options['schema_description']; ?></textarea>
					</td>
				</tr>
				<tr>
					<th><label for="schemaTypeSelect"><?php esc_html_e('Organisation Type', 'variables'); ?></label><br><code class="jmr_var">schema-type</code></th>
					<td>
						<input type="hidden" name="jmr_var[schema_type]" id="schemaType" value="<?php if ( isset( $options['schema_type'] ) ) echo $options['schema_type']; ?>">
						<div class="schema-type-options">
							<select name="schema-type-select" id="schemaTypeSelect">
								<option value="">Organisation Type</option>
								<option value="LocalBusiness" data-subset="schema-type-business">Local Business</option>
								<option value="Airline">Airline</option>
								<option value="Corporation">Corporation</option>
								<option value="GovernmentOrganisation">Government Organisation</option>
								<option value="EducationalOrganisation" data-subset="schema-type-educational">Educational Organisation</option>
								<option value="NGO">NGO</option>
								<option value="PerformingGroup" data-subset="schema-type-performing">Performing Group</option>
								<option value="SportsOrganisation" data-subset="schema-type-sports">Sports Organisation</option>
							</select>

							<select name="jmr_var[schema-type-business]" class="subset" data-parent="LocalBusiness">
								<option value="">Local Business options</option>
								<option value="AnimalShelter">AnimalShelter</option>
								<optgroup label="Automotive Business">
									<option value="AutoBodyShop">Auto Body Shop</option>
									<option value="AutoDealer">Auto Dealer</option>
									<option value="AutoPartsStore">Auto Parts Store</option>
									<option value="AutoRental">Auto Rental</option>
									<option value="AutoRepair">Auto Repair</option>
									<option value="AutoWash">Auto Wash</option>
									<option value="GasStation">Gas Station</option>
									<option value="MotorcycleDealer">Motorcycle Dealer</option>
									<option value="MotorcycleRepair">Motorcycle Repair</option>
								</optgroup>
								<option value="ChildCare">Child Care</option>
								<option value="DryCleaningOrLaundry">Dry Cleaning or Laundry</option>
								<optgroup label="Emergency Service">
									<option value="FireStation">Fire Station</option>
									<option value="Hospital">Hospital</option>
									<option value="PoliceStation">Police Station</option>
								</optgroup>
								<option value="EmploymentAgency">Employment Agency</option>
								<optgroup label="Entertainment Business">
									<option value="AdultEntertainment">Adult Entertainment</option>
									<option value="AmusementPark">Amusement Park</option>
									<option value="ArtGallery">Art Gallery</option>
									<option value="Casino">Casino</option>
									<option value="ComedyClub">Comedy Club</option>
									<option value="MovieTheater">Movie Theater</option>
									<option value="NightClub">NightClub</option>
								</optgroup>
								<optgroup label="Financial Service">
									<option value="AccountingService">Accounting Service</option>
									<option value="AutomatedTeller">Automated Teller</option>
									<option value="BankOrCreditUnion">Bank Or Credit Union</option>
									<option value="InsuranceAgency">Insurance Agency</option>
								</optgroup>
								<optgroup label="Food Establishment">
									<option value="Bakery">Bakery</option>
									<option value="BarOrPub">Bar or Pub</option>
									<option value="Brewery">Brewery</option>
									<option value="CafeOrCoffeeShop">Cafe or Coffee Shop</option>
									<option value="FastFoodRestaurant">Fast Food Restaurant</option>
									<option value="IceCreamShop">Ice Cream Shop</option>
									<option value="Restaurant">Restaurant</option>
									<option value="Winery">Winery</option>
								</optgroup>
								<optgroup label="Government Office">
									<option value="PostOffice">PostOffice</option>
								</optgroup>
								<optgroup label="Health and Beauty Business">
									<option value="BeautySalon">BeautySalon</option>
									<option value="DaySpa">Day Spa</option>
									<option value="HairSalon">Hair Salon</option>
									<option value="HealthClub">Health Club</option>
									<option value="NailSalon">Nail Salon</option>
									<option value="TattooParlor">Tattoo Parlor</option>
								</optgroup>
								<optgroup label="Home and Construction Business">
									<option value="Electrician">Electrician</option>
									<option value="GeneralContractor">General Contractor</option>
									<option value="HVACBusiness">HVAC Business</option>
									<option value="HousePainter">House Painter</option>
									<option value="Locksmith">Locksmith</option>
									<option value="MovingCompany">Moving Company</option>
									<option value="Plumber">Plumber</option>
									<option value="RoofingContractor">Roofing Contractor</option>
								</optgroup>
								<option value="InternetCafe">Internet Cafe</option>
								<optgroup label="LegalService">Legal Service</option>
									<option value="Attorney">Attorney</option>
									<option value="Notary">Notary</option>
								</optgroup>
								<option value="Library">Library</option>
								<optgroup label="LodgingBusiness">
									<option value="BedAndBreakfast">Bed and Breakfast</option>
									<option value="Hostel">Hostel</option>
									<option value="Hotel">Hotel</option>
									<option value="Motel">Motel</option>
								</optgroup>
								<optgroup label="Medical Organization">
									<option value="Dentist">Dentist</option>
									<option value="DiagnosticLab">Diagnostic Lab</option>
									<option value="Hospital">Hospital</option>
									<option value="MedicalClinic">Medical Clinic</option>
									<option value="Optician">Optician</option>
									<option value="Pharmacy">Pharmacy</option>
									<option value="Physician">Physician</option>
									<option value="VeterinaryCare">Veterinary Care</option>
								</optgroup>
								<option value="Professional Service">ProfessionalService</option>
								<option value="RadioStation">Radio Station</option>
								<option value="RealEstateAgent">Real Estate Agent</option>
								<option value="RecyclingCenter">Recycling Center</option>
								<option value="SelfStorage">Self Storage</option>
								<option value="ShoppingCenter">Shopping Center</option>
								<optgroup label="Sports Activity Location">
									<option value="BowlingAlley">Bowling Alley</option>
									<option value="ExerciseGym">Exercise Gym</option>
									<option value="GolfCourse">Golf Course</option>
									<option value="HealthClub">Health Club</option>
									<option value="PublicSwimmingPool">Public Swimming Pool</option>
									<option value="SkiResort">Ski Resort</option>
									<option value="SportsClub">Sports Club</option>
									<option value="StadiumOrArena">Stadium or Arena</option>
									<option value="TennisComplex">Tennis Complex</option>
								</optgroup>
								<optgroup label="Store">
									<option value="AutoPartsStore">Auto Parts Store</option>
									<option value="BikeStore">Bike Store</option>
									<option value="BookStore">Book Store</option>
									<option value="ClothingStore">Clothing Store</option>
									<option value="ComputerStore">Computer Store</option>
									<option value="ConvenienceStore">Convenience Store</option>
									<option value="DepartmentStore">Department Store</option>
									<option value="ElectronicsStore">Electronics Store</option>
									<option value="Florist">Florist</option>
									<option value="FurnitureStore">Furniture Store</option>
									<option value="GardenStore">Garden Store</option>
									<option value="GroceryStore">Grocery Store</option>
									<option value="HardwareStore">Hardware Store</option>
									<option value="HobbyShop">Hobby Shop</option>
									<option value="HomeGoodsStore">Home Goods Store</option>
									<option value="JewelryStore">Jewelry Store</option>
									<option value="LiquorStore">Liquor Store</option>
									<option value="MensClothingStore">Men's Clothing Store</option>
									<option value="MobilePhoneStore">Mobile Phone Store</option>
									<option value="MovieRentalStore">Movie Rental Store</option>
									<option value="MusicStore">Music Store</option>
									<option value="OfficeEquipmentStore">Office Equipment Store</option>
									<option value="OutletStore">Outlet Store</option>
									<option value="PawnShop">Pawn Shop</option>
									<option value="PetStore">Pet Store</option>
									<option value="ShoeStore">Shoe Store</option>
									<option value="SportingGoodsStore">Sporting Goods Store</option>
									<option value="TireShop">Tire Shop</option>
									<option value="ToyStore">Toy Store</option>
									<option value="WholesaleStore">Wholesale Store</option>
								</optgroup>
								<option value="TelevisionStation">Television Station</option>
								<option value="TouristInformationCenter">Tourist Information Center</option>
								<option value="TravelAgency">Travel Agency</option>
							</select>

							<select name="jmr_var[schema-type-performing]" class="subset" data-parent="PerformingGroup">
								<option value="">Performing Group options</option>
								<option value="DanceGroup">Dance Group</option>
								<option value="MusicGroup">Music Group</option>
								<option value="TheaterGroup">Theater Group</option>
							</select>

							<select name="jmr_var[schema-type-sports]" class="subset" data-parent="SportsOrganisation">
								<option value="">Sports Organisation options</option>
								<option value="SportsTeam">Sports Team</option>
							</select>

							<select name="jmr_var[schema-type-education]" class="subset" data-parent="EducationalOrganisation">
								<option value="">Educational Organisation options</option>
								<option value="CollegeOrUniversity">College or University</option>
								<option value="ElementarySchool">Elementary School</option>
								<option value="HighSchool">High School</option>
								<option value="MiddleSchool">Middle School</option>
								<option value="Preschool">Preschool</option>
								<option value="School">School</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e('Preview Metadata', 'variables'); ?></th>
					<td>
						<button type="button" class="button tgt-hidden" id="showSchemaJSON">
							<span class="show">Show generated code</span>
							<span class="hide">Hide generated code</span>
						</button>
						<div id="schemaPreview" class="schema-code code ui-hidden">
                            <pre>
                                <?php echo jmr_variables_json(); ?>
                            </pre>
						</div>
					</td>
				</tr>
			</table>

			<p class="submit"><input type="submit" class="button-primary" value="<?php esc_html_e('Save Changes') ?>"></p>

		</form>

	</div>

	<?php
}

// Sanitize and validate input
function jmr_variables_validate($input) {

	// Contact Details
	$input['phone'] = sanitize_text_field( $input['phone'] );
	$input['phone_label'] = sanitize_text_field( $input['phone_label'] );
	$input['fax'] = sanitize_text_field( $input['fax'] );
	$input['email'] = sanitize_email( $input['email'] );

	// Address Details
	$input['address_street'] = sanitize_text_field( $input['address_street'] );
	$input['address_box'] = sanitize_text_field( $input['address_box'] );
	$input['address_locality'] = sanitize_text_field( $input['address_locality'] );
	$input['address_region'] = sanitize_text_field( $input['address_region'] );
	$input['address_code'] = sanitize_text_field( $input['address_code'] );
	$input['address_country'] = sanitize_text_field( $input['address_country'] );

	// Opening Hours
	$input['hours_monday_open'] = sanitize_text_field( $input['hours_monday_open'] );
	$input['hours_monday_close'] = sanitize_text_field( $input['hours_monday_close'] );
	$input['hours_tuesday_open'] = sanitize_text_field( $input['hours_tuesday_open'] );
	$input['hours_tuesday_close'] = sanitize_text_field( $input['hours_tuesday_close'] );
	$input['hours_wednesday_open'] = sanitize_text_field( $input['hours_wednesday_open'] );
	$input['hours_wednesday_close'] = sanitize_text_field( $input['hours_wednesday_close'] );
	$input['hours_thursday_open'] = sanitize_text_field( $input['hours_thursday_open'] );
	$input['hours_thursday_close'] = sanitize_text_field( $input['hours_thursday_close'] );
	$input['hours_friday_open'] = sanitize_text_field( $input['hours_friday_open'] );
	$input['hours_friday_close'] = sanitize_text_field( $input['hours_friday_close'] );
	$input['hours_saturday_open'] = sanitize_text_field( $input['hours_saturday_open'] );
	$input['hours_saturday_close'] = sanitize_text_field( $input['hours_saturday_close'] );
	$input['hours_sunday_open'] = sanitize_text_field( $input['hours_sunday_open'] );
	$input['hours_sunday_close'] = sanitize_text_field( $input['hours_sunday_close'] );

	// Social Networks
	$input['facebook'] = esc_url_raw( $input['facebook'], array('http', 'https') );
	$input['instagram'] = esc_url_raw( $input['instagram'], array('http', 'https') );
	$input['twitter'] = esc_url_raw( $input['twitter'], array('http', 'https') );
	$input['pinterest'] = esc_url_raw( $input['pinterest'], array('http', 'https') );
	$input['linkedin'] = esc_url_raw( $input['linkedin'], array('http', 'https') );
	$input['googleplus'] = esc_url_raw( $input['googleplus'], array('http', 'https') );
	$input['flickr'] = esc_url_raw( $input['flickr'], array('http', 'https') );
	$input['youtube'] = esc_url_raw( $input['youtube'], array('http', 'https') );
	$input['vimeo'] = esc_url_raw( $input['vimeo'], array('http', 'https') );
	$input['tumblr'] = esc_url_raw( $input['tumblr'], array('http', 'https') );

	// Development Networks
	$input['github'] = esc_url_raw( $input['github'], array('http', 'https') );
	$input['stackexchange'] = esc_url_raw( $input['stackexchange'], array('http', 'https') );
	$input['wordpress'] = esc_url_raw( $input['wordpress'], array('http', 'https') );
	$input['jsfiddle'] = esc_url_raw( $input['jsfiddle'], array('http', 'https') );
	$input['codepen'] = esc_url_raw( $input['codepen'], array('http', 'https') );

	// Google Analytics
	$input['ga_id'] = sanitize_text_field( $input['ga_id'] );

	// Site Verification
	$input['verify_google'] = sanitize_text_field( $input['verify_google'] );
	$input['verify_bing'] = sanitize_text_field( $input['verify_bing'] );
	$input['verify_pinterest'] = sanitize_text_field( $input['verify_pinterest'] );
	$input['verify_yandex'] = sanitize_text_field( $input['verify_yandex'] );

	// Schema
	$input['schema_description'] = sanitize_text_field( $input['schema_description'] );

	return $input;
}

// Enqueue CSS
function jmr_variables_style($hook) {
	if ( 'settings_page_jmr_variables' !== $hook ) {
		return;
	}
	wp_register_style( 'jmr-variables', WPMU_PLUGIN_URL . '/dist/css/ldps-variables.css', false, '1.0' );
	wp_enqueue_style( 'jmr-variables' );

	$options = get_option('jmr_var');
	if ( isset( $options['geo_api'] ) && false === empty( $options['geo_api'] ) ) :
		wp_register_script( 'jmr-google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . $options['geo_api'], array(), '1.0', true );
		wp_register_script( 'jmr-variables', WPMU_PLUGIN_URL . '/dist/js/ldps-variables-min.js', array('jmr-google-maps'), '1.0', true );
	else :
		wp_register_script( 'jmr-variables', WPMU_PLUGIN_URL . '/dist/js/ldps-variables-min.js', array(), '1.0', true );
	endif;
	wp_enqueue_script( 'jmr-variables' );
}
add_action('admin_enqueue_scripts', 'jmr_variables_style');

// Return the variable result for use in PHP
function get_the_variable($var) {

	// Get variables
	$options = get_option('jmr_var');

	if ( ( !$var ) || ( !isset( $options[$var] ) ) ) {
		return false;
	}

	$variable = $options[$var];
	return $variable;

}

// Echo the variable result
function the_variable($var) {

	if ( get_the_variable($var) ) {
		echo $variable;
	}

	return;

}

/**
 * Return single social media item
 * @param string $param
 * @param bool $icon
 * @param string $before
 * @param string $after
 * @return null|string
 */
function get_the_social_link($param = '', $icon = true, $before = '<span>', $after = "</span>") {
	$output = null;
	$inside = $param;
	$network = get_the_variable($param);

	if ( $network ) :
		if ( $icon === true ) :
			$inside = '<i class="icon-'. $param .'"></i>';
		endif;

		$output = $before .'<a href="'. $network .'" target="_blank">'. $inside .'</a>'. $after;
	endif;

	return $output;
}

/**
 * Return formatted social media values
 * @param array $networks
 * @param bool $link
 * @param bool $icon
 * @param string $before
 * @param string $after
 * @param string $container
 * @param string $container_class
 */
function get_the_social_links($networks = array(), $link = true, $icon = true, $before='<li>', $after='</li>', $container = '<nav>', $container_class = 'social-menu' ) {
	$output = null;

	// test $networks for string or array
	if ( is_array($networks) || is_string($networks)) :

		$valid_networks = array();

		// query $networks foreach to create anonymous array of valid networks
		foreach ( $networks as $network ) :
			if ( get_the_variable($network) ) :
				array_push($valid_networks, $network);
			endif;
		endforeach;

		// if count > 0 create wrapper, add class, then loop through anonymous array
		if ( count($valid_networks) > 0 ) :
			$container_end = str_replace('<', '</',$container);

			if ( $container_class ) :
				$container = str_replace('>',' class="'. $container_class . '">',$container);
			endif;

			foreach ( $valid_networks as $network ) :
				$output = $output . get_the_social_link($network, $icon, $before, $after);
			endforeach;

			$output = $container . $output . $container_end;
		endif;

	// Return false if invalid argument for $networks
	else :
		$output =  false;
	endif;

	return $output;

}

/**
 * function for converting from 24hr format
 * @param $param
 * @param string $delimiter
 * @return string
 */
function convert(&$param, $delimiter = ".") {
	/*
	 * Array fo delimiters to search for
	 */
	$delimiters = array(':', '.');
	$del = ':';

	/*
	 * Search string for delimiter array and store for use in formatting
	 */
	foreach ( $delimiters as $item ) :
		if ( strpos($param, $item) ) {
			$del = $item;
		};
	endforeach;

	/*
	 * Explode param with delimiter
	 */
	$time = explode($del, $param);

	/*
	 * Calculate and format with delimiter
	 */
	if ( $param > 12 ) {
		if ( isset($time[1]) ) :
			$param = $time[0] - 12 . $delimiter . $time[1].'pm';
		else :
			$param = $time[0] - 12 . $delimiter .'00pm';
		endif;
	} elseif ( $param == 12 ) {
		if ( isset($time[1]) ) :
			$param = $time[0] . $delimiter . $time[1] .'pm';
		else:
			$param = $time[0] . $delimiter .'00pm';
		endif;
	} else {
		if ( isset($time[1]) ) :
			$param = $time[0] . $delimiter . $time[1] .'am';
		else:
			$param = $time[0] . $delimiter .'00am';
		endif;
	}

	/*
	 * Return Param
	 */
	return $param;
}

/**
 * Shorten days
 * @param $param
 */
function truncate(&$param) {
	if ($param === "thursday" ) {
		$param = substr($param,0,4); }
	else {
		$param = substr($param, 0, 3); }
	return;
}

/**
 * Get individual hours for a day
 * @param $var
 * @param null $time_format
 * @param null $day_format
 * @param null $day_range
 * @param string $before
 * @param string $after
 * @return string
 */
function get_the_hours($var, $time_format = null, $day_format = null, $day_range = null, $before = '<span>', $after = '</span>') {

	// Get variables
	$options = get_option('jmr_var');
	$open = get_the_variable('hours_'. $var .'_open');
	$close = get_the_variable('hours_'. $var .'_close');
	$day2 = null;
	if ( $day_range ) {
		$day2 = '-'. ucfirst(substr($day_range, 0, 2)); }
	$schema = 'itemprop="openingHours" content="'. ucfirst(substr($var, 0, 2)) . $day2 .' '. $open .':00-'. $close .':00"';

	// Truncate if short & display 1/2 days
	if ( $day_format === 'short' && $day_range === null ) {
		truncate($var);
		$days = ucfirst($var);
	} else if  ( $day_range === null && $day_range === null ) {
		$days = ucfirst($var);
	} else if  ( $day_format === 'short' && $day_range ) {
		truncate($var);
		truncate($day_range);
		$days = ucfirst($var) .' - '. ucfirst($day_range);
	} else {
		$days = ucfirst($var) .' - '. ucfirst($day_range);
	}

	if ( !$open || !$close ) :
		$hours =  '<span itemscope itemtype="http://schema.org/'.  $options['schema_type'] .'">'.
			$before .'<span>'. $days .'</span> Closed<span>'. $after .
			'<meta '. $schema .'/> 
              </span>';
	else :
		// Time formatting
		if ( $time_format !== '24' || $time_format !== 24 ) {
			convert($open);
			convert($close);
		}

		$hours =  '<span itemscope itemtype="http://schema.org/'.  $options['schema_type'] .'">'.
			$before .'<span>'. $days .'</span> <span>'. $open .'</span> - <span>'. $close .'<span>'. $after .
			'<meta '. $schema .'/> 
              </span>';
	endif;

	return $hours;
}

/**
 * Display business hours
 * @param null $time_format
 * @param null $day_format
 * @param string $before
 * @param string $after
 * @return string
 */
function get_the_business_hours($time_format = null, $day_format = null, $before = '<span>', $after = '</span>') {

	// Get variables8
	$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
	$hours = array();
	$i = 0;

	// for each day
	foreach ($days as $key=>$day) {

		// set open & close val
		$open = get_the_variable('hours_'. $day .'_open');
		$close = get_the_variable('hours_'. $day .'_close');

		// if first push values to array
		if ( $key === 0 ) {
			array_push( $hours, array($key, $open, $close, $key) );
			// else loop through all days
		} else {
			$key2 = $key;

			// if match previous item in hours array skip
			if ( $open === $hours[$i][1] && $close === $hours[$i][2] ) {
				$hours[$i][3] = $key;

				// else use index to set key & push hours to array
			} else {
				$i++;
				array_push( $hours, array($key, $open, $close, $key2) );
				$key2 = 0;
			}
		}
	}

	$output = '<div class="business_hours">';
	foreach ( $hours as $val ) {
		$key    = $val[0];
		$key2   = $val[3];
		$day    = $days[$key];
		$day2   = $days[$key2];

		if ( $key === $key2 ) {
			$output = $output . get_the_hours($day, $time_format, $day_format, null, $before, $after);
		} else {
			$output = $output . get_the_hours($day, $time_format, $day_format, $day2, $before, $after);
		}
	}
	$output = $output . '</div>';
	return $output;
}

/**
 * Return a formatted address for use in PHP
 * @param string $before
 * @param string $after
 * @return string
 */
function get_the_address($before = '<div>', $after = '</div>') {

	// Get variables
	$options = get_option('jmr_var');
	$address_street = $options['address_street'];
	$address_box = $options['address_box'];
	$address_locality = $options['address_locality'];
	$address_region = $options['address_region'];
	$address_code = $options['address_code'];
	$address_country = $options['address_country'];

	// HTML output
	$html = '<address itemscope itemtype="http://schema.org/PostalAddress">';
	// Street address vs PO Box
	if ( isset($address_street) && empty($address_box) ) {
		$html .= '<span itemprop="streetAddress">'. $address_street .'</span><br>'; }
	elseif ( isset($address_box) )  {
		$html .= '<span itemprop="postOfficeBoxNumber">PO Box '. $address_box .'</span><br>'; }

	// Locality -> Region -> Postalcode -> AddressCountry
	if ( isset($address_locality) ) {
		$html .= '<span itemprop="addressLocality">'. $address_locality .'</span>'; }
	if ( isset($address_region) ) {
		$html .= '<span itemprop="addressRegion">'. $address_region .'</span>'; }
	if ( isset($address_code) ) {
		$html .= '<span itemprop="postalCode">'. $address_code .'</span><br>'; }
	if ( isset($address_country) ) {
		$html .= '<span itemprop="addressCountry">'. $address_country .'</span>'; }
	$html .= '</address>';

	return $before . $html . $after;

}

function jmr_var_setup(){

	// Google Analytics code
	function jmr_google_analytics(){
		$options = get_option('jmr_var');
		if ( isset( $options['ga_enabled'] ) && 1 == $options['ga_enabled'] && isset( $options['ga_id'] ) && false === empty( $options['ga_id'] ) ) {
			?>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				<?php
				if ( isset( $options['ga_ssl'] ) && 1 == $options['ga_ssl'] ) {
					echo "\t\tga('set', 'forceSSL', true);\n";
				}
				?>
				ga('create', '<?php echo $options['ga_id']; ?>', 'auto');
				<?php
				if ( isset( $options['ga_display'] ) && 1 == $options['ga_display'] ) {
					echo "\t\tga('require', 'displayfeatures');\n";
				}
				?>
				ga('send', 'pageview');
			</script>
			<?php
		}
	}
	add_action( 'wp_head', 'jmr_google_analytics', 999 );

	// Add meta tags
	function jmr_meta_verify(){
		$options = get_option('jmr_var');
		if ( isset( $options['verify_google'] ) && false === empty( $options['verify_google'] ) ) {
			echo '<meta name="google-site-verification" content="' . $options['verify_google'] . '">';
		}
		if ( isset( $options['verify_bing'] ) && false === empty( $options['verify_bing'] ) ) {
			echo '<meta name="msvalidate.01" content="' . $options['verify_bing'] . '">';
		}
		if ( isset( $options['verify_pinterest'] ) && false === empty( $options['verify_pinterest'] ) ) {
			echo '<meta name="p:domain_verify" content="' . $options['verify_pinterest'] . '">';
		}
		if ( isset( $options['verify_yandex'] ) && false === empty( $options['verify_yandex'] ) ) {
			echo '<meta name="yandex-verification" content="' . $options['verify_yandex'] . '">';
		}
	}
	add_action( 'wp_head', 'jmr_meta_verify', 5 );

	// Assemble JSON-LD block
	function jmr_variables_json() {
		$options = get_option('jmr_var');

		$type = isset( $options['schema_type'] ) ? esc_attr( $options['schema_type'] ) : '';
		$address_street = isset( $options['address_street'] ) ? esc_attr( $options['address_street'] ) : '';
		$address_locality = isset( $options['address_locality'] ) ? esc_attr( $options['address_locality'] ) : '';
		$address_region = isset( $options['address_region'] ) ? esc_attr( $options['address_region'] ) : '';
		$address_code = isset( $options['address_code'] ) ? esc_attr( $options['address_code'] ) : '';
		$address_country = isset( $options['address_country'] ) ? esc_attr( $options['address_country'] ) : '';
		$phone = isset( $options['phone'] ) ? esc_attr( $options['phone'] ) : '';
		$fax = isset( $options['fax'] ) ? esc_attr( $options['fax'] ) : '';
		$email = isset( $options['email'] ) ? esc_attr( $options['email'] ) : '';
		$geo_latitude = isset( $options['geo_lat'] ) ? esc_attr( $options['geo_lat'] ) : '';
		$geo_longitude = isset( $options['geo_lng'] ) ? esc_attr( $options['geo_lng'] ) : '';
		$schemaDescription = isset( $options['schema_description'] ) ? esc_attr( $options['schema_description'] ) : '';
		$url = esc_url( get_bloginfo('url') );
		$org = esc_attr( get_bloginfo('name') );
		$schema_logo = '';
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$schema_logo = $image[0];

		$metadata = '
    {
      "@context": "http://schema.org",
      "@type": "' . $type . '",
      "name": "' . $org . '",
      "description": "' . $schemaDescription . '",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "' . $address_street . '",
        "addressLocality": "' . $address_locality . '",
        "addressRegion": "' . $address_region . '",
        "postalCode": "' . $address_code . '",
        "addressCountry": "' . $address_country . '"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": ' . $geo_latitude . ',
        "longitude": ' . $geo_longitude . '
      },
      "url": "' . $url . '"
      "telephone": "' . $phone . '",
      "faxNumber": "' . $fax . '",
      "email": "' . $email . '",
      "logo": "' . $schema_logo . '",
    }';
		return $metadata;
	}

	function jmr_variables_metadata(){
		$options = get_option('jmr_var');
		if ( isset( $options['schema_enabled'] ) && $options['schema_enabled'] == 1 ) {
			$metadata = jmr_variables_json();
			echo '<script type="application/ld+json">' . $metadata . '</script>';
		}
	}
	add_action( 'wp_footer', 'jmr_variables_metadata' );

}

add_action( 'init', 'jmr_var_setup' );
