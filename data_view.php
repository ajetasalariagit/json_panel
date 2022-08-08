<?php require_once("header.php"); ?>
<?php
error_reporting(0);
require_once('config.php');

if (isset($_GET['id'])) {
    $user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   
    $company_scpecs = json_decode(json_encode($user->company_specks), true);
    $user_specs = implode(",",$company_scpecs);
    //echo"<pre>"; print_r($user_specs); die;
    $id = $user->_id;
    $linkedin_url = $user->linkedin_url ?? "";
    $fb_url = $user->fb_url ?? "";
    $youtube_url = $user->youtube_url ?? "";
    $twitter_url = $user->twitter_url ?? "";
    $instagram_url = $user->instagram_url ?? "";
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $company_specks = $_POST['company_specks'];
    $data = explode(" ",$company_specks);


    $data = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($_POST['id'])],
        ['$set' => ['company_email' => $_POST['company_email'],'company_website' => $_POST['company_website'],'linkedin_url' => $_POST['linkedin_url'],'fb_url' => $_POST['fb_url'],'twitter_url' => $_POST['twitter_url'],'youtube_url' => $_POST['youtube_url'],'instagram_url' => $_POST['instagram_url'],'company_specks' => $data,'companycsize' =>  $_POST['companycsize'],'industry' => $_POST['industry']]]
      );
      $_SESSION['index'] = "<div class='alert alert-success' role='alert'> Data updated successfully </div>";
      header("Location: index.php");
    }
  

?>
<style>
    .insustry_cls{
        width: 475px;
    height: 33px;
    border: 1px solid rgba(170, 170, 170, .3);
}
.indus_lab{
    width: 20px;
}
    
