# Variables/WP Business Settings
Variables/WP Business Settings has been forked from Variables by @JMRCodes with the purpose of generalising it for more than a developers use/reference. It can be used as a must-use WordPress plugin or in the plugins directory.

Variables/WP Business Settings allows you to store generic information that you might want to use on your site, such as your contact information, postal address, opening hours, and social media links, without having to edit widgets, or hard-coded references in themes.

It also leverages several functions for displaying this information in a usable format, such as business hours, social media and contact details. It can also embed JSON Schema data into your site to improve SEO.

## Installation
####Compile Distribution Package
	1. Run `npm i` to install all required packages
	2. Run `gulp build`
	3. All production ready files will be output to a `dist` folder

####Install As: Must Use Plugin
*Must use plugins will not appear on the Plugins admin page. You can verify that the plugin is installed by visiting the Variables page located under the WordPress Settings menu.*

	1. Copy the contents of the `ldps-variables` folder to `wp-content/mu-plugins`.
	2. Move `wp-business-settings.php` to `mu-plugins` folder and update '/dist/ldps-business-settings.php' -> '/ldps-variables/dist/ldps-business-settings.php'


####*Install As: Use As Generic Plugin
	1. Copy the contents of the `ldps-variables` folder to `wp-content/plugins`.
	2. Activate plugin from the WordPress dashboard.

