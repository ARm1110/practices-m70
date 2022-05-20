<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Simple Hospital </title>
  
  <link href="../css/styles2.css" rel="stylesheet" />
  <link href="../css/styles.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  

  <!-- link sweetalert2 -->



  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>


<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom bg-light">Start Menu</div>
      <div class="list-group list-group-flush">
        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
          Panel
        </button>
        <ul class="dropdown-menu ">
          <li><a class="dropdown-item" href="/dashboardManagement">Management</a></li>
          <li><a class="dropdown-item" href="/dashboardDoctor">Doctor</a></li>
          <li><a class="dropdown-item" href="#">patient</a></li>
        </ul>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Shortcuts</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="DoctorList">Doctor list</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
      </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
          <button class="btn btn-secondary" id="sidebarToggle">Menu</button>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
              <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#!">Status</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/login">Login</a>
                  <a class="dropdown-item" href="/register">Register</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/login">Log out..</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Page content-->
      <div class="container-fluid">
        {{content}}
      </div>
    </div>
  </div>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="../../js/scripts.js"></script>
  <!-- <script src="../../js/scripts2.js"></script> -->

</body>


</html>