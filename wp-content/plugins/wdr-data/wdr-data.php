<?php
/**
* Plugin Name: Water Damage Restoration Data 
* Plugin URI: http://water-damage-restoration.project/plugins/wdr-data/
* Description: This plugin is used for creating data for homepage.
* Version: 1.0.0
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: SEO 1 Click
* Author URI: https://seooneclick.com/
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wdr-data
* Domain Path: /languages

{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

if(!defined('ABSPATH')){
    exit();
}

require 'include/OurServices.php';
require 'include/OurServicesMetaBox.php';
require 'include/AboutUs.php';

if(!class_exists('WdrData')){
    class WdrData 
    {
        public function __construct()
        {
            add_action('plugins_loaded', array($this, 'boot'));
        }

        public function boot()
        {
            $ourServices = new OurServices();
            $ourServicesMetaBox = new OurServicesMetaBox();
            $aboutUs = new AboutUs();
        }

        public static function create()
        {
            return new self;
        }
    }
    WdrData::create();
}

?>