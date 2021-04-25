<div class="page">
    <div id="page_top" class="section-body top_dark">
        <div class="container-fluid">
            <div class="page-header">
                <div class="left">
                    <a href="javascript:void(0)" class="icon menu_toggle mr-3"><i class="im im-phone"></i></a>
                    <h1 class="page-title">Contacts</h1>
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
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="list" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="table-responsive" id="users">
                                <table class="table table-hover table-vcenter text-nowrap table_custom border-style list">
                                    <tbody>

                                        <tr>
                                            <td class="text-center width40">
                                                <i class="im im-phone"></i>
                                            </td>
                                            <td>
                                                <div><a href="javascript:void(0);">Call us</a></div>
                                                <div class="text-muted">+7 (7172) 70‒96‒00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center width40">
                                                <i class="im im-mail"></i>
                                            </td>
                                            <td>
                                                <div class="text-muted">ontimesoftware@work.com</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center width40">
                                                <i class="im im-location"></i>
                                            </td>
                                            <td>
                                                <div class="text-muted">​Dinmukhamed Kunayev, 1,
                                                    Esil district, Nursultan</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center width40">
                                                <i class="im im-clock"></i>
                                            </td>
                                            <td>
                                                <div><a href="javascript:void(0);">Buisness hours</a></div>
                                                <div class="text-muted">Mon - Fri ... 10 am - 8 pm || Sat, Sun ... Closed </div>
                                            </td>
                                        </tr>
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