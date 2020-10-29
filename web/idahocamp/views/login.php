<?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/header.php'; ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col"></div>
      <div class="col-sm-7 col-md-6 col-lg-5">
        <div class="card shadow border-0">
          <div class="card-body">
            <h1 class="text-center">Login</h1>
            <?php
                    if (isset($message)) {
                    echo $message;
                    }
            ?>
            <form class="needs-validation" action="/idahocamp/accounts/index.php" method="POST" novalidate>
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" <?php if(isset($username)){echo "value='$username'";}?> class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback">
                  Please enter your username.
                </div>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <div class="invalid-feedback">
                  Please enter your password.
                </div>
              </div>
              <button type="submit" class="btn btn-danger btn-block">Login</button>
              <input type="hidden" name="action" value="login">
            </form>
            <div class="mt-2 text-center">
              Don't have an account?
              <a href="/idahocamp/accounts/index.php?action=signUp">Sign Up</a>
            </div>
          </div>
        </div>

      </div>
      <div class="col"> </div>
    </div>
  </div>

  <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/footer.php'; ?>
    </footer>