<!DOCTYPE html>
<html>
  <head>
    <?php
      $c = urldecode($_GET['class']);
      $class = addslashes($c);
      $class = strtoupper($class);
    ?>
    <title>
      <?php echo $class ?>
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/page.css' rel='stylesheet'>
    <link rel='stylesheet' href='css/post.css'>
  </head>
   
  <body>
    <div class='container'>
    <!--LOGO and HEADER-->

    <div class='logo'>
      <a href='index.php'><img src="ltsu.png" height="80" width="100" </img></a>
      <br><a href='index.php'>&lt; Back to home page</a>
    </div>
    
    <?php 
      //access database for this class
      $user = 'root';
      $password = '';
      try {
        $db = new PDO("mysql:host=localhost;dbname=findszxl_courses", $user, $password);
      }
      catch (PDOException $e) {
        echo 'ERROR:' . $e->getMessage();
      }
      $query = "SELECT description, coursename FROM courses WHERE courseid = '$c'";
      $stmt = $db->query($query);
      $result = $stmt->Fetch();
      ?>
    <h1 id='course_title'>
      <?php echo $class ?>
    </h1>
    <h2>
      <?php printf($result['coursename']); ?>
    </h2>
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
    <div class="panel panel-default padded-top">
      <div class="panel-heading">
        Description
      </div>
      <div class="panel-body">
        <?php printf($result['description']); ?>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        Reviews
      </div>
      <div class="panel-body">
    <?php
      $query = "SELECT review, rating, username FROM reviews WHERE courseid = '$class'";

      $s = $db->query($query);
      $result = $s->fetchALL(PDO::FETCH_ASSOC);
      $count = count($result);
      $rating = 0;
      if (count($result) == 0) {
        echo "There are no reviews for this class. <br> Add a review!";
      }
      else {
        for($n=0; $n<sizeof($result); $n++) {
          if($n == 0) {
            echo '<div class="row overflow">' .
                '<div class="col-md-2 padded-left">
                  Username
                 </div>' .
                '<div class="col-md-2 padded-left">
                  Rating
                 </div>' .
                '<div class="col-md-8 padded-left">
                  Review
                 </div></div>';
          }
          echo    '<div class="row next-row overflow">';
          echo    '<div class="col-md-2 extend">';
                    printf($result[$n]["username"]);
          echo    '</div><div class="col-md-2 extend">';
                    printf($result[$n]["rating"]);
                    $rating = $result[$n]["rating"] + $rating;
          echo    '</div><div class="col-md-8 padded extend">';
                    printf($result[$n]["review"]);
          echo    '</div></div>';
        }
      }
      if($count == 0) echo '';
      else echo '<div id="avg-rating">' . $rating/$count . '</div>';
    ?>
      </div>
    </div>
    <script src='libs/jquery-1.9.1.js'></script>
    <script src='js/fill-stars.js'></script>
      <!-- End reviews-->
      <form action='postreview.php' method='GET'>
        <br><br><br>
        <input type="hidden" name="class" value='<?php echo urlencode($class) ?>' />
        <input class='btn-large btn-success btn-primary btn-block' id='review-request' type='submit' value='Write a review'>
      </form>
    </div>
  </body>
</html>