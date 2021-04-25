<div class="page">
    <div id="page_top" class="section-body top_dark">
        <div class="container-fluid">
            <div class="page-header">
                <div class="left">
                    <a href="javascript:void(0)" class="icon menu_toggle mr-3"><i class="im im-task-o"></i></a>
                    <h1 class="page-title">Activity list</h1>
                </div>
                <div class="right">
                    <div class="notification d-flex">
                        <div class="dropdown d-flex">
                            <?php
                            if ($_SESSION['user_initial'] != 'udka') {
                                echo "<a class=\"nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2\" data-toggle=\"dropdown\"><i class=\"im im-bell-active\"></i><span class=\"badge badge-primary nav-unread\"></span></a>";
                                include "notification.php";
                            }
                            ?>
                        </div>
                        <div class="dropdown d-flex">
                            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><i class="im im-user-male"></i></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <form method="GET">
                                    <button class="dropdown-item p-0 mx-auto d-flex align-items-center" style name="logout"><i class="dropdown-icon im im-sign-out"></i> Sign out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item"><a class="nav-link active" id="TaskBoard-tab" data-toggle="tab" href="#TaskBoard-list">View</a></li>
                        </ul>
                        <div class="header-action d-flex">
                            <form action="" method="POST">
                                <div class="input-group mr-2">
                                    <input type="text" class="form-control" name="search_activity_input" placeholder="Search...">
                                    <input class="btn btn-info mx-2" type="submit" value="Search" name="Search_activity" />
                                </div>
                            </form>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtask">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="tab-content taskboard">
                <div class="tab-pane fade show active" id="TaskBoard-list" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Activity</th>
                                            <th>Team</th>
                                            <th>Spent</th>
                                            <th>Remain</th>
                                            <th>Total time</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT a.id a_id, a.number a_number, a.name a_name, a.spent, a.remain, a.status, a.progress, a.total_time, 
                                        e.id e_id , e.initial e_initial, e.name e_name, e.img e_img, e.isAvailable e_isAvailable 
                                        FROM activity a, employee e, developer d 
                                        WHERE d.emp_id = e.id AND d.activity_id = a.id";

                                        if (isset($_POST['Search_activity'])) {
                                            $search_activity_input = $_POST['search_activity_input'];
                                            $sql = "SELECT a.id a_id, a.number a_number, a.name a_name, a.spent, a.remain, a.status, a.progress, a.total_time, 
                                        e.id e_id , e.initial e_initial, e.name e_name, e.img e_img, e.isAvailable e_isAvailable 
                                        FROM activity a, employee e, developer d 
                                        WHERE d.emp_id = e.id AND d.activity_id = a.id AND a.number LIKE '%" . $search_activity_input . "%'";
                                            $result_search_actvity = mysqli_query($db, $sql);
                                            $count_search_actvity = mysqli_num_rows($result_search_actvity);
                                            if ($count_search_actvity == 0) {
                                                echo "<div class=\"tag tag-danger\">0 result</div>";
                                            } else {
                                                echo "<div class=\"tag tag-green\">" . $count_search_actvity . " result</div>";
                                            }
                                        }


                                        $result = mysqli_query($db, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['a_id'] ?></td>
                                                <td>
                                                    <h6 class="mb-0"><?php echo $row['a_number'] ?></h6>
                                                    <span><?php echo $row['a_name'] ?></span>
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled team-info mb-0">
                                                        <li><img type="button" data-toggle="modal" data-target="#devInfo<?php echo $row['e_id']; ?>" data-placement="top" src="assets/images/xs/<?php echo $row['e_img'] ?>" title="<?php echo $row['e_initial'] ?>" alt="Avatar">
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><?php echo $row['spent'] ?> hrs</td>
                                                <td><?php echo $row['remain'] ?> hrs</td>
                                                <td><?php echo $row['total_time'] ?></td>
                                                <?php if ($row['status']) {
                                                    echo "<td><span class=\"tag tag-green\">Running</td>";
                                                } else {
                                                    echo "<td><span class=\"tag tag-default\">Planned</td>";
                                                }
                                                ?>
                                                <td>
                                                    <div class="clearfix">
                                                        <div class="float-left"><strong><?php echo $row['progress'] ?>%</strong></div>
                                                        <div class="float-right"></div>
                                                    </div>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar bg-azure" role="progressbar" style="width: <?php echo $row['progress'] ?>%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php include "user_info.php" ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="section-body">
            <?php include "footer.php" ?>
        </div>
    </div>
</div>

<?php include "add_activity.php" ?>