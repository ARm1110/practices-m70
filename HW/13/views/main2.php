<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <div class="container-fluid flex-row-reverse ">
            <div class=" flex-row-reverse ">
                <a class="navbar-brand   " href="#">
                    <svg class="svg-icon absolute bottom-0 right-0 text-primary bg-white border border-white circle" xmlns="http://www.w3.org/2000/svg" focusable="false" viewBox="0 0 12 12">
                        <path fill="currentColor" d="M6 0C2.7 0 0 2.7 0 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm0 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm2.3 7H3.7c-.3 0-.4-.3-.3-.5C3.9 7.6 4.9 7 6 7s2.1.6 2.6 1.5c.1.2 0 .5-.3.5z" />
                    </svg>
                </a>
            </div>
            <div class="flex-row">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profileEdited">edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
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