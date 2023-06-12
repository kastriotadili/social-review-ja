<?php

/**
 * Below is the shortcode design 
 */

 if ( ! defined( 'ABSPATH' )) exit;

 require_once( ABSPATH . '/wp-content/plugins/social-reviews-ja/includes/Db.php');
 
$reviews = JaDB::fetchReviews();


if ($reviews) {
    foreach ($reviews as $review) {
        // process each review here
        echo '<img src='. $review->reviewer_img .' />';
        echo 'Name: ' . $review->reviewer_name . '';
        echo '<br>';
        echo 'Stars:' . $review->review_stars;
        echo '<br>';

        echo 'Content: ' . $review->review_content . '';
        echo '<br><br>';
    }
} else {
    echo 'No reviews found.';
}

?>

<!-- Do html/css designs below 

<div class="reviews">
  <h2>Customer Reviews</h2>
  <ul class="review-list">
    <li class="review">
      <div class="review-author">John Doe</div>
      <div class="review-rating">★★★★★</div>
      <div class="review-content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae elit vel risus tincidunt aliquet.</p>
      </div>
    </li>
    <li class="review">
      <div class="review-author">Jane Smith</div>
      <div class="review-rating">★★★☆☆</div>
      <div class="review-content">
        <p>Nullam et turpis et ex vestibulum fringilla ac eu sapien. Donec tincidunt arcu at lobortis venenatis.</p>
      </div>
    </li>
  </ul>
</div>

-->
