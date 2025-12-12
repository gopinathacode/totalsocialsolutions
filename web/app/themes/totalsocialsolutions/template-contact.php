<?php
/*
 * Template Name: contact
 */
get_header();
?>
<div class="banner">
    <img src="<?php bloginfo('template_url'); ?>/image/banner.jpg" class="img-responsive" alt="banner">
    <div class="banner-title">
        <h1><?php the_title(); ?></h1>
        <div class="breadcrumbs">
            <?php
            if (function_exists('bcn_display')) {
                bcn_display();
            }
            ?>
        </div>
    </div>
</div>
<!--get in touch -->
<div class="getintouch">
    <div class="container">
        <div class="row">
            <div class="cont-form-outer">
                <div class="col-sm-8 form-left">
                    <div class="cont-heading">
                        <h3>Get in touch</h3>
                        <p>For the fastest response, use the form below and we’ll be in touch with you shortly.</p>
                    </div>

                    <div class="form_contact">
                        <?php echo do_shortcode('[contact-form-7 id="2050" title="Contact form_copy"]'); ?>
                    </div>
                </div>
                <!--contact-form-->
                <div class="col-sm-4 form-right">
                    <div class="cont-details">
                        <h3>Contact Details</h3>
                        <p>You can contact us at:</p>
                        <div class="cont-address">
                            <ul>
                                <li class="contact-call"><a href="tel:<?php echo get_option("phone"); ?>"><?php echo get_option("phone"); ?></a>  </li>
                                <li class="contact-mail"><a href="#" data-toggle="modal" data-target="#myModal">Request a Phone Callback</a></li>
                                <li class="contact-adress"><p><?php echo get_option("location_address"); ?></p></li>
                            </ul>
                        </div>

                    </div>
                    <div class="fb-feed">
                        <h3>Facebook Feeds</h3>
                        <?php //echo do_shortcode("[custom-facebook-feed]"); ?>
                        <div class="fb-page" data-href="https://www.facebook.com/TotalSocialSolutions/" data-tabs="timeline" data-width="361" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TotalSocialSolutions/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TotalSocialSolutions/">Total Social Solutions</a></blockquote></div>
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v19.0" nonce="6EXBv6KM"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--contact-form ends-->

<?php get_footer(); ?>
