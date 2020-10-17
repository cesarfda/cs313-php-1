<div class="mt-3">
  <footer class="footer">
    <div class="container text-center">
      <small class="text-muted"> &copy; IdahoCamping 2020 | <a class="text-muted" href="/idahocamp/views/about">About</a> | <a class="text-muted" href="https://github.com/cesarfda">Github</a></small>
    </div>  
  </footer>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
  crossorigin="anonymous"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script>
  // ScrollReveal().reveal('.jumbotron-text', { duration: 2000 });
  ScrollReveal().reveal('.indexCards', {
    interval: 150, mobile: true, viewFactor: 0.3
  });

  (function () {
    'use strict';
    window.addEventListener('load', function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<script>
    if (window.location.pathname === "/campgrounds") {
      document.title = "IdahoCamping";
      document.getElementById("home").classList.toggle("active");
    } else if (window.location.pathname === "/login") {
      document.title = "Login";
      document.getElementById("login").classList.toggle("active");
    } else if (window.location.pathname === "/register") {
      document.title = "Sign Up";
      document.getElementById("register").classList.toggle("active");
    } else if (window.location.pathname == "/campgrounds/new") {
      document.title = "Add Campground"
      document.getElementById("newCampground").classList.toggle("active");
    } else if (window.location.pathname == "/about") {
      document.title = "About"
      document.getElementById("about").classList.toggle("active");
    }
</script>
</body>

</html>