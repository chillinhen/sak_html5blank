<?php 
	$mail = get_field('e-mailadresse', 'option');
	$phone =  get_field('telefon', 'option');
	$phoneLink =  get_field('telefon_link', 'option');
        $facebook =  get_field('facebook-link', 'option');
	?>



<a href="tel:<?php echo $phoneLink;?>">
    <i class="fa fa-phone"></i> 
    <?php echo $phone;?>
</a>

<a href="mailto:<?php echo $mail; ?>">
    <i class="fa fa-envelope"></i> 
    <?php echo $mail; ?> </a>

<a class="facebook" href="<?php echo $facebook; ?>" target="_blank">
    <i class="fa fa-facebook"></i><span><?php _e('Follow us on facebook','html5blank');?></span>
</a>
