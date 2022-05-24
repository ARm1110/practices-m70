<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>

</style>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Site Logo Here -->
            <a class="navbar-brand" href="#">
                <button class="btn b1 btn-light  " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenus">
                    Menu
                </button>
            </a>
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileToggle" aria-controls="navbarMobileToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMobileToggle">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="Submenu-Dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu rounded-3" aria-labelledby="Submenu-Dropdown">
                            <li><a class="dropdown-item" href="#">Services One</a></li>
                            <li><a class="dropdown-item" href="#">Services Two</a></li>
                            <li><a class="dropdown-item" href="#">Services Three</a></li>
                            <li><a class="dropdown-item" href="#">Services Four</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <!-- Right Side -->
                <div class="btn-group float-end">
                    <a href="#" class="dropdown-toggle text-decoration-none text-light" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        <span>Gurdeep Singh</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="#" class="dropdown-item"><i class="bi bi-lock-fill"></i> Change Password</a></li>
                        <li><a href="#" class="dropdown-item"><i class="bi bi-gear-fill"></i> Admin Setion</a></li>
                        <li><a href="#" class="dropdown-item"><i class="bi bi-gear-wide-connected"></i> IMAP Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="#" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Toggle Button -->

    <div class="offcanvas offcanvas-start navbar-light bg-light" id="offcanvasMenus" style="width: 300px;">
        <!-- Sidebar Header -->
        <div class="border-bottom p-4 mb-4 shadow-sm">
            <a href="#"><img src="/images/MarkupTag-logo.png" alt="..." class="img-fluid w-50"></a>
            <button type="button" class="btn-close float-end text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!-- Navbar Menus Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/home" class="nav-link px-4">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link px-4">management accept list</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link px-4">appointment  list</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link px-4">user list</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link px-4">doctor list</a>
            </li>
        </ul>
    </div>
</body>

</html>