<!DOCTYPE>
<html lang="ka">
<head>
    <meta name="Author" content="created by STUDIO 404">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <title>Links</title>
    <base href="http://links.404.ge" />
    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/login.css" rel="stylesheet" media="screen">
  
</head>
<body>
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>გაიარეთ ავტორიზაცია</h1>
                    <form role="form" action="/ci_admin" method="post" id="login-form" autocomplete="off">
                        <input type="hidden" name="form_type" value="adminpanel" />
                        <div class="form-group">
                            <label for="username" class="sr-only">ადმინის სახელი:</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="ადმინის სახელი">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">პაროლი</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="პაროლი">
                        </div>
                       
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="სისტემაში შესვლა" />
                    </form>
                   
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>ადმინ პანელი 0.01.1 © - 2014</p>
                <p>ვებ უზრუნველყოფა <strong><a href="http://404.ge" target="_blank">სტუდია 404</a></strong></p>
            </div>
        </div>
    </div>
</footer>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>