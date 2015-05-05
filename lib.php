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
 * @package   theme_peacecorps
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function theme_peacecorps_page_init(moodle_page $page) {
    // Header text defaults.
    if (empty($page->theme->settings->headertext)) {
        $page->theme->settings->headertext = "Peace Corps | <span>University</span>";
    }
    $page->requires->jquery();
}

function theme_peacecorps_process_css($css, $theme) {
    // Set the background image for the logo.
    $themefiles = theme_peacecorps_setting_files($theme->settings);
    if (!empty($themefiles['bannerimage'])) {
        $tag = '[[setting:bannerimage]]';
        $replacement = $themefiles['bannerimage'];
        $css = str_replace($tag, $replacement, $css);
    }
    return $css;
}

/**
 * Finds files in theme settings and returns moodle urls for those files.
 *
 * @return array Moodle urls for theme files
 */
function theme_peacecorps_setting_files($settings) {
    $context = context_system::instance();
    $settingsfiles = [];
    $fs = get_file_storage();
    foreach ($settings as $key => $filename) {
        $files = $fs->get_area_files($context->id, 'theme_peacecorps', $key);
        foreach ($files as $file) {
            if ($filename == $file->get_filepath().$file->get_filename()) {
                $url = moodle_url::make_pluginfile_url($file->get_contextid(), $file->get_component(), $file->get_filearea(), $file->get_itemid(), $file->get_filepath(), $filename);
                $settingsfiles[$key] = $url;
            }
        }
    }
    return $settingsfiles;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_peacecorps_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM) {
        $theme = theme_config::load('peacecorps');
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}