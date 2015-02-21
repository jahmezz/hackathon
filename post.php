<?php
// php logic

$u = $_POST['username'];
$username = addslashes($u);
$r = $_POST['review'];
$review = addslashes($r);
$ra = $_POST['rating'];
$rating = addslashes($ra);

$c = urldecode($_POST['class']);
echo $c;

$courseid = addslashes($c);

$user = "root";
$password = "";
try {
$db = new PDO("mysql:host=localhost;dbname=courses", $user, $password);
}
catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();
}

$query = "INSERT INTO reviews (courseid, username, review, rating, date_added) VALUES('$courseid','$username', '$review', '$rating', 'NOW()')";

$result = $db->exec($query);

header("Location: classcopy.php?class=" . urlencode($c));
?>
