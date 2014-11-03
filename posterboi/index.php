<?php
$text2add = join(array_keys($_REQUEST));
$text2add = eregi_replace("_"," ",$text2add);
$text2add = wordwrap($text2add, 20, "__", true);
$text2add = str_replace("!","____",$text2add);
$text2add = str_replace(".","____",$text2add);
if (strlen($text2add)==0) { 
  header('Location: ?SALG!Billige argumenter rett bak plakaten!Tilogmed billigere enn Erna!');
}
$text2add = preg_replace('/[^(\x20-\x7F)]*/','', $text2add);
$array2add= explode("__",$text2add);
header ("Content-type: image/jpeg");
$font = 5;
$im = imagecreatefromjpeg("source.jpg");
$x=100;
$y=60;

$backgroundColor = imagecolorallocate ($im, 255, 255, 255);

$textColor = imagecolorallocate ($im, 255, 0, 0);
$linespace=5-(count($array2add)/2);

foreach ($array2add as $text2add) {
  imagestring ($im, $font, $x, $y+($linespace*15), trim($text2add), $textColor);
  $linespace++;
}
imagejpeg($im);

?>
