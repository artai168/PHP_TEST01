<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="zh-Hant-HK">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Driverless Membership System</title>

    <meta name="author" content="Kevin Cheng">

    <!-- Include Bootstrap.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Custom .css -->
    <!--<link rel="stylesheet" href="css/custom/custom.css"> -->
    <!-- Custom font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

</head>

<header>
    
    <!-- Navbar -->
    <nav class="navbar navbar-default">
   
    <div class="container-fluid">
        
        <div class="container">
            
            <!-- Collapse navigation menu for mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>   <!-- /Collapse menu -->
            
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" >
                    Driverless Membership system 
                </a>    
            </div>  <!-- /Logo -->
            
            <!-- Navigation buttons -->
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <?php if(!empty(@$_SESSION['user_id'])): ?>
                    <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
                <?php else: ?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <?php endif; ?>
                </ul>
            </div> <!-- /Navigation buttons -->
            
        </div>  <!-- /Container -->
        
    </div>  <!-- /Container-fluid -->
    
    </nav>  <!-- /Navbar -->
    
</header>