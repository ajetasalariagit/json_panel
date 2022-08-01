<?php require_once("header.php"); ?>
<?php
session_start();
require_once('config.php');

if (isset($_GET['id']) && $_GET['id'] != " "  && isset($_GET['din']) && $_GET['din'] != " ") {

    $user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    $current_data = $user['people'];
    $array = json_decode(json_encode($current_data, true), true);
    $din = $_GET['din'];

    function multi_array_search($din, $array)
    {
        foreach ($array as $key => $value) {
            if ($value['din'] === $din)
                return $key;
        }
        return false;
    }
    $result  = multi_array_search($din, $array);
    $current_data = $user['people'][$result];
}

if (isset($_POST['update_people'])) {
    $id = $_POST['id'];
    $people_index = $_POST['people_index'];

    unset($_POST['id']);
    unset($_POST['people_index']);
    unset($_POST['update_people']);

    $user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
    $date = date('y-m-d h:i:s');
    $user['people'][$people_index] = ['name' => $_POST['name'], 'din' => $_POST['din'], 'designation' => $_POST['designation'], 'appointment_date' => $_POST['appointment_date'], 'capitalization' => $_POST['capitalization'], 'total_directorships' => $_POST['total_directorships'], 'cin' => $_POST['cin'], 'linkedin_url_people' => $_POST['linkedin_url_people'], 'facebook_url_people' => $_POST['facebook_url_people'], 'phone_number' => $_POST['phone_number'], 'email' => $_POST['email'], 'updated' => $date];


    //echo"<pre>"; print_r($user);die;

    $update = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($id)],
        ['$set' => $user]
    );

    $_SESSION['index'] = "<div class='alert alert-success' role='alert'> Data updated successfully </div>";
    header("Location: index.php");
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
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <button type="button" class="btn btn-dark mb-" onclick="history.back();" style="margin-left:90%;margin-bottom:20px;">Back</button>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">

                            <h2>People</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <input type="hidden" name="people_index" value="<?php echo $result; ?>">
                                <div class="form-group mb-3 mt-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $current_data['name'] ?? $_POST['name']; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="din">Din</label>
                                    <input type="text" class="form-control" id="din" name="din" value="<?php echo $current_data['din'] ??  $_POST['din']; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $current_data['designation'] ??  $_POST['designation']; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="appointment_date">Appointment date</label>
                                    <input type="text" class="form-control" id="appointment_date" name="appointment_date" value="<?php echo $current_data['appointment_date'] ??  $_POST['appointment_date']; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="capitalization">Capitalization</label>
                                    <input type="text" class="form-control" id="capitalization" name="capitalization" value="<?php echo $current_data['capitalization'] ??  $_POST['capitalization']; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="total_directorships">Total Directorships</label>
                                    <input type="text" class="form-control" id="total_directorships" name="total_directorships" value="<?php echo $current_data['total_directorships'] ??  $_POST['total_directorships']; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="cin">Cin</label>
                                    <input type="text" class="form-control" id="cin" name="cin" value="<?php echo $current_data['cin'] ??  $_POST['cin']; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="linkedin_url_people">LinkedIn Url</label>
                                    <input type="text" class="form-control" id="linkedin_url_people" name="linkedin_url_people" value="<?php echo  $_POST['linkedin_url_people'] ?? ""; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="facebook_url">Facebook Url</label>
                                    <input type="text" class="form-control" id="facebook_url" name="facebook_url_people" value="<?php echo  $_POST['facebook_url_people'] ?? ""; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo  $_POST['phone_number'] ?? ""; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo  $_POST['email'] ?? ""; ?>">
                                </div>

                                <button type="submit" name="update_people" class="btn btn-dark mb-">Update</button>
                            </form>
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
