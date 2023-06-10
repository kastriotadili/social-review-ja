<?php

if ( ! defined( 'ABSPATH' )) exit;

require_once( ABSPATH . '/wp-content/plugins/social-reviews-ja/includes/api.php');

$api = new Api();
/**
 * Handle Validation below if POST
 */
if ( isset( $_POST['save'] ))
{
    /** Check Nonce */
    if ( isset ( $_POST['_wpnonce'] ))
    {
        /** Make sure user was referred by another admin page */
        if ( check_admin_referer( 'SocialReviewsJA', '_wpnonce' ) ) {
            $apiKey = sanitize_text_field( $_POST['apikey']) ;
            $featureId = sanitize_text_field( $_POST['featureId'] );

            update_option( 'social_reviews_api_key', $apiKey);
            update_option( 'social_reviews_dataID' , $featureId );
            
            $api->fetchReviews();
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
    <input type="text" name="featureId" placeholder="Feature ID">
    <input name="save" type="submit">
</form>