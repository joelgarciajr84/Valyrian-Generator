<?php
 
#Valyrian Generator like for Game of Thrones fans


$phrase = array(1 =>
'Nyke Daenerys Jelmāzmo hen Targārio Lentrot, hen Valyrio Uēpo ānogar iksan. Valyrio muño ēngos ñuhys issa.',
'Zaldrizes buzdari iksos daor.',
'Valar Morgulis.',
'Dovaogēdys! Naejot memēbātās! Kelītīs! Nyke Daenerys Jelmāzmo hen Targārio Lentrot, hen Valyrio Uēpo ānogar iksan.' ,
'Valyrio muño ēngos ñuhys issa. Dovaogēdys! Āeksia ossēnātās, menti ossēnātās, qilōni pilos lue vale tolvie ossēnātās',
'riñe dōre ōdrikātās. Urnet luo buzdaro tolvio belma pryjātās!',
'Zaldrīzes buzdari iksos daor',
'lanti vali lantyz azantyssy lanta dōra lantra hāedri',
'mēriar lentun Targārio Lentrot Kelītīs mēre mentyr'
);

$numerodeparagrafos = (isset($_POST['nparagrafos']) and  
         in_array($_POST['nparagrafos'], range(1,10))) ?
         $_POST['nparagrafos'] : 0;
$frases = (isset($_POST['frases']) and 
         in_array($_POST['frases'], range(1,10))) ?
         $_POST['frases'] : 0;
?>
<title>High Valyrian Generator</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<fieldset>
<legend>VALEYRIAN GENERATOR</legend>
<p>
  <label>Number of pararaphs:
    <select name='nparagrafos'>
<?php
for($ix = 1; $ix <= 10; $ix++)
{
   echo "<option value='$ix'";
   if(isset($_POST['nparagrafos']) and $_POST['nparagrafos'] == $ix)
   {
      echo " selected='selected'";
   }
   echo ">$ix</option>\n";
}
?>
</select>
</label>
</p>
<p>
<label>Number of phrase per paragraph:
  <select name='frases'>
<?php for($ix = 1; $ix <= 10; $ix++)
{
   echo "<option value='$ix'";
   if(isset($_POST['frases']) and $_POST['frases'] == $ix)
   {
      echo " selected='selected'";
   }
   echo ">$ix</option>\n";
}
?>
  </select>
</label>
</p>
<p><input type='submit' value='Generate Valeryan'></p>
</fieldset>
</form>
<pre id='copytext'>
<div  id="resultado">
<?php
$count = 1;
$text = array();
for($i = 1; $i <= $numerodeparagrafos; $i++)
{
   $text[$i] = "";
   for($j = 1; $j <= $frases; $j++)
   {
      $text[$i] .= $phrase[$count].' ';
      if(++$count > 4) { $count = 1; }
   }
   $text[$i] = trim($text[$i])."";
   $text[$i] = wordwrap($text[$i]);
}
echo htmlspecialchars(implode("\n\n", $text));

?>
</div>

</pre>
