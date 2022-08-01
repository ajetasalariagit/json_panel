<?php require_once("header.php"); ?>
<?php
require_once('config.php');


if (isset($_GET['id'])) {
    $user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    $id = $user->_id;
    $people = $user->people;  
}

?>


<body>

    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <h1 style="color:#fff;">Dashboard</h1>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">People</h4>
                            <div class="data-tables datatable-dark">
                                <table id="dataTable3" class="text-center">
                                    <thead class="text-capitalize">
                                        <tr>

                                            <th>Name</th>
                                            <th>Din</th>
                                            <th>Designation</th>
                                            <th>Appointment date</th>
                                            <th>Capitalization</th>
                                            <th>Total directorships</th>
                                            <th>Cin</th>
                                            <th>Edit</th>
                                            <th></th>


                                        </tr>
                                    </thead>
                                    <?php 
                                    foreach($people as $people_id => $people_data){
                                        $din = $people_data['din'];
                                        
                                    ?>
                                    <tbody>
                                        <td><?php echo $people_data['name'];?></td>
                                        <td><?php echo $people_data['din'];?></td>
                                        <td><?php echo $people_data['designation'];?></td>
                                        <td><?php echo $people_data['appointment_date'];?></td>
                                        <td><?php echo $people_data['capitalization'];?></td>
                                        <td><?php echo $people_data['total_directorships'];?></td>
                                        <td><?php echo $people_data['cin'];?></td>
                                        <td><a href="people_data.php?id=<?php echo $id;?>&din=<?php echo $din; ?>"><button type="button" href="javascript:void(0)" class="btn btn-dark mb-" style="margin-right: -30px;">Edit</button></a></td>

                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- sales report area end -->
        <!-- market value area end -->
        <!-- row area start -->
    </div>

    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <?php require_once("footer.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
</body>