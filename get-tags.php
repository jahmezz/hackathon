<?php
  $user = 'root';
  $password = '';
  try {
    $db = new PDO("mysql:host=localhost;dbname=findszxl_courses", $user, $password);
  }
  catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();
  }

  $query = "SELECT courseid, rating FROM courses";

  $s = $db->query($query);
  $result = $s->fetchALL(PDO::FETCH_ASSOC);
  echo json_encode($result);
?>