<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multi-page template</title>
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
</head>

<body>
  <div data-role="page" id="review" data-theme="a">
    <div data-role="header">
      <h1>Review</h1>
    </div>
    <p>
      Review content
    </p>
	<? echo "test"; ?>
    <div data-role="content" data-theme="a">
      <form>
        <label for="first_slider">First:</label>
        <input type="range" id="first_slider" value="60" min="0" max="100" />
        <label for="second_slider">Second:</label>
        <input type="range" id="second_slider" value="60" min="0" max="100" />
        <input type="submit" value="Submit" />
      </form>
    </div>
  </div>

  <!-- ======================== -->
  <div data-role="page" id="front" data-theme="a">
    <div data-role="header">
      <h1>Front</h1>
    </div>

    <div data-role="content" data-theme="a">
      <p>
        Front content
      </p>

      <p id='first_count'></p>
      <p id='second_count'></p>

      <p>
        <a href="#review" data-role="button">Main</a>
      </p>
    </div>

    <script>
      $(document).bind('pageinit');
    </script>
  </div>

  <script>
    $('[type="submit"]').bind( "click", function() {
      first_count = $('#first_slider').val();
      second_count = $('#second_slider').val();
      $('#first_count').text('' + first_count);
      $('#second_count').text('' + second_count);
      $.mobile.changePage('#front');
      return false;
    });
  </script>
</body>
<--teständerungen-->
</html>
</html>

