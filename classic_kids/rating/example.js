var $confj=jQuery.noConflict();
$confj(document).ready(function() {
  $confj('#example-1').ratings(10).bind('ratingchanged', function(event, data) {
    $confj('#example-rating-1').text(data.rating);
  });
  
  $confj('#example-2').ratings(5).bind('ratingchanged', function(event, data) {
    $confj('#example-rating-2').text(data.rating);
  });
});