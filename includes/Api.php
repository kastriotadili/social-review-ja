<?php


if ( ! defined( 'ABSPATH' )) exit;

class Api
{

    public function fetchReviews()
    {

        $apiKey = get_option('social_reviews_api_key');
        $featureID = get_option('social_reviews_dataID');
        $url = "https://api.scaleserp.com/search?api_key={$apiKey}&search_type=place_reviews&data_id={$featureID}&max_page=5&include_html=false&output=json";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $reviews = $data['place_reviews_results'];

        require_once( plugin_dir_path( __FILE__ ) . 'Db.php');
        
        for ( $i = 0; $i < count($reviews); $i++) {
            $name =  $reviews[$i]['source'];
            $body =  $reviews[$i]['body_html'];
            $rating =  $reviews[$i]['rating'];
            $reviewer_img =  $reviews[$i]['source_image'];
            $date =  $reviews[$i]['date'];
            
            JaDB::insertReview($name, $body, $rating, $reviewer_img, $date);
        }

    }
}
