$(document).ready(function() {
    $('#search').on('input', function() {
        console.log('HEYYYY');
      var keyword = $(this).val();
      if (keyword.length >= 2) {
        $.ajax({
          url: 'search.php',
          type: 'post',
          data: { keyword: keyword },
          success: function(response) {
            $('#search-results').html(response);
          }
        });
      }
    });
  });
  