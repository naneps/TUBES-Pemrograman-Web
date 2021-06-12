<?php


require_once '../proses/procedural.php';
$sql = 'SELECT * FROM tb_menu';
$query = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Responsive website food</title>
</head>

<body>

    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo">Jajanan</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active-link">Beranda</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">Tentang</a></li>
                    <li class="nav__item"><a href="#services" class="nav__link">Layanan</a></li>
                    <li class="nav__item"><a href="#menu" class="nav__link">Menu</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Kontak Kami</a></li>

                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--========== HOME ==========-->
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__data">
                    <h1 class="home__title">Tahu Gak ?</h1>
                    <h2 class="home__subtitle">Berbagai menu Tahu .</h2>
                    <a href="#" class="button">Lihat Menu</a>
                </div>
                <img src="assets/img/tahu.jpg" alt="" class="home__img">
            </div>
        </section>

        <!--========== ABOUT ==========-->
        <section class="about section bd-container" id="about">
            <div class="about__container  bd-grid">
                <div class="about__data">
                    <span class="section-subtitle about__initial">Tentang Kami</span>
                    <h2 class="section-title about__initial">Jajanan</h2>
                    <p class="about__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eum quod mollitia est. Atque assumenda dolorum magni quaerat suscipit accusantium.</p>
                    <a href="#" class="button">Explore Sejarah</a>
                </div>

                <img src="assets/img/about.jpg" alt="" class="about__img">
            </div>
        </section>

        <!--========== SERVICES ==========-->
        <section class="services section bd-container" id="services">
            <span class="section-subtitle">Layanan</span>
            <h2 class="section-title">Pelayanan Kami</h2>

            <div class="services__container  bd-grid">
                <div class="services__content">
                    <img src="" alt="ICON">
                    <h3 class="services__title">Excellent food</h3>
                    <p class="services__description">Lorem15</p>
                </div>

                <div class="services__content">
                    <img src="/App/assets/img/pizza.svg" alt="ICON">
                    <h3 class="services__title">Cepat Saji</h3>
                    <p class="services__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut
                        voluptates tenetur qui quod quo sed!</p>
                </div>

                <div class="services__content">
                    <img src="" alt="ICON">
                    <h3 class="services__title">Pengiriman Pesanan</h3>
                    <p class="services__description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint
                        vero ex natus sapiente cumque asperiores!</p>
                </div>
            </div>
        </section>

        <!--========== MENU ==========-->
        <section class="menu section bd-container" id="menu">
            <span class="section-subtitle">Menu </span>
            <h2 class="section-title">Menu Olahan Tahu</h2>

            <div class="menu__container bd-grid">

                <?php
                $no = 1;
                while ($row = mysqli_fetch_array($query)) {
                    echo
                    "<div class='menu__content'>
                                <img src='../image/" . $row['img'] . "' alt='gambar' class='menu__img'>
                                <h3 class='menu__name'>" . $row['menu'] . "</h3>
                                <span class='menu__detail'>" . $row['detail'] . "</span>
                                <span class='menu__preci'>Rp." . $row['harga'] . "</span>
                            </div>";
                }
                ?>


            </div>
        </section>


        <!--========== CONTACT US ==========-->
        <section class="contact section bd-container" id="contact">
            <div class="contact__container bd-grid">
                <div class="contact__data">
                    <span class="section-subtitle contact__initial">Let's talk</span>
                    <h2 class="section-title contact__initial">Contact us</h2>
                    <p class="contact__description">If you want to reserve a table in our restaurant, contact us and
                        we will attend you quickly, with our 24/7 chat service.</p>
                </div>

                <div class="contact__button">
                    <a href="#" class="button">Kontak kami sekarang</a>
                </div>
            </div>
        </section>
    </main>

    <!--========== FOOTER ==========-->
    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">Jajanan</a>
                <span class="footer__description">Kedai</span>
                <div>
                    <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Layanan</h3>
                <ul>
                    <li><a href="#" class="footer__link">Pengiriman Makanan</a></li>
                    <li><a href="#" class="footer__link"> </a></li>
                    <li><a href="#" class="footer__link">Cepat Saji</a></li>
                </ul>
            </div>



            <div class="footer__content">
                <h3 class="footer__title">Alamat</h3>
                <ul>
                    <li>Lohbener</li>
                    <li>Indramayu</li>
                    <li>45252</li>
                    <li>Jajanan@gmail.com</li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">&#169; 2021</p>
    </footer>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>
</body>

</html>