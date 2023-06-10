<?php

class Api
{

    public function fetchReviews()
    {

        $apiKey = get_option('social_reviews_api_key');
        $featureID = get_option('social_reviews_dataID');
        $url = "https://api.scaleserp.com/search?api_key={$apiKey}&search_type=place_reviews&data_id={$featureID}&max_page=5&include_html=false&output=json";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        var_dump($data);
    }
}
