<?php #$lang = strtolower(get_locale()); ?> 
<!-- Social Media -->

<?php
if( have_rows('social_media_links','option') ):
    echo 'hallo';
 	// loop through the rows of data
    while ( have_rows('social_media_links','option') ) : the_row();?>
        <a class="<?php the_sub_field('label','option'); ?>" href="<?php the_sub_field('link','option'); ?>" target="_blank">
            <i class="fa fa-<?php the_sub_field('label','option'); ?>"></i>
            <?php if ($lang == "en_us") : ?>
                <span><?php the_sub_field('text-en','option'); ?></span>
            <?php elseif ($lang == "de_de") : ?>
                 <span><?php the_sub_field('text-de','option'); ?></span>
            <?php elseif ($lang == "zh_CN") : ?>
                 <span><?php the_sub_field('text-zh','option'); ?></span>
            <?php endif;?>
            
        </a>
    <?php endwhile;
    endif;?>
<!-- Mail & Telefon-->
<?php
$mail = get_field('e-mailadresse', 'option');
$phone = get_field('telefon', 'option');
$phoneLink = get_field('telefon_link', 'option');
?>
<a href="mailto:<?php echo $mail; ?>">
    <i class="fa fa-envelope"></i> 
    <?php echo $mail; ?> </a>
<a href="tel:<?php echo $phoneLink;?>">
    <i class="fa fa-phone"></i> 
    <?php echo $phone;?>
</a>