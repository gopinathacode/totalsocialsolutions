<?php get_header(); ?>

<div class="inner-content">
    <div class="container">
        <div class="col-sm-12 col-xs-12 page_404">
            <div class="container">
                <div class="opps_text">
                    <p class="not_found">
                        <span class="highlight2">404</span>
                        <span class="oops">ooops!</span>
                    </p>
                    <h2>Sorry page not found!</h2>
                    <p>
                        <a class="theme_button" href="<?php echo get_option('home'); ?>">Back To Home</a>
                    </p>
                </div>
            </div>		
        </div>
    </div>
</div>

<?php get_footer(); ?>