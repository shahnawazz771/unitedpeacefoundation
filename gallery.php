
<?php include "layouts/html_starting.php"; ?>

<title>Gallery</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="top-10 hidden-xs"></div>
<div class="top-bar hidden-xs">
  <div class="bg-top-bar padding-tb-10">
    <div class="container">
      <div class="row white">
        <div class="col-md-6">
          
        </div>
        <div class="col-md-6 text-right">
          
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "layouts/header.php" ?>

<div class="background-image-3" style="background-image:url(images/about-us.jpg);">
  <div class="container padding-top-bottom">
    <div class="row white">
      <div class="col-md-12">
        <div class="absolute-text">
          <h2>Gallery</h2>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="container padding-top-bottom-100">
  <div class="row text-justify">
    <div class="col-md-12">
      <h2><strong>GALLERY</strong></h2>
    </div>
  </div>
  <div class="service-img text-center">
    <div class="row margin-50">
      <div class="col-md-12">
        <ul class="gallery clearfix">
          <li><a href="images/gallery-1.jpg" rel="prettyPhoto[gallery1]"><img src="images/gallery-1.jpg"></a></li>
          <li><a href="images/gallery-2.jpg" rel="prettyPhoto[gallery1]"><img src="images/gallery-2.jpg"></a></li>
          <li><a href="images/gallery-3.jpg" rel="prettyPhoto[gallery1]"><img src="images/gallery-3.jpg"></a></li>
          <li><a href="images/gallery-4.jpg" rel="prettyPhoto[gallery1]"><img src="images/gallery-4.jpg"></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php include "layouts/footer.php"; ?>
<?php include "layouts/html_ending.php"; ?>