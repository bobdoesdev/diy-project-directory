<?php 
/**
 * Plugin Name: DIY Project Post Type & Widgets
 * Description: Adds a custom post type, custom taxonomy and accompanying widgets
 * Version: 1.0
 * Author: Bob O'Brien, Digital Eel Inc.
 * Licence: GPL2
 */

/*  Copyright 2018  Digital Eel Inc.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// exit if file is called directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once plugin_dir_path(__FILE__) . 'includes/class-diy-project-post-type.php';

// require_once plugin_dir_path(__FILE__) . 'includes/class-diy-project-archive.php';

require_once plugin_dir_path(__FILE__) . 'includes/class-diy-recent-projects-widget.php';

require_once plugin_dir_path(__FILE__) . 'includes/class-diy-project-categories-widget.php';

require_once plugin_dir_path(__FILE__) . 'includes/class-diy-project-search-widget.php';


