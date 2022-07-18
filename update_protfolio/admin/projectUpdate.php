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
                            <li><a href="#"><i class="icon-image5 position-left"></i>Project</a></li>
                            <li class="active">Update</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">
                    <!-- Basic datatable -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Project Update</h5>
                        </div>
                        <div class="panel-body mt-5">
                            <form class="form-horizontal" action="contorller/projectController.php" method="POST"
                                enctype="multipart/form-data">
                                <?php 
                                if(isset($_GET['project_id'])){
                                    $project_id = $_GET['project_id'];
                                    $getSinglDataQry = "SELECT * FROM  our_projects WHERE id='{$project_id}'";
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
                                    foreach($getResult as $key=> $project){
                                    $selectQuery= "SELECT * FROM categories WHERE active_status=1";
                                    $category_list=mysqli_query($dbcon,$selectQuery);
                                    ?>
                                    <div class="form-group mt-10">
                                        <label class="control-label col-lg-2" for="category_id">Category</label>
                                        <div class="col-lg-10">
                                            <select name="category_id" class="form-control" id="category_id">
                                                <!-- <option value="">select category</option> -->
                                                <?php
                                                foreach($category_list as $key=> $category){

                                                ?>
                                                <option value="<?php echo $category['id']?>"
                                                    <?php echo ($category['id']==$project['category_id'])?'selected="selected"':'';?>>
                                                    <?php echo $category['category_name']?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" id="project_name" class="form-control" name="project_id"
                                        value="<?php echo $project['id']; ?>">
                                    <div class="form-group mt-10">
                                        <label class="control-label col-lg-2" for="project_name">Project Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" id="project_name" class="form-control"
                                                name="project_name" value="<?php echo $project['project_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mt-10">
                                        <label class="control-label col-lg-2" for="project_link">Project Link</label>
                                        <div class="col-lg-10">
                                            <input type="text" id="project_link" class="form-control"
                                                name="project_link" value="<?php echo $project['project_link']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label text-semibold" for="project_thumb">Project
                                            Thumb</label>
                                        <div class="col-lg-10">
                                            <input type="file" name="project_thumb" class="file-input-extensions"
                                                id="project_thumb">
                                            <span class="help-block">Allow extensions: <code>jpg</code>,
                                                <code>png</code> and <code>jpeg</code> and Allow Size:
                                                <code>640 * 426</code> Only</span>


                                            <div class="file-preview" id="custom_file_preview">
                                                <div class="close fileinput-remove text-right" id="custom_close">×</div>
                                                <div class="file-preview-thumbnails">
                                                    <div class="file-preview-frame" id="preview-1603644588432-0">
                                                        <img src="<?php echo 'uploads/'.$project['project_thumb']; ?>"
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
                                    <?php } ?>
                                    <!-- <div class="form-group mt-10">
                                        <label class="control-label col-lg-2" for="project_thumb">Project Thumb</label>
                                        <div class="col-lg-10">
                                            <input type="file" id="project_thumb" class="form-control"
                                                name="project_thumb">
                                        </div>
                                    </div> -->
                                </fieldset>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" name="updateProject">Submit</button>
                                    <a href="project_list.php" class="btn btn-default ml-5">Back to List</a>
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