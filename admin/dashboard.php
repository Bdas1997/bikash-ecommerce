<?php 

session_start();

 include "include/header.php";
 include "include/nav.php";
if(!isset($_SESSION['email'])){
  echo "you are logged out";
  header('location:index.php');
}
?>
    
        <div class="page-wrapper">
           
            <div class="page-breadcrumb">
                <div class="row">
                  
                    <h1 class=" fw-600 display-4">
                        <span class="js-greeting">Hello Admin</span>!
                    </h1>
             
                </div>
                

            </div>
           
        </div>
        
   
   
    <?php include "include/footer.php";
        include "include/js.php";
       ?>  
<script src="include/dashboard.js" type="text/javascript"></script>