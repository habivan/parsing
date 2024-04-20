<?php 
try {
  $db = new PDO('mysql:host=localhost;dbname=pars', 'root', '');
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage();
  die();
}
