 <?php

include 'connect.php';
session_start();

$jobId = $_SESSION['job_id'];
$query1 = mysqli_query($conn,"SELECT * FROM job_list WHERE job_id = '$jobId'");
$row1 = mysqli_fetch_array($query1);
$id = $row1['job_id'];


$query = "SELECT * FROM apply_job WHERE job_id =$id ";
$result = mysqli_query($conn,$query);
$rowcount = mysqli_num_rows($result);

// if (isset($_GET['job_id'])) {
//    $jobId = $_GET['job_id'];
 
//    $query = "SELECT * FROM apply_job WHERE job_id = $jobId"; // Adjust the table name and columns accordingly
//    $result = mysqli_query($conn, $query);

   
//    if(!$result) {
//       die("Query failed: " . mysqli_error($conn));
//   } else {
//       $row = mysqli_fetch_assoc($result);
//   }
// }




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
   <link rel="stylesheet" href="view.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@1,200&display=swap"
      rel="stylesheet">
   <title>TechJobs</title>
</head>

<body>
   <!-- header start -->
   <header class="header">
      <div class="container">
         <div class="header-main">
            <div class="logo">
               <a href="homepage.php">TECHJobs</a>
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
                        Welcome,
                        <?php echo $_SESSION['user_name']; ?>
                        <i class="plus"></i>
                     </a>
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
      <h1 class="heading">job name</h1>
      <h2 class="headinga">view applicants and their informations</h2>
      <div class="view-table">
         <table>
 
            <thead>
               <tr>
                  <th>SN</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>CV</th>
               </tr>
            </thead>
             <tbody>
               
             <?php
                     //   if(mysqli_num_rows($result)>0){
                     //     while($row = mysqli_fetch_assoc($result)){
                           
                     for($i=1; $i<=$rowcount; $i++){
                       $row = mysqli_fetch_array($result);
                      ?> 
               <tr>
                  <td> <?php echo $row['company_name']; ?></td>
                  <td> <?php echo $row['name']; ?></td>
                  <td> <?php echo $row['email']; ?></td>
                  <td><a href="">[Link to CV #1]</a></td>
               </tr>
               <tr>
                  <td>2</td>
                  <td>alex</td>
                  <td>jane.smith@example.com</td>
                  <td>[Link to CV #2]</td>
               </tr>
               <?php
                     }
                     ?>
            </tbody>
         
         </table>
      </div>
   </div>

   <!--footer section start-->
   <footer>
      <div class="footer-col">
         <h1>Tech<span>Jobs</span></h1>
         <!-- <p>Get job easily</p> -->
      </div>

      <div class="footer-col">
         <h4>For Jobseeker</h4>
         <ul>
            <li><a href="/login/login.html">Register</a></li>
            <li><a href="#">Search Jobs</a></li>
            <li><a href="/login/login.html">Login</a></li>
            <li><a href="#">FAQ</a></li>
         </ul>
      </div>

      <div class="footer-col">
         <h4>For Employer</h4>
         <ul>
            <li><a href="/login/login.html">Register</a></li>
            <li><a href="#">Post a Job</a></li>
            <li><a href="/login/login.html">Login</a></li>
            <li><a href="#">FAQ</a></li>
         </ul>
      </div>

      <div class="footer-col">
         <h4>About Us</h4>
         <ul>
            <li><a href="/aboutus/aboutus.html">About TechJob</a></li>
            <li><a href="#">Life at TechJob</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">FAQs</a></li>
         </ul>
      </div>

      <div class="footer-col">
         <h4>Follow us</h4>
         <div class="links">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
         </div>
      </div>
   </footer>
   <!---footer section ends-->
</body>

</html>