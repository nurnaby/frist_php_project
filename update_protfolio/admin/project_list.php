<?php
$page = 'project';
include 'contorller/bdconfig.php';

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
                            <h5 class="panel-title">Project List</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <a href="projectCreat.php" class="btn btn-primary mb-1">Add New</a>
                                    <!-- <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php
                                    if(isset($_GET['msg'])){
                                    ?>
                            <div class="alert alert-success no-border">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                        class="sr-only">Close</span></button>
                                <span class="text-semibold">Succes!</span><?php echo $_GET['msg'];?>
                            </div>
                            <?php }?>


                            <table class="table table-bordered datatable-basic">
                                <thead>
                                    <tr>
                                        <th width:5%>SL</th>
                                        <th width:20%>Category Name</th>
                                        <th width:20%>Project Name</th>
                                        <th width:25%>project Link</th>
                                        <th width:20%>Project Thumb</th>
                                        <th width:10% class="text-center">Action status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $selectQuery= "SELECT our_projects.*,categories.category_name FROM `our_projects` 
                                    INNER JOIN categories ON our_projects.category_id = categories.id
                                    WHERE our_projects.active_status = 1";
                                    $project_list=mysqli_query($dbcon,$selectQuery);

                                  foreach($project_list as $key =>$Project){
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo ++$key;?></td>
                                        <td><?php echo $Project['category_name'];?></td>
                                        <td><?php echo $Project['project_name'];?></td>
                                        <td><?php echo $Project['project_link'];?></td>
                                        <td>

                                            <img class="img-responsive" width="80" height="80"
                                                src="<?php echo 'uploads/'.$Project['project_thumb'];?>" />

                                        </td>
                                        <td class="text-center">
                                            <a href="projectUpdate.php?project_id=<?php echo $Project['id'];?>"><i
                                                    class=" icon-pencil5"></i></a>
                                            <a href="projectDelete.php?project_id=<?php echo $Project['id'];?>"><i
                                                    class=" icon-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
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