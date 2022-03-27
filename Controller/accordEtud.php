<?php 

  $db= new mysqli('localhost','root','','projet4a'); 
  extract($_POST);
  $etudiant_id=$db->real_escape_string($id);
  $status=$db->real_escape_string($status);
  $sql=$db->query("update etudiant set ACCORD_ETUDIANT='$status' WHERE id='$etudiant_id'");
  echo 1;


  

?>