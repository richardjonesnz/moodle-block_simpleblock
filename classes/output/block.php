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
 * Prepare data for block content
 *
 * @package    block_simpleblock
 * @copyright  2021 Richard Jones <richardnz@outlook.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace block_simpleblock\output;
// Use some core libraries.
use renderable;
use renderer_base;
use templatable;
use stdClass;
/**
 * Class containing data for the block content.
 *
 * @package    block_simpleblock
 * @copyright  2021 Richard Jones <richardnz@outlook.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block implements renderable, templatable {

    protected $blockid;

    // Pass any data needed for the block content.
    public function __construct($blockid) {

        $this->blockid = $blockid;

    }
/**
 * Export the block content so it can be used as the context for a mustache template.
 *
 * @param renderer_base $output
 * @return return stdClass|array
 */
    public function export_for_template(renderer_base $output) {
        global $USER;

        // The data structure to hold the content for the block.
        $data = new stdClass();
        $data->message = get_string('welcomeuser', 'block_simpleblock', $USER);
        $data->blockid = $this->blockid;
        return $data;
    }
}