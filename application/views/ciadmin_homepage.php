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
                            მთავარი გვერდი <small>სტატისტიკა</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> მთავარი გვერდი
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $category_count; ?></div>
                                        <div>კატეგორია</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/ci_admin/categories/">
                                <div class="panel-footer">
                                    <span class="pull-left">ნახვა</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-chain fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $category_website; ?></div>
                                        <div>ნებადართული ვებ გვერდები</div>
                                    </div>
                                </div>
                            </div>
                            <a href="ci_admin/websites/alloweds">
                                <div class="panel-footer">
                                        <span class="pull-left">ნახვა</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-chain fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $category_websitenot; ?></div>
                                        <div>ვებ გვერდები ნებართვის გარეშე</div>
                                    </div>
                                </div>
                            </div>
                            <a href="ci_admin/websites/disallowed">
                                <div class="panel-footer">
                                    <span class="pull-left">ნახვა</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $category_users; ?></div>
                                        <div>მომხმარებლები</div>
                                    </div>
                                </div>
                            </div>
                            <a href="ci_admin/websites">
                                <div class="panel-footer">
                                    <span class="pull-left">ნახვა</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-users fa-fw"></i> მომხმარებლები</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                   <?php echo $user_list; ?>
                                </div>
                                <div class="text-right">
                                    <a href="/ci_admin/webusers">ნახვა <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-chain fa-fw"></i> ვებ გვერდები</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>სახელი</th>
                                                <th>ბმული</th>
                                                <th>ნახვა</th>
                                                <th>მოქმედება</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($website_list as $row)
                                            {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row->{"id"}; ?></td>
                                                    <td><?php echo $row->{"name"}; ?></td>
                                                    <td><?php echo $row->{"url"}; ?></td>
                                                    <td><?php echo $row->{"clicks"}; ?></td>
                                                    <td><a href="<?php echo $row->{"url"}; ?>" target="_blank">ნახვა</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="/ci_admin/websites">ყველა <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
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