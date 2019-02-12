<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title><?=$title?></title>
    	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap/css/bootstrap.min.css')?>">
    	<link rel="stylesheet" href="<?=base_url('assets/css/fontawesome/css/all.css')?>">
        <link rel="stylesheet" href="<?=base_url('assets/css/main.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/css/public.css')?>">
	</head>
	<body>
        <header>
            <div class="top-menu">
                <div class="container">
                    <div class="brand">Store</div>
                    <div class="top-tool">
                        <div class="dib pointer search-tl"><i class="fas fa-search"></i></div>
                        <div class="dib cart-tl"><a href=""><i class="fas fa-shopping-bag"></i><span class="cart-s">6</span></a></div>
                        <div class="dib sign-tl"><a href="" class="btn btn-success btn-sm">Login</a></div>
                    </div>
                    <nav>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Favorite</a></li>
                    </nav>
                </div>
            </div>
        </header>
        <?=$content?>
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/bootstrap/pooper.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/js/bootstrap/bootstrap.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/js/slide.js')?>"></script>
    </body>
</html>