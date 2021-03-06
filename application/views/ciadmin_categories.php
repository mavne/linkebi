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
                            კატეგორიები <small>&nbsp;</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="/ci_admin/welcome"><i class="fa fa-dashboard"></i> მთავარი გვერდი</a>
                            </li> 
                            <li class="active">
                                <i class="fa fa-list"></i> კატეგორია
                            </li>
                        </ol>
                    </div>
                </div>
               
                <div class="row">
                    
                    
                    <div class="col-lg-12">
                     <p><a href="/ci_admin/categories/add" class="btn btn-primary btn-md" role="button">დამატება</a> </p>
                        <div class="panel panel-default">
                          
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width:50px">#</th>
                                                <th style="width:100px">გადაადგილება</th>
                                                <th>დასახელება</th>
                                                <th>მოქმედება</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($categories as $row)
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $row->{"cats"}; ?></td>
                                                <td>
                                                    <a href="/ci_admin/categories/up/<?php echo $row->{"cats"}; ?>"><i class="fa fa-arrow-up"></i></a>
                                                    <a href="/ci_admin/categories/down/<?php echo $row->{"cats"}; ?>"><i class="fa fa-arrow-down"></i></a>
                                                </td>
                                                <td><?php echo $row->{"name"}; ?></td>
                                                <td>
                                                <a href="/ci_admin/categories/edit/<?php echo $row->{"cats"}; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="/ci_admin/categories/delete/<?php echo $row->{"cats"}; ?>"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>  
                                        </tbody>
                                    </table>
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