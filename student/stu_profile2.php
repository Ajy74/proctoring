
<?php 
  include 'dbconnect.php';


    if($_SERVER["REQUEST_METHOD"]=="POST"){
     
      $sql=" ";
      

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
    <link rel="stylesheet" type="text/css" href="/proctoring/css/notice.css" />
    <link rel="stylesheet" type="text/css" href="/proctoring/fontawesome/css/all.css">
    <!-- <link rel="stylesheet" type="text/css" href="css_page/login.css" /> -->
    
    <title>Profile-2</title>
    
</head>

<body class="background text-dark">

    <div class="container-fluid">

        <div class="container my-5 ">
          <div class=" card text-dark"  style="display:block;">
            <legend align="center"><b>OTHER DETAILS</b></legend>
            <fieldset class="ps-4 pe-4 pt-4 pb-4">
                <form class="row g-3" action="/proctoring/student/stu_profile2.php" method="post">
                    <div class="col-md-4">
                      <label for="state" class="form-label"><b>State</b></label>
                      <input type="text" class="form-control" id="state" name="state">
                    </div>
                    <div class="col-md-4">
                        <label for="hoby" class="form-label"><b>Hobbies</b></label>
                        <input type="text" maxlength="50" class="form-control" id="hoby" name="hoby">
                    </div>
                    <div class="col-md-4">
                        <label for="tenth" class="form-label"><b>10th percentage</b></label>
                        <input type="text" maxlength="4" class="form-control" id="tenth" name="tenth">
                    </div>
                    <div class="col-md-4">
                        <label for="twlth" class="form-label"><b>12th percentage</b></label>
                        <input type="text" maxlength="4" class="form-control" id="twlth" name="twlth">
                    </div>
                 
                    <!-- <div class="col-md-4">
                      <label for="inputState" class="form-label">State</label>
                      <select id="inputState" class="form-select form-control" name="inputState" >
                        <option selected>Choose...</option>
                        <option>BIHAR</option>
                        <option>ODISHA</option>
                        <option>JHARKHAND</option>
                        <option>ASSAM</option>
                      </select>
                    </div> -->
                   
                    <div class="col-12 text-center ">
                      <button type="submit" class="btn btnNext"  name="btnNext" id="btnNext" style="border: 2px rgb(199, 38, 194) solid ;background-color: purple ;color: white; box-shadow: 2px 6px 18px rgba(66,57,238,0.2);">SUBMIT <i class="fa-solid fa-arrow-up"></i></button>
                    </div>
                    
                  </form>
    
            </fieldset>
           </div>
        </div>
      
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