<?php
/* Plugin Name: Content Template THang
 *
 *
 *
 * */

function thang_custom_logo()
{
    ?><!--
    <style type="text/css">
        #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
            background-image: url('https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_color-256.png') !important;
            background-position: 0 0;
            color: rgba(0, 0, 0, 0);
        }

        #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
            background-position: 0 0;
        }
    </style>-->
    <?php

}

add_action('wp_before_admin_bar_render', 'thang_custom_logo');


function cpt_page_template($arg,$content)
{
    ?>
    <style type="text/css">
        .site-content-contain{
            background-image: url('<?php echo $arg[ 'url' ] ?>');
            background-size:cover;
            background-position:center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .site-content{
            background-color:white;
            opacity:0.9;
        }
    </style>



    <?php
}

add_shortcode('pic_template', 'cpt_page_template');


?>





