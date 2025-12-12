<?php if(!is_page('contact') && !is_page('pricing-and-purchase')) { ?>
<!--contact-form-->
<div class="contact-form">
    <div class="container">
        <div class="form">
            <h2>Let’s Get <span>Connected!</span></h2>

            <?php echo do_shortcode('[contact-form-7 id="2049" title="Request a call back_copy"]'); ?>
            
           

        </div>
    </div>
</div>
<!--contact-form-->
<?php } ?>

<footer>
    <div class="container">

        <?php
        wp_nav_menu(array(
            'menu' => 'Footer Menu',
            'menu_class' => 'footer-menu',
            'walker' => new navclass_walker_nav_menu
        ));
        ?>

        <ul class="social-footer">
            <li>
                <a target="_blank" href="<?php echo get_option("fb_link"); ?>">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a target="_blank" href="<?php echo get_option("twitter_link"); ?>">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a target="_blank" href="<?php echo get_option("instagram_link"); ?>">
                <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a target="_blank" href="<?php echo get_option("blog_link"); ?>">
                    <i class="fa fa-rss" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a target="_blank" href="<?php echo get_option("youtube_link"); ?>">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a target="_blank" href="<?php echo get_option("linkedin_link"); ?>">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </li>
        </ul>

      
		<p>Total Social Solutions, LLC, 6935 Aliante Pkwy, Suite 104 #430, N. Las Vegas, NV 89084</p>
		  <p>Copyright © 2025 Total Social Solutions, LLC. All rights reserved.</p>

    </div>

</footer>
<?php do_action('wp_footer'); ?>  
<!-- Google Analytics -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3PD93C9SGF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3PD93C9SGF');
</script>
<!-- End Google Analytics -->
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<!-- <script src="<?php //bloginfo('template_url'); ?>/js/bootstrap.min.js" type="text/javascript"></script>  -->
 <!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.min.js" type="text/javascript"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/masonry.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/wow.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/custom.js" type="text/javascript"></script>

</body>
</html>
