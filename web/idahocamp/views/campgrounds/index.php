
<?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/header.php';
      require_once '/idahocamp/library/connections.php';
?>
  <header class="jumbotron text-light rounded-0 d-none d-md-block">
    <div class="container ">
      <div class="jumbotron-text mt-5 text-center">
          <h1 class="display-3 jumbotronText">Welcome to IdahoCamping!</h1>
          <p class="lead jumbotronText">View campgrounds from all over the world</p>
      </div>
    </div>
  </header>
  <nav id="searchNav" class="navbar navbar-expand navbar-light bg-white shadow-sm">
    <div class="container">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sort By
              </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <form class="sortForm" action="/campgrounds" method="GET">
                <input type="text" name="sortby" value="rateAvg" class="d-none">
                <button type="submit" class="dropdown-item">Highest Rated</button>
              </form>
              <form class="sortForm" action="/campgrounds" method="GET">
                <input type="text" name="sortby" value="rateCount" class="d-none">
                <button type="submit" class="dropdown-item">Most Reviewed</button>
              </form>
              <form class="sortForm" action="/campgrounds" method="GET">
                <input type="text" name="sortby" value="priceLow" class="d-none">
                <button type="submit" class="dropdown-item">Lowest Price</button>
              </form>
              <form class="sortForm" action="/campgrounds" method="GET">
                <input type="text" name="sortby" value="priceHigh" class="d-none">
                <button type="submit" class="dropdown-item">Highest Price</button>
              </form>
              <a href="/campgrounds" href class="dropdown-item">Reset</a>
            </div>
          </li>
        </ul>
        <div class="d-none d-md-block">
          <form action="/campgrounds" method="GET" class="input-group">
            <input type="text" class="form-control" type="text" name="search" placeholder="Search Campgrounds..." aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-danger border-0" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </nav>
  <div id="campgroundHome" class="container ">
    <div class="d-block d-none d-md-none">
      <form action="/campgrounds" method="GET" class="input-group shadow-sm mt-3">
        <input type="text" class="form-control border-0" type="text" name="search" placeholder="Search Campgrounds..." aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-danger border-0" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </form>
    </div>
    <div class="row">
    <?php
    $db = get_db();
    $statement = $db->prepare("SELECT id, name, image, description, location, author FROM camp_site");
    $statement->execute();
    while ($row = $statement-> fetch(PDO::FETCH_ASSOC)) : ?>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="card indexCards shadow border-0 mt-4">
            <a href="./index.php?action=detail&id=<?= $row['id'] ?>"><img id="campgroundCard" class="card-img-top" src="<?php echo $row['image'] ?>"></a>
            <div class="card-body">
              <h5 class="card-title text-capitalize">
                <a href="./index.php?action=detail&id=<?= $row['id'] ?>"><?= $row['name'] ?></a>
              </h5>
              <h6 class="card-subtitle">
                  <span class="text-muted"><?= $row['description']?></span>
              </h6>
            </div>
          </div>
        </div>
    <?php endwhile; ?>
    </div>
  </div>

    <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/footer.php'; ?>
    </footer>