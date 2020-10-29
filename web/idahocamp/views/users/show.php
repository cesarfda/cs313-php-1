<?php
    if(!$_SESSION['loggedin']){
        header('Location: /idahocamp/index.php');
    }
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/header.php'; ?>
  <div class="container mt-4">    
    <div class="row justify-content-center">
        <div class="card shadow-sm mt-3 mb-3">
          <div class="card-header text-capitalize">
            <?php if(isset($_SESSION['clientData']['full_name'])){echo "{$_SESSION['clientData']['full_name']}";} ?>            
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <i class="fas fa-envelope"></i> <strong>Email: </strong><?php if(isset($_SESSION['clientData']['email'])){echo "{$_SESSION['clientData']['email']}";}?></a>             
              </li>                            
                <li class="list-group-item d-flex justify-content-center">
                <?php
                    if (isset($message)) {
                    echo $message;
                    }
            ?>
                  <a class="btn btn-warning btn-sm float-left mr-1" href="/idahocamp/accounts/index.php?action=updateInfo">Edit Profile</a>
                  <form class="float-left" action="/idahocamp/accounts/index.php" method="POST">
                    <button type="submit" class="btn btn-danger btn-sm">Delete Account</button>
                    <input type="hidden" name="action" value="delAccount">
                  </form>
                </li>          
          </ul>
        </div>
      </div>
    </div>
  </div>

  <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/footer.php'; ?>
    </footer>