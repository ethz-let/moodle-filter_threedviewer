<?php
// This file is part of Threed-Viewer Moodle Filter.
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
 * This is a plugin to enable interactive visualization of STL files using Three.js
 *
 * This plugin is implemented in pure JavaScript.
 *
 * @package    filter_threedviewer
 * @copyright  2021 Cyril Picard <cpicard@ethz.ch>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Class filter_threedviewer
 *
 * @package    filter_threedviewer
 * @copyright  2021 Cyril Picard <cpicard@ethz.ch>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class filter_threedviewer extends moodle_text_filter {
    
    public $page;
    
    public function setup($page, $context) {
         // This only requires execution once per request.
        
        $this->page = $page;
        
        static $jsinitialised = false;
        if ($jsinitialised) {
            return;
        }
        $jsinitialised = true;

    }

    function filter($text, array $options = array()) {
        global $CFG;

        if (!is_string($text) or empty($text)) {
            // Non-string data can not be filtered anyway.
            return $text;
        }

        if (stripos($text, '.stl') === false) {
            // Performance shortcut - if there is no </a> tag, nothing can match.
            return $text;
        }

        $this->page->requires->js_call_amd('filter_threedviewer/threed-filter', 'init');
  
        //include here to remove error 
        return $text;
    }
}

