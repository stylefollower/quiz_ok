<?php
require_once 'include/config.php';
$token = md5(uniqid());

if(!isset($_SESSION['questionCounter']) || !isset($_SESSION['score'])) {
  $_SESSION['questionCounter'] = 1;
  $_SESSION['score'] = 0;
}


$_SESSION['token'] = $token;
$couter = $_SESSION['questionCounter'];


$query      = $connection->query("SELECT * from Questions");
$questions  = $query->fetchAll(PDO::FETCH_ASSOC);

$subQuery  = $connection->prepare("SELECT * from Answers where Answers.questionId = ?");
$subQuery->bindValue(1, $questions[$couter-1]['id']);
$subQuery->execute();
$answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);


?>

<form action="result.php" method="POST">
<?php
  echo '<h1>' . $questions[$couter-1]['text'] . '</h2>';
  echo '<input type="hidden" name="token" id="token" value="' . $token . '">';
  foreach ($answers as $answer) {
    echo '<br><button name="answer" value="'. $answer['id'] .'">'. $answer['text'] .'</button>';
    # code...
  }
 
?>
</form>
