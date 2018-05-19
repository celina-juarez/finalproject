<!DOCTYPE html>
<?php
    include 'dbConnection.php';
    include 'functions.php';
?>

<html>
    <head>
        <title>Substitute Finder</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
    </head>
    
    <body>
        <div class = 'container'>
            <div class = 'text-left'>
                <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>Substitute Finder</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='adminLogOut.php'>Log-out</a></li>
                        <li><a href='manageInfo.php'>Administration Main-Menu</a></li>
                    </ul>
                    
                </div>
                </nav>
                
                        

                 </br></br>
                 <h1>Add Substitute</h1></br></br>
                 
                 Please enter the Substitute Teacher's information below.
                 
                </br></br></br></br>
                <form enctype = "text/plain">
                <div id = "name">
                    <input type="text" name="name" placeholder = "Enter first and last name..."></>
                </div>
                <br /><br />
                <div id = "email">
                    <input type="text" name="email" placeholder = "Enter new email..."></>
                </div>
                <div id = "years">
                    <input type="text" name="years" placeholder = "Enter new years of experience..."></>
                </div>
                <br /><br />
                The Substitute Teacher is a 
                <input type="radio" name="gender" value="women"> woman
                <input type="radio" name="gender" value="men"> man
                <br /><br />
                The Substitute Teacher is
                <input type="radio" name="taken" value="available"> available
                <input type="radio" name="taken" value="busy"> busy
                <br /><br />
                <br /><br />
                <input type="submit" name = "info-submitted" value="Submit" class="btn btn-default">

            </form>
                <br /><br />
                <?php 
                    $name = '';
                    $email = '';
                    $taken = '';
                    $gender = '';
                    $years = '';
                    //available 1 busy = 2 women = 3 men = 4
                    if (isset($_GET["name"]) && !empty($_GET["name"])) 
                    {
                        $name = $_GET["name"]; 
                    }
                    if (isset($_GET["years"]) && !empty($_GET["years"])) 
                    {
                        $years = $_GET["years"]; 
                    }
                    if (isset($_GET["email"]) && !empty($_GET["email"])) 
                    {
                        $email = $_GET["email"]; 
                    }  
                    if (isset($_GET["taken"]) && !empty($_GET["taken"])) 
                    {
                        $temp= $_GET["taken"];
                        if($temp == "available")
                            $taken = 1;
                        else if($temp == "busy")
                            $taken = 2;
                    }
                    if (isset($_GET["gender"]) && !empty($_GET["gender"])) 
                    {
                        $temp= $_GET["gender"];
                        if($temp == "women")
                            $gender = 3;
                        else if($temp == "men")
                            $gender = 4;
                    }
                    if(empty($_GET["gender"]) || empty($_GET["email"]) || empty($_GET["name"]) ||empty($_GET["taken"]) || empty($_GET["years"]))
                    {
                        echo"Please fill out every field before attempting to sumbit the substitute's information";
                    }
                    else if(isset($_GET['info-submitted']))
                    {
                        //form was submitted
                        //pass all the form fields and filters into getMatchigItems)()
                        addItems($name,$email,$gender, $taken,$years);
                    }
                        
                    //displayResults();
                ?>
            </div>
        </div>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
    </body>
</html>