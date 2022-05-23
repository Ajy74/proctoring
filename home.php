<?php
$student=false;
$proctor=false;
$admin=false;
  session_start();
//for student
  if(!isset($_SESSION['Sloggedin']) || $_SESSION['Sloggedin']!=true){
    // header("location:/proctoring/student/stu_login.php");
    // exit;
  }
  else{
      $student=true;
  }
//for proctor
 if(!isset($_SESSION['ploggedin']) || $_SESSION['ploggedin']!=true){

 }
 else{
    $proctor=true;
 }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->
    <title>
    CSIT DEPARTMENT
    </title>
</head>

<body>
<?php 

  if($student){
      echo '  <nav class="navbar navbar-expand-lg navbar-dark background ">
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
                      <a class="nav-link active" aria-current="page" href="/proctoring/student/proctoring_form.php">PROCTORING-FORM</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="/proctoring/student/stu_createProfile.php">PROFILE</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="/proctoring/student/stu_query.php">QUERY</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="/proctoring/student/view_notice.php">NOTICE</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="/proctoring/student/view_report.php">REPORT</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="/proctoring/student/leave.php">APPLY LEAVE</a>
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

                 <a href="/proctoring/logouthandler.php"> <button type="button" class="btn  btnlogout mx-2 ps-2 pe-2">Logout</button></a>

                  
              </form>
          </div>
      </div>
  </nav>';
  }
  elseif($proctor){
      echo '<h1>Welcome Proctor</h1></br> <a href="/proctoring/logouthandler.php"> <button type="button" class="btn  btnlogout mx-2 ps-2 pe-2">Logout</button></a>';

  }
  else{
      echo '<nav class="navbar navbar-expand-lg navbar-dark background ">
      <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="gitalog.png" height="50px" width="200px" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon togbtn"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Contanct US</a>
            </li>
   -->
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
                  <li class="nav-item dropdown btn  btnsign  ">
                      <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Sign Up
                      </a>
                      <ul class="dropdown-menu my-2 color" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Admin</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="proctor/pro_signup.php">proctor</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="student/stu_signup.php">student</a></li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown btn  btnsign mx-2">
                      <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Login
                      </a>
                      <ul class="dropdown-menu menu2 my-2 color" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item " href="#">Admin</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="proctor/pro_login.php">proctor</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="student/stu_login.php">student</a></li>
                      </ul>
                  </li>
                  <!-- <button type="button" class="btn  btnlogin mx-2" >Login</button> -->

                  <!-- <button onclick="logout()" class="btnlogout">Logout</button> -->
              </form>
          </div>
      </div>
  </nav>';
  }

?>



    

    <section class="background">
        quidem ea ratione assumenda dolores, veniam fugit nam explicabo voluptatibus corrupti nulla minus, doloremque
        asperiores enim cum accusantium maxime numquam. Suscipit, quisquam. Vitae.
        Nulla quo ipsa voluptate autem, debitis distinctio error? Harum cumque minima ea eum sed vitae eaque
        consequuntur, voluptatum dolorum necessitatibus voluptate libero pariatur quibusdam voluptas animi error
        expedita, facilis totam?
        Harum porro eveniet animi natus accusantium labore eligendi consequuntur recusandae reiciendis fugiat excepturi,
        cum ad! Quia nihil doloribus dolore modi commodi fugit ut, temporibus recusandae dolores cum, molestiae harum!
        Accusamus.
        Quaerat ex nostrum maxime natus, odit ullam quo, ad voluptatem maiores, possimus fugit. Dolorem enim libero quos
        aliquid, odit culpa dignissimos voluptatibus possimus sed voluptates esse veritatis dolor quasi impedit?
        Est debitis facere perferendis ipsum, laudantium eius dolorem, consequatur illum excepturi velit officia a
        quisquam. Non ea repellat inventore doloribus magnam, voluptatum expedita cumque. Ex perspiciatis eos asperiores
        accusamus blanditiis.
        Officia voluptatem laboriosam libero explicabo dicta et eveniet repellendus eligendi quo. Esse totam accusamus
        alias ratione maxime debitis ullam soluta, reprehenderit assumenda necessitatibus nobis facere voluptatibus
        tempora corporis aut repudiandae.
        Ea oditoluptates quas perspiciatis eligendi dolores illo deleniti officia nostrum ullam sequi sapiente molestiae
        voluptate sint laborum laudantium. Ex?
        Id facere cumque quae mollitia, quasi quo minima asperiores tempora. Accusamus quas voluptate debitis iste? Odio
        eum omnis voluptatibus itaque quam! Repudiandae ea accusamus quod autem recusandae incidunt, enim consectetur?
        Ipsa voluptatibuseserunt? Temporibus, cum, inventore non modi repellat optio vitae quo aliquam veniam placeat
        consectetur animi rem voluptas necessitatibus!
        Inventore repellat vel incidunt optio officiis fugit aperiam obcaecati explicabo dignissimos, mollitia enim
        reiciendis porro modi repudiandae iusto distinctio deleniti voluptatibus et error quam tenetur magni quisquam
        assumenda! Illo, tempora?
        Iusto molestias, natus fugiat earum praesentium numquam quam quisquam reiciendis facilis necessitatibus
        doloremque architecto expedita optio dolores eius alias est placeat voluptatibus error quo sed? Vitae rem culpa
        ratione quas!
        Corporis placeat molestiae optio veritatis facilis velit officiis tempora labore rerum, rem ullam veniam natus
        odit quis totam laborum hic in a voluptate quidem culpa? Necessitatibus libero deleniti quisquam esse!
        Ipsa voluptatibuseserunt? Temporibus, cum, inventore non modi repellat optio vitae quo aliquam veniam placeat
        consectetur animi rem voluptas necessitatibus!
        Inventore repellat vel incidunt optio officiis fugit aperiam labore rerum, rem ullam veniam natus odit quis
        totam laborum hic in a voluptate quidem culpa? Necessitatibus libero deleniti quisquam esse!
    </section>

    
    <!-- footer -->
    <div class="container-fluid bg-dark text-light ">

        <p class="text-center mb-0 pt-4 pb-4">

            contact us :- 4657827648</br>
            social :- <i class="fa-brands fa-instagram"></i> <i class="fa-brands fa-facebook"> <i
                    class="fa-brands fa-twitter"></i></i> <i class="fa-brands fa-linkedin"></i>
                    

            </br></br>Copyright 2021 | All rights resrved
        </p>
    </div>

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
