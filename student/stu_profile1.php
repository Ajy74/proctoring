
<?php 

session_start();
$username=$_SESSION['username'];


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
    
    <title>Profile-1</title>
    
</head>

<body class="background text-dark">

    <div class="container-fluid">
     

        <div class="container my-5 ">
          <div class=" card text-dark"  style="display:block;">
            <legend align="center"><b>PERSONAL DETAILS</b></legend>
            <fieldset class="ps-4 pe-4 pt-4 pb-4">
                <form class="row g-3" action="/proctoring/student/stu_profile2.php?name=<?php echo $username?>"
                                method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <label for="studentname" class="form-label"><b>Name</b></label>
                      <input type="text" class="form-control" id="studentname" name="studentname"
                        placeholder="Enter your Name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="img" class="form-label"><b>Passport Size Photo</b></label>
                        <input type="file" class="form-control" id="img" name="img" accept="image/*" required>
                    </div>
                    <div class="col-md-4">
                        <label for="dob" class="form-label"><b>DOB</b></label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="col-md-4">
                        <label for="branch" class="form-label"><b>Branch</b></label>
                        <input type="text" class="form-control" id="branch" name="branch" required>
                    </div>
                    <div class="col-md-4">
                        <label for="grp" class="form-label"><b>Group</b></label>
                        <input type="number" maxlength="1"  class="form-control" id="grp" name="grp" required>
                    </div>
                    <div class="col-md-4">
                        <label for="sem" class="form-label"><b>Semester</b></label>
                        <input type="number" maxlength="1"  class="form-control" id="sem" name="sem" required>
                      </div>
                    <div class="col-md-4">
                        <label for="roll" class="form-label"><b>Roll Number</b></label>
                        <input type="number" maxlength="10"   class="form-control" id="roll" name="roll" required>
                    </div>
                    <div class="col-md-4">
                        <label for="registration" class="form-label"><b>Registration Number</b></label>
                        <input type="number" maxlength="15"   class="form-control" id="registration" name="registration" required>
                    </div>
                    <div class="col-md-2">
                      <label for="registration" class="form-label"><b>Hosteler(Y/N)</b></label>
                      <input type="text" maxlength="1"   class="form-control" id="hostel" name="hostel" >
                    </div>
                    <div class="col-md-2">
                      <label for="registration" class="form-label"><b>Day-Scholar(Y/N)</b></label>
                      <input type="text" maxlength="1"   class="form-control" id="hostel" name="hostel" >
                    </div>
                    <div class="col-md-4">
                      <label for="blood" class="form-label"><b>Blood Group</b></label>
                      <input type="text" class="form-control" id="blood" name="blood" required>
                  </div>
                    <div class="col-md-4">
                      <label for="father" class="form-label"><b>Father's Name</b></label>
                      <input type="text" class="form-control" id="father" name="father" required>
                    </div>
                    <div class="col-md-4">
                        <label for="mother" class="form-label"><b>Mother's Name</b></label>
                        <input type="text" class="form-control" id="mother" name="mother" required>
                    </div>
                    <div class="col-md-4">
                      <label for="parentphone" class="form-label"><b>Parent contact</b></label>
                      <input type="number" class="form-control" id="parentphone" name="parentphone" required>
                    </div>
                    <div class="col-md-4">
                      <label for="studphone" class="form-label"><b>Contact No.</b></label>
                      <input type="number" maxlength="10" class="form-control" id="studphone" name="studphone" required>
                    </div>
                   
                    <div class="col-md-4">
                      <label for="emrphone" class="form-label"><b>Emergency contact</b></label>
                      <input type="number" class="form-control" id="emrphone" name="emrphone" >
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
                      <button type="submit" class="btn btnNext"  name="btnNext" id="btnNext" style="border: 2px rgb(199, 38, 194) solid ;background-color: purple ;color: white; box-shadow: 2px 6px 18px rgba(66,57,238,0.2);">NEXT <i class="fa-solid fa-arrow-right"></i></button>
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