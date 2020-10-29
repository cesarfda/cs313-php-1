<?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/header.php'; ?>

<div id="campgroundsContainer" class="container mt-4">
  <div class="row justify-content-center">
    <!--<div class="col-md-3">
          <div class="d-none d-md-block">
            <div class="lead text-center text-capitalize">
              <?php# if(isset($campInfo['name'])){echo "$campInfo[name]";} ?>
            </div>
              <div class="card shadow-sm mt-3">
                  <div id="map"></div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><i class="fas fa-map-marker-alt"></i>
                      <?php# if(isset($campInfo['name'])){echo "$campInfo[name]";} ?>
                      </li>
                    </ul>
                  </div>
          </div>
        </div> -->
    <div class="col-md-9">
      <div class="card shadow-sm">
        <img class="card-img-top" src="<?php if(isset($campInfo['image'])){echo "$campInfo[image]";} ?>">
        <div class="card-body">
          <h5 class="card-title text-capitalize">
            <?php if(isset($campInfo['name'])){echo "$campInfo[name]";} ?>
          </h5>
          <p class="card-text">
            <?php if(isset($campInfo['description'])){echo "$campInfo[description]";} ?>
            <div class="d-block d-sm-none d-none d-sm-block d-md-none">
              <hr>
              <h5 class="card-title"><i class="fas fa-map-marker-alt"></i> Location</h5>
              <?php if(isset($campInfo['location'])){echo "$campInfo[location]";} ?>
            </div>
          </p>
          <hr>
          <p class="card-text text-muted">
            <span>Submitted by
              <?php if(isset($authorName['full_name'])){echo "$authorName[full_name]";} ?></a> on
              <?php if(isset($campInfo['creation_date'])){echo date_format(date_create($campInfo['creation_date']), 'd/m/Y');} ?>
            </span>
          </p>
          <!-- Add session to control delete buttons -->
          <?php if($_SESSION['clientData']['id'] == $authorName['id']){ ?>

          <form id="deleteForm" action="./index.php" method="GET" class="float-right">
            <button type="submit" class="delBtn btn text-dark btn-lg">
              <input type="hidden" name="action" value="del">
              <input type="hidden" name="id"
                value="<?php if(isset($campId)){echo $campId;} elseif(isset($campInfo['id'])){ echo $campInfo['id'];}?>">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
          <a href="./index.php?action=mod&id=<?= $campInfo['id'] ?>" class="btn text-dark btn-lg float-right">
            <i class="fas fa-pencil-alt"></i>
          </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/footer.php'; ?>
  </footer>