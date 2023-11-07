
<?php include "layouts/html_starting.php"; ?>

<title>Contact Us</title>
</head>
<body>

</div><?php include "layouts/header.php" ?>

<div class="background-image-3" style="background-image:url(images/about-us.jpg);">
  <div class="container padding-top-bottom">
    <div class="row white">
      <div class="col-md-12">
        <div class="absolute-text">
          <h2>Contact Us</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.884049903956!2d86.20118731488776!3d22.80675993008248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f5e30f29160b25%3A0xfac0b933ba0c80cd!2sX-way+Designs!5e0!3m2!1sen!2sin!4v1527583353529" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<div class="bg-green">
  <div class="container padding-top-bottom-100">
    <div class="row white">
      <div class="col-md-3">
        <h4><i class="fa fa-phone"></i>&nbsp;&nbsp; +91 7463062868</h4>
      </div>
      <div class="col-md-4">
        <h4><i class="fa fa-envelope"></i>&nbsp;&nbsp; unitedpeacefoundation@gmail.com</h4>
      </div>
      <div class="col-md-5">
        <h4><i class="fa fa-map-marker"></i>&nbsp;&nbsp;  Zakir Nagar, Mango, Jamshedpur, INDIA</h4>
      </div>
    </div>
  </div>
</div>
<div class="container padding-top-bottom-120">
  <div class="row">
     <div class="col-md-offset-2 col-md-8">
        <form role="form" method="post" action="" name="form1" id="form1">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-20">
              <div class="form-group">
                <input type="text" name="cname" id="cname" class="form-control" placeholder="Full Name*" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-20">
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Your Email*" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-20">
              <div class="form-group">
                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Phone" required>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-20">
              <div class="form-group">
                <textarea name="message" id="message" rows="5" required class="form-control"  placeholder="Your Massage*"></textarea>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button type="submit" style="border-radius:0pc;" id="send" class="btn btn-default">Send</button>
            </div>
          </div>
        </form>
     </div>
  </div>
</div>

<?php include "layouts/footer.php"; ?>
<?php include "layouts/html_ending.php"; ?>