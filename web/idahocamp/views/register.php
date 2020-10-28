<?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/header.php'; ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col"></div>
      <div class="col-sm-7 col-md-6 col-lg-5 ">
        <div class="card shadow border-0">
          <div class="card-body">
            <h1 class="text-center">Sign Up</h1>
            <p>
              <small class="text-muted">Fields marked * are required.</small>
            </p>
            <form class="needs-validation" action="/idahocamp/accounts/index.php" enctype="multipart/form-data" method="POST" novalidate>
              <div class="form-group">
                <label for="">Name*</label>
                <input type="text" name="fullName" class="form-control" id="fullName" placeholder="John Smith" required>
                <div class="invalid-feedback">
                  Please enter your name.
                </div>
              </div>
              <div class="form-group">
                <label for="">Email*</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="john@smith.com" required>
                <div class="invalid-feedback">
                  Please provide an email.
                </div>
              </div>
              <div class="form-group">
                <label for="">Username*</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="johnsmith" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
              <div class="form-group">
                <label for="">Password*</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                <div class="invalid-feedback">
                  Please enter a password.
                </div>
              </div>
              
              <button type="submit" class="btn btn-danger btn-block">Sign Up</button>
              <input type="hidden" name="action" value="register">
            </form>
            <div class="mt-2 text-center">
              Have an account?
              <a href="/idahocamp/accounts/index.php?action=login">Login</a>
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