<?php
    if(!$_SESSION['loggedin']){
        header('Location: /idahocamp/index.php');
    }
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/header.php'; ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col"></div>
      <div class="col-sm-7 col-md-6 col-lg-5 ">
        <div class="card shadow border-0">
          <div class="card-body">
            <h1 class="text-center">Edit your account</h1>
            <p>
              <small class="text-muted">Fields marked * are required.</small>
            </p>
            <?php
                    if (isset($message)) {
                    echo $message;
                    }
            ?>
            <form class="needs-validation" action="/idahocamp/accounts/index.php" enctype="multipart/form-data" method="POST" novalidate>
              <div class="form-group">
                <label for="">Name*</label>
                <input type="text" name="fullName" class="form-control" <?php if(isset($fullName)){echo "value='$fullName'";}?> id="fullName" placeholder="John Smith" required>
                <div class="invalid-feedback">
                  Please enter your name.
                </div>
              </div>
              <div class="form-group">
                <label for="">Email*</label>
                <input type="text" name="email" class="form-control" <?php if(isset($email)){echo "value='$email'";}?> id="email" placeholder="john@smith.com" required>
                <div class="invalid-feedback">
                  Please provide an email.
                </div>
              </div>
              <div class="form-group">
                <label for="">Username*</label>
                <input type="text" name="username" id="username" <?php if(isset($username)){echo "value='$username'";}?> class="form-control"  placeholder="johnsmith" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
              
              
              <button type="submit" class="btn btn-danger btn-block">Submit Profile Changes</button>
              <input type="hidden" name="action" value="updateAccountInfo">
            </form>
            <form class="needs-validation" action="/idahocamp/accounts/index.php" enctype="multipart/form-data" method="POST" novalidate>
            <div class="form-group">
                <label for="">Password*</label>
                <input type="password" name="password" class="form-control" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <div class="invalid-feedback">
                  Please enter a password.
                </div>
            </div>
            <button type="submit" class="btn btn-danger btn-block">Submit Password Change</button>
              <input type="hidden" name="action" value="updateAccountPsw">
            </form>

            
          </div>
        </div>
      </div>
      <div class="col"> </div>
    </div>
  </div>

  <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/footer.php'; ?>
    </footer>