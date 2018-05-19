<!DOCTYPE html>
<html>
    <head>
        <title>Administration Log-in</title>
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
                        <li><a href='adminLogIn.php'>Administration Log-in</a></li>
                    </ul>
                    
                </div>
        </nav>
        
        </br></br></br></br>
        
        <h1>Administration Login</h1>
        <h2>Credentials required before submitting form.</h2>
        <h2>Log in to edit class information.</h2>
        <p>You can log in using usernames <strong>admin_1</strong>. The password is <strong>pass_1</strong>.</p>
        
        <!--Form to enter credentials-->
        <form method = "post" action = "verifyUser.php">
            <input type = "text" name = "username" placeholder = "Username"/><br />
            <input type = "password" name = "password" placeholder = "Password"/><br />
            <input type="submit" name="submit" value ="Login"/>
        </form>
    </body>
</html>