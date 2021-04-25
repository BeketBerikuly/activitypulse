<div class="page">
    <div id="page_top" class="section-body top_dark">
        <div class="container-fluid">
            <div class="page-header">
                <div class="left">
                    <a href="javascript:void(0)" class="icon menu_toggle mr-3"><i class="im im-folder-open"></i></a>
                    <h1 class="page-title">Project list</h1>
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
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Project-OnGoing">View</a></li>
                        </ul>
                        <div class="header-action d-md-flex">
                            <form action="" method="POST">
                                <div class="input-group mr-2">
                                    <input type="text" class="form-control" name="Search_project_input" placeholder="Search...">
                                    <input class="btn btn-info mx-2" type="submit" value="Search" name="Search_project" />
                                </div>
                            </form>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproject">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Project-OnGoing" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title tag tag-green">Lunch</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 py-1"><strong>Team:</strong></div>
                                        <div class="col-7 py-1"><?php
                                                                $sql_count_activity = "SELECT p.id
                                                                    FROM project p, activity a 
                                                                    WHERE a.project_number = p.number AND p.id = 31";
                                                                $result_count_activity = mysqli_query($db, $sql_count_activity);
                                                                echo mysqli_num_rows($result_count_activity);
                                                                ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title tag tag-green">Illness</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 py-1"><strong>Team:</strong></div>
                                        <div class="col-7 py-1"><?php
                                                                $sql_count_activity = "SELECT p.id
                                                                    FROM project p, activity a 
                                                                    WHERE a.project_number = p.number AND p.id = 32";
                                                                $result_count_activity = mysqli_query($db, $sql_count_activity);
                                                                echo mysqli_num_rows($result_count_activity);
                                                                ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title tag tag-green">Course</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 py-1"><strong>Team:</strong></div>
                                        <div class="col-7 py-1"><?php
                                                                $sql_count_activity = "SELECT p.id
                                                                    FROM project p, activity a 
                                                                    WHERE a.project_number = p.number AND p.id = 33";
                                                                $result_count_activity = mysqli_query($db, $sql_count_activity);
                                                                echo mysqli_num_rows($result_count_activity);
                                                                ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title tag tag-green">Vacation</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 py-1"><strong>Team:</strong></div>
                                        <div class="col-7 py-1"><?php
                                                                $sql_count_activity = "SELECT p.id
                                                                    FROM project p, activity a 
                                                                    WHERE a.project_number = p.number AND p.id = 34";
                                                                $result_count_activity = mysqli_query($db, $sql_count_activity);
                                                                echo mysqli_num_rows($result_count_activity);
                                                                ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT id, number, name, creator, start, deadline, status FROM project WHERE status = 1";

                        if (isset($_POST['Search_project'])) {
                            $search_project_input = $_POST['Search_project_input'];
                            $sql = "SELECT id, number, name, creator, start, deadline, status 
                            FROM project 
                            WHERE status = 1 AND number  
                            LIKE '%" . $search_project_input . "%'";

                            $result_search_project = mysqli_query($db, $sql);
                            $count_search_project = mysqli_num_rows($result_search_project);
                        }


                        $result = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"><?php echo $row['number'] ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <span class="tag tag-primary mb-3"><?php echo $row['name'] ?></span>
                                        <div class="row">
                                            <div class="col-5 py-1"><strong>Start:</strong></div>
                                            <div class="col-7 py-1"><?php
                                                                    $phpdate = strtotime($row['start']);
                                                                    $mysqldate = date('d-m-Y', $phpdate);
                                                                    echo $mysqldate;
                                                                    ?></div>
                                            <div class="col-5 py-1"><strong>Deadline:</strong></div>
                                            <div class="col-7 py-1"><?php
                                                                    $phpdate = strtotime($row['deadline']);
                                                                    $mysqldate = date('d-m-Y', $phpdate);
                                                                    echo $mysqldate;
                                                                    ?></div>
                                            <div class="col-5 py-1"><strong>Creator:</strong></div>
                                            <div class="col-7 py-1"><?php echo $row['creator'] ?></div>
                                            <div class="col-5 py-1"><strong>Team:</strong></div>
                                            <div class="col-7 py-1"><?php
                                                                    $p_id = $row['id'];
                                                                    $sql_count_activity = "SELECT p.id
                                                                    FROM project p, activity a 
                                                                    WHERE a.project_number = p.number AND p.id = '$p_id'";
                                                                    $result_count_activity = mysqli_query($db, $sql_count_activity);
                                                                    echo mysqli_num_rows($result_count_activity);
                                                                    ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="Project-add" role="tabpanel">

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
<?php include "add_project.php" ?>

</div>