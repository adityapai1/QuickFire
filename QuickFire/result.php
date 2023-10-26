
<?php
require_once("connect.php");
require_once("function.php");
session_start();

if (!isset($_SESSION['login_active'])) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
 
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
  body{
  font-family: 'Poppins', sans-serif;
   background-color:#Fed8b1;
  /* background-color:#FFE8F1; */
 }

 ul {
  list-style-type: none;
} 
 
</style>
<body>
  <section class="main-section">

    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">QuickFire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
            </li>
          </ul>

          <div class="d-flex">
            <a class="btn btn-danger" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <?php if ($_SESSION['score'] == 0) : ?>
            <div class="card my-2 p-3 text-center">
              <div class="card-body">
                <h5 class="card-title py-2 text-center">No Question Attempted</h5>
                <button class="btn btn-warning">Your Score is : <?php echo $_SESSION['score']; ?></button>
              </div>
            </div>

          <?php else : ?>
            <div class="card my-2 p-3 text-center">
              <div class="card-body">
                <h5 class="card-title py-2 text-center">You have attempted <?php echo $_SESSION['attempted']; ?> out of <?php echo totalquestion($conn); ?> at <?php date_default_timezone_set('Asia/Kolkata'); echo date('H:i:s'). " IST"; ?></h5> 
                <button class="btn btn-warning">Your Score: <?php echo $_SESSION['score']; ?> </button> <br><br><span class="badge text-bg-primary"> <br>Answered <?php echo $_SESSION['score']; ?> Questions Successfully! <br><br></span>
              </div>
            </div>
          <!-- Display user responses here new line -->
          <div class="card my-2 p-3 text-center">
              <div class="card-body">
                <h5 class="card-title py-2 text-center">Your Responses:</h5>
                <ul >
                  <?php foreach ($_SESSION['user_responses'] as $questionNumber => $response) : ?>
                    <li>Question <?php echo $questionNumber; ?>: <?php echo $response; ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          <?php endif ?>

          <div class="card my-2 p-3 text-center">
            <div class="card-body">
              <a class="btn btn-info" href="quiz.php">Reattempt Quiz</a>
              <a class="btn btn-info" href="email.php">Send Email Quiz</a>
              
              
            </div>
          </div>
        </div>

      </div>
    </div>
    </form>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>