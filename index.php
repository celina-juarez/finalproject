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
                        <li><a href='adminLogIn.php'>Administration Log-in</a></li>
                    </ul>
                    
                </div>
                </nav>
                 </br></br></br></br>
                 
                 Welcome! You will find a variety of substitute names and contact information below.
                 
                </br></br></br></br>
                <form enctype = "text/plain">
                    <div id = name>
                    <input type = "text" name ="first" placeholder = "Enter first name...">
                    </br></br>
                    <input type = "text" name ="last" placeholder = "Enter last name...">
                    </div>
                    </br>
                    <div id = email>
                    <input type = "text" name ="email" placeholder = "Enter email...">
                    </div>
                    </br>
                    <div id = "category">
                        Display all substitutes who are: 
                        </br>
                        </br>
                        Gender:<br/>
                        <input type="radio" name="gender" value='3'> women
                        <input type="radio" name="gender" value='4'> men
                        </br>
                        </br>
                        <div id = "taken">
                        Availability:<br/> 
                        <input type="radio" name="taken" value='1'> available
                        <input type="radio" name="taken" value='2'> busy
                        </div>
                        <br/>
                        Years Experience:<br/>
                        <select name="years">
                            <option value="">Select...</option>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                        </select>
                    
                    </div>
                    </br>
                    </br>
                    <input type="submit" name = "info-submitted" value="Submit" class="btn btn-default">
                    
                </form>
                <br /><br />
                <?php 
                    $name = '';
                    $taken = '';
                    $gender = '';
                    $email = '';
                    $years = '';
                    
                    if (isset($_GET["first"]) && !empty($_GET["first"]) && isset($_GET["last"]) && !empty($_GET["last"])) 
                    {
                        $name = $_GET["first"] . " " . $_GET["last"]; 
                    }
                    else if(isset($_GET["first"]) && !empty($_GET["first"]))
                    {
                        $name = $_GET["first"];
                    }
                    else if(isset($_GET["last"]) && !empty($_GET["last"]))
                    {
                        $name = $_GET["last"];
                    }
                    if (isset($_GET["email"]) && !empty($_GET["email"])) 
                    {
                        $email = $_GET["email"]; 
                    }  
                    
                    if (isset($_GET["taken"]) && !empty($_GET["taken"])) 
                    {
                      $taken =  $_GET["taken"]; 
                    }
                        
                    if (isset($_GET["gender"]) && !empty($_GET["gender"])) {
                        $gender = $_GET["gender"];
                    }
                    if (isset($_GET["years"]) && !empty($_GET["years"])) {
                        $years = $_GET["years"];
                    }   
                    
                    if(isset($_GET['info-submitted']))
                    {
                        //form was submitted
                        //pass all the form fields and filters into getMatchigItems)()
                        $items = getMatchingItems($name, $taken, $gender,$email,$years);
                    }
                        
                    displayResults();
                ?>
            </div>
        </div>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
    </body>
</html>