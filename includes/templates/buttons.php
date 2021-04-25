<form action="" method="POST">
    <input class="btn text-light btn-<?php
                                        if ($row_dev_dash['status']) {
                                            echo "danger";
                                        } else {
                                            echo "green";
                                        }
                                        ?>" type="submit" value="<?php
                                                                    if ($row_dev_dash['status']) {
                                                                        echo "Stop";
                                                                    } else {
                                                                        echo "Start";
                                                                    }
                                                                    ?>" name="Estimate=<?php echo $row_dev_dash['a_id'] ?>" />
</form>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#estimateactivity<?php echo $row_dev_dash['a_id']; ?>">Estimate time</button>