</style>

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

                            <h2><?php echo $user->company_name ?? $_POST['company_name']; ?></h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id ?? $_POST['id']; ?>">
                                <div class="form-group mb-3 mt-3 indus_lab">
                                <label   for="industry">Industry</label>
                                <select class="insustry_cls" name="industry" id="industry">
                                <option class="insustry_cls" value="farming">farming</option>
                                <option class="insustry_cls" value="consumer_goods">consumer goods</option>
                                <option class="insustry_cls" value="paper_forest_products">paper & forest products</option>
                                <option class="insustry_cls" value="fishery">fishery</option>
                                <option class="insustry_cls" value="maritime">maritime</option>
                                <option class="insustry_cls" value="mining_metals">mining & metals</option>
                                <option class="insustry_cls" value="oil_energy">oil & energy</option>
                                <option class="insustry_cls" value="building_materials">building materials</option>
                                <option class="insustry_cls"  value="food_production">food production</option>
                                <option class="insustry_cls" value="food_beverages">food & beverages</option>
                                <option class="insustry_cls" value="wine_and_spirits">wine and spirits</option>
                                <option class="insustry_cls"  value="tobacco">tobacco</option>
                                <option class="insustry_cls" value="textiles">textiles</option>
                                <option class="insustry_cls" value="plastics">plastics</option>
                                <option class="insustry_cls" value="apparel_fashion">apparel & fashion</option>
                                <option class="insustry_cls" value="railroad manufacture">railroad manufacture</option>
                                <option class="insustry_cls" value="printing">printing</option>
                                <option class="insustry_cls" value="computer_hardware">computer hardware</option>
                                <option class="insustry_cls" value="arts_and_crafts">arts and crafts</option>
                                <option class="insustry_cls" value="media_production">media production</option>
                                <option class="insustry_cls" value="publishing">publishing</option>
                                <option class="insustry_cls" value="newspapers">newspapers</option>
                                <option class="insustry_cls" value="chemicals">chemicals</option>
                                <option class="insustry_cls" value="glass_ceramics_concrete">glass, ceramics & concrete</option>
                                <option class="insustry_cls" value="pharmaceuticals">pharmaceuticals</option>
                                <option class="insustry_cls" value="veterinary">veterinary</option>
                                <option class="insustry_cls" value="cosmetics">cosmetics</option>
                                <option class="insustry_cls" value="medical_devices">medical devices</option>
                                <option class="insustry_cls" value="automotive">automotive</option>
                                <option class="insustry_cls" value="airlines/aviation">airlines/aviation</option>
                                <option class="insustry_cls" value="mechanical_or_industrial_engineering">mechanical or industrial engineering</option>
                                <option class="insustry_cls" value="industrial_automation">industrial automation</option>
                                <option class="insustry_cls" value="luxury_goods_jewelry">luxury goods & jewelry</option>
                                <option class="insustry_cls" value="packaging and containers">packaging and containers</option>
                                <option class="insustry_cls" value="machinery">machinery</option>
                                <option class="insustry_cls" value="business_supplies_and_equipment">business supplies and equipment</option>
                                <option class="insustry_cls" value="electrical/electronic_manufacturing">electrical/electronic manufacturing</option>
                                <option class="insustry_cls" value="consumer electronics">consumer electronics</option>
                                <option class="insustry_cls" value="renewables & environment">renewables & environment</option>
                                <option class="insustry_cls" value="business_supplies_and_equipment">business supplies and equipment</option>
                                <option class="insustry_cls" value="accounting">accounting</option>
                                <option class="insustry_cls" value="semiconductors">semiconductors</option>
                                <option class="insustry_cls" class="insustry_cls" value="broadcast_media">broadcast media</option>
                                <option class="insustry_cls" value="utilities">utilities</option>
                                <option class="insustry_cls" value="shipbuilding">shipbuilding</option>
                                <option class="insustry_cls" value="construction">construction</option>
                                <option class="insustry_cls" value="furniture">furniture</option>
                                <option class="insustry_cls" value="music">music</option>
                                <option class="insustry_cls" value="sporting_goods">sporting goods</option>
                                <option class="insustry_cls" value="civil_engineering">civil engineering</option>
                                <option class="insustry_cls" value="wholesale">wholesale</option>
                                <option class="insustry_cls" value="retail">retail</option>
                                <option class="insustry_cls" value="computer_software">computer software</option>
                                <option class="insustry_cls" value="internet">internet</option>
                                <option class="insustry_cls" value="restaurants">restaurants</option>
                                <option class="insustry_cls" value="hospitality">hospitality</option>
                                <option class="insustry_cls" value="religious_institutions">religious institutions</option>
                                <option class="insustry_cls" value="higher_education">higher education</option>
                                <option class="insustry_cls" value="professional_services">professional services</option>
                                <option class="insustry_cls" value="transportation/trucking/railroad">transportation/trucking/railroad</option>
                                <option class="insustry_cls" value="consumer_services">consumer services</option>
                                <option class="insustry_cls" value="package/freight delivery">package/freight delivery</option>
                                <option class="insustry_cls" value="leisure_travel_tourism">leisure, travel & tourism</option>
                                <option class="insustry_cls" value="warehousing">warehousing</option>
                                <option class="insustry_cls" value="financial_services">financial services</option>
                                <option class="insustry_cls" value="banking">banking</option>
                                <option class="insustry_cls" value="insurance">insurance</option>
                                <option class="insustry_cls" value="real_estate">real estate</option>
                                <option class="insustry_cls" value="commercial_real_estate">commercial real estate</option>
                                <option class="insustry_cls" value="information_technology_and_services">information technology and services</option>
                                <option class="insustry_cls" value="computer_games">computer games</option>
                                <option class="insustry_cls" value="mobile_games">mobile games</option>
                                <option class="insustry_cls" value="writing_and_editing">writing and editing</option>
                                <option class="insustry_cls" value="graphic_design">graphic design</option>
                                <option class="insustry_cls" value="information_services">information services</option>
                                <option class="insustry_cls" value="research">research</option>
                                <option class="insustry_cls" value="management_consulting">management consulting</option>
                                <option class="insustry_cls" value="legal services">legal services</option>
                                <option class="insustry_cls" value="architecture_planning">architecture & planning</option>
                                <option class="insustry_cls" value="staffing_and_recruiting">staffing and recruiting</option>
                                <option class="insustry_cls" value="security_and_investigations">security and investigations</option>
                                <option class="insustry_cls" value="facilities_services">facilities services</option>
                                <option class="insustry_cls" value="design">design</option>
                                <option class="insustry_cls" value="defence">defence</option>
                                <option class="insustry_cls" value="civic_&_social_organization">civic & social organization</option>
                                <option class="insustry_cls" value="public_policy">public policy</option>
                                <option class="insustry_cls" value="government_administration">government administration</option>
                                <option class="insustry_cls" value="international_trade">international_trade</option>
                                <option class="insustry_cls" value="public_safety">public safety</option>
                                <option class="insustry_cls" value="primary/secondary education">primary/secondary education</option>
                                <option class="insustry_cls" value="biotechnology">biotechnology</option>
                                <option class="insustry_cls" value="professional_training_coaching">public policy</option>
                                <option class="insustry_cls" value="education_management">education management</option>
                                <option class="insustry_cls" value="political_organization">political organization</option>
                                <option class="insustry_cls" value="recreational_facilities_and_services">recreational facilities and services</option>
                                <option class="insustry_cls" value="entertainment">entertainment</option>
                                <option class="insustry_cls" value="motion_pictures_and_film">motion pictures and film</option>
                                <option class="insustry_cls" value="performing_arts">performing arts</option>
                                <option class="insustry_cls" value="libraries">libraries</option>
                                <option class="insustry_cls" value="museums_and_institutions">museums and institutions</option>
                                <option class="insustry_cls" value="sports">sports</option>
                                <option class="insustry_cls" value="health_wellness_and_fitness">health, wellness and fitness</option>
                                <option class="insustry_cls" value="events_services">events services</option>
                                <option  value="associations_&_trade_unions">associations & trade unions</option>
                                </select>
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
                                <div class="form-group mb-3 mt-3 ">
                                <label for="companycsize">Company Csize</label>
                                <select name="companycsize" id="companycsize">
                                <option class="insustry_cls" value="1-10">1-10</option>
                                <option class="insustry_cls" value="11-50">11-50</option>
                                <option class="insustry_cls" value="51-200">51-200</option>
                                <option class="insustry_cls" value="201-500">201-500</option>
                                <option class="insustry_cls" value="501-1000">501-1000</option>
                                <option class="insustry_cls" value="1001-5000">1001-5000</option>
                                <option class="insustry_cls" value="10000+">10000+</option>
                                </select>
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="company_specks">Company Specs</label>
                                    <input type="text" class="form-control" id="company_specks" name="company_specks" value="<?php echo $user_specs ?? $_POST['company_specks']; ?>" >
                                </div>
                                <br>
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