<?php

$content = isset($_GET['content_id']) ? $_GET['content_id'] : '';
?>
<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">activity <em>pulse</em> <a href="javascript:void(0)" class="menu_option float-right"><i class="im im-table font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">
            <li class="g_heading">Project</li>
            <li class="<?php if ($content == "dashboard" or $content == "") {
                            echo 'active';
                        } ?>"><a href="index.php?content_id=dashboard"><i class="im im-dashboard"></i><span>Dashboard</span></a>
            </li>
            <li class="<?php if ($content == "project") {
                            echo 'active';
                        } ?>"><a href="index.php?content_id=project"><i class="im im-folder-open"></i><span>Project list</span></a></li>
            <li class="<?php if ($content == "activity") {
                            echo 'active';
                        } ?>"><a href="index.php?content_id=activity"><i class="im im-task-o"></i><span>Activity
                        list</span></a></li>

            <li class="g_heading">Support</li>
            <li class="<?php if ($content == "contacts") {
                            echo 'active';
                        } ?>"><a href="index.php?content_id=contacts"><i class="im im-phone"></i><span>Contacts</span></a></li>
        </ul>
    </nav>
</div>