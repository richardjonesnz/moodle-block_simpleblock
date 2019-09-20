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
 * simpleblock settings
 *
 * @package    block_simpleblock
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * Modified for use in MoodleBites for Developers Level 1 by Richard Jones & Justin Hunt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

// Our default values:
$defaulturl = 'https://quizlet.com/132695231/scatter/embed';
$defaultheight = '400';
$defaultwidth = '600';

// Header.
$settings->add(new admin_setting_heading('sampleheader',
         get_string('headerconfig', 'block_simpleblock'),
         get_string('headerconfigdesc', 'block_simpleblock')));

// The url to be displayed.
$settings->add(new admin_setting_configtext('block_simpleblock/url',
        get_string('url', 'block_simpleblock'),
        get_string('url_details', 'block_simpleblock'),
        $defaulturl, PARAM_RAW));

// The iframe height and width.
$settings->add(new admin_setting_configtext('block_simpleblock/height',
        get_string('height', 'block_simpleblock'),
        get_string('height_details', 'block_simpleblock'),
        $defaultheight, PARAM_INT));
$settings->add(new admin_setting_configtext('block_simpleblock/width',
        get_string('width', 'block_simpleblock'),
        get_string('width_details', 'block_simpleblock'),
        $defaultwidth, PARAM_INT));