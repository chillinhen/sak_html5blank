<?php 
	$mail = get_field('e-mailadresse', 'option');
	$phone =  get_field('telefon', 'option');
	$phoneLink =  get_field('telefon_link', 'option');
        $facebook =  get_field('facebook-link', 'option');
	?>
<a class="facebook" href="<?php echo $facebook; ?>" target="_blank">
    <i class="fa fa-facebook"></i>
</a><span class="hidden-xs hidden-sm">  |  </span><br class="visible-xs visible-sm"/>
<a href="mailto:<?php echo $mail; ?>">
    <i class="fa fa-envelope"></i> 
    <?php echo $mail; ?> </a><span class="hidden-xs hidden-sm">  |  </span><br class="visible-xs visible-sm"/>
<a href="tel:<?php echo $phoneLink;?>">
    <i class="fa fa-phone"></i> 
    <?php echo $phone;?>
</a>
