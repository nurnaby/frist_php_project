<?php
require 'contorller/bdconfig.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>

<body>
    <!-- Main navbar -->
    <?php include 'includes/mainNav.php'; ?>
    <!-- /main navbar -->
    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main sidebar -->
            <div class="sidebar sidebar-main">
                <div class="sidebar-content">
                    <!-- User menu -->
                    <div class="sidebar-user">
                        <div class="category-content">
                            <div class="media">
                                <a href="#" class="media-left"><img src="assets/images/placeholder.jpg"
                                        class="img-circle img-sm" alt=""></a>
                                <div class="media-body">
                                    <span class="media-heading text-semibold">Victoria Baker</span>
                                    <div class="text-size-mini text-muted">
                                        <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                                    </div>
                                </div>
                                <div class="media-right media-middle">
                                    <ul class="icons-list">
                                        <li>
                                            <a href="#"><i class="icon-cog3"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /user menu -->
                    <!-- Main navigation -->
                    <?php include 'includes/navigation.php';?>
                    <!-- /main navigation -->
                </div>
            </div>
            <!-- /main sidebar -->
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Page header -->
                <div class="page-header">
                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-image5 position-left"></i>Categories</a></li>
                            <li class="active">Creat</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">
                    <!-- Basic datatable -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Categories Creat</h5>
                        </div>
                        <div class="panel-body mt-5">
                            <form class="form-horizontal" action="contorller/categoryController.php" method="POST"
                                enctype="multipart/form-data">
                                <fieldset class="content-group mt-10">
                                    <?php
                                    if(isset($_GET['msg'])){
                                    ?>
                                    <div class="alert alert-success no-border">
                                        <button type="button" class="close"
                                            data-dismiss="alert"><span>&times;</span><span
                                                class="sr-only">Close</span></button>
                                        <span class="text-semibold">Succes!</span><?php echo $_GET['msg'];?>
                                    </div>
                                    <?php }?>
                                    <div class="form-group mt-10">
                                        <label class="control-label col-lg-2" for="category_name">Category name</label>
                                        <div class="col-lg-10">
                                            <input type="text" id="category_name" class="form-control"
                                                name="category_name">
                                        </div>
                                    </div>



                                </fieldset>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" name="saveCategory">Submit</button>
                                    <a href="category_list.php" class="btn btn-default ml-5">Back to List</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /basic datatable -->
                    <!-- Footer -->
                    <?php include 'includes/footer.php';?>
                    <!-- /footer -->
                </div>
                <!-- /content area -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
    </div>
    <!-- /page container -->
    <?php include 'includes/script.php'; ?>
</body>

</html>