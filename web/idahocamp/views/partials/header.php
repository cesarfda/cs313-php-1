<!DOCTYPE html>
<html lang="en">

<head>
  <title>IdahoCamping</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
    crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/idahocamp/public/stylesheets/main.css">
</head>

<body>
  <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/idahocamp/index.php">Idaho Camping</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li id="home" class="nav-item">
            <a class="nav-link" href="/idahocamp/index.php">Campgrounds</a>
          </li>
          <li id="about" class="nav-item">
            <a class="nav-link" href="/idahocamp/index.php?action=About">About</a>
          </li>
          <li id="newCampground" class="nav-item">
            <a class="nav-link" href="/idahocamp/index.php?action=addCamp">New</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          
            <li id="login" class="nav-item">
              <a class="nav-link" href="/idahocamp/accounts/index.php?action=login">Login</a>
            </li>
            <li id="register" class="nav-item">
              <a class="nav-link" href="/idahocamp/accounts/index.php?action=signUp">Sign Up</a>
            </li>

              <?php 
              if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){?>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user"></i>
                
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class='dropdown-item' href='/idahocamp/accounts/index.php?action=details'>Profile</a>
                <a class="dropdown-item" href="/idahocamp/accounts/index.php?action=logout">Log Out</a>
              </div>
              </li>
              <?php } ?>
        </ul>
      </div>
    </div>
  </nav>