<?php 
	remove_shortcode('gallery', 'gallery_shortcode');
	add_shortcode('gallery', 'gallery_shortcode_sak');
	function gallery_shortcode_sak($attr) {
		global $post, $wp_locale;
		$output = "";
		$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID );
		$attachments = get_posts($args);
		if ($attachments) {
			$output = '<div><ul>';
			foreach ( $attachments as $attachment ) {
				$output .= '<li><a rel="no-follow">';
				$att_title = apply_filters( 'the_title' , $attachment->post_title );
				$output .= wp_get_attachment_link( $attachment->ID , 'thumbnail', true );
				$output .= '</a></li>';
			}
			$output = '</ul></div>';
		}
		return $output;
		
	}
?>