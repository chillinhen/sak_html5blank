<?php get_header(); ?>
<?php get_template_part('partials/banner'); ?>
<div class="site-content">
    <div class="main-content">
        <article id="post-not-found">
            <h1><?php _e( 'Error 404: The site you are looking for could unfortunately not be found.', 'html5blank' ); ?></h1>
            <p><?php
                $link = '<a href="mail@spraachen.de">mail@spraachen.de</a>';
                printf(
                        _e('Please check the URL, return to our home page or send us your questions by email to %s.</br>Thank You!', 'html5blank'), $link);
                ?></p>
        </article>
    </div>
</div>

<?php get_footer(); ?>
