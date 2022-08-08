<?php require_once("header.php"); ?>
<?php
session_start();

require_once('config.php');


$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;

if ($page <= 1 && is_integer($page)) {
    $page1 = 0;
} else {
    $page1 = ($page * 5) - 5;
}
$options = [
    'limit' => 5,
    'skip' => $page1,
];
$check = $collection->find([], $options);
?>

<style>
    .pagination-sec {
        display: flex;
        align-items: center;
        float: right;
        border: 1px solid #fff;
        border-radius: 6px;
        background: #5e5eef0d;
        margin-top: 30px;
    }

    .pagination-sec ul.pagination {
        margin-bottom: 0px;
    }

    .pagination-sec p {
        color: #818184;
        margin-bottom: 0px;
        padding: 0px .75rem;
    }

    .pagination-sec ul.pagination .page-item a.page-link {
        background-color: transparent;
        color: #fff;
        border-radius: 0px;
    }

    .pagination-sec a.button {
        color: #0e0e0e;
        padding-right: .75em !important;
        font-size: 16px;
        margin-left: 16px;
    }

    .pagination-sec a {
        margin: 10px;
    }

    .pagination-sec a.button:hover {
        text-decoration: none !important;
    }

    .pagination-sec ul.pagination .page-item a.page-link:hover {
        background: #818184;
    }

    .pagination-sec ul.pagination a.page-link:focus {
        outline: none !important;
        box-shadow: none !important;
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
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if (isset($_SESSION['index'])) {
                    echo ($_SESSION['index']);
                    unset($_SESSION['index']);
                } ?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <button type="button" class="btn btn-dark mb-" style="margin-left: 90%;margin-bottom:20px;" data-toggle="modal" data-target="#add_modal">Add List</button>
                    </div>
                </div>
                <div class="modal fade" id="add_modal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"></h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                <div class="col-12 mt-5">
                                    <h4 class="header-title">Upload File</h4>
                                    <form action="upload.php" method="post" id="my_form" enctype="multipart/form-data">
                                        <div class="form-group mb-3 mt-3">
                                            <label for="xls_file">Your json file</label>
                                            <input type="file" name="name" id="xls_file" size="50" />
                                        </div>
                                        <button type="submit" class="btn btn-dark mb-">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">My list</h4>
                            <div class="data-tables datatable-dark">
                                <table id="dataTable3" class="text-center">
                                    <thead class="text-capitalize">
                                        <tr>

                                            <th>Company Name</th>
                                            <th>Industry</th>
                                            <th>Company Type</th>
                                            <th>Comp date</th>
                                            <th>Paid</th>
                                            <th>Edit</th>
                                            <th>People</th>
                                            <th></th>


                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($check as $checkdata) {
                                        $id = $checkdata->_id;
                                    ?>
                                        <tbody>
                                            <td><?php echo $checkdata->company_name ?? ""; ?></td>
                                            <td></td>
                                            <td><?php echo $checkdata->company_type ?? ""; ?></td>
                                            <td><?php echo $checkdata->company_incorp_date ?? ""; ?></td>
                                            <td><?php echo $checkdata->company_paid_capital ?? ""; ?></td>
                                            <td><a href="data_view.php?id=<?php echo $id; ?>"><button type="button" href="javascript:void(0)" class="btn btn-dark mb-" style="margin-right: -30px;">E</button></a></td>
                                            <td><a href="people.php?id=<?php echo $id; ?>"><button type="button" href="javascript:void(0)" class="btn btn-dark mb-" style="margin-right: -30px;">P</button></a></td>
                                        </tbody>
                                    <?php } ?>

                                </table>
                                <?php

                                $countr = $collection->count($check);
                                $a = $countr / 5;
                                $a = ceil($a);
                                echo "<br>";
                                echo "<br>";
                                if ($a) {
                                    echo "<div class='pagination-sec'>";
                                    $pagLink = "<ul class='pagination'>";
                                    if ($page > 1) {
                                        $currentPage = $page - 1;
                                        if ($currentPage == 1) {
                                            echo "<a href='index.php' class='button'disable>Previous</a>";
                                        } else {
                                            echo "<a href='index.php?page=$currentPage' class='button'disable>Previous</a>";
                                        }
                                    } else {
                                        echo "<p>Previous</p>";
                                    }
                                    for ($b = 1; $b <= $a; $b++) { ?>
                                        <a href='<?php echo ($b == 1) ? "index.php" : "index.php?page=$b"; ?>' style="text-decoration:none "><?php echo $b . " "; ?></a> <?php
                                                                                                                                                                        }
                                                                                                                                                                        echo $pagLink . "</ul>";

                                                                                                                                                                        if ($page < $a) {
                                                                                                                                                                            echo "<a href='index.php?page=" . ($page + 1) . "' class='button'>Next</a>";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "<p>Next</p>";
                                                                                                                                                                        }
                                                                                                                                                                        echo "</div>";
                                                                                                                                                                    }

                                                                                                                                                                            ?>
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