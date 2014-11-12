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
                            კატეგორიები <small>რედაქტირება</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="/ci_admin/welcome"><i class="fa fa-dashboard"></i> მთავარი გვერდი</a>
                            </li> 
                            <li>
                                <a href="/ci_admin/categories"><i class="fa fa-list"></i> კატეგორია</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> რედაქტირება
                            </li>
                        </ol>
                    </div>
                </div>
               
                <div class="row">                    
                    <div class="col-lg-12">
                        
                        <form action="/ci_admin/categories/edit/<?php echo $cur_url[6]; ?>" method="post" role="form">
                            <?php
                            if(!empty($message["category_add_message"]))
                            {
                            ?>
                                <div class="alert alert-success" role="alert"><i class="fa fa-check"></i> ოპერაცია წარმატებით დასრულდა</div>
                            <?php
                            }
                            if(!empty($message["category_add_error"]))
                            {
                            ?>
                                <div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> მოხდა შეცდომა</div>
                            <?php
                            }
                            ?>
                            <input type="hidden" name="form_type" value="edit_category" />
                            <div class="form-group">
                                <label>დასახელება:</label>
                                <input type="text" name="catname" class="form-control" value="<?php echo $category->{"name"} ?>" />
                            </div>
                            <div class="form-group">
                                <label>იკონკა:</label>
                                <input type="text" name="icon" class="form-control" value="<?php echo $category->{"icon"} ?>" />
                            </div>
                            <div class="form-group">
                                <label>ბმული (slug):</label>
                                <input type="text" name="slug" class="form-control" value="<?php echo $category->{"slug"} ?>" />
                            </div>

                            <button type="submit" class="btn btn-default">რედაქტირება</button>

                        </form>

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