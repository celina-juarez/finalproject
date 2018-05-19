
<?php
     function getDatabaseConnection() {
    $host = "localhost";
    $username = "cjuarez";
    $password = "30_Julio_30";
    $dbname = "project2"; 
    
   //checking whether the URL contains "herokuapp" (using Heroku)
    if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
       $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
       $host = $url["host"];
       $dbname   = substr($url["path"], 1);
       $username = $url["user"];
       $password = $url["pass"];
    }

    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

function insertItemsIntoDB($items) {
    if (!$items) return; 
    
    $db = getDatabaseConnection(); 
    
    foreach ($items as $item) {
        $itemName = $item['name']; 
        $itemPrice = $item['salePrice']; 
        $itemImage = $item['thumbnailImage']; 
        
        $sql = "INSERT INTO item (item_id, name, price, image_url) VALUES (NULL, :itemName, :itemPrice, :itemURL)";
        $statement = $db->prepare($sql); 
        $statement->execute(array(
            itemName => $itemName, 
            itemPrice => $itemPrice, 
            itemURL => $itemImage
            ));
    }
}
function updateItems($old, $new, $email,$years)
{
    //UPDATE subs SET sub_contact = '$email' WHERE sub_name = '$old'
    $db = getDatabaseConnection(); 
    $sql = "SELECT * FROM `subs` WHERE `sub_name` LIKE '$old'";
    
    $statement = $db->prepare($sql);
    
    $statement ->execute();
    $items= $statement->fetchAll();
    
    if(sizeof($items) > 0)
    {
        $sql = "SELECT * FROM `subs` WHERE `sub_name` LIKE '$new'";
    
        $statement = $db->prepare($sql);
        
        $statement ->execute();
        $items= $statement->fetchAll();
        if(sizeof($items) >0)
        {
            echo "Sorry the name you entered is already in the system. Please Try Again.";
        }
        else
        {
            if($new != "")
            {
                $sql = "UPDATE subs SET sub_name = '$new' WHERE sub_name = '$old'"; 
                $statement = $db->prepare($sql);
                $statement ->execute();
                
                if($email != "")
                {
                    $sql = "UPDATE subs SET sub_contact = '$email' WHERE sub_name = '$new'"; 
                    $statement = $db->prepare($sql);
                    $statement ->execute();    
                }
                if($years != "")
                {
                    $sql = "UPDATE subs SET sub_experience = '$years' WHERE sub_name = '$new'"; 
                    $statement = $db->prepare($sql);
                    $statement ->execute();    
                }
            }
            else if($email != "")
            {
                $sql = "UPDATE subs SET sub_contact = '$email' WHERE sub_name = '$old'"; 
                $statement = $db->prepare($sql);
                $statement ->execute();
            }
            else if($years != "")
            {
                $sql = "UPDATE subs SET sub_experience = '$years' WHERE sub_name = '$old'"; 
                $statement = $db->prepare($sql);
                $statement ->execute();    
            }
            
            echo "The substitute's information was successfully updated!";
        }
        
    }
    else {
        echo "Sorry! No Substitute was found that match the given information.";
    }
    
    
    //echo sizeof($items);
}
function getMatchingItems($name, $taken, $gender,$email,$years)
{
    $db = getDatabaseConnection();
    //      SELECT DISTINCT item.item_id, item.name, item.price $imgSQL                   FROM item INNER JOIN item_category ON item.item_id = item_category.item_id INNER JOIN category ON item_category.category_id =category.category_id  WHERE 1
    $sql = "SELECT DISTINCT subs.sub_id,subs.sub_name,subs.sub_contact,subs.sub_experience FROM subs INNER JOIN sub_groups ON subs.sub_id = sub_groups.sub_id INNER JOIN groups ON sub_groups.group_id =groups.group_id WHERE 1";     
    if (!empty($name)) {
        $sql .= " AND subs.sub_name LIKE '%$name%'";
    }
    if (!empty($email)) {
        $sql .= " AND subs.sub_contact LIKE '$email'";
    }
    if (!empty($years)) {
        //SELECT * FROM `subs` WHERE `sub_experience` = 1
        $sql .= " AND subs.sub_experience = '$years'";
    }
    if(!empty($gender) && !empty($taken))
    {
        $sql .= " OR sub_groups.group_id = '$gender' OR sub_groups.group_id = '$taken'";
    }
    else if (!empty($gender)) {
        $sql .= " AND sub_groups.group_id = '$gender'";
    }
    else if (!empty($taken)) {
        $sql .= " AND sub_groups.group_id = '$taken'";
    }
    

    $statement = $db->prepare($sql);
    
    $statement ->execute();
    $items= $statement->fetchAll();
    return $items;
}
function addItems($name,$email,$gender, $taken,$years)
{
    
    //INSERT INTO `subs` (`sub_id`, `sub_name`, `sub_contact`) VALUES (NULL, '$name', '$email');

    $db = getDatabaseConnection();
    
    $db = getDatabaseConnection(); 
    $sql = "SELECT * FROM `subs` WHERE `sub_name` LIKE '$name'";
    
    $statement = $db->prepare($sql);
        
    $statement ->execute();
    $items= $statement->fetchAll();
    
    if(sizeof($items) == 0)
    {
        if($name != "" && $email != "")
        {
            $sql = "INSERT INTO `subs` (`sub_id`, `sub_name`, `sub_contact`,`sub_experience`) VALUES (NULL, '$name', '$email','$years')";     
            $statement = $db->prepare($sql);
            $statement ->execute();
            echo "The Substitute was successfully added to the system!";
            $sql = "SELECT * FROM `subs` WHERE `sub_name` LIKE '$name'";
        
            $statement = $db->prepare($sql);
            
            $statement ->execute();
            $items= $statement->fetchAll();
            
            foreach($items as $item)
            {
                if($email == $item['sub_contact'])
                {
                    $subId = $item['sub_id'];
                    //add to either women or men
                    $sql = "INSERT INTO `sub_groups` (`sub_group_id`, `sub_id`, `group_id`) VALUES (NULL, '$subId', '$gender')";
                    $statement = $db->prepare($sql);
                    $statement ->execute();
                    //add to either available or busy
                    $sql = "INSERT INTO `sub_groups` (`sub_group_id`, `sub_id`, `group_id`) VALUES (NULL, '$subId', '$taken');";
                    $statement = $db->prepare($sql);
                    $statement ->execute();
                }
                
            }
        }
        else
        {
            echo "Error! Please enter both a name and email...";
        }
    }
    else {
        echo "Sorry! There is a substitute with that name in the system already. Try Again.";
    }
    
    
}
function deleteItems($name)
{
    //DELETE FROM `subs` WHERE `subs`.`sub_name` = '$name'

    $db = getDatabaseConnection(); 
    $sql = "SELECT * FROM `subs` WHERE `sub_name` LIKE '$name'";
    
    $statement = $db->prepare($sql);
        
    $statement ->execute();
    $items= $statement->fetchAll();
    foreach($items as $item)
    {
            $subId = $item['sub_id'];
            //add to either women or men
            $sql = "DELETE FROM `sub_groups` WHERE `sub_groups`.`sub_id` = '$subId'";
            $statement = $db->prepare($sql);
            $statement ->execute();
            
    }
    if(sizeof($items) > 0)
    {
    
        if($name != "")
        {
            //deletes from subs table
            $sql = "DELETE FROM `subs` WHERE `subs`.`sub_name` = '$name'";     
            $statement = $db->prepare($sql);
            $statement ->execute();
            echo "The Substitute was successfully deleted to the system!";
        }
    }
    else
    {
        echo "Sorry! No Substitute was found that match the given information.";
    }
}
function generateReports($men, $women, $available,$busy)
{
    //SELECT * FROM `sub_groups` WHERE `group_id` LIKE '1'
    $db = getDatabaseConnection(); 
    if($men != '')
    {
        $sql = "SELECT * FROM `sub_groups` WHERE `group_id` LIKE '$men'";
    
        $statement = $db->prepare($sql);
            
        $statement ->execute();
        $items= $statement->fetchAll();
        $menCount = sizeof($items);
    }
    if($women != '')
    {
        $sql = "SELECT * FROM `sub_groups` WHERE `group_id` LIKE '$women'";
    
        $statement = $db->prepare($sql);
            
        $statement ->execute();
        $items= $statement->fetchAll();
        $womenCount = sizeof($items);
    }
    if($available != '')
    {
        $sql = "SELECT * FROM `sub_groups` WHERE `group_id` LIKE '$available'";
    
        $statement = $db->prepare($sql);
            
        $statement ->execute();
        $items= $statement->fetchAll();
        $availableCount = sizeof($items);
    }
    if($busy != '')
    {
        $sql = "SELECT * FROM `sub_groups` WHERE `group_id` LIKE '$busy'";
    
        $statement = $db->prepare($sql);
            
        $statement ->execute();
        $items= $statement->fetchAll();
        $busyCount = sizeof($items);
    }
    if($busy != '' || $available != '' || $men != '' || $women != '')
    {
        echo"</br></br>";
        echo "Results: ";
        echo"</br>";
        //SELECT * FROM `subs`
        
        $sql = "SELECT * FROM `subs`";
    
        $statement = $db->prepare($sql);
            
        $statement ->execute();
        $items= $statement->fetchAll();
        $total = sizeof($items);
        if($busy != '')
        {
            $result = round(($busyCount/$total)*100);
            $message = $result . " % of substitutes are busy.";

            echo"</br>";
            echo $message;
            echo"</br>";
        }
        if($available != '')
        {
            $result = round(($availableCount/$total)*100);
            $message = $result . " % of substitutes are available.";

            echo"</br>";
            echo $message;
            echo"</br>";
        }
        if($men != '')
        {
            $result = round(($menCount/$total)*100);
            $message = $result . " % of substitutes are men.";
            echo"</br>";
            echo $message;
            echo"</br>";
        }
        if($women != '')
        {
            $result = round(($womenCount/$total)*100);
            $message = $result . " % of substitutes are women.";
            echo"</br>";
            echo $message;
            echo"</br></br>";
        }
    }
    else if($busy == '' && $available == '' && $men == '' && $women == '')
    {
        echo "You must select at least one checkbox before submitting the information to generate a report.";
    }
    
}
/*
function getCategoriesHTML() {
    $db = getDatabaseConnection(); 
    $categoriesHTML = "<option value=''></option>";  // User can opt to not select a category 
    
    $sql = "SELECT category_name FROM category"; 
    
    $statement = $db->prepare($sql); 
    
    $statement->execute(); 
    
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); 
    
    foreach ($records as $record) {
        $category = $record['category_name']; 
        $categoriesHTML .= "<option value='$category'>$category</option>"; 
    }
    
    return $categoriesHTML; 
}


function addCategoriesForItems($itemStart, $itemEnd, $category_id) {
    $db = getDatabaseConnection(); 
    
    for ($i = $itemStart; $i <= $itemEnd; $i++) {
        $sql = "INSERT INTO item_category (grouping_id, item_id, category_id) VALUES (NULL, '$i', '$category_id')";
        $db->exec($sql);
    }
        
}
*/

?>