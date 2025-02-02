<?php
include 'connect.php';

session_start();

 $user = $_SESSION['user_name'];
  $query1 = mysqli_query($conn,"SELECT * FROM registered_datas WHERE username = '$user'");
 $row1 = mysqli_fetch_array($query1);
 $id = $row1['user_id'];

 
 $query = "SELECT * FROM job_list WHERE user_id =$id ";
 $result = mysqli_query($conn,$query);
 $rowcount = mysqli_num_rows($result);
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/
    fontawesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="homepage.css">
    <title>TechJobs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@1,200&display=swap" rel="stylesheet">
    <style>
        h2{
            color:#662d91;
            text-align:center;
        }
    </style>
</head>

<body>
  <!-- header start -->
  <header class="header">
    <div class="container">
       <div class="header-main">
          <div class="logo">
             <a href="admin.php">TechJobs</a>
          </div>
          <div class="open-nav-menu">
             <span></span>
          </div>
          <div class="menu-overlay">
          </div>
          <!-- navigation menu start -->
          <nav class="nav-menu">
            <div class="close-nav-menu">
               <img src="img/close.svg" alt="close">
            </div>
            <ul class="menu">
               <li class="menu-item menu-item-has-children">
                              <a href="admin.php">Home</a>
               </li>
               <li class="menu-item">
                  <a href="aboutus/aboutus.html">About</a>
               </li>
               <li class="menu-item menu-item-has-children">
                  <a href="#" data-toggle="sub-menu">Jobs <i class="plus"></i></a>
                  <ul class="sub-menu">
                      <li class="menu-item"><a href="joblist.php">View Jobs</a></li>
                      <li class="menu-item"><a href="postjob.php">Post Jobs</a></li>
                  </ul>
               </li>
               <li class="menu-item">
                  <a href="#">News</a>
               </li>
               <li class="menu-item menu-item-has-children">
               <a href="#" data-toggle="sub-menu">
                     Welcome, <?php echo $_SESSION['user_name']; ?>
                     <i class="plus"></i></a>
                  <ul class="sub-menu">
                      <li class="menu-item"><a href="logout.php">Logout</a></li>
                      <li class="menu-item"><a href="profile.php">Profile</a></li>
                  </ul>
               </li>
            </ul>
          </nav>
          <!-- navigation menu end -->
       </div>
    </div>
 </header>
 <script src="homepage.js"></script>
  <!-- header end -->
  <div class="mainbody">
            <!--update/delete start-->
            <div class="browser">
               
               <h1 class="heading" style="margin-top: -150px;" >jobs 
                   <a href="postjob.php" class="btn float-end">Add Job</a>
               </h1>
                <div class="browser-container">
 
                      <?php
                        if(isset($_SESSION['status']))
                        {
                            ?>
                                <div class="alert" style=" font-size: 20px; color: #662d91; ">
                                  <strong >  <?= $_SESSION['status']; ?> </strong>
                                </div>
                            <?php 
                            unset($_SESSION['status']);
                        }
                          
                     for($i=1; $i<=$rowcount; $i++){
                       $row = mysqli_fetch_array($result);
                  ?> 
           
                      <div class="box">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                             <img class ="img-fluid border rounded" img src= "image/<?php echo $row['company_logo']; ?>"alt="img" style="width: 80px; height: 80px;">
                             <div class="text-start ps-4">
                                 <h3><?php echo $row['job_name']; ?></h3>
                                 <span class="text-truncate me-3"><a><i class="fa fa-briefcase"></i></a>  <?php echo $row['company_name']; ?></span>
                                 <span class="text-truncate me-3"><a><i class="fa fa-map-marker-alt"></i></a><?php echo $row['company_address']; ?></span>
                             </div>
                               <!-- <a href="view.php?job_id=<?php echo $row['job_id']; ?>" class="button0">View</a> -->
                               <a href = "" class="button0" >View</a>
                               <a href="update.php?job_id=<?php echo $row['job_id']; ?>" class="button1">Update</a>
                               <a href="delete.php?deleteId=<?php echo $row['job_id']; ?>" class="button2">Delete</a>   
                        </div>
                      </div>
                      <?php
                         }
                         
                        
                      ?>
                </div>
                 <!-- <a href="joblist.php" class="btn">Browse more jobs</a> -->
             </div>
           </div>
            <!--update/delete endss-->

