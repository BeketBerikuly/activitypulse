<?php
if (isset($_POST['Add_activity'])) {
    $p_number = $_POST['project_number'];
    $a_number = $_POST['activity_number'];
    $a_name = $_POST['activity_name'];


    $sql = "INSERT INTO activity (project_number, number, name) VALUES ('$p_number', '$a_number', '$a_name')";
    $result = mysqli_query($db, $sql);

    $s_dev0 = $_POST['select_developer0'];
    $s_dev0_initial = explode("| ", $s_dev0)[1];

    $sql_emp_id = "SELECT id FROM employee WHERE initial = '$s_dev0_initial' ";
    $result_emp_id = mysqli_query($db, $sql_emp_id);
    $row_emp_id = mysqli_fetch_array($result_emp_id, MYSQLI_ASSOC);
    $emp_id = $row_emp_id['id'];

    $sql_activ_id = "SELECT id FROM activity WHERE number = '$a_number'";
    $result_activ_id = mysqli_query($db, $sql_activ_id);
    $row_activ_id = mysqli_fetch_array($result_activ_id, MYSQLI_ASSOC);
    $activ_id = $row_activ_id['id'];


    $sql_dev_activity = "INSERT INTO developer (emp_id, activity_id) VALUES ('$emp_id', '$activ_id')";
    $result = mysqli_query($db, $sql_dev_activity);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<div class="modal fade" id="addtask" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add new activity</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" style="text-transform: uppercase" placeholder="Project no." name="project_number" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Activity no." name="activity_number" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Activity name" name="activity_name" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control show-tick" name="select_developer0" required>
                                    <option>Select developer</option>
                                    <?php
                                    $sql = "SELECT id, initial FROM employee WHERE isAvailable = 1 AND job_title = 'Developer'";

                                    $result = mysqli_query($db, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $emp_id = $row['id'];
                                        $sql_count_activity = "SELECT d.emp_id FROM developer d, employee e 
                                                                WHERE d.emp_id = e.id AND e.id = '$emp_id' ";
                                        $result_count_activity = mysqli_query($db, $sql_count_activity);
                                        $count_activity = mysqli_num_rows($result_count_activity);
                                    ?>
                                        <option class="<?php
                                                        if ($count_activity >= 20) {
                                                            echo "tag tag-danger";
                                                        } elseif ($count_activity >= 10) {
                                                            echo "tag tag-warning";
                                                        }
                                                        ?>"><?php echo $count_activity . ' projects | ' . $row['initial'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Add" name="Add_activity" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>