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
                            ვებ გვერდი <small>რედაქტირება</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="/ci_admin/welcome"><i class="fa fa-dashboard"></i> მთავარი გვერდი</a>
                            </li> 
                            <li>
                                <a href="/ci_admin/websites"><i class="fa fa-chain"></i> ვებ გვერდი</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> რედაქტირება
                            </li>
                        </ol>
                    </div>
                </div>
               
                <div class="row">                    
                    <div class="col-lg-12">
                        
                        <form action="/ci_admin/websites/edit/<?php echo $cur_url[6]; ?>" method="post" role="form" enctype="multipart/form-data">
                            <?php
                            if(!empty($message["website_edit_message"]))
                            {
                            ?>
                                <div class="alert alert-success" role="alert"><i class="fa fa-check"></i> <?php echo $message["website_edit_message"]; ?></div>
                            <?php
                            }
                            if(!empty($message["website_edit_error"]))
                            {
                            ?>
                                <div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> <?php echo $message["website_edit_error"]; ?></div>
                            <?php
                            }
                            ?>
                            <input type="hidden" name="form_type" value="edit_website" />
                            <div class="form-group">
                                <label>დასახელება:</label>
                                <input type="text" name="name" class="form-control" value="<?php echo ($web->{"name"}) ? $web->{"name"} : ''; ?>" />
                            </div>
                            <div class="form-group">
                                <label>ბმული:</label>
                                <input type="text" name="url" class="form-control" value="<?php echo ($web->{"url"}) ? $web->{"url"} : ''; ?>" />
                            </div>
                            <div class="form-group">
                                <label>კატეგორია:</label>
                                <div class="row">
                                    <?php
                                    foreach($categories as $row)
                                    {
                                        $cat_array = explode(",",$web->{"cat_id"});
                                        if(in_array($row->{"cats"}, $cat_array)){ $checked = 'checked="checked"'; }
                                        else{ $checked = ''; }
                                        echo '<div class="col-lg-6" style="margin-top:10px;">';
                                        echo '<div class="input-group links-width-100">';
                                        echo '<span class="input-group-addon">';
                                        echo '<input type="checkbox" id="i-'.$row->{"cats"}.'" name="cat['.$row->{"cats"}.']" value="1" '.$checked.' />';
                                        echo '</span>';
                                        echo '<input type="text" class="form-control" disabled="disabled" value="'.$row->{"name"}.'" />';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                
                            </div>           

                            <div class="form-group">
                                <label>ფოტო:</label><br />
                                <img src="<?php echo ($web->{"img"}) ? $web->{"img"} : ''; ?>" width="180" height="73" alt="" /><br /><br />
                                <input type="file" name="file" class="form-control" value="" />
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