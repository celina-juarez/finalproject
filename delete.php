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
                 <h1>Delete Substitute</h1></br></br>
                 
                 Please enter the Substitute Teacher's information below.
                 
                </br></br></br></br>
                <form enctype = "text/plain">
                    <input type="text" id = "name" name="name" placeholder = "Enter first and last name..."></>

                <br /><br />
                <br /><br />
                
                <span id="ans"> </span>

            </form>
            <input type="submit" id = "info-submitted" name = "info-submitted" value="Submit" class="btn btn-default">
                <br /><br />
                
            </div>
        </div>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/logic.js"></script>
    </body>
</html>