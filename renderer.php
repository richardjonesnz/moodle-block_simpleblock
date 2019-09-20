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
 * simpleblock renderer
 *
 * @package    block_simpleblock
 * @copyright  by Justin Hunt
 * Modified for use in Developers Workshop by Richard Jones
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_simpleblock_renderer extends plugin_renderer_base {

    function display_view_page($url, $width, $height) {
        global $USER;

        // Set up data object for template.
        $data = new stdClass();
        $data->heading = get_string('pluginname', 'block_simpleblock');
        $data->content = fullname($USER);

        // The iframe attributes.
        $data->url = $url;
        $data->width = $width;
        $data->height = $height;

        echo $this->output->header();
        echo $this->render_from_template('block_simpleblock/viewpage', $data);
        echo $this->output->footer();
    }
}