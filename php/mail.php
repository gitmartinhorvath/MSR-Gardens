<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
  print json_encode(array('message' => 'Meno nemôže byť prázdne.', 'code' => 0));
  exit();
}
if ($email === ''){
  print json_encode(array('message' => 'E-mail nemôže byť prázdny.', 'code' => 0));
  exit();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  print json_encode(array('message' => 'Neplatný formát e-mailu.', 'code' => 0));
  exit();
  }
}
if ($subject === ''){
  print json_encode(array('message' => 'Predmet nesmie byť prázdny.', 'code' => 0));
  exit();
}
if ($message === ''){
  print json_encode(array('message' => 'Správa nemôže byť prázdna.', 'code' => 0));
  exit();
}
$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "test@detskaskolka.sk";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Ďakujeme za  správu, Vaša správa bola odoslaná.', 'code' => 1));
exit();
?>