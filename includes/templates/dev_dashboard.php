<div class="page">
    <div id="page_top" class="section-body top_dark">
        <div class="container-fluid">
            <div class="page-header">
                <div class="left">
                    <a href="javascript:void(0)" class="icon menu_toggle mr-3"><i class="im im-dashboard"></i></a>
                    <h1 class="page-title">Dashboard</h1>
                </div>
                <div class="right">
                    <div class="notification d-flex">
                        <div class="dropdown d-flex">
                            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><i class="im im-bell-active"></i><span class="badge badge-primary nav-unread"></span></a>
                            <?php include "notification.php" ?>
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
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <h4>Welcome <?php
                                    $initial = $_SESSION['user_initial'];
                                    $sql = "SELECT id e_id, name FROM employee WHERE initial = '$initial'";
                                    $result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    echo $row['name'];
                                    ?>!</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Your activities</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <p class="small">Activity number</p>
                                            </th>
                                            <th>
                                                <p class="small">Activity name</p>
                                            </th>
                                            <th>
                                                <p class="small">Spent</p>
                                            </th>
                                            <th>
                                                <p class="small">Remain</p>
                                            </th>
                                            <th>
                                                <p class="small">Total time</p>
                                            </th>
                                            <th>
                                                <p class="small">Progress</p>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $emp_id = $row['e_id'];
                                        $sql_dev_dash = "SELECT a.id a_id, a.number a_number, a.name a_name, a.spent, a.remain, a.status, a.progress, a.total_time
                                                         FROM activity a, employee e, developer d 
                                                         WHERE d.emp_id = e.id AND d.activity_id = a.id AND e.id = '$emp_id'";
                                        $result_dev_dash = mysqli_query($db, $sql_dev_dash);
                                        while ($row_dev_dash = mysqli_fetch_assoc($result_dev_dash)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <p class="small"><?php echo $row_dev_dash['a_id'] ?></p>
                                                </td>
                                                <td>
                                                    <p class="small"><?php echo $row_dev_dash['a_number'] ?></p>
                                                </td>
                                                <td>
                                                    <p class="small"><?php echo $row_dev_dash['a_name'] ?></p>
                                                </td>
                                                <td>
                                                    <p class="small"><?php echo $row_dev_dash['spent'] ?></p>
                                                </td>
                                                <td>
                                                    <p class="small"><?php echo $row_dev_dash['remain'] ?></p>
                                                </td>
                                                <td>
                                                    <p class="small"><?php echo $row_dev_dash['total_time'] ?></p>
                                                </td>
                                                <td>
                                                    <div class="clearfix">
                                                        <div class="float-left"><strong class="small"><?php echo $row_dev_dash['progress'] ?>%</strong></div>
                                                        <div class="float-right"></div>
                                                    </div>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar bg-azure" role="progressbar" style="width: <?php echo $row_dev_dash['progress'] ?>%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="d-flex justify-content-between align-items-center">
                                                    <?php
                                                    if ($row_dev_dash['progress'] == 100) {
                                                        echo "<span class=\"tag tag-primary\">Done</span>";
                                                    } else {
                                                        include "buttons.php";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php include "estimate_activity.php"; ?>
                                        <?php
                                            if (isset($_POST['Estimate=' . $row_dev_dash['a_id']])) {
                                                $activ_id = $row_dev_dash['a_id'];

                                                if ($row_dev_dash['status']) {
                                                    $stat = 0;
                                                    $end_time = time();
                                                    $sql_end_time = "UPDATE activity SET end = '$end_time' WHERE id = '$activ_id'";
                                                    $result_end_time = mysqli_query($db, $sql_end_time);

                                                    $sql_start = "SELECT spent, start FROM activity WHERE id = '$activ_id'";
                                                    $result_start = mysqli_query($db, $sql_start);
                                                    $row_start = mysqli_fetch_assoc($result_start);

                                                    $start_val = $row_start['start'];
                                                    $spent_val = $row_start['spent'];

                                                    $interval = round($end_time - (int)$start_val);
                                                    //////////////////////////////

                                                    $arr_interval = explode(':', $spent_val);
                                                    if (count($arr_interval) == 2) {
                                                        $spent_v =  $arr_interval[0] * 3600 + $arr_interval[1] * 60;
                                                    } else {
                                                        $spent_v =  $arr_interval[0] * 3600;
                                                    }

                                                    $interval = $interval + $spent_v;
                                                    //////////////////////////////
                                                    $spent_output = sprintf('%02d:%02d', ($interval / 3600), ($interval / 60 % 60));

                                                    $sql_interval = "UPDATE activity SET spent = '$spent_output' WHERE id = '$activ_id'";
                                                    $result_interval = mysqli_query($db, $sql_interval);

                                                    $sql_emp_stat = "UPDATE employee SET isAvailable = 1 WHERE id = '$emp_id'";
                                                    $result_emp_stat = mysqli_query($db, $sql_emp_stat);
                                                } else {
                                                    $stat = 1;
                                                    $start_time = time();
                                                    $sql_start_time = "UPDATE activity SET start = '$start_time' WHERE id = '$activ_id'";
                                                    $result_start_time = mysqli_query($db, $sql_start_time);

                                                    $sql_emp_stat = "UPDATE employee SET isAvailable = 0 WHERE id = '$emp_id'";
                                                    $result_emp_stat = mysqli_query($db, $sql_emp_stat);
                                                }

                                                $sql_status = "UPDATE activity SET status = '$stat' WHERE id = '$activ_id'";
                                                $result_status = mysqli_query($db, $sql_status);
                                                echo "<meta http-equiv='refresh' content='0'>";
                                            }
                                        }
                                        ?>
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
        <?php include "footer.php" ?>
    </div>
</div>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>