<!DOCTYPE html>
<html lang="en">

<head>
    <title>user Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <div class="container-fluid flex-row-reverse ">
            <div class=" flex-row-reverse ">
                <a class="navbar-brand" href="#">
                    <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="40">
                </a>
            </div>
            <div class="flex-row">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/home">Go To Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/list/appointment">list appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/patient">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <div class="container-fluid mt-3">
        {{content}}
    </div>

</body>

</html>