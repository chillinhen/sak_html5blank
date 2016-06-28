<?php /* Template Name: Produktseite */ get_header(); ?>  
    <?php if (have_posts()) : ?>
    <?php get_template_part('partials/banner'); ?>
        <div class="site-content">
            <div id="breadcrumb"><?php breadcrumb_trail(); ?></div>
            <div class="main-content"> 
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/article', 'page'); ?>
                <?php endwhile; ?>

                <?php
                // event tables
                if (have_rows('termine')):
                    ?>
                    <div class="events">
                        <?php
                        while (have_rows('termine')) : the_row();
                            $event_slug = get_sub_field('shortcode');
                            echo do_shortcode($event_slug);
                        endwhile;
                        ?>			
                    </div>
                <?php endif; ?>
                <!-- / .events -->
                <!-- Contact Form -->
                <?php
                $form_slug = get_field('kontaktformular');
                if ($form_slug): echo do_shortcode($form_slug);
                endif;
                ?>
                
            </div>
            <?php get_sidebar('zusatzinfos'); ?>
        </div>
<?php endif; ?>
<?php get_template_part('partials/related', 'articles'); ?>
</section>
<?php get_footer(); ?>