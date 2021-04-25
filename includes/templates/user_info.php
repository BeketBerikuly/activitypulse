<div class="modal fade" id="devInfo<?php echo $row['e_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Activity monitoring</h6>
            </div>
            <?php
            ?>
            <div class="modal-body">
                <div class="fetched-data"></div>
                <img class="card-profile-img" src="assets/images/sm/<?php echo $row['e_img'] ?>" alt="">
                <h6 class="mb-0"><?php echo $row['e_initial'] ?></h6>
                <span><?php echo $row['e_name'] ?></span>
                <hr>
                <h6>Status</h6>
                <?php
                if ($row['e_isAvailable']) {
                    echo "<span class=\"tag tag-green\">Currently available</span>";
                } else {
                    echo "<span class=\"tag tag-danger\">Currently unavailable</span>";
                }
                ?>
                <hr>
                <p>Working on</p>
                <ul class="list-group list-group-flush">
                    <?php
                    $emp_id = $row['e_id'];
                    $sql_activ = "SELECT a.number a_number, a.name a_name 
                    FROM activity a, employee e, developer d 
                    WHERE d.emp_id = e.id AND d.activity_id = a.id AND e.id = '$emp_id'";
                    $result_activ = mysqli_query($db, $sql_activ);
                    while ($row_activ = mysqli_fetch_assoc($result_activ)) {
                    ?>
                        <li class="list-group-item"><?php echo $row_activ['a_number'] . " " . $row_activ['a_name'] ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>