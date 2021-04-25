<?php
if (isset($_POST['Add_project'])) {
    $p_number = $_POST['project_number'];
    $p_name = $_POST['project_name'];

    $phpdate = strtotime($_POST['start']);
    $p_start = date('Y-m-d', $phpdate);

    $phpdate = strtotime($_POST['end']);
    $p_end = date('Y-m-d', $phpdate);

    $p_creator = strtoupper($_SESSION['user_initial']);

    $sql = "INSERT INTO project (number, name, creator, start, deadline) VALUES ('$p_number', '$p_name', '$p_creator','$p_start', '$p_end')";
    $result = mysqli_query($db, $sql);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<div class="modal fade" id="addproject" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add new project</h6>
                </div>
                <div class="modal-body">

                    <!-- form  POST-->
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" style="text-transform: uppercase" class="form-control" name="project_number" placeholder="Project no." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" style="text-transform: capitalize" class="form-control" name="project_name" placeholder="Project name" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <label>Range</label>
                            <div class="input-daterange input-group" data-provide="datepicker">
                                <input type="text" class="form-control" name="start" required>
                                <span class="input-group-addon"> to </span>
                                <input type="text" class="form-control" name="end" required>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Add" name="Add_project" />
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