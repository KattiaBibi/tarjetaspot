<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= getNomApe($d) ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <!-- Start Include All CSS -->
    <link rel="stylesheet" href="css/Bittanto_Package/dark/bootstrap.css" />
    <link rel="stylesheet" href="css/Bittanto_Package/dark/animate.css" />
    <link rel="stylesheet" href="css/Bittanto_Package/dark/stroke-gap-icons.css" />
    <link rel="stylesheet" href="css/Bittanto_Package/dark/icofont.css" />
    <link rel="stylesheet" href="css/Bittanto_Package/dark/flaticon.css" />
    <link rel="stylesheet" href="css/Bittanto_Package/dark/Interest.css">
    <link rel="stylesheet" href="css/Bittanto_Package/dark/owl.carousel.min.css">
    <link rel="stylesheet" href="css/Bittanto_Package/dark/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/Bittanto_Package/dark/lightslider.css">
    <link rel="stylesheet" href="css/Bittanto_Package/dark/jquery.mCustomScrollbar.css">

    <link rel="stylesheet" href="css/Bittanto_Package/dark/preset.css" />
    <link rel="stylesheet" href="css/Bittanto_Package/dark/ignore_for_wp.css" />
    <link rel="stylesheet" href="css/Bittanto_Package/dark/theme.css" />
    <link rel="stylesheet" href="css/Bittanto_Package/dark/responsive.css" />
    <link rel="stylesheet" href="css/Bittanto_Package/dark/light.css" />
    <!-- End Include All CSS -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="images/Bittanto_Package/dark/favicon.png">
    <!-- Favicon Icon -->
</head>

