<?php
  require_once 'include/config.php';
  
  if(!isset($_POST['answer']) || !isset($_SESSION['questionCounter'])) {
    header('Location: quiz.php');
  }

  
  $query        = $connection->query("SELECT * from Questions");
  $questions    = $query->fetchAll(PDO::FETCH_ASSOC);
  $qustionCount = count($questions);

  $answer       = $_POST['answer'];
  $query        = $connection->query("SELECT * from Answers WHERE id = $answer");
  $check        = $query->fetchAll(PDO::FETCH_ASSOC);
  
  
  
  
  if($qustionCount == $_SESSION['questionCounter']) {
    $_SESSION['score'] = $_SESSION['score'] + $check[0]['isCorrect'];
    echo 'congrats <br>';
    echo 'You have ' . $_SESSION['score'] . ' correct out of ' . $qustionCount . ' questions';
    echo '<br><a href="index.php">Back</a>';
    session_destroy();    
  } else {

    //var_dump($check[0]['isCorrect']);
    
    $_SESSION['score'] = $_SESSION['score'] + $check[0]['isCorrect'];
    $_SESSION['questionCounter']++;
    header('Location: quiz.php');
  }
  
  /*
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';
  echo '<pre>';
  var_dump($_SESSION);
  echo '</pre>';
  */
  $_SESSION['token'] = md5(uniqid());