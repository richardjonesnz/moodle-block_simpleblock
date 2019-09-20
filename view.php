<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * simpleblock view page
 *
 * @package    block_simpleblock
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * Modified for use in MoodleBites for Developers Level 1 by Richard Jones & Justin Hunt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');
// A required parameter.
$blockid = required_param('blockid', PARAM_INT);

$PAGE->set_course($COURSE);
$PAGE->set_url('/blocks/simpleblock/view.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('course');
$PAGE->set_title(get_string('pluginname', 'block_simpleblock'));

require_login();

$adminconfig = get_config('block_simpleblock');

// Get the instance configuration data from the database.
// It's stored as a base 64 encoded serialized string.
$configdata = $DB->get_field('block_instances', 'configdata', ['id' => $blockid]);

if ($configdata) { // If it exists.
    $config = unserialize(base64_decode($configdata));
} else {
    // No instance data, use admin settings.
    // However, that only specifies height and width, not size.
   $config = $adminconfig;
   $config->size = 'custom';
}

// Now we will pass the url and size data to the renderer.
$url = $config->url;
// Size data
switch ($config->size) {
    case 'custom':
        $width = $adminconfig->width;
        $height = $adminconfig->height;
        break;
    case 'small' :
        $width = 360;
        $height = 240;
        break;
    case 'medium' :
        $width = 600;
        $height = 400;
        break;
    case 'large' :
        $width = 1024;
        $height = 720;
        break;
}
// Pass the data to the renderer.
$renderer = $PAGE->get_renderer('block_simpleblock');
$renderer->display_view_page($url, $width, $height);