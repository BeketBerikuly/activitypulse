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
                                    $sql = "SELECT name FROM employee WHERE initial = '$initial'";
                                    $result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    echo $row['name'];
                                    ?>!</h4>
                    </div>
                </div>
            </div>
            <div class="row clearfix row-deck">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Project Statistics</h3>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-4 border-right pb-4 pt-4">
                                    <label class="mb-0 font-13">Total project</label>
                                    <h4 class="font-30 font-weight-bold text-col-blue counter"><?php
                                                                                                $sql = "SELECT id FROM project";
                                                                                                $result = mysqli_query($db, $sql);
                                                                                                $count = mysqli_num_rows($result);
                                                                                                echo $count;
                                                                                                ?></h4>
                                </div>
                                <div class="col-4 border-right pb-4 pt-4">
                                    <label class="mb-0 font-13">Total activities</label>
                                    <h4 class="font-30 font-weight-bold text-col-blue counter"><?php
                                                                                                $sql = "SELECT id FROM activity";
                                                                                                $result = mysqli_query($db, $sql);
                                                                                                $count = mysqli_num_rows($result);
                                                                                                echo $count;
                                                                                                ?></h4>
                                </div>
                                <div class="col-4 pb-4 pt-4">
                                    <label class="mb-0 font-13">Total developers</label>
                                    <h4 class="font-30 font-weight-bold text-col-blue counter"> <?php
                                                                                                $sql = "SELECT id FROM employee";
                                                                                                $result = mysqli_query($db, $sql);
                                                                                                $count = mysqli_num_rows($result);
                                                                                                echo $count;
                                                                                                ?></h4>
                                </div>
                            </div>
                        </div>
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
                            <h3 class="card-title">Project Summary</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project number</th>
                                            <th>Project name</th>
                                            <th>Number of employees</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT id, number, name, status FROM project WHERE status = 1 LIMIT 5";
                                        $result = mysqli_query($db, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['number'] ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php
                                                    $p_id = $row['id'];
                                                    $sql_count_activity = "SELECT p.id
                                                                    FROM project p, activity a 
                                                                    WHERE a.project_number = p.number AND p.id = '$p_id'";
                                                    $result_count_activity = mysqli_query($db, $sql_count_activity);
                                                    echo mysqli_num_rows($result_count_activity);
                                                    ?></td>
                                                <td><span class="tag tag-green"><?php if ($row['status']) {
                                                                                    echo "Open";
                                                                                } else {
                                                                                    echo "Close";
                                                                                } ?></span></td>

                                            </tr>
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