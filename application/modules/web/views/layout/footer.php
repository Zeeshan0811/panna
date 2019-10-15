<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h4><?= DC ?></h4>
            <p>
            <?php echo textshorten(@$about_us->description,250) ?>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#intro" class="scrollto">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#about" class="scrollto">ERP Module</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#portfolio" class="scrollto">Gallery</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#clients" class="scrollto">Our Client</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
                <?= $contact->address ?><br>
              <strong>Phone:</strong> <?= $contact->mobile ?><br>
              <strong>Email:</strong> <?= $contact->email ?><br>
              <strong>Web:</strong> <?= $contact->web ?><br>
            </p>

            <div class="social-links">
            <?php $social=social(); ?>
              <a class="facebook" data-toggle="tooltip" href="<?php echo ($social['facebook']!='')?$social['facebook']:'javascript:void(0)' ?>" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
              <a class="twitter" data-toggle="tooltip" href="<?php echo ($social['twitter']!='')?$social['twitter']:'javascript:void(0)' ?>" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
              <a class="linkedin" data-toggle="tooltip" href="<?php echo ($social['linkedin']!='')?$social['linkedin']:'javascript:void(0)' ?>" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <div class="pull-left">&copy; Copyright <strong><?= DC ?></strong>. All Rights Reserved</div>
            
          </div>
          <div class="col-md-6 col-xs-12">
            <div class="pull-right">Developed By : <strong><a href="http://citlbd.net" target="_blank">Century IT Ltd.</a></strong></div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->