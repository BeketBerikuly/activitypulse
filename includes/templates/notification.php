<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    <ul class="list-unstyled feeds_widget">
        <?php
        $emp_initial = $_SESSION['user_initial'];
        $sql_emp_id = "SELECT id FROM employee WHERE initial = '$emp_initial'";
        $result_emp_id = mysqli_query($db, $sql_emp_id);
        $row_emp_id = mysqli_fetch_assoc($result_emp_id);
        $emp_id = $row_emp_id['id'];

        $sql_act_number = "SELECT activity_number activity_number 
        FROM notification 
        WHERE estimated = 0 AND emp_id = '$emp_id'";
        $result_act_number = mysqli_query($db, $sql_act_number);
        while ($row_act_number = mysqli_fetch_assoc($result_act_number)) {
        ?>
            <li>
                <div class="feeds-left"><i class="im im-clock-o"></i></div>
                <div class="feeds-body">
                    <h4 class="title text-danger">Activity number: <?php echo $row_act_number['activity_number'] ?><small class="float-right text-muted">12:00</small></h4>
                    <small>Please estimate the time for activity.</small>
                </div>
            </li>
        <?php } ?>
    </ul>
    <div class="dropdown-divider"></div>
    <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Close</a>
</div>