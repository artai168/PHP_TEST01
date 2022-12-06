<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Driverless v3.01 Beta</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
<?php 
  if (!isset($_SESSION))
  {
      session_start();
  }
?>
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/Assignment/index.php" class="nav-link px-2 text-secondary">Home</a></li>
          <?php 
            if(isset($_SESSION["_userName"]))
            {
              echo '<li><a href="/Assignment/Views/FAQ.php" class="nav-link px-2 text-white">FAQs</a></li>';
              echo '<li><a href="/Assignment/Views/Subscription.php" class="nav-link px-2 text-white">Subscription</a></li>';
            }
          ?>
          <!--<li><a href="/Assignment/Views/FAQ.php" class="nav-link px-2 text-white">FAQs</a></li>-->
        </ul>
<?php 

    

    if(!isset($_SESSION["_userName"]))
    {
          ?>
        <div class="text-end">
            <form method="post">
                <button type="submit" name="Login" value="Login" class="btn btn-outline-light me-2">Login</button>
                <button type="submit" name="SignUp" value="SignUp" class="btn btn-warning">Sign-up</button>                
            </form>
        </div>
        <?php
    }
    else
    {
        ?>
        <div class="text-end">
            <form method="post">
                <button type="submit" name="Logout" value="Logout" class="btn btn-outline-light me-2">Logout</button>
            </form>
        </div>
        <?php
    }
      ?>
        
      </div>
    </div>
  </header>

  <?php     
        if(isset($_POST['Login'])) {
            //echo "This is Login that is selected";
            //header("location:./Views/Login.php"); 
            require_once './Views/Login.php';
        }
        if(isset($_POST['SignUp'])) {
            //echo "This is SignUp that is selected";
            //header("location:./Views/Register.php"); 
            require_once './Views/Register.php';
        }
        if(isset($_POST['Logout'])) {
          //echo "This is SignUp that is selected";
          //header("location:./Views/Register.php"); 
          logout();
      }

        function logout()
        {
          // Initialize the session.
          if (!isset($_SESSION))
          {
            session_start();
          }
          
          // Unset all of the session variables.
          unset($_SESSION['_userName']);
          // Finally, destroy the session.    
          session_destroy();

          // Include URL for Login page to login again.
          header("Location: http://localhost/Assignment/");
          exit;
        }
?>
