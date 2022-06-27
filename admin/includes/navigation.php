<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">
            <!-- Main -->
            <li class="#"><a href="index.php"><i class="icon-home4"></i>
                    <span>Dashboard</span></a></li>
            <li>
            <li class="<?php echo $manuName == 'banner' ? "active" : ''; ?>"><a href="banner_list.php"><i
                        class=" icon-image5"></i>
                    <span>Banners</span></a></li>
            <li>
            <li class="<?php if($page=='service'){echo 'active';}?>"><a href="service_list.php"><i
                        class="icon-home4"></i>
                    <span>Service</span></a></li>
            <li>
            <li class="<?php if($page=='sections'){echo 'active';}?>"><a href="sections_list.php"><i
                        class="icon-home4"></i>
                    <span>Sections</span></a></li>
            <li>
            <li class="<?php if($page=='project'){echo 'active';}?>"><a href="project_list.php"><i
                        class="icon-home4"></i>
                    <span>Our Project</span></a></li>
            <li>
            <li class=""><a href="index.html"><i class="icon-home4"></i>
                    <span>Our clients</span></a></li>
            <li>
            <li class="<?php if($page=='staff'){echo 'active';}?>"><a href="staff_list.php"><i class="icon-home4"></i>
                    <span>Our Staff</span></a></li>
            <li>
            <li class="<?php if($page=='contact'){echo 'active';}?>"><a href="contactMessates.php"><i
                        class="icon-home4"></i>
                    <span>Contact Messages</span></a></li>
            <li>
                <a href="#"><i class="icon-stack2"></i> <span>Page layouts</span></a>
                <ul>
                    <li class="<?php if($page=='category'){echo 'active';}?>"> <a
                            href="Category_list.php">Categories</a></li>
                    <li class="<?php if($page=='designations'){echo 'active';}?>"><a
                            href="designations_list.php">designations</a></li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
                <ul>
                    <li>
                        <a href="#">3 columns</a>
                        <ul>
                            <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                            <li><a href="starters/3_col_double.html">Double sidebars</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>