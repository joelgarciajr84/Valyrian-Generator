<?php
 
#Valyrian Generator like for Game of Thrones fans

require_once('vocabulo.php');

$numerodeparagrafos = (isset($_POST['nparagrafos']) and  
         in_array($_POST['nparagrafos'], range(1,10))) ?
         $_POST['nparagrafos'] : 0;
$frases = (isset($_POST['frases']) and 
         in_array($_POST['frases'], range(1,10))) ?
         $_POST['frases'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>High Valyrian Generator</title>
    <link href='http://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5'shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<h1>High Valyrian Generator</h1>
<p>
  <label>Number of pararaphs:
    <select name='nparagrafos'>
<?php
  for($ix = 1; $ix <= 10; $ix++) {
     echo "<option value='$ix'";
      if(isset($_POST['nparagrafos']) and $_POST['nparagrafos'] == $ix) {
        echo " selected='selected'";
      }
     echo ">$ix</option>\n";
  }
?>
</select>
</label>
</p>
<p>
<label>Number of phrases per paragraph:
  <select name='frases'>
<?php 
  for($ix = 1; $ix <= 10; $ix++) {
    echo "<option value='$ix'";
  if(isset($_POST['frases']) and $_POST['frases'] == $ix) {
    echo " selected='selected'";
  }
  echo ">$ix</option>\n";
  }
  ?>
  </select>
</label>
</p>
<p><input class='btn-success' type='submit' value='Generate Valyrian'></p>
</form>
<pre id='copytext'>
<div  id="resultado">
<?php
$count = 1;
$text = array();
for($i = 1; $i <= $numerodeparagrafos; $i++) {
   $text[$i] = "";
   for($j = 1; $j <= $frases; $j++) {
      $text[$i] .= $phrase[$count].' ';
      if(++$count > 200) { $count = 1; }
   }
   $text[$i] = trim($text[$i])."";
   $text[$i] = wordwrap($text[$i]);
}
echo htmlspecialchars(implode("\n\n", $text));

?>
</div>
</pre>
</body>
