<?php if (get_field('mehr-infos-name') && get_field('mehr-infos-url')) : ?>
    <a class="btn btn-inverse" href="<?php echo get_field('mehr-infos-url'); ?>">
        <?php echo get_field('mehr-infos-name'); ?>
    </a>
<?php endif; ?>