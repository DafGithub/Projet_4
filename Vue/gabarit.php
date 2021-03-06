<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <base href="<?= $racineWeb ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="Billet simple pour l'Alaska, un livre de Jean Forteroche">
    <title><?= $titre ?></title>
    <!--    <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">-->
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body>

<!------------------Navbar----------------->

<section class="menu cid-ragWussxPT" once="menu" id="menu1-p">
    <nav class="navbar navbar-expand  navbar-dropdown align-items-center navbar-fixed-top collapsed bg-color transparent">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="visible menu-logo">
            <div class="navbar-brand">
                <span class="navbar-caption-wrap">
                    <span class="navbar-caption text-white display-4">
                        <?= $titre ?>
                    </span>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right navbar-nav-top-padding" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="">
                        <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                        Chercher sur le site
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="admin">
                        <span class="mbri-desktop mbr-iconfont mbr-iconfont-btn"></span>
                        S'identifier
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</section>


<div class="container">
    <div class="media-container-row">
        <div class="col-12 col-md-6">
            <?php if ($messageFlash): ?>
                <div class="alert alert-<?= $messageFlash['type'] ?> align-center alert-dismissible fade show"
                     role="alert">
                    <div><?= $messageFlash['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>


<!---------------contenu--------------->

<div id="contenu">
    <?= $contenu ?>
</div>
<div class="scrollUp"></div>


<!---------------Footer------------------>
<section once="" class="cid-ragQhbeR3B" id="footer7-l">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="" target="">A propos</a>
                    </li>
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="" target="">Services</a>
                    </li>
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="" target="">Contact</a>
                    </li>
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="" target="">Collaboration</a>
                    </li>
                </ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                    <div class="soc-item">
                        <a href="" target="">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="" target="">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="" target="">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="" target="">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-copirayt">
                <p class="text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2018 Daf - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>

<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/popper/popper.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
<script src="assets/parallax/jarallax.min.js"></script>
<script src="assets/smoothscroll/smooth-scroll.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/add.js"></script>


</body>
</html>
