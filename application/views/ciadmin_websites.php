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
                                <i class="fa fa-chain"></i> ვებ გვერდები
                            </li>
                        </ol>
                    </div>
                </div>
               
                <div class="row">
                    
                    
                    <div class="col-lg-12">
                     <p>
                     <a href="/addwebsite" class="btn btn-primary btn-md" role="button" target="_blank">დამატება</a>
                      <a href="/ci_admin/websites" class="btn btn-default btn-md" role="button">ყველა</a>
                     <a href="/ci_admin/websites/alloweds" class="btn btn-success btn-md" role="button">ნება დართული</a>
                     <a href="/ci_admin/websites/disallowed" class="btn btn-danger btn-md" role="button">ნებართვის გარეშე</a>
                      </p>
                        <div class="panel panel-default">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width:50px">#</th>
                                                <th>დასახელება</th>
                                                <th>კატეგორია</th>
                                                <th>ნახვა</th>
                                                <th>ბმული</th>
                                                <th>ნებართვა</th>
                                                <th>მოქმედება</th>
                                            </tr>
                                        </thead>
                                        <?php echo (!empty($websites[0])) ? $websites[0] : ""; ?>
                                    </table>

                            </div>
                        </div>
                         <?php echo (!empty($websites[1])) ? $websites[1] : ""; ?>
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