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
                
                        
                <form>
                    </br></br>
                     <h1>Substitute Teachers' Reports</h1></br></br>
                     <br />
                     <br />
                     Select the ones you would like to generate: 
                     <br />
                     <br />
                     <br />
                    <input type="checkbox" name = "men" value='4'/>Generate the % of Subtitutes who are Men
                    <br /><br />
                    <input type="checkbox" name = "women" value='3'/>Generate the % of Subtitutes who are Women
                    <br /><br />
                    <input type="checkbox" name = "available" value='1'/>Generate the % of Subtitutes who are Available
                    <br /><br />
                    <input type="checkbox" name = "busy" value='2'/>Generate the % of Subtitutes who are Busy
                    
                    <br /><br />
                    <input type="submit" name = "info-submitted" value="Submit" class="btn btn-default">
    
                    <br /><br />
                </form>

                 
                
                <?php 
                    $men = '';
                    $women = '';
                    $available = '';
                    $busy = '';
                    
                    if (isset($_GET["men"]) && !empty($_GET["men"])) 
                    {
                        $men = $_GET["men"]; 
                    }
                    if (isset($_GET["women"]) && !empty($_GET["women"])) 
                    {
                        $women = $_GET["women"]; 
                    }
                    if (isset($_GET["available"]) && !empty($_GET["available"])) 
                    {
                        $available = $_GET["available"]; 
                    }
                    if (isset($_GET["busy"]) && !empty($_GET["busy"])) 
                    {
                        $busy = $_GET["busy"]; 
                    }
                    if(isset($_GET['info-submitted']))
                    {
                        generateReports($men, $women, $available,$busy);
                    }
                    
                ?>
            </div>
        </div>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
    </body>
</html>