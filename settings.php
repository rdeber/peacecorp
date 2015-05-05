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
 * Setttings for component 'theme_peacecorps'
 *
 * @package   theme_peacecorps
 * @copyright 2011 Remote Learner  http://www.remote-learner.net/
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Logo file setting
    $name = 'theme_peacecorps/logo';
    $title = get_string('logo','theme_peacecorps');
    $description = get_string('logodesc', 'theme_peacecorps');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Header text setting
    $name = 'theme_peacecorps/headertext';
    $title = get_string('headertext','theme_peacecorps');
    $description = get_string('headertextdesc', 'theme_peacecorps');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Banner image
    $name = 'theme_peacecorps/bannerimage';
    $title = get_string('bannerimage','theme_peacecorps');
    $description = get_string('bannerimagedesc', 'theme_peacecorps');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'bannerimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

}
