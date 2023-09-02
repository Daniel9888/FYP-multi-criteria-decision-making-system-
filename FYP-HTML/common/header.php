<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Knowyourpen</title>

  <link rel="stylesheet" href="/libs/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
  body {
  background-image: url('img/bgpic.jpeg');
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
</style>
  <script>
  $(document).ready(function() {
  $('show-form-btn').on('click', function() {
    $('my-form').show();
    $('form-container').hide();
  });
});
function showForm() {
  // Hide the button
  document.getElementById("form-container").style.display = "none";
  
  // Show the form container
  document.getElementById("my-form").style.display = "block";}
  </script>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <nav class="navbar bg-body-tertiary">

          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z" />
                <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z" />
              </svg>
            </a>
          </div>
        </nav>
        <a class="navbar-brand" href="/">Know Your Pen</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="match.php">Match Your Pen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pens.php">Pens</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>