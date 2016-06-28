<?php $contactInfo = get_field('kontaktdaten'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('accordion'); ?>>
    <header>
        <h2 class="collapseHeadline" itemprop="headline">
            <a role="button" data-toggle="collapse" data-parent="#post-<?php the_ID(); ?>" href="#collapse_<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse_<?php the_ID(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    </header>
    <section id="collapse_<?php the_ID(); ?>" class="post_content collapse">
        <div class="main">
            <?php the_content(); ?>
        </div>
        <?php if ($contactInfo): ?>
            <div class="side">
                <?php
                // override $post
                $post = $contactInfo;
                setup_postdata($post);
                get_template_part('partials/panels', 'sidebar');
                wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                ?>
            </div> 
        <?php endif; ?>
    </section>
</article>