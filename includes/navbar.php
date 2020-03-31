<?php
// session_start();
include('dbcon.php');

$type = $_SESSION['type'];
$nstid = $_SESSION['id'];

?>

<header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                             <h4>Computer Science</h4>
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <?php  
                                    if($type == 'student' || $type == 'supervisor'){ 
                                        $nq = '';
                                        if($type == 'student'){
                                            $nq = mysqli_query($con, "SELECT * FROM notification WHERE student_id = '$nstid'")or die(mysqli_error($con));
                                        }else{
                                            $nq = mysqli_query($con, "SELECT * FROM notification WHERE supervisor_id = '$nstid'") or die(mysqli_error($con));
                                        }
                                        
                                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <!-- Message -->
                                            <?php 
                                                while($nqr = mysqli_fetch_array($nq)){ ?>
                                                    <a href="javascript:void(0)" class="link border-top">
                                                        <div class="d-flex no-block align-items-center p-10">
                                                            <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                            <div class="m-l-10">
                                                                <h5 class="m-b-0"><?php echo $nqr['title'] ?></h5> 
                                                                <span class="mail-desc"><?php echo $nqr['body'] ?></span> 
                                                            </div>
                                                        </div>
                                                    </a>

                                                <?php }
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php } ?>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <?php  
                                    if($type == 'student'){ ?>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                    <?php }
                                ?>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>