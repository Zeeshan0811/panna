<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= DC ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?= base_url() ?>assets/web/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= base_url() ?>assets/web/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/web/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/web/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/web/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/web/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= WEB_CSS_URL ?>style.css" rel="stylesheet">
  <link href="<?= WEB_CSS_URL ?>custom.css" rel="stylesheet">
  
  <script src="<?= base_url() ?>assets/web/lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <?php $this->load->view("layout/header") ?>

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

        <?php if(isset($slider)): ?>
            <?php foreach($slider as $key=>$value): ?>
              <div class="carousel-item <?=  ($key==0)?"active":"" ?>">
                <div class="carousel-background"><img src="<?= base_url().$value['image'] ?>" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2 class="animated fadeInLeft"><?= $value["title"] ?></h2>
                    <p class="animated fadeInRight"><?= $value['details']?></p>
                    <a href="#about" class="btn-get-started scrollto animated fadeInUp">Get Started</a>
                  </div>
                </div>
              </div>
          <?php endforeach;?>
          <?php endif;?>
        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">
    <?php echo $content_for_layout ?>
  </main>

  <!--==========================
    Footer
  ============================-->
<?php $this->load->view("layout/footer") ?>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="<?= base_url() ?>assets/web/lib/easing/easing.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/superfish/hoverIntent.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/superfish/superfish.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/wow/wow.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/waypoints/waypoints.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/counterup/counterup.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?= base_url() ?>assets/web/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->

  <!-- Template Main Javascript File -->
  <script src="<?= WEB_JS_URL ?>main.js"></script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>
</body>
</html>
