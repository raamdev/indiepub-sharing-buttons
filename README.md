indiepub-sharing-buttons
========================

## Requirements

### Font Awesome fonts

The icons used by this plugin come from the Font Awesome page (see [Font Awesome](fortawesome.github.io/Font-Awesome/)). If your theme does not already load Font Awesome, you'll need to download the package to your theme directory and then load it by adding the following code snippet to your theme's `functions.php` file (this assumes Font Awesome has been copied to a directory called `font-awesome` inside your theme directory):

```
/**
 * Register font-awesome style sheet.
 */
add_action( 'wp_enqueue_scripts', 'register_font_awesome_style' );
function register_font_awesome_style() {
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '3.2.1' );
	wp_enqueue_style( 'font-awesome' );
}
```

## Adding Your Twitter Handle to the Tweet Text

You can add the following to your theme's `functions.php` file to modify the tweet text:

```
/*
 * Add Twitter handle to end of tweet text when sharing via Twitter
 */
function indiepub_sharing_buttons_tweet_text($tweet_text) {
	return $tweet_text . '%20via%20@raamdev'; // Adds " via @raamdev" to end of post title
}
add_filter('indiepub_sharing_buttons_tweet_text', 'indiepub_sharing_buttons_tweet_text');
```