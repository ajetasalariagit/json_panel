<?php require_once("header.php"); ?>
<?php
require_once('config.php');

if (isset($_GET['id'])) {
    $user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    $id = $user->_id;
    $linkedin_url = $user->linkedin_url ?? "";
    $fb_url = $user->fb_url ?? "";
    $youtube_url = $user->youtube_url ?? "";
    $twitter_url = $user->twitter_url ?? "";
    $instagram_url = $user->instagram_url ?? "";
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
    $data = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($_POST['id'])],
        ['$set' => ['company_name' => $_POST['company_name'], 'company_type' => $_POST['company_type'], 'company_incorp_date' => $_POST['company_incorp_date'],'company_paid_capital' => $_POST['company_paid_capital'],'company_cin' => $_POST['company_cin'],'company_roc' => $_POST['company_roc'],'company_registration_number' => $_POST['company_registration_number'],'company_auth_capital' => $_POST['company_auth_capital'],'company_address' => $_POST['company_address'],'company_city' => $_POST['company_city'],'company_state' => $_POST['company_state'],'company_pin' => $_POST['company_pin'],'company_tan' => $_POST['company_tan'],'company_tin' => $_POST['company_tin'],'company_email' => $_POST['company_email'],'company_website' => $_POST['company_website'],'company_service_tax' => $_POST['company_service_tax'],'company_industry_division' => $_POST['company_industry_division'],'company_industry_group' => $_POST['company_industry_group'],'company_industry_class' => $_POST['company_industry_class'],'company_industry_subclass' => $_POST['company_industry_subclass'],'linkedin_url' => $_POST['linkedin_url'],'fb_url' => $_POST['fb_url'],'twitter_url' => $_POST['twitter_url'],'youtube_url' => $_POST['youtube_url'],'instagram_url' => $_POST['instagram_url']]]
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

                            <h2>Company</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id ?? $_POST['id']; ?>">
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $user->company_name ?? $_POST['company_name']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="industry">Industry</label>
                                    <input type="text" class="form-control" id="industry" name="industry" value="<?php echo $user->company_name ?? $_POST['company_name']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_type">Comapny Type</label>
                                    <input type="text" class="form-control" id="company_type" name="company_type" value="<?php echo $user->company_type ?? $_POST['company_type']; ?>">
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_incorp_date">Company Date</label>
                                    <input type="text" class="form-control" id="company_incorp_date" name="company_incorp_date" value="<?php echo $user->company_incorp_date ?? $_POST['company_incorp_date']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_paid_capital">Paid</label>
                                    <input type="text" class="form-control" id="company_paid_capital" name="company_paid_capital" value="<?php echo $user->company_paid_capital ?? $_POST['company_paid_capital']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_cin">Company Cin</label>
                                    <input type="text" class="form-control" id="company_cin" name="company_cin" value="<?php echo $user->company_cin ?? $_POST['company_cin']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_roc">Company Roc</label>
                                    <input type="text" class="form-control" id="company_roc" name="company_roc" value="<?php echo $user->company_roc ?? $_POST['company_roc']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_registration_number">Company Registration Number</label>
                                    <input type="text" class="form-control" id="company_registration_number" name="company_registration_number" value="<?php echo $user->company_registration_number ?? $_POST['company_registration_number']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_auth_capital">Company Auth Capital</label>
                                    <input type="text" class="form-control" id="company_auth_capital" name="company_auth_capital" value="<?php echo $user->company_auth_capital ?? $_POST['company_auth_capital']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_address">Company Address</label>
                                    <input type="text" class="form-control" id="company_address" name="company_address" value="<?php echo $user->company_address ?? $_POST['company_address']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_city">Company City</label>
                                    <input type="text" class="form-control" id="company_city" name="company_city" value="<?php echo $user->company_city ?? $_POST['company_city']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_state">Company State</label>
                                    <input type="text" class="form-control" id="company_state" name="company_state" value="<?php echo $user->company_state ?? $_POST['company_state']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_pin">Company Pin</label>
                                    <input type="text" class="form-control" id="company_pin" name="company_pin" value="<?php echo $user->company_pin ?? $_POST['company_pin']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_email">Company Email</label>
                                    <input type="text" class="form-control" id="company_email" name="company_email" value="<?php echo $user->company_email ?? $_POST['company_email']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_website">Company Website</label>
                                    <input type="text" class="form-control" id="company_website" name="company_website" value="<?php echo $user->company_website ?? $_POST['company_website']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="companycompany_pan_paid_capital">Company Pan</label>
                                    <input type="text" class="form-control" id="company_pan" name="company_pan" value="<?php echo $user->company_pan ?? $_POST['company_pan']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_tan">Company Tan</label>
                                    <input type="text" class="form-control" id="company_tan" name="company_tan" value="<?php echo  $user->company_tan ?? $_POST['company_tan']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_tin">Company Tin</label>
                                    <input type="text" class="form-control" id="company_tin" name="company_tin" value="<?php echo $user->company_tin ?? $_POST['company_tin']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_service_tax">Company service tax</label>
                                    <input type="text" class="form-control" id="company_service_tax" name="company_service_tax" value="<?php echo $user->company_service_tax ?? $_POST['company_service_tax']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_industry_division">Company industry division</label>
                                    <input type="text" class="form-control" id="company_industry_division" name="company_industry_division" value="<?php echo $user->company_industry_division ?? $_POST['company_industry_division']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_industry_group">Company industry group</label>
                                    <input type="text" class="form-control" id="company_industry_group" name="company_industry_group" value="<?php echo $user->company_industry_group ?? $_POST['company_industry_group']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_industry_class">Company industry class</label>
                                    <input type="text" class="form-control" id="company_industry_class" name="company_industry_class" value="<?php echo $user->company_industry_class ?? $_POST['company_industry_class']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_industry_subclass">Company Industry subclass</label>
                                    <input type="text" class="form-control" id="company_industry_class" name="company_industry_subclass" value="<?php echo $user->company_industry_subclass ?? $_POST['company_industry_subclass']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="linkedin_url">LinkedIn url</label>
                                    <input type="text" class="form-control" id="linkedin_url" name="linkedin_url" value="<?php echo $linkedin_url ?? $_POST['linkedin_url']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="fb_url">Facebook url</label>
                                    <input type="text" class="form-control" id="fb_url" name="fb_url" value="<?php echo $fb_url ?? $_POST['fb_url']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="twitter_url">Twitter url</label>
                                    <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="<?php echo $twitter_url ?? $_POST['twitter_url']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="youtube_url">Youtube url</label>
                                    <input type="text" class="form-control" id="youtube_url" name="youtube_url" value="<?php echo $youtube_url ?? $_POST['youtube_url']; ?>" >
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="instagram_url">Instagram url</label>
                                    <input type="text" class="form-control" id="instagram_url" name="instagram_url" value="<?php echo $instagram_url ?? $_POST['instagram_url']; ?>" >
                                </div>
                                <button type="submit" class="btn btn-dark mb-">Update</button>
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