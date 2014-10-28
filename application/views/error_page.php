<!DOCTYPE html>
<html lang="ka">
<head>
	<meta charset="utf-8" />
	<meta name="Author" content="created by STUDIO 404">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo $title; ?></title>
	<style type="text/css" rel="stylesheet">
	body{
		margin:0;
		padding: 0;
		border: 0;
		background: #f2f2f2;
	}
	.error-img{
		margin: 35px auto;
		padding: 0;
		width: 439px;
		height: 202px;
		background-image: url('../../assets/img/error-404.png');
		background-repeat: no-repeat;
		background-size: 100% !important;
		-webkit-transition: all 0.3s ease;
		-moz-transition: all 0.3s ease;
		-ms-transition: all 0.3s ease;
		-o-transition: all 0.3s ease;
		transition: all 0.3s ease;
	}
	@media screen and (max-width: 480px){
		.error-img{ 
			width: 90% !important;
			margin: 35px 5%;
		}
		.error-img img{
			width: 100% !important;
			height: auto !important;
		}
	}
	</style>
</head>
<body>
<div class="error-img"></div>
</body>
</html>