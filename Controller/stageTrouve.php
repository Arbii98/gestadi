
<?php 

  $db= new mysqli('localhost','root','','projet4a'); 
  extract($_POST);
  $etudiant_id=$db->real_escape_string($id);
  $status=$db->real_escape_string($status);
  $sql=$db->query("update etudiant set STAGE_TROUVE='$status' WHERE id='$etudiant_id'");
  echo 1;


  //$sql=$db->query("UPDATE etudiant set STAGE_TROUVÉ='$status' WHERE id='$etudiant_id'");
    /* $sql="update etudiant set STAGE_TROUVÉ=1 where id=2";
			$db = config::getConnexion();
       $db->query($sql);
	            
          echo 1;
 
 
 
  /*
  $etudiant_id = $_GET['id'];
  $sql="update etudiant set STAGE_TROUVÉ=1 where id='$etudiant_id'";
			$db = config::getConnexion();
			
                $db->query($sql);
	            
	           
	    */
  

?>