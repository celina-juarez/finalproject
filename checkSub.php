<?php
    include 'dbConnection.php';
    
    $name = $_GET['name'];
    
    $db = getDatabaseConnection(); 
    $sql = "SELECT * FROM `subs` WHERE `sub_name` LIKE '$name'";
    
    $statement = $db->prepare($sql);
        
    $statement ->execute();
    $items= $statement->fetchAll();
    
    if(sizeof($items) == 0){
        $items = NULL;
        echo json_encode($items);
    }
    else{
        foreach($items as $item)
        {
            $subId = $item['sub_id'];
            //add to either women or men
            $sql = "DELETE FROM `sub_groups` WHERE `sub_groups`.`sub_id` = '$subId'";
            $statement = $db->prepare($sql);
            $statement ->execute();
            
        }
        $sql = "DELETE FROM `subs` WHERE `subs`.`sub_name` = '$name'";     
        $statement = $db->prepare($sql);
        $statement ->execute();
        
         echo json_encode($items);
    }
    
    
    
    
  
?>