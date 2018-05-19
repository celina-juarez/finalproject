<!DOCTYPE html>
<?php
    include 'dbConnection.php';
    include 'functions.php';
?>
<html>
    <head>
        <title>Log-out</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
    </head>
    
    <body>
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
        
        </br></br></br></br>
        
        <h1>Update System</h1>
        </br></br></br></br>
        Enter the following information for the substitute you would like to update.
        </br></br>
            <form enctype = "text/plain">
                </br></br>
                Enter the Substitute's current name: 
                </br>
                <div id = "name">
                    <input type="text" name="old" placeholder = "Enter first and last name..."></>
                </div>
                </br>
                </br>
                </br>
                Enter the information you would like to change..
                </br>
                You may change their name, email, or both
                </br>
                If you don't want to change a field leave the text box blank...
                </br>
                </br>
                    <input type="text" name="new" placeholder = "Enter new name..."></>
                <div id = "email">
                    <input type="text" name="email" placeholder = "Enter new email..."></>
                </div>
                <div id = "years">
                    <input type="text" name="years" placeholder = "Enter new years experience..."></>
                </div>

                <input type="submit" name = "info-submitted" value="Submit" class="btn btn-default">

            </form>
            <?php 
                    $old= '';
                    $new = '';
                    $email = '';
                    $years = '';
                    if (isset($_GET["old"]) && !empty($_GET["old"])) 
                    {
                        $old= $_GET["old"]; 
                    }
                    if (isset($_GET["new"]) && !empty($_GET["new"])) 
                    {
                        $new = $_GET["new"]; 
                    }
                    if (isset($_GET["years"]) && !empty($_GET["years"])) 
                    {
                        $years = $_GET["years"]; 
                    }
                    if (isset($_GET["email"]) && !empty($_GET["email"])) 
                    {
                        $email = $_GET["email"]; 
                    } 
                    if(isset($_GET['info-submitted']))
                    {
                        //form was submitted
                        //pass all the form fields and filters into getMatchigItems)()
                        updateItems($old, $new, $email, $years);
                    }
                    //displayResults();
                ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
    </body>
</html>