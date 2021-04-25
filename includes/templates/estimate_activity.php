<?php
$activity_id = $row_dev_dash['a_id'];
if (isset($_POST['Estimate_time' . $activity_id])) {
    $r_time = $_POST['remain_time'];
    $progress = $_POST['progress'];

    $sql_spent = "SELECT spent FROM activity WHERE id = '$activity_id'";

    $result_spent = mysqli_query($db, $sql_spent);
    $row_spent = mysqli_fetch_assoc($result_spent);
    $s_time = $row_spent['spent'];

    $arr = explode(':', $s_time);
    if (count($arr) == 2) {
        $spent_time =  $arr[0] * 60 + $arr[1];
    } else {
        $spent_time =  $arr[0] * 60;
    }

    $arr = explode(':', $r_time);
    if (count($arr) == 2) {
        $remain_time =  $arr[0] * 60 + $arr[1];
    } else {
        $remain_time =  $arr[0] * 60;
    }

    $t_time = $spent_time + $remain_time;
    $format = '%02d h %02d min';

    if ($t_time < 1) {
        return;
    }
    $hours = floor($t_time / 60);
    $minutes = ($t_time % 60);
    $total_time =  sprintf($format, $hours, $minutes);
    $sql_estimate = "UPDATE activity SET remain = '$r_time', progress = '$progress', total_time = '$total_time' WHERE id = '$activity_id'";
    $result_estimate = mysqli_query($db, $sql_estimate);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<div class="modal fade" id="estimateactivity<?php echo  $row_dev_dash['a_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Estimate time</h6>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" style="text-transform: capitalize" class="form-control" name="remain_time" placeholder="Remain time(h:m)" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" style="text-transform: capitalize" class="form-control" name="progress" placeholder="Progress(x%)" required>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Submit" name="Estimate_time<?php echo $activity_id; ?>" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>