<!DOCTYPE html>
<html>
  <head>
   
    <?php  $c = urldecode($_GET['class']);
    $class = addslashes($c);
    $class = strtoupper($class);
    

?>
    <title>
      <?php echo $class ?>
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
  </head>
   
  <body>
    <div class='container'>
    <!--LOGO and HEADER-->

    <div class='logo'>
   <img src="./ltsu.png" height="80" width="100"> 
    </div>
    
      <?php 
    //access database for this class
     $user = 'root';
    $password = '';
      try {
$db = new PDO("mysql:host=localhost;dbname=courses", $user, $password);
}
catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();
}
    $query = "SELECT description, coursename FROM courses WHERE courseid = '$c'";
    $stmt = $db->query($query);
    $result = $stmt->Fetch();
    ?>
    <h2>
    Class: <br><?php echo $class ?></h2>
    <h2>Class Name:<br>
    
    <?php 
    printf($result['coursename']); 
      ?></h2>
   <h2> Class Description: </h2>
    <p><?php  printf($result['description']); ?></p>
    <br><br><br><br>

    <!--CLass description-->
    

    <!--Start reviews-->
    <h2>Reviews:</h2>
    <?php
$query = "SELECT review, username FROM reviews WHERE courseid = '$class'";

$s = $db->query($query);
$result = $s->fetchALL(PDO::FETCH_ASSOC);
  if (count($result) == 0) {
    echo "There are no reviews for this class. <br> Add a review!";
     }
    else
for($n=0; $n<sizeof($result); $n++) {
  printf("Review: " . $result[$n]['review'] . "<br>" . "Username: ". $result[$n]['username']);
}

?>

    <!-- End reviews-->
    <form action='postreview.php' method='GET'>
        <br><br><br>
    <input type="hidden" name="class" value='<?php echo urlencode($class) ?>' />
    <input class='btn btn-lg btn-primary btn-block' type='submit' value='Write a review'>
    </form>
    </div>
  </body>
</html>