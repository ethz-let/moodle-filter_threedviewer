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

namespace filter_threedviewer;

/**
 * This is a plugin to enable interactive visualization of STL files using Three.js
 *
 * This plugin is implemented in pure JavaScript.
 *
 * @package    filter_threedviewer
 * @copyright  2022 Cyril Picard <cpicard@ethz.ch>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class text_filter extends \core_filters\text_filter {
   #[\Override]
    public function filter($text, array $options = array()) {
        global $CFG;

        if (!is_string($text) or empty($text)) {
            // Non-string data can not be filtered anyway.
            return $text;
        }

        if (stripos($text, '.stl') === false && stripos($text, '.glb') === false && stripos($text, '.gltf') === false) {
            // If there is no .stl|.glb|.gltf, nothing can match.
            return $text;
        }

        if ($this->page->requires->should_create_one_time_item_now('filter_threedviewer/threed-filter')) {
            // This only needs to be included and run once
            $this->page->requires->js_call_amd('filter_threedviewer/threed-filter', 'init');
        }

        return $text;
    }
}
