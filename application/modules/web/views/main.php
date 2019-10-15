 <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Module ERP</h3>
          <p>
          <?php echo @$about_us->description ?>
          </p>
        </header>
      </div>
    </section><!-- #about -->




    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Gallery</h3>
        </header>

        <!-- <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> -->

        <div class="row portfolio-container">
            <?php if(isset($gallery)): ?>
                <?php foreach($gallery as $value):?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                    <div class="portfolio-wrap">
                        <figure>
                        <img src="<?php echo base_url().$value['image_thumb'] ?>" class="img-fluid" alt="">
                        <a href="<?php echo base_url().$value['image'] ?>" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                        </figure>
        
                        <div class="portfolio-info">
                        <p><?= $value['title'] ?></p>
                        </div>
                    </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

      </div>
    </section><!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Our Clients</h3>
        </header>

        <div class="owl-carousel clients-carousel">
            <?php if(isset($client)): ?>
                <?php foreach($client as $key=>$value): ?>
                    <img src="<?= base_url().$value['image'] ?>"  class="client-logo" alt="">
                <?php endforeach;?>
            <?php endif;?>
        </div>

      </div>
    </section><!-- #clients -->

    <!--==========================
      Clients Section
    ============================-->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row contact-info">

          <div class="col-md-3">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address><?= $contact->address ?></address>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:<?= $contact->mobile ?>"><?= $contact->mobile ?></a></p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:<?= $contact->email ?>"><?= $contact->email ?></a></p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="contact-phone">
              <i class="ion-ios-world-outline"></i>
              <h3>Web</h3>
              <p><a href="http://<?= $contact->web ?>"><?= $contact->web ?></a></p>
            </div>
          </div>

        </div>

        <div class="form contactForm">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
              <input required type="text" name="name" class="form-control" id="name" placeholder="Your Name"  />
              </div>
              <div class="form-group col-md-6">
                <input required type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              </div>
            </div>
            <div class="form-group">
              <input required type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            </div>
            <div class="form-group">
              <textarea required class="form-control" name="message" rows="3" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->
<script>
  $(document).ready(function(){
    $(".contactForm").on("submit",function(e){
      e.preventDefault();
      var url="<?php echo base_url(); ?>web/send_mail";
      $.ajax({
          url:url,
          type:"post",
          dataType:"json",
          data:$(this).serialize(),
          success:function(data){
            $("#sendmessage").show();
          }
      });
    });
  });
</script>