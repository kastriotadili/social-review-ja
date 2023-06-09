<?php

if ( ! defined( 'ABSPATH' )) exit;


 /**
  * Saving post as a var and then trimming away disallowed html
  */


/**
 * Handle Validation below if POST
 */
if ( isset( $_POST['save'] ))
{
    /** Check Nonce */
    if ( isset ( $_POST['_wpnonce'] ))
    {
        /** Make sure user was referred by another admin page */
        if ( check_admin_referer( 'SocialReviewsJA', '_wpnonce' )) {
            $srja_save = sanitize_text_field( $_POST['apikey']);

            $apiKey = $_POST['apikey'];
            update_option( 'social_reviews_api_key', $apiKey);
        }
    }
}

?>
<div class="wrap">
    <h1>Social Reviews JA Settings</h1>
</div>


<form method="post" action="">
    <?php wp_nonce_field( 'SocialReviewsJA', '_wpnonce'); ?>
    <input type="text" name="apikey" placeholder="API KEY">
    <input name="save" type="submit">
</form>