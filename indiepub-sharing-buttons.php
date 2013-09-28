<?php
/* 
Plugin Name: IndiePub Sharing Buttons
Plugin URI: http://independentpublisher.me/plugins/indiepub-sharing-buttons/
Description: Plugin for displaying sharing buttons.
Author: Raam Dev
Version: 1.0 
Author URI: http://raamdev.com/
*/

/**
 * Register stylesheet
 */
function indiepub_sharing_buttons_stylesheet() {
	wp_register_style( 'indiepub-sharing-buttons-css', plugins_url( '/style.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'indiepub-sharing-buttons-css' );
}

add_action( 'wp_enqueue_scripts', 'indiepub_sharing_buttons_stylesheet' );

/**
 * Enqueue JavaScript
 */
function indiepub_sharing_buttons_js() {
	wp_enqueue_script( 'indiepub-sharing-buttons-js', plugins_url( '/indiepub-sharing-buttons.js', __FILE__ ), array(), '20130928', true );
}

add_action( 'wp_enqueue_scripts', 'indiepub_sharing_buttons_js' );

/**
 * Displays sharing buttons
 */
if ( ! function_exists( 'indiepub_sharing_buttons' ) ) :
	function indiepub_sharing_buttons() {

		// the_title_attribute() returns title with "Aside: " prepended.
		// This removes that so social shares only include the title.
		$dirty_title                          = the_title_attribute( 'echo=0' );
		$clean_title                          = str_replace( 'Aside: ', '', $dirty_title );
		$tweet_text = apply_filters('indiepub_sharing_buttons_tweet_text', $clean_title);
		?>
		<!-- START SHARING BUTTONS -->
		<div class="social-buttons">
			<a target="_new" href="https://twitter.com/share?text=<?php echo $tweet_text; ?>&url=<?php the_permalink(); ?>" title="Share '<?php echo $clean_title; ?>' on Twitter" onclick="share_button_popup(this.href); return false;"><i class="icon-twitter"></i></a>
			<a target="_new" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share '<?php echo $clean_title; ?>' on Facebook" onclick="share_button_popup(this.href); return false;"><i class="icon-facebook-sign"></i></a>
			<a target="_new" href="https://plusone.google.com/_/+1/confirm?hl=en&url=<?php the_permalink(); ?>" title="Share '<?php echo $clean_title; ?>' on Google+" onclick="share_button_popup(this.href); return false;"><i class="icon-google-plus-sign"></i></a>
		</div>
		<!-- END SHARING BUTTONS -->

	<?php
	}
endif;