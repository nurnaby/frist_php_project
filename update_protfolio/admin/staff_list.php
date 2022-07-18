<?php
$page = 'staff';
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
                            <li><a href="#"><i class="icon-image5 position-left"></i>staff</a></li>
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
                            <h5 class="panel-title"> staff List</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <a href="staffCreat.php" class="btn btn-primary mb-1">Add New</a>
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
                                        <th width:20%>staff_name</th>
                                        <th width:10%>designation Name</th>
                                        <th width:15%>instagram</th>
                                        <th width:10%>twitter</th>
                                        <th width:10%>facebook</th>
                                        <th width:10%>linkedin</th>
                                        <th width:10%>staff_image</th>
                                        <th width:10% class="text-center">Action status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $selectQuery= "SELECT our_staff.*,designatoins.designation_name FROM `our_staff` 
                                    INNER JOIN designatoins ON our_staff.designation_id = designatoins.id
                                    WHERE our_staff.active_status= 1";
                                    $staff_list=mysqli_query($dbcon,$selectQuery);
                                  foreach($staff_list as $key =>$staff){
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo ++$key;?></td>
                                        <td><?php echo $staff['staff_name'];?></td>
                                        <td><?php echo $staff['designation_name'];?></td>
                                        <td><?php echo $staff['instagram'];?></td>
                                        <td><?php echo $staff['twitter'];?></td>
                                        <td><?php echo $staff['facebook'];?></td>
                                        <td><?php echo $staff['linkedin'];?></td>
                                        <td>

                                            <img class="img-responsive" width="80" height="80"
                                                src="<?php echo 'uploads/'.$staff['staff_image'];?>" />

                                        </td>
                                        <td class="text-center">
                                            <a href="staffUpdate.php?staff_id=<?php echo $staff['id'];?>"><i
                                                    class=" icon-pencil5"></i></a>
                                            <a href="staffDelete.php?staff_id=<?php echo $staff['id'];?>"><i
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