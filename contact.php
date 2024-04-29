<?php
include 'database.php';
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  $sql = "INSERT INTO `messages`(`name`, email, phone, `message`) VALUES ('$name', '$email', '$phone', '$message')";
  $result = mysqli_query($connect, $sql);

  if ($result) {
    header("Location: contact.php?msg=Message Submitted");
  } else {
    echo "Failed: " . mysqli_error($connect);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content />
  <meta name="author" content />
  <title>Contact Form</title>
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

<body class="d-flex flex-column">
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
    <!-- Page content-->
    <section class="py-5">
      <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
          <div class="text-center mb-5">
            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3">
              <i class="bi bi-envelope"></i>
            </div>
            <h1 class="fw-bolder">Get in touch</h1>
            <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
          </div>
          <div class="row gx-5 justify-content-center">
            <!-- Success message display area -->
            <?php if (isset($_GET['msg'])) { ?>
              <div class="alert alert-success mt-3" style="text-align: center;" role="alert">
                <?php echo $_GET['msg']; ?>
              </div>
            <?php } ?>
            <div class="col-lg-8 col-xl-6">
              <form action="" method="post" enctype="multipart/form-data">
                <table style="margin-left: 20px;">
                  <tr>
                    <td><label for="">Name:</label></td>
                    <td><input class="form" type="text" name="name"></td>
                  </tr>
                  <tr>
                    <td><label for="">Email:</label></td>
                    <td><input class="form" type="text" name="email" placeholder="***@.com"></td>
                  </tr>
                  <tr>
                    <td><label for="">Contact:</label></td>
                    <td><input class="form" type="text" name="phone" placeholder="#"></td>
                  </tr>
                  <tr>
                    <td><label for="">Message:</label></td>
                    <td> <textarea rows="8" cols="100" type="text" name="message"></textarea></td>

                  </tr>
                </table>
                <br>
                <div style="padding-left: 30px; text-align: center;">
                  <button class="mainButton" type="submit" name="submit">Send Messages</button>
                </div>



              </form>
            </div>
          </div>
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
  <script>
    // Function to clear form fields
    function clearForm() {
      document.getElementById("name").value = "";
      document.getElementById("email").value = "";
      document.getElementById("phone").value = "";
      document.getElementById("message").value = "";
    }

    // Submit form handler
    document.getElementById("contactForm").addEventListener("submit", function(event) {
      // Prevent default form submission
      event.preventDefault();

      // Clear form fields
      clearForm();

      // Display success message
      document.getElementById("submitSuccessMessage").classList.remove("d-none");
      document.getElementById("submitErrorMessage").classList.add("d-none");

      // Optional: You can also hide the submit button after submission
      document.getElementById("submitButton").classList.add("disabled");
    });
  </script>

  <style>
    input {
      border-radius: 10px;
      padding: 10px;
      width: 500px;
      margin-bottom: 10px;
    }

    textarea {
      border-radius: 10px;
      padding: 10px;
      width: 500px;
    }

    .mainButton {
      background-color: white;
      color: #0e2954;
      border: 2px solid #0e2954;
      border-radius: 10px;
      padding: 5px;
      padding-left: 20px;
      padding-right: 20px;
      font-weight: bold;

    }

    .mainButton:hover {
      background-color: #0e2954;
      color: #ffffff;
      border: 2px solid #0e2954;
      border-radius: 10px;
      padding: 5px;
      padding-left: 20px;
      padding-right: 20px;
      font-weight: bold;
    }
  </style>

</body>

</html>