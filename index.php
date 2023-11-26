
<?php include "layouts/html_starting.php" ?>

  <title>United Peace Foundation</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.cdnfonts.com/css/freestyle-script" rel="stylesheet">
  <style>
    .our-programme-paragraph{
      display: none;
      position: absolute;
      opacity: 10;
      z-index: 9999;
      background: white;
      line-height: 20px;
      font-size: 15px;
    }

    .our-programme-paragraph-head:hover > .our-programme-paragraph{
      display:block;
    }
  </style>              
</head>
<body>

  <!-- pop-up content -->
<!-- <div class="popup-container">
  <div class="popup" style="top: "> <a href="corona-crisis-donate.php"><img src="images/popup.jpeg" /></a> </div>
</div> -->

<?php include "layouts/header.php"; ?>

 <!-- This relates to corousel effect material. -->

<div id="myslide" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="false">
  <div class="carousel-inner">
    <div class="item active" style="background-image:url(images/slider-1.jpg)">
      <div class="carousel-caption">
        <h1>An attempt to improve orphans’ life.</h1>
      </div>
    </div>
    <div class="item" style="background-image:url(images/slider-2.jpg)">
      <div class="carousel-caption">
        <h1>To educate poor and deprived children.</h1>
      </div>
    </div>
    <!-- <div class="item" style="background-image:url(images/slider-3.jpg)">
      <div class="carousel-caption">
        <h1>To feed the hungry and destitute.</h1>
      </div>
    </div> -->
    <!-- <div class="item" style="background-image:url(images/slider-4.jpg)">
      <div class="carousel-caption">
        <h1>To educate poor and deprived children.</h1>
      </div>
    </div> -->
    <div class="item" style="background-image:url(images/slider-5.jpg)">
      <div class="carousel-caption">
        <h1>To feed the hungry and destitute.</h1>
      </div>
    </div>
  </div>

  <!-- Controls --> 
  
  <a class="left carousel-control" href="#myslide" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myslide" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<div class="container-fluid margin-100">
  <div class="row">
    <div class="col-md-12 text-center">
      <h2><strong>WHO WE</strong> <span style="color:#67c18c"><strong>ARE</strong></span></h2>
      <img src="images/line.png" width="200" height="25"> </div>
    <div class="col-md-6 margin-30">
      <p>We are a non-profit organization working to improve the life of orphans, widows, destitute and homeless children. We work across India especially rural areas and for the underprivileged section of the society to establish brotherhood, peace and unity among the people of different religion, caste and creed.</p>
    </div>
    <div class="col-md-6 margin-30">
      <ul>
        <li>
          <p>Support orphans by providing food, education, medical assistance and other basic amenities.</p>
        </li>
        <li>
          <p>Sponsorship to orphans who are living with their mother / guardian by taking care of their monthly food and educational expenses.</p>
        </li>
        <li>
          <p>Provide monthly dietary assistance to widow headed families, destitute and helpless old age poor who are not capable of earning their bread. </p>
        </li>
      </ul>
    </div>
  </div>
  <div class="row text-center margin-50">
	  <h3><strong><span style="color:#67c18c">OUR</span> PROGRAMME</strong></h3>
    <img src="images/line.png" width="200" height="25"> </div>
  <div class="row margin-50 text-center">
    <div class="col-md-3 margin-20 our-programme-paragraph-head"> <img src="images/index-image-1.jpg" width="100%">
      <h3 class="margin-20">Orphan Sponsorship programme</h3>
      <p class="our-programme-paragraph">
        Orphan sponsorship is a vital lifeline for many poor children. There are many orphans who do not have enough support of their family. There are children whose shelter is a piece of plastic sheeting living day to day with a high risk of abuse and exploitation. <br>Our Orphan Sponsorship Programme changes the lives of children drastically in some of the most deprived section of the society. <br>With your help we can ensure that they receive education, food and healthcare with loving care and support that any child needs.
      </p>
    </div>
    <div class="col-md-3 margin-20 our-programme-paragraph-head"> <img src="images/index-image-2.jpg" width="100%">
      <h3 class="margin-20">Educational programme</h3>
      <p class="our-programme-paragraph">
        To uplift the deprived and underprivileged section of the society through education and make them capable of living as respected, responsible human beings. <br>By your kind love and support we provide educational expenses of poor students and orphans living with their widowed mother or guardians.<br>Intending to setup free educational institutions for poor students and launch various educational and training programmes.
      </p>
    </div>
    <div class="col-md-3 margin-20 our-programme-paragraph-head"> <img src="images/index-image-3.jpg" width="100%">
      <h3 class="margin-20">Food programme</h3>
      <p class="our-programme-paragraph our-programme-paragraph-head">
        Dietry assistance or food parcel is a lifeline for the families who have no income or bread earner. And for old helpless destitute who are unable to work and widowed headed families. <br>By your generous support we are able to provide necessary dietry assistance to these needy people. <br>United Peace Foundation is willing to reach every single needy in all parts of cities and villages to provide dietry assistance.
      </p>
    </div>
    <div class="col-md-3 margin-20 our-programme-paragraph-head"> <img src="images/index-image-3.jpg" width="100%">
      <h3 class="margin-20">Emergency Relief</h3>
      <p class="our-programme-paragraph">
        Disaster whether natural or man-made, children are the most vulnerable and adversely affected. More than half of the people who are affected by disaster are children. Our calling is to protect the well being of children affected by disaster like corona, flood or human conflict etc. <br>With your kind support our disaster management activities seek to save lives and reduce human suffering, protect and restore livelihoods.
      </p>
    </div>
  </div>
  <!-- <div class="row margin-50 text-center">
    <div class="col-md-6" onClick="window.location='corona-crisis-donate.php#corona'" style="cursor: pointer"><img src="images/corona-crisis.jpg" height="300" />
      <p class="margin-10">The coronavirus pandemic has taken the world by storm. It has not stopped United Peace foundation from distributing your aid to the most needy people so they can survive in this crisis. India is lockdown, the situation is extremely dire in the state of Jharkhand and millions of daily wage labours have been struggling to feed themselves and their families.</p>
    </div>
	<div class="col-md-6" onClick="window.location='corona-crisis-donate.php'" style="cursor: pointer"><img src="images/ramadan-2023-home.jpeg" height="300" />
      <p class="margin-10">The Coronavirus pandemic has taken the world by storm. India is lockdown, markets are shut and the situation is not similar to past year Ramadan. Many more families need aid this Ramdan. Without YOUR support, many will sadly go hungry this Ramdan without Iftar or Suhoor. Show your generosity to your brothers and sisters at the time of crisis and feed a family for complete month of Ramadan.</p>
    </div>
  </div>
