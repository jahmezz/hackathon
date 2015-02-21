<!DOCTYPE html>

<html>
  <head>
    <title>Review</title>
     <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='css/post.css'>
    <script src='libs/jquery-1.9.1.js'></script>
    <script src='js/rating.js'></script>
  </head>
  <body>
    <div class='container'>
      <frameset>
        <legend>Review for
          <?php
            $c = urldecode($_GET['class']);
            echo $c;
          ?></legend>
        <form action='post.php' method='POST'>
          What did you think of this class?<br>
          <div class='starRating'>
            <div>
              <div>
                <div>
                  <div>
                    <input id='rating1' type='radio' name='rating' value='1' required>
                    <label for='rating1'><span>1</span></label>
                  </div>
                  <input id='rating2' type='radio' name='rating' value='2'>
                  <label for='rating2'><span>2</span></label>
                </div>
                <input id='rating3' type='radio' name='rating' value='3'>
                <label for='rating3'><span>3</span></label>
              </div>
              <input id='rating4' type='radio' name='rating' value='4'>
              <label for='rating4'><span>4</span></label>
            </div>
            <input id='rating5' type='radio' name='rating' value='5'>
            <label for='rating5'><span>5</span></label>
          </div>
          <br><br>
          <input id='username' type='text' name='username' placeholder='Username' required>
          <br>
          <textarea name='review' placeholder='Write review here...' required></textarea>
          <input type='hidden' name='class' value=<?php echo urlencode($c)?>></input>
           <input class='btn-large btn-success btn-primary btn-block' type='submit'> 
        </form>
      </frameset>
    </div>
  </body>
</html>