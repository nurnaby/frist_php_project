<?php
require 'contorller/bdconfig.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<style>
/* .btn-default {
    display: none;
} */
</style>

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
                            <li><a href="#"><i class="icon-image5 position-left"></i>Banner</a></li>
                            <li class="active">List</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">
                    <!-- Basic datatable -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Banner Update</h5>

                        </div>
                        <div class="panel-body mt-5">
                            <form class="form-horizontal" action="contorller/bannerController.php" method="POST"
                                enctype="multipart/form-data">
                                <?php
                                if(isset($_GET['banner_id'])){
                                     $banner_id = $_GET['banner_id'];
                                     $getSinglDataQry = "SELECT * FROM banners WHERE id='{$banner_id}'";
                                     $getResult = mysqli_query($dbcon,$getSinglDataQry);
                                    
                                }
                                
                                ?>
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

                                    <?php
                                    if(isset($getResult)){
                                    foreach($getResult as $key => $banner){
                                    ?>
                                    <input type="hidden" class="form-control" name="banner_id"
                                        value="<?php echo $banner['id'] ?>">

                                    <div class="form-group mt-10">
                                        <label class="control-label col-lg-2" for="title">Title</label>
                                        <div class="col-lg-10">
                                            <input type="text" id="title" class="form-control" name="title"
                                                value="<?php echo $banner['title'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mt-10">
                                        <label class="control-label col-lg-2" for="sub_title">Sub title</label>
                                        <div class="col-lg-10">
                                            <input type="text" id="sub_title" class="form-control" name="sub_title"
                                                value="<?php echo $banner['sub_title'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="detaile">Detaile</label>
                                        <div class="col-lg-10">
                                            <textarea rows="5" cols="5" class="form-control"
                                                placeholder="Default textarea" id="detaile"
                                                name="details"><?php echo $banner['details'] ?> </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label text-semibold" for="image">Image</label>
                                        <div class="col-lg-10">
                                            <input type="file" name="images" class="file-input-extensions" id="image">
                                            <span class="help-block">Allow extensions: <code>jpg</code>,
                                                <code>png</code> and <code>jpeg</code> and Allow Size:
                                                <code>640 * 426</code> Only</span>


                                            <div class="file-preview" id="custom_file_preview">
                                                <div class="close fileinput-remove text-right" id="custom_close">×</div>
                                                <div class="file-preview-thumbnails">
                                                    <div class="file-preview-frame" id="preview-1603644588432-0">
                                                        <img src="<?php echo 'uploads/'.$banner['images']; ?>"
                                                            class="file-preview-image" title="" alt=""
                                                            style="width:auto;height:160px;">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="file-preview-status text-center text-success"></div>
                                                <div class="kv-fileinput-error file-error-message"
                                                    style="display: none;"></div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- <div class="form-group">
                                        <label class="col-lg-2 control-label text-semibold" for="images">Images</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="file-input" id="images" name="images"
                                                accept="image/*, video/*">
                                            <span class="help-block">Allow only <code>image</code> and
                                                <code>video</code> file types to be uploaded. You can configure the
                                                condition for validating the file types using
                                                <code>`fileTypeSettings`</code>.</span>
                                        </div>
                                    </div> -->
                                    <?php }}?>



                                </fieldset>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" name="saveUpdate">Submit</button>
                                    <a href="banner_list.php" class="btn btn-default ml-5">Back to List</a>
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