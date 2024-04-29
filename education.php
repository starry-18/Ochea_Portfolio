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
    <!-- Page Content-->
    <div class="container px-5 my-5">
      <div class="text-center mb-5">
        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Education</span></h1>
      </div>
      <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
          <!-- Education Section-->
          <section>
            <h2 class="text-secondary fw-bolder mb-4">Educational Attainment</h2>

            <?php
            include 'database.php';
            $sql = "SELECT * FROM `educations`";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) == 0) {
              echo 'No Data Yet';
            } else {
              $ed = mysqli_fetch_all($result, MYSQLI_ASSOC);

              foreach ($ed as $educ) {
            ?>
                <!-- Education Card 1-->
                <div class="card shadow border-0 rounded-4 mb-5">
                  <div class="card-body p-5">
                    <div class="row align-items-center gx-5">
                      <div style="text-align: center; color: navy; font-weight: bold;"><?php echo $educ['yearStart']; ?> - <?php echo $educ['yearEnd']; ?></div>
                      <div style="text-align: center;"><?php echo $educ['level']; ?></div>
                      <div style="text-align: center;"><?php echo $educ['schoolName']; ?></div>
                      <div style="text-align: center;"><?php echo $educ['location']; ?></div>
                      <div style="text-align: center;"><?php echo $educ['course']; ?></div>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
        </div>



        <!-- Divider-->
        <div class="pb-5"></div>
      </div>
    </div>
    </div>
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