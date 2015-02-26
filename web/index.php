<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>LTSU</title>
    <link rel='stylesheet' href='css/style.css'>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src='libs/jquery-1.9.1.js'></script>
    <script src="libs/jquery-ui.js"></script>
    <script src='js/app.js'></script>
  </head>
  <img id='logo' src='fync_search_bar.png'></img>
<body>
  <div class='ui-widget'>
    <form id='classForm' action='classcopy.php' method='GET'>
      <label for='tags'></label>
      <input id='tags' name='class'>
    </form>
  </div>
  <div id='error'>That class does not exist, please search again.</div>
</body>
</html>