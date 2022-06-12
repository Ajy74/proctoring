<?php 

        include 'dbconnect.php';

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
    <link rel="stylesheet" type="text/css" href="/proctoring/css/showStudent.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>

    <title>Students_Details</title>
</head>

<body class="background text-dark" onload="delete()" >

    <div class="container-fluid">

    <div class="container my-4 ">
    <h1 class="text-primary text-center my-4 font" style=" font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><b>List Of Students</b></h1>
    <hr class="text-primary">

    
    <table class="table table-striped " id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Name</th>
          <th scope="col">Branch</th>
          <th scope="col">Roll No</th>
          <th class="mx-3" scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
      <?php 
              $sql ="SELECT * FROM `student_detail` ";
              $result = mysqli_query($con,$sql);
                $present=0;
              $sno=0;
              while($row = mysqli_fetch_assoc($result)){
                $present=1;
                $userno=$row['userno'];
                $sno=$sno+1;
                echo  "<tr>
                            <th scope='row'>".$sno."</th>
                            <td>".$row['name']."</td>
                            <td>".$row['branch']."</td>
                            <td>".$row['roll']."</td>
                            <td><a   class='text-decoration-none' href='/proctoring/student/stu_MainProfile.php?userno=".$userno."'  target='_blank'> <button id='$sno'>View</button> </a>
                            <a  class='text-decoration-none' href='/proctoring/admin/showStudent.php?del=true&delete=".$userno."'> <button  class='delete mx-2 ' id='$userno' type='button'>Delete</button> </a>  </td>
                    </tr>";
                   
              }

              $check=$_GET['del'];

              if($check=='true'){
               
                $usern=$_GET['delete'];

                $sql = " DELETE FROM `student_detail` WHERE `student_detail`.`userno` = $usern";
                $result=mysqli_query($con,$sql);

                $sql = "DELETE FROM `studentcred` WHERE `studentcred`.`sno` = $usern";
                $result=mysqli_query($con,$sql);
               

                 header("Refresh:0; url=/proctoring/admin/showStudent.php?del=false&delete=false");

              }

              if($present==0){
                echo '<div class="col-md-10 my-2 mb-2 mx-auto">
                <div class="  text-dark bg-light  mb-3">
                    <div class=" mx-auto card-header text-center">Profile not Created By Students <div>
                    <div class="card-body">
                    <h5 class="card-title"></h5>
                    </div>
                </div>
            </div>';
            }
              

    ?>
    </tbody>
    </table>
  
    </div>
    <hr>
    

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
<script>

// function deleteFunction(){

//     id = document.getElementById("delete");
  

//     console.log(sno);

// }

</script>

</body>

</html>
