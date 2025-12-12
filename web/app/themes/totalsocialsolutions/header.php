<!DOCTYPE html>
<html lang="en">
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>
            <?php wp_title(''); ?>
            <?php
            if (wp_title('', false)) {
                echo ' :';
            }
            ?>
            <?php bloginfo('name'); ?>
        </title>
        <link rel="Shortcut Icon" href="<?php echo get_option('fvicon'); ?>" type="image/x-icon" />

        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!-- core CSS -->
        <!-- <link href="<?php //bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
           <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            
        <link href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php bloginfo('template_url'); ?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php bloginfo('template_url'); ?>/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="<?php bloginfo('template_url'); ?>/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
<?php
if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
wpcf7_enqueue_scripts();

}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
wpcf7_enqueue_styles();

}

?>
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

       
        <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>
       
	

		
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
		<?php wp_head(); ?>
	
    </head><!--/head-->

    <body <?php body_class(); ?>>

        <!-- header starts -->
        <header> 
			
            <!-- top-header starts-->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="social-icons">
                                <li>
                                    <a target="_blank" href="<?php echo get_option("fb_link"); ?>">
                                        <img src="<?php bloginfo('template_url'); ?>/image/facebook.png" alt="fb" title="fb" />
                                    </a>
                                </li>

                                <li>
                                    <a target="_blank" href="<?php echo get_option("twitter_link"); ?>">
                                        <img src="<?php bloginfo('template_url'); ?>/image/twitter.png" alt="twitter" title="twitter" />
                                    </a>
                                </li>

                                 <li>
                                    <a target="_blank" href="<?php echo get_option("instagram_link"); ?>">
                                        <img src="<?php bloginfo('template_url'); ?>/image/instagram.png" alt="instagram" title="instagram" />
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?php echo get_option("blog_link"); ?>">
                                        <img src="<?php bloginfo('template_url'); ?>/image/blog.png" alt="blog" title="blog" />
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?php echo get_option("youtube_link"); ?>">
                                        <img src="<?php bloginfo('template_url'); ?>/image/youtube.png" alt="youtube" title="youtube" />
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?php echo get_option("linkedin_link"); ?>">
                                        <img src="<?php bloginfo('template_url'); ?>/image/linkedin.png" alt="linkedin" title="linkedin" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="address">
                                <li> 
                                    <img src="<?php bloginfo('template_url'); ?>/image/call.png" alt="call" title="call" />
                                    <p><a href="tel:<?php echo get_option("phone"); ?>"><?php echo get_option("phone"); ?></a></p>
                                </li>
                                <li>
                                    <img src="<?php bloginfo('template_url'); ?>/image/mail.png" alt="mail" title="mail" /> 
                                    <p><a data-toggle="modal" data-target="#myModal" href="#">Request a Call Back</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- top-header ends--> 

            <!-- menu starts-->
            <div class="menubar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 logo">
                            <div class="logo-header">
                                <a href="<?php echo get_option("home"); ?>">
                                    <img src="<?php echo get_option("site_logo"); ?>" alt="<?php echo get_option("blogname"); ?>" title="<?php echo get_option("blogname"); ?>" />
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8 menu">
                            <nav class="nav nav-mob">
                                <div class="nav-border">
                                    <?php
                                    wp_nav_menu(array(
                                        'menu' => 'Header Menu',
                                        'menu_class' => 'nav-list',
                                        'walker' => new navclass_walker_nav_menu
                                    ));
                                    ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- menu ends--> 


            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="modal-title">Let’s Get <span>Connected!</span></h2>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form">

                                <div class="form">
                                    <?php echo do_shortcode('[contact-form-7 id="2049" title="Request a call"]'); ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header><!--/header-->
    
<div id="ouibounce-modal">
	<div class="underlay"></div>
		<div class="modal">
			<div class="modal-title">
				<h3>This is a OuiBounce modal!</h3>
			</div>

			<div class="modal-body">
				<p>A doge is an elected chief of state lordship, the ruler of the Republic in many of the Italian city states during the medieval and renaissance periods, in the Italian "crowned republics".</p>
				<p>The word is from a Venetian word that descends from the Latin dux (as do the English duke and the standard Italian duce and duca), meaning "leader", especially in a military context. The wife of a doge is styled a dogaressa. <a href="https://en.wikipedia.org/wiki/Doge" target="blank">[1]</a></p>
				<form>
					<input type="text" placeholder="you@email.com">
					<input type="submit" value="learn more &raquo;">
					<p class="form-notice">*this is a fake form</p>
				</form>
			</div>

			<div class="modal-footer">
				<p>no thanks</p>
			</div>
		</div>
</div>
 
