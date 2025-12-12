<?php

function totalsocialsolutions_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'totalsocialsolutions'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'totalsocialsolutions'),
        'before_widget' => '<div id="%1$s" class="req_bid %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 1', 'totalsocialsolutions'),
        'id' => 'sidebar-2',
        'description' => __('Add widgets here to appear in your footer.', 'totalsocialsolutions'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer 2', 'totalsocialsolutions'),
        'id' => 'sidebar-3',
        'description' => __('Add widgets here to appear in your footer.', 'totalsocialsolutions'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Footer 3', 'totalsocialsolutions'),
        'id' => 'sidebar-4',
        'description' => __('Add widgets here to appear in your footer.', 'totalsocialsolutions'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Newsletter', 'totalsocialsolutions'),
        'id' => 'sidebar-5',
        'description' => __('Add widgets here to appear in your footer.', 'totalsocialsolutions'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Home Widgets', 'totalsocialsolutions'),
        'id' => 'sidebar-6',
        'description' => __('Add widgets here to appear in your footer.', 'totalsocialsolutions'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Home Buy Now Button', 'totalsocialsolutions'),
        'id' => 'sidebar-7',
        'description' => __('Add widgets here to appear in your footer.', 'totalsocialsolutions'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 style="display:none;" class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'totalsocialsolutions_widgets_init');
/* contact form 7 */
add_filter( 'wpcf7_load_js', '__return_true' );
add_filter( 'wpcf7_load_css', '__return_true' );

/* contact form 7 end  */

/*
 * Enable support for Post Thumbnails on posts and pages.
 */
add_theme_support('post-thumbnails');

/**
 * Proper way to enqueue scripts and styles.
 */
function wpdocs_theme_name_scripts() {
    wp_enqueue_style('admin_style', get_template_directory_uri() . '/css/admin.css');
    //wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
    wp_enqueue_style('admin_style');
}

add_action('admin_enqueue_scripts', 'wpdocs_theme_name_scripts');

/* * *Walker Menu** */

class navclass_walker_nav_menu extends Walker_Nav_Menu {

// add classes to ul sub-menus
    function start_lvl(&$output, $depth = 0, $args = array()) {
        // depth dependent classes
        $indent = ( $depth > 0 ? str_repeat("\t", $depth) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2 ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >= 2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode(' ', $classes);

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

// add main/sub classes to li's and links
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat("\t", $depth) : '' ); // code indent
        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >= 2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));

        // passed classes
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

        // build html
        $output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . ' nav-item">';

        // link attributes
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .=!empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .=!empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .=!empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $item_output = sprintf('%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s', $args->before, $attributes, $args->link_before, apply_filters('the_title', $item->title, $item->ID), $args->link_after, $args->after
        );

        // build html
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

/* * *Comments Validations ** */

function comment_validation_init() {
    if (is_singular()) {
        ?>
        <script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/js/jquery.validate.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('#commentform').validate({
                    rules: {
                        author: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        comment: {
                            required: true
                        },
                    },
                    messages: {
                        author: "Please enter your name.",
                        email: "Please enter a valid email address.",
                        comment: "Message box can't be empty!",
                        phone: "Please enter a valid number",
                    },
                });
            });
        </script>
        <?php
    }
}

add_action('wp_footer', 'comment_validation_init');


/* Admin Logo */
add_action("login_head", "my_login_head");

function my_login_head() {
    $option_ad = get_option("site_logo");
    ?>
    <?php
    echo "
	<style>
	body.login{
		background: #FFFFFF;
	}
	body.login #nav a, body.login #backtoblog a{
		color:#fff;
	}
	body.login #login h1 a {
		background: url('" . $option_ad . "') no-repeat scroll center center transparent;
		height:250px;
		width:100%;
	}
	#login{
		min-width:360px;
		padding:2% 0 0 0;
	}
	body.login #nav a, body.login #backtoblog a
	{ color:#333;}
	</style>
	
	";
}

add_filter('login_headerurl', 'custom_loginlogo_url');

function custom_loginlogo_url($url) {
    return get_option('home');
}

add_filter('body_class', 'multisite_body_classes');

function multisite_body_classes($classes) {
    global $post;
    $classes[] = $post->post_name;
    return $classes;
}

// changing the alt text on the logo to show your site name 
function my_login_title() {
    return get_option('blogname');
}

add_filter('login_headertitle', 'my_login_title');

// register widget
add_action('widgets_init', 'ctUp_ads_widget');

function ctUp_ads_widget() {
    register_widget('ctUp_ads');
}

// add admin scripts
add_action('admin_enqueue_scripts', 'ctup_wdscript');

function ctup_wdscript() {
    wp_enqueue_media();
    wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
}

// widget class
class ctUp_ads extends WP_Widget {

    function ctUp_ads() {
        $widget_ops = array('classname' => 'ctUp-ads');
        $this->WP_Widget('ctUp-ads-widget', 'Text With Image', $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;
        ?>
        <div class="col-sm-3 services">
            <div class="block">
                <a href="<?php echo esc_url($instance['link']); ?>">
                    <img src="<?php echo esc_url($instance['image_uri']); ?>" />
                    <h3><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
                </a>
            </div>
        </div>

        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['link'] = strip_tags($new_instance['link']);
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
        return $instance;
    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br />
            <input type="text" placeholder="Title" name="<?php echo $this->get_field_name('title'); ?>"id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>">Link</label><br />
            <input type="text" placeholder="http://www/example.com" name="<?php echo $this->get_field_name('link'); ?>"id="<?php echo $this->get_field_id('link'); ?>" value="<?php echo $instance['link']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />
            <?php
            if ($instance['image_uri'] != '') :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
            ?>

            <input type="text" placeholder="Image Url" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
        </p>

        <?php
    }

}

function blogs_single_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <div class="pull-left post_comments">
        <?php echo get_avatar($comment, $size = '85'); ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
        <em><?php _e('Your comment is awaiting moderation.') ?></em>
        <br />
    <?php endif; ?>

    <div class="media-body post_reply_comments">
        <h3><?php printf(__('<h1>%s</h1>'), get_comment_author_link()) ?></h3> 
        <h4><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></h4>
        <p><?php comment_text() ?></p>
        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php
}

add_filter('get_avatar', 'add_gravatar_class');

function add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar img-circle", $class);
    return $class;
}

function filter_plugin_updates($value) {
    unset($value->response['advanced-custom-fields-pro/acf.php']);
    return $value;
}

add_filter('site_transient_update_plugins', 'filter_plugin_updates');

function printArray($value, $lable) {
    print'<pre>' . $lable;
    print_r($value);
    print'</pre>';
}
// Defer Parsing of JavaScript in WordPress via functions.php file
// Learn more at https://technumero.com/defer-parsing-of-javascript/ 
/*
function defer_parsing_js($url) {
    //Add the files to exclude from defer. Add jquery.js by default
        $exclude_files = array('https://www.totalsocialsolutions.com/wp-content/themes/totalsocialsolutions/js/jquery.min.js ', 'https://www.totalsocialsolutions.com/wp-content/themes/totalsocialsolutions/js/jquery.min.js ');
    //Bypass JS defer for logged in users
        if (!is_user_logged_in()) {
            if (false === strpos($url, '.js')) {
                return $url;
            } 
    
            foreach ($exclude_files as $file) {
                if (strpos($url, $file)) {
                    return $url;
                }
            }
        } else {
            return $url;
        }
        return "$url' defer='defer";
    
    }
    add_filter('clean_url', 'defer_parsing_js', 11, 1);*/


?>
