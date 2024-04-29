<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Ochea's Portfolio</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Custom Google font-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100 bg-light">
  <main class="flex-shrink-0">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
      <div class="container px-5">
        <img class="profile-img" src="assets/logo.png" alt="..." style="width: 50px; height: 50px" />

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="aboutMe.php">About</a></li>
            <li class="nav-item"><a class="nav-link" href="education.php">Education</a></li>
            <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfolio</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact Me</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Projects Section-->
    <section class="py-5">
      <div class="container px-5 mb-5">
        <div class="text-center mb-5">
          <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Portfolio</span></h1>
        </div>
        <div style="display: flex; flex-direction: row !important;">
          <div style="margin-right: 20px; width: 50%;">
            <h2 style="text-align: center;">Services</span></h1>
              <!-- Service Card -->
              <?php
              include 'database.php';
              $sql = "SELECT * FROM `services`";
              $result = mysqli_query($connect, $sql);

              if (mysqli_num_rows($result) == 0) {
                echo 'No Data Yet';
              } else {
                $ed = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach ($ed as $serv) {
              ?>
                  <div class="card overflow-hidden shadow rounded-4 border-0 mb-5 d-flex align-items-center" style="padding-right: 40px;">
                    <div class="card-body p-0">
                      <div class="d-flex align-items-center">
                        <div class="p-5">
                          <h2 class="fw-bolder"><?php echo $serv['serviceName']; ?></h2>
                          <p>
                            <?php echo $serv['desc']; ?>
                          </p>
                        </div>
                        <img src="assets/<?php echo $serv['pictureRoute']; ?>" alt="No Image" style="width: 150px; height: 100px;" />
                      </div>
                    </div>
                  </div>

              <?php
                }
              }
              ?>


          </div>
          <div style="margin-left: 20px;width: 50%;">
            <h2 style="text-align: center;">Projects</span></h1>
              <!-- Project Card -->
              <?php
              include 'database.php';
              $sql = "SELECT * FROM `projects`";
              $result = mysqli_query($connect, $sql);

              if (mysqli_num_rows($result) == 0) {
                echo 'No Data Yet';
              } else {
                $ed = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach ($ed as $proj) {
              ?>
                  <div class="card overflow-hidden shadow rounded-4 border-0 mb-5 d-flex align-items-center" style="padding-right: 40px;">
                    <div class="card-body p-0">
                      <div class="d-flex align-items-center">
                        <div class="p-5">
                          <h2 class="fw-bolder"><?php echo $proj['projectName']; ?></h2>
                          <p>
                            <?php echo $proj['desc']; ?>
                          </p>
                        </div>
                        <img src="assets/<?php echo $proj['pictureRoute']; ?>" alt="No Image" style="width: 150px; height: 100px;" />
                      </div>
                    </div>
                  </div>
              <?php
                }
              }
              ?>

          </div>
        </div>
      </div>
    </section>
    <!-- Call to action section-->
    <section class="py-5 bg-gradient-primary-to-secondary text-white">
      <div class="container px-5 my-5">
        <div class="text-center">
          <h2 class="display-4 fw-bolder mb-4">Let's build something together</h2>
          <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="contact.php">Contact me</a>
        </div>
      </div>
    </section>
  </main>
  <!-- Footer-->
  <footer class="bg-white py-4 mt-auto">
    <div class="container px-5">
      <div class="row align-items-center justify-content-between flex-column flex-sm-row">
        <div class="col-auto">
          <div class="small m-0">Copyright &copy; 2024 Julianne Ochea. All rights reserved.</div>
        </div>
        <div class="col-auto">
          <a class="small" href="#!">Privacy</a>
          <span class="mx-1">&middot;</span>
          <a class="small" href="#!">Terms</a>
          <span class="mx-1">&middot;</span>
          <a class="small" href="#!">Contact</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>