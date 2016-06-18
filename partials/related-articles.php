<?php
$posts = get_field('related_posts');
if ($posts):
    ?>

    <?php foreach ($posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php

        setup_postdata($post);
        get_template_part('partials/article', 'related');
    endforeach;
    ?>

    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly   ?>
<?php endif; ?>