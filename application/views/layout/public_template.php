<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title><?=$title?></title>
    	<link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/public.css">
	</head>
	<body>
        <nav class="top-menu">
        	<div class="container-fluid">
        		<a href="<?=site_url()?>" class="brand"><b>FEYA</b> STORE</a>
                <di class="menu-item">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Favorit</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </di>
                <?php if(empty($sign)):?>
        		<p class="menu-sign"><a href="register">Sign Up</a> / <a href="login">Sign In</a></p>
                <?php else:?>
                <div class="menu-item-i">
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a class="pointer btn-bar"><i class="fa fa-bars"></i></a></li>
                </div>
                <?php endif;?>
                <form method="post" class="search">
                    <input type="text" placeholder="Search...">
                    <button class="btn-unstyle"><i class="fa fa-search"></i></button>
                </form>
                <div class="clearfix"></div>
        	</div>
        </nav>
        <div class="menu-side">
            <div class="side-close">
                <div class="btn-close-side close-side pointer"><i class="fa fa-times"></i></div>
                <div class="clearfix"></div>
            </div>
            <div class="menu-side-item">
                <li><a href="#">Home</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Edit Profil</a></li>
                <li><a href="#">Keluar</a></li>
            </div>
        </div>
        <?=$content?>
        <footer>
            <div class="footer-1 container">
                <div class="col-md-3">
                    <h4>CATEGORIES</h4>
                    <br>
                    <li>Makanan</li>
                    <li>Fashion</li>
                    <li>Properti</li>
                </div>
                <div class="col-md-3">
                    <h4>HELP</h4>
                    <br>
                    <li>Track Order</li>
                    <li>Returns</li>
                    <li>Shipping</li>
                    <li>FAQs</li>
                </div>
                <div class="col-md-3">
                    <h4>GET IN TOUCH</h4>
                    <br>
                    <p>Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879</p>
                    <div class="scm">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>NEWSLETTER</h4>
                    <br>
                    <div class="send-email">
                        <div class="form-group">
                            <input type="text" placeholder="email@example.com">
                        </div>
                        <button type="button" class="btn btn-subscribe btn-lg">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="footer-2">
                <p>Copyright ©2018 All rights reserved | This template is made with by feya project</p>
            </div>
        </footer>
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/public.js"></script>
	</body>
</html>