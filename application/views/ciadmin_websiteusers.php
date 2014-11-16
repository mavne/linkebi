<?php
@include("application/views/parts/ci_header.php");
?>
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="/ci_admin/welcome">ადმინ პანელი 0.01.1</a>
            </div>
            <!-- Top Menu Items -->
            <?php
            @include("application/views/parts/ci_topprofile.php");
            @include("application/views/parts/ci_navigation.php");
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ვებ გვერდები <small>&nbsp;</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="/ci_admin/welcome"><i class="fa fa-dashboard"></i> მთავარი გვერდი</a>
                            </li> 
                            <li class="active">
                                <i class="fa fa-users"></i> მომხმარებლები
                            </li>
                        </ol>
                    </div>
                </div>
               
                <div class="row">
                    
                    
                    <div class="col-lg-12">
                     
                        <div class="panel panel-default">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width:50px">#</th>
                                                <th>სახელი გვარი</th>
                                                <th>ელ-ფოსტს</th>
                                                <th>მომ. სახელი</th>
                                                <th>რეგ. თარიღი</th>
                                            </tr>
                                        </thead>
                                        <?php echo (!empty($website_users[0])) ? $website_users[0] : ""; ?>
                                    </table>

                            </div>
                        </div>
                         <?php echo (!empty($website_users[1])) ? $website_users[1] : ""; ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
@include("application/views/parts/ci_footer.php")
?>