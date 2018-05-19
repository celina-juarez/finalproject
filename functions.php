<?php
   
    function displayResults()
    {
        //access the global $items array
        global $items;
    
        if(isset($items))
        {
            echo "<table class = 'table'>";
            if(sizeof($items) == 0)
            {
                echo "Sorry we weren't able to find any substitutes that fit you're description. Please Try Again!";
            }
            foreach($items as $item)
            {
                $subName = $item['sub_name'];
                $subContact = $item['sub_contact'];
                $subId = $item['sub_id'];
                $subExperience = $item['sub_experience'];
                
                //Display item as table row
                echo '<tr>';
                echo "<td><h4>$subName</h4></td>";
                echo "<td><h4>$subContact</h4></td>";
                echo "<td><h4>Years Experience: $subExperience</h4></td>";
                echo '</tr>';
            }
            echo "</table>";
        }
    }
    function students()
    {
        if(isset($_SESSION['cart']))
        {
            echo "<table class='table'>";
            foreach($_SESSION['cart'] as $item)
            {
                $itemName = $item['name'];
                $itemPrice = $item['price'];
                $itemImage = $item['image'];
                $itemId = $item['id'];
                $itemQuant = $item['quantity'];
                
                echo '<tr>';
                if($itemImage)
                    echo "<td><img src='$itemImage'></td>";
                echo "<td><h4>$itemName</h4></td>";
                echo "<td><h4>$itemPrice</h4></td>";
                echo "<td><h4>$itemQuant</h4></td>";
                
                //Hidden input element containing the item name
                echo "<form method='post'>";
                echo "<input type = 'hidden' name = 'removeId' value = '$itemId'>";
                echo "<td><button class= 'btn btn-danger'>Remove</button></td>";
                echo "</form>";
                
                //update form for this item
                echo '<form method="post">';
                echo "<input type='hidden' name='itemId' value='$itemId'>";
                echo "<td><input type = 'text' name = 'update' class= 'form-control' placeHolder='$itemQuant'></td>";
                echo "<td><button class= 'btn btn-danger'>Update</button></td>";
                echo "</form>";
                echo "</tr>";
                
            }
            echo "</table>";
        }
    }
?>