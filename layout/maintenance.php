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
 * The maintenance layout.
 *
 * @package   theme_peacecorps
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
$themefiles = theme_peacecorps_setting_files($PAGE->theme->settings);
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <link href='//cloud.typography.com/6638272/768686/css/fonts.css' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes('custom-theme'); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div class="container-fluid">
    <section id="header-wrap">
        <header role="banner" class="navbar navbar-fixed-top moodle-has-zindex">
            <nav role="navigation" class="navbar-inner">
                <div id="brand">
                    <div id="logo" >
                        <a href="<?php echo $CFG->wwwroot;?>">
                            <?php if (isset($themefiles['logo'])) {
                                echo html_writer::empty_tag('img', array('alt' => 'Peace Corps Logo', 'src' => $themefiles['logo']));
                            } else { ?>
                                <img src="<?php echo $OUTPUT->pix_url('logo', 'theme'); ?>" alt="Peace Corps Logo" />
                            <?php } ?>
                            <?php
                            echo $PAGE->theme->settings->headertext;
                            ?>
                        </a>
                    </div>
                </div>
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse collapse">
                    <?php echo $OUTPUT->login_info() ?>
                    <?php echo $OUTPUT->custom_menu(); ?>
                </div>
            </nav>
        </header>
    </section>

    <section id="page-wrap">
        <div id="page">

            <header id="page-header" class="clearfix">
            </header>

            <div id="page-content" class="row-fluid">
                <section id="region-main" class="span12">
                    <?php echo $OUTPUT->main_content(); ?>
                </section>
            </div>

            <?php echo $OUTPUT->standard_end_of_body_html() ?>

        </div>
    </section>

    <footer id="page-footer">
        <div id="footer-content">
            <div class="row-fluid">
                <?php echo $OUTPUT->blocks('footer-one', 'span4'); ?>
                <?php echo $OUTPUT->blocks('footer-two', 'span4'); ?>
                <?php echo $OUTPUT->blocks('footer-three', 'span4'); ?>
            </div>
        </div>
    </footer>
    <div id="page-footer2">
        <span id="copyright">&copy; 2015 All rights reserved.</span>
        <?php echo $OUTPUT->login_info() ?>
    </div>
</div>

</body>
</html>
