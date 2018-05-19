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
                    </ul>
                    
                </div>
        </nav>
        
        </br></br></br></br>
        
        <h1>Manage System</h1>
        
        </br></br>
        Select one: 
        <!--Admin can make changes to the db-->
        <div id = "changes">
            </br></br>
            <li><a href='update.php'>Update Substitute's Information</a></li>
            </br></br>
            <li><a href='delete.php'>Delete a Substitute</a></li>
            </br></br>
            <li><a href='add.php'>Add a Substitute</a></li>
            </br></br>
            <li><a href='reports.php'>View Reports</a></li>
            </br></br>
        </div>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    </body>
</html>