</div> -->
<!--<div class="background-image-2" style="background-image:url(images/about.jpg);">
  <div class="container-fluid">
    <div class="row white">
      <div class="col-md-offset-6 col-md-6 bg-green padding-top-bottom-120">
        <div class="padding-50">
          <h2 style="font-size:60px; color:#fff; font-family:'Quicksand';">WHO WE ARE</h2>
          <br>
          <p style="font-family:'Quicksand'; color:#fff;">United Peace Foundation is a non-profit organization established to help and uplift the most vulnerable, orphans, destitute and widows regardless of faith race or creed.</p>
          <br>
          <p>We are humanity/ non-profit/ fundraising/ NGO organizations. Our humanity activities are taken place around the world,let contribute to them with us by your hand to be a better life.</p>
          <div class="margin-40 botton"> <a href="our-trust.php">Read More</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>-->
<div class="container margin-50">
  <div class="row text-center">
    <div class="col-md-8 col-md-offset-2">
      <h2><strong>OUR</strong> <span style="color:#6dc789"><strong>MISSION</strong></span></h2>
      <img src="images/line.png" width="200" height="25">
      <p style="margin-top:30px;">Many vulnerable orphans and abandoned children are left on the streets begging for survival, need care and support. To induct them into a society where they can get the chance to grow up in a loving and caring environment. To provide nutritious food, quality education, healthcare and shelter for the homeless orphans and poverty-stricken children. To help and uplift the destitute, widows and deprived section of the society regardless of their faith, caste or creed.</p>
    </div>
  </div>
  <!-- <div class="row margin-70 text-center">
    <div class="col-md-4 mission">
      <h3>Stay Connected</h3>
      <br>
      <p><i class="fa fa-4x fa-envelope"></i></p>
      <p>Write to Us</p>
    </div>
    <div class="col-md-4 mission">
      <h3>Share Your Views</h3>
      <br>
      <p><i class="fa fa-4x fa-share-alt"></i></p>
      <p>Your Suggestion to Improve</p>
    </div>
    <div class="col-md-4 mission">
      <h3>Do Good</h3>
      <br>
      <p><i class="fa fa-4x fa-thumbs-up"></i></p>
      <p>Become a Donar</p>
    </div> -->
  </div>
</div>

<?php include "layouts/footer.php"; ?>
<?php include "layouts/html_ending.php"; ?>