<?php 
include 'connection.php';
error_reporting(0);
$id3=$_GET['id'];
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Product Details</title>
    <!-- This page plugin CSS -->
    <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    
</head>

<body>
    
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

<header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                  
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                
                <div class="navbar-collapse collapse" id="navbarSupportedContent mr-auto">
                   
                    <ul class="navbar-nav float-right">
                       
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                       
                        <li class="nav-item dropdown ml-10">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">Bikash</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                               
                               
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="#" class="btn btn-sm btn-info">View
                                        Website</a></div>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </header>
        <!-- nav start -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="dashboard.php"
                                aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Product Manager</span></li>

                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="productadd.php"
                                aria-expanded="false"><i class="fas fa-plus"></i><span
                                    class="hide-menu">Product Add</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="pro_list.php"
                                aria-expanded="false"><i class="fab fa-product-hunt"></i><span
                                    class="hide-menu">Product List</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="productcategory.php"
                                aria-expanded="false"><i class="fas fa-boxes"></i><span
                                    class="hide-menu">Product Category</span></a></li>
                                     <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="brand.php"
                                aria-expanded="false"><i class="fas fa-bold"></i><span
                                    class="hide-menu">Brand</span></a></li>
                                     
                        
                                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="offer.php"
                                aria-expanded="false"><i class="fas fa-plus"></i><span
                                    class="hide-menu">Add Offer</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="view_offer.php"
                                aria-expanded="false"><i class="fas fa-eye"></i><span
                                    class="hide-menu">View_Offer</span></a></li>
                                     

                        <li class="list-divider"></li>
                      
                        
                        <li class="nav-small-cap"><span class="hide-menu">Order Manager</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="orders.php"
                                aria-expanded="false"><i class="fas fa-shopping-cart"></i><span
                                    class="hide-menu">Orders
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="completeorder.php" aria-expanded="false"><i class="fas fa-check-circle"></i><span class="hide-menu">Complete Orders
                                </span></a>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="dispatch.php" aria-expanded="false"><i class="fas fa-truck"></i><span class="hide-menu">Out Of Delivery Order
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="deliveryboyassign.php" aria-expanded="false"><i class="fas fa-male"></i><span class="hide-menu">Delivery Boy
                                </span></a>
                        </li>

                        
<li class="list-divider"></li>
                      
                        
                        <li class="nav-small-cap"><span class="hide-menu">Delivery Manager</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="add_dboy.php"
                                aria-expanded="false"><i class="fas fa-user-plus"></i><span
                                    class="hide-menu">Add Delivery Boy
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="viewdboy.php" aria-expanded="false"><i class="fas fa-eye"></i><span class="hide-menu">View Delivery Boy
                                </span></a>
                        </li>
                         
                        
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Contact</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="contact.php" aria-expanded="false"><i class="fas fa-phone-square-alt"></i><span class="hide-menu">Contact Details
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="logout.php"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">Logout</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- nav end -->
       
        <div class="page-wrapper">
           
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Complete Order</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
           
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List</h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Total Amount</th>
                                                <th>Delivery Boy</th>
                                                <th>Order Status</th>
                                                <th class="text-center" style="width:240px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php

                                                $sqlfetch = "SELECT * FROM order_master where order_status='Delivered' order by id desc";

                                                $sqlfetch = mysqli_query($conn,$sqlfetch);

                                                $i = 1;

                                                while ($row = mysqli_fetch_array($sqlfetch))
                                                {
                                                    $id=$row['id'];
                                                    $sqlfetch1 = "SELECT * FROM dboy where id='$row[deliveryboy]'";
                                                    $sqlfetch1 = mysqli_query($conn,$sqlfetch1);
                                                    $row1 = mysqli_fetch_array($sqlfetch1);
                                                    
                                                    $uid=$row['user_id'];
                                                    $sqlfetch11 = "SELECT * FROM user_login where id='$row[user_id]'";
                                                    $sqlfetch1 = mysqli_query($conn,$sqlfetch11);
                                                    $row13 = mysqli_fetch_assoc($sqlfetch1);

                                            ?>
                                            <tr>
                                                <td><?php echo $row['order_id']; ?></td>
                                                <td><?php echo $row13['name']; ?>/<?php echo $row13['phone']; ?></td>
                                                <td><?php echo $row13['city']; ?>/<?php echo $row13['pin']; ?></td>
                                                <td>₹ <?php echo round($row['totalprice']); ?>.00</td>
                                                <td><?php echo $row1['name']; ?></td>
                                                <td><h3>Delivered</h3></td>
                                                 
                 
                                                     <td>
                                                    <a href="order_detail.php?id=<?php print $row['id']; ?>" class="btn btn-danger" style="color:white;">View</a> 
                                                       
                                                        
                                                    </td>
                                            </tr>
                                       <?php 

                                            $i++;

                                            } ?> 

                                            
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
           <footer class="footer text-center text-muted">
                All Rights Reserved by Bikash. Designed and Developed by <a
                    href="">Bikash</a>.
            </footer>
           
        </div>
        
    </div>
    
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>