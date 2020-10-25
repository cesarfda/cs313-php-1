<?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/header.php'; ?>

  <div class="container mt-4">
    <div class="row">
      <div class="col"></div>
      <div class="col-12 col-sm-12 col-lg-9">
        <div class="card shadow border-0">
          <div class="card-body">
            <h1 class="text-center">Edit <?php if(isset($campInfo['campName'])){echo "value='$campInfo[campName]'";}?>
            </h1>
            <p>
              <small class="text-muted">Fields marked * are required.</small>
            </p>
            <?php
                    if (isset($message)) {
                    echo $message;
                    }
            ?>
            <form action="./index.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
              <div class="form-group">
                <label for="">Name*</label>
                <input type="text" class="form-control" name="campName" id="campName" placeholder="Name" required <?php if(isset($campInfo['name'])){echo "value='$campInfo[name]'";}?>>
                <div class="invalid-feedback">
                  Please provide a campground name.
                </div>
              </div>
              <div class="form-group">
                <label for="">Image URL*</label>
                <input type="text" class="form-control" name="campImage" id="campImage" placeholder="Image" required <?php if(isset($campInfo['image'])){echo "value='$campInfo[image]'";}?>>
                <div class="invalid-feedback">
                  Please provide a campground name.
                </div>
              </div>
              <!-- <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" name="image" accept="image/*" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01"
                    required>
                  <div class="invalid-feedback">
                    Please upload an image of your campground.
                  </div>
                  <label class="custom-file-label" for="inputGroupFile01">Image*</label>
                </div>
              </div> -->
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description*</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="campDescription" id="campDescription" rows="3" required><?php if(isset($campInfo['description'])){echo "$campInfo[description]";}?></textarea>
                <div class="invalid-feedback">
                  Please provide a description of your campground.
                </div>
              </div>
              <div class="form-group">
                <label for="location">Location*</label>
                <input type="text" class="form-control" name="campLocation" placeholder="Yosemite National Park, CA" id="campLocation" required <?php if(isset($campInfo['location'])){echo "value='$campInfo[location]'";}?>>
                <div class="invalid-feedback">
                  Please provide a valid location
                </div>
              </div>
              <button type="submit" class="btn btn-danger btn-block">Submit</button>
              <input type="hidden" name="action" value="updateCamp">
              <input type="hidden" name="id" value="<?php if(isset($campInfo['id'])){ echo $campInfo['id'];}?>">
            </form>
            <a class="btn btn-link" href="./index.php">Go Back</a>
          </div>

        </div>

      </div>
      <div class="col">

      </div>
    </div>

  </div>
  <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/idahocamp/views/partials/footer.php'; ?>
  </footer>