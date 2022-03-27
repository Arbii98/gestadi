<?php

$db= new mysqli('localhost','root','','projet4a'); 

if(isset($_POST['save_radio']))
{
    
    $tuteur  = $_POST['affecterTuteur'];
    $stageid  = $_POST['stageId'];
    if($tuteur=='-1'){
        $sql=$db->query("update stage  set Identifiant_tuteur =NULL where Identifiant_stage='$stageid'");
    }
    else{
        $sql=$db->query("update stage  set Identifiant_tuteur ='$tuteur' where Identifiant_stage='$stageid'");
    }
   
    
}
?>