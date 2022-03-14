<?php $companyDetails = get_option('audere_test_plugin_options'); ?>
<html>
<head>
    <title><?php echo $companyDetails['company_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body <?php body_class(); ?>>
<div class="page-header">
    <div class="page-main header-content">
        <div class="left">
            <?php
            // Site title or logo.
            twentytwenty_site_logo();
            ?>
        </div>
        <div class="right nav-outer">
            <ul id="website_main_navigation" class="website-navigation">
                <?php wp_nav_menu(
                    array(
                        'container'  => '',
                        'items_wrap' => '%3$s',
                        'theme_location' => 'primary',
                    )
                ); ?>
            </ul>
            <div id="mobile_menu_icon">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
<div id="mobile_sidebar"></div>