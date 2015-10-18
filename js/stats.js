$(document).ready(function () {
var seconds = 10000; // time in milliseconds
var reload = function() {
   $.ajax({
      url: 'getstats.php',
      cache: false,
      dataType: 'json',
      success: function(data) {
          $('#views').html(data.views);
          $('#indexes').html(data.indexes);
          $('#searches').html(data.searches);
        setTimeout(function() {
           reload();
        }, seconds);
      }
   });
 };
 reload();
});