<?php
$users = array(
  array(
    'id' => 0,
    'name' => "jon",
    'email' => 'jon@mail.gg',
  ),
  array(
    'id' => 1,
    'name' => "test",
    'email' => 'test@test.test',
  ),
  array(
    'id' => 2,
    'name' => "jonson",
    'email' => 'jonson@mail.gg',
  ),
);
$success=false;

if (strcmp($_POST['password1'], $_POST['password2']) !== 0)
  $error[] = "passs";

if (!stripos($_POST['email'], "@"))
  $error[] = "mail";

if (in_array($_POST['email'], array_column($users, 'email')))
  $error[] = "array";

$fd = fopen("log.txt", 'a') or die();
$date = new DateTime();

if (is_null($error)) {
  fwrite($fd, $date->format('Y-m-d H:i:s') . ' - no error' . PHP_EOL);
  $success=true;
} else {
  fwrite($fd, $date->format('Y-m-d H:i:s') . ' - errors: ');
  foreach ($error as $item) {
    fwrite($fd, $item . ' ');
  }
  fwrite($fd, PHP_EOL);
}
fclose($fd);

echo json_encode($success);

