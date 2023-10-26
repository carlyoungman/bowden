<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
global $post, $property;
?>
<section class="request-details">
  <div class="call">
    <div><span>Call us on </span> <?php echo ' ' . $property->office_telephone_number ?></div>
    <div><a href="#make-enquiry" class="btn btn-white small-btn">Make Enquiry</a></div>
  </div>
</section>
