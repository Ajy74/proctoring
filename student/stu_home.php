<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/proctoring/css/home.css" />
    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->
    <title>Student-Home</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark background ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="/proctoring/gitalog.png" height="50px" width="200px" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon togbtn"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/student/proctoring_form.php">PROCTORING-FORM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/student/stu_createProfile.php">PROFILE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/student/stu_query.php">QUERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/student/view_notice.php">NOTICE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/student/view_report.php">REPORT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/student/leave.php">APPLY LEAVE</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li> -->
                    <!-- <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                  </li> -->
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
                    <!-- <button type="button" class="btn  btnsign mx-2">Sign Up</button> -->

                    <button type="button" class="btn  btnlogout mx-2 ps-2 pe-2">Logout</button>

                    <!-- <button onclick="logout()" class="btnlogout">Logout</button> -->
                </form>
            </div>
        </div>
    </nav>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>