<body class="dark">

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-box">
                <div class="letter">C</div>
                <div class="letter">A</div>
                <div class="letter">R</div>
                <div class="letter">G</div>
                <div class="letter">A</div>
                <div class="letter">N</div>
                <div class="letter">D</div>
                <div class="letter">O</div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <div class="container">
        <div class="row">
            <div class="col-lg-4 profileColumn">
                <div class="profileSidebar">
                    <div class="psHeader">
                        <svg preserveAspectRatio="none" viewBox="0 0 100 100">
                            <polygon points="0 20, 100 20, 0 100" opacity=".65"></polygon>
                        </svg>
                        <svg class="svg2" preserveAspectRatio="none" viewBox="0 0 100 120">
                            <polygon points="0 20, 100 20, 15 120" opacity=".8"></polygon>
                        </svg>
                        <div class="psContent">
                            <h3><?= getNomApe($d) ?></h3>
                            <span><?= $d['datosUsuario']['puesto'] ?></span>
                        </div>
                    </div>
                    <div class="psPhoto">
                        <img src="<?= !empty($d['datosUsuario']['url_foto_de_perfil']) ? $d['datosUsuario']['url_foto_de_perfil'] : 'images/Bittanto_Package/dark/home_01/1.jpg' ?>" alt="foto_de_perfil" />
                        <div class="psSocial">
                            <a href="<?= getRedSocial($d, 'Facebook') ?>" target="_blank" class="fac"><i class="icofont-facebook"></i></a>
                            <a href="<?= getRedSocial($d, 'Twitter') ?>" target="_blank" class="twi"><i class="icofont-twitter"></i></a>
                            <a href="<?= getRedSocial($d, 'Linkedin') ?>" target="_blank" style="background-color: #0e76a8;"><i class="icofont-linkedin"></i></a>
                            <a href="<?= getRedSocial($d, 'Instagram') ?>" target="_blank" class="ins"><i class="icofont-instagram"></i></a>
                        </div>
                    </div>

                    <div class="psFooter">
                        <a href="javascript:void(0);" class="btt_btn only_icon btt_reverse"><span><i class="icon icon-DownloadCloud"></i></span></a>
                        <a href="javascript:void(0);" class="btt_btn contact_me"><span><i class="icon icon-Bag"></i> Contactame</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 contentColumn" id="tabContainer">
                <header class="header clearfix">
                    <a href="javascript:void(0)" class="menu_btn"><i class="icofont-navigation-menu"></i>Menu</a>
                    <nav class="mainMenu">
                        <ul class="clearfix" id="mainTab">
                            <li class="active"><a href="#home"><i class="icon icon-House"></i><span>Acerca de Mi</span></a></li>
                            <li><a href="#resume"><i class="icon icon-User"></i><span>Empresa</span></a></li>
                            <li><a href="#portfolio"><i class="icon icon-Bulb"></i><span>Multimedia</span></a></li>
                            <li><a href="#blog"><i class="icon icon-ClipboardText"></i><span>Compartir</span></a></li>
                            <li><a href="#contact"><i class="icon icon-Imbox"></i><span>Contacto</span></a></li>
                        </ul>
                    </nav>
                    <!-- <a href="#" class="sidebarToggler"><span><span></span><span></span><span></span></span></a> -->
                </header>
                <div class="sidebar">
                    <a href="javascript:void(0);" class="widget_closer"><i class="icofont-close-line"></i></a>
                    <div class="widget widget-search">
                        <h3 class="widget_title">Search</h3>
                        <form method="post" action="#" class="search_form">
                            <input type="text" name="s" placeholder="Enter Keword">
                            <button type="submit"><i class="icon icon-Search"></i></button>
                        </form>
                    </div>
                    <div class="widget widget-search">
                        <h3 class="widget_title">Categories</h3>
                        <ul>
                            <li><a href="blog.html">Web</a>(18)</li>
                            <li><a href="blog.html">Startup</a>(11)</li>
                            <li><a href="blog.html">Branding</a>(17)</li>
                            <li><a href="blog.html">UI UX</a>(23)</li>
                            <li><a href="blog.html">Agency</a>(19)</li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h3 class="widget_title">
                            Recent Posts
                        </h3>
                        <div class="singleRecent">
                            <img src="images/Bittanto_Package/dark/blog/7.jpg" alt="">
                            <span>01 Apr, 2021</span>
                            <a href="single_blog.html">
                                Create your next web site with Unity.
                            </a>
                        </div>
                        <div class="singleRecent">
                            <img src="images/Bittanto_Package/dark/blog/8.jpg" alt="">
                            <span>31 Mar, 2021</span>
                            <a href="single_blog.html">
                                Truly unique hundreds of elements.
                            </a>
                        </div>
                        <div class="singleRecent">
                            <img src="images/Bittanto_Package/dark/blog/9.jpg" alt="">
                            <span>26 Mar, 2021</span>
                            <a href="single_blog.html">
                                Easily create unlimited amount of custom.
                            </a>
                        </div>
                    </div>
                    <div class="widget">
                        <h3 class="widget_title">Tags</h3>
                        <div class="tabclouds">
                            <a href="blog.html">Web Design</a>
                            <a href="blog.html">Development</a>
                            <a href="blog.html">CSS</a>
                            <a href="blog.html">Studio</a>
                            <a href="blog.html">Award</a>
                            <a href="blog.html">Mobile</a>
                            <a href="blog.html">IOS</a>
                            <a href="blog.html">IOS</a>
                            <a href="blog.html">UI / UX</a>
                            <a href="blog.html">Portfolio</a>
                        </div>
                    </div>
                </div>
                <div class="sidebarOverlay"></div>
                <div class="bodyContent" id="home">
                    <div class="pageCointainer">
                        <section class="comonSection aboutSection">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="sectionTitle">Acerca de Mi</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="icon_box_01">
                                                    <i class="icon icon-User"></i>
                                                    <h3>Mi Nombre</h3>
                                                    <p><?= getNomApe($d) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="icon_box_01">
                                                    <i class="icon icon-Calculator"></i>
                                                    <h3>Edad</h3>
                                                    <p><?= getEdad($d) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="icon_box_01">
                                                    <i class="icon icon-Mail"></i>
                                                    <h3>Correo Electronico</h3>
                                                    <p><?= getCorreoPrincipal($d)['url'] != null ? getCorreoPrincipal($d)['url'] : '-' ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="icon_box_01">
                                                    <i class="icon icon-Phone"></i>
                                                    <h3>Celular</h3>
                                                    <p><?= getTelefonoPrincipal($d)['numero'] != null ? getTelefonoPrincipal($d)['prefijo'] . ' ' . getTelefonoPrincipal($d)['numero'] : '-' ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="icon_box_01">
                                                    <i class="icon icon-Pointer"></i>
                                                    <h3>Dirección</h3>
                                                    <p>
                                                        <?php if (getLocalizacionPrincipal($d)['direccion']) : ?>
                                                            <a href="<?= getLocalizacionPrincipal($d)['link'] ?>" target="_blank">Haga Clic Aquí Para Ver el Mapa.</a>
                                                        <?php else : ?>
                                                            -
                                                        <?php endif; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt30">
                                    <div class="col-lg-12">
                                        <h2 class="sectionTitle mb22">Breve Biografia</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="abContent">
                                            <?= !empty($d['datosUsuario']['acerca_de_mi']) ? $d['datosUsuario']['acerca_de_mi'] : '-' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <?= getTextDerechosReservados() ?>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="bodyContent" id="resume">
                    <div class="pageCointainer">
                        <section class="comonSection resumeSection">
                            <div class="container-fluid">
                                <h2 class="sectionTitle">Empresa</h2>
                            </div>
                        </section>
                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <?= getTextDerechosReservados() ?>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="bodyContent" id="portfolio">
                    <div class="pageCointainer">
                        <section class="comonSection portfolioSection">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="sectionTitle">Multimedia</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="filterUL">
                                            <li class="active filter" data-filter="all">All</li>
                                            <li class="filter" data-filter="dev">Development</li>
                                            <li class="filter" data-filter="graphic">Graphic</li>
                                            <li class="filter" data-filter="app">App</li>
                                            <li class="filter" data-filter="illustrtopm">Illustration</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row" id="Grid">
                                    <div class="col-lg-4 folio_effect mix graphic">
                                        <div class="folio_item">
                                            <a href="single_folio.html" class="folio_item_thumbs">
                                                <div class="folio_stack">
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_img_holder">
                                                        <img class="folio_img" src="images/Bittanto_Package/dark/folio/1.jpg" alt="Image">
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="folio_content">
                                                <h3 class="folio_title"><a href="single_folio.html">Artwork Design</a></h3>
                                                <p class="folio_cat"><a href="portfolio.html">Graphic</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 folio_effect mix dev">
                                        <div class="folio_item">
                                            <a href="single_folio.html" class="folio_item_thumbs">
                                                <div class="folio_stack">
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_img_holder">
                                                        <img class="folio_img" src="images/Bittanto_Package/dark/folio/2.jpg" alt="Image">
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="folio_content">
                                                <h3 class="folio_title"><a href="single_folio.html">Web App</a></h3>
                                                <p class="folio_cat"><a href="portfolio.html">Development</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 folio_effect mix illustrtopm">
                                        <div class="folio_item">
                                            <a href="single_folio.html" class="folio_item_thumbs">
                                                <div class="folio_stack">
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_img_holder">
                                                        <img class="folio_img" src="images/Bittanto_Package/dark/folio/3.jpg" alt="Image">
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="folio_content">
                                                <h3 class="folio_title"><a href="single_folio.html">Pencil Drawing</a></h3>
                                                <p class="folio_cat"><a href="portfolio.html">Illustration</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 folio_effect mix app">
                                        <div class="folio_item">
                                            <a href="single_folio.html" class="folio_item_thumbs">
                                                <div class="folio_stack">
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_img_holder">
                                                        <img class="folio_img" src="images/Bittanto_Package/dark/folio/4.jpg" alt="Image">
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="folio_content">
                                                <h3 class="folio_title"><a href="single_folio.html">Graphic App</a></h3>
                                                <p class="folio_cat"><a href="portfolio.html">App</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 folio_effect mix graphic">
                                        <div class="folio_item">
                                            <a href="single_folio.html" class="folio_item_thumbs">
                                                <div class="folio_stack">
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_img_holder">
                                                        <img class="folio_img" src="images/Bittanto_Package/dark/folio/5.jpg" alt="Image">
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="folio_content">
                                                <h3 class="folio_title"><a href="single_folio.html">Awesome Illustration</a></h3>
                                                <p class="folio_cat"><a href="portfolio.html">UI/UX</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 folio_effect mix dev">
                                        <div class="folio_item">
                                            <a href="single_folio.html" class="folio_item_thumbs">
                                                <div class="folio_stack">
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_decoration"></div>
                                                    <div class="folio_img_holder">
                                                        <img class="folio_img" src="images/Bittanto_Package/dark/folio/6.jpg" alt="Image">
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="folio_content">
                                                <h3 class="folio_title"><a href="single_folio.html">Frontend Development</a></h3>
                                                <p class="folio_cat"><a href="portfolio.html">Development</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row loadMoreRow mb22">
                                    <div class="col-lg-12 loadMoreCol text-center mt23">
                                        <a href="#" data-count="1" class="btt_btn bttb_dark loadMoreItem"><span><i class="icon icon-Restart"></i> Load More</span></a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <?= getTextDerechosReservados() ?>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="bodyContent" id="blog">
                    <div class="pageCointainer">
                        <section class="comonSection blogSecion">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="sectionTitle">Compartir</h2>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <?= getTextDerechosReservados() ?>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="bodyContent" id="contact">
                    <div class="pageCointainer">
                        <section class="comonSection mapSection mb30">
                            <div class="map" id="map"></div>
                        </section>
                        <section class="comonSection contactSection">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="sectionTitle">Contactame</h2>
                                    </div>
                                </div>
                                <div class="row mb30">
                                    <div class="col-lg-8">
                                        <div class="contact_form">
                                            <form method="post" action="#" id="contactForm">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" class="required" name="full_name" placeholder="Full Name *" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="required" name="email" placeholder="Email *" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="phone" placeholder="Phone" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="required" name="sjubject" placeholder="Subject *" />
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea name="message" class="required" placeholder="Message *"></textarea>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="btt_btn"><span><i class="icon icon-Mail"></i>Enviar Mensaje</span></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="icon_box_01">
                                            <i class="icon icon-Mail"></i>
                                            <h3>Email Address</h3>
                                            <p>k.melissa@caroll.me</p>
                                        </div>
                                        <div class="icon_box_01">
                                            <i class="icon icon-Phone"></i>
                                            <h3>Phone Number</h3>
                                            <p>1.800.987.6987</p>
                                        </div>
                                        <div class="icon_box_01 addrBox">
                                            <i class="icon icon-Pointer"></i>
                                            <h3>Address</h3>
                                            <p>
                                                189 Lodge Avenue,
                                                Dagenham, RM8 2HQ,
                                                United Kingdom
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <?= getTextDerechosReservados() ?>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bact To Top -->
    <a href="javascript:void(0);" id="backtotop"><i class="icofont-bubble-up"></i></a>
    <!-- Bact To Top -->

    <!-- Start Include All JS -->
    <script src="js/Bittanto_Package/dark/jquery.js"></script>
    <script src="js/Bittanto_Package/dark/bootstrap.min.js"></script>
    <script src="js/Bittanto_Package/dark/jquery.appear.js"></script>
    <script src="js/Bittanto_Package/dark/owl.carousel.min.js"></script>
    <script src="js/Bittanto_Package/dark/mixer.js"></script>
    <script src="js/Bittanto_Package/dark/lightslider.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBJtPMZ_LWZKuHTLq5o08KSncQufIhPU3o"></script>
    <script src="js/Bittanto_Package/dark/gmaps.js"></script>
    <script src="js/Bittanto_Package/dark/anime.min.js"></script>
    <script src="js/Bittanto_Package/dark/folio.js"></script>
    <script src="js/Bittanto_Package/dark/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="js/Bittanto_Package/dark/jquery.easytabs.min.js"></script>
    <script src="js/Bittanto_Package/dark/theme.js"></script>
    <!-- End Include All JS -->
</body>

</html>