<?php 
	$mail = get_field('e-mailadresse', 'option');
	$phone =  get_field('telefon', 'option');
	$phoneLink =  get_field('telefon_link', 'option');
	?>
<span class="mail"><a href="mailto:<?php echo $mail;?>"><?php echo $mail;?></a></span>
<span class="phone"><a href="tel:<?php echo $phoneLink;?>"><?php echo $phone;?></a></span>
	