<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Gallery | United Peace Foundation</title>
        <?php include_once("layouts/header_links.php"); ?>

        <style>
            .text_center {
                text-align: center;
            }

            .gallery .card-pre {
                margin-bottom: 30px;
            }
            .gallery .card-pre .card-pre-img-top {
                height: 237px;
                object-fit: cover;
            }

            .gallery .card-post {
                position: relative;
                margin-bottom: 30px;
            }
            .gallery .card-post .card-img-top-post {
                height: 237px;
                object-fit: cover;
            }
            .gallery .card-post .gallery-card-body-post {
                display: none;
                position: absolute;
                background: white;
                width: 100%;
                bottom: 0;
                padding: 15px;
                box-shadow: 0px -3px 15px rgba(0, 0, 0, 0.1);
            }
            .gallery .card-post:hover .gallery-card-body-post {
                display: block;
            }
        </style>
    </head>
    <body data-sidebar="dark">
        <!-- Begin page -->
        <div id="layout-wrapper">
            <?php include_once("layouts/header.php"); ?>
            <!-- ========== Left Sidebar Start ========== -->            
            <?php include_once("layouts/nav-bar.php"); ?>

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Gallery</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">United Peace Foundation</a></li>
                                            <li class="breadcrumb-item active">Gallery</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>   

                        <!-- end page title -->

                        <div class="row gallery">
                            <div class="col-xl-12">
                                <input type="text" class="form-control searchImage" placeholder="Search here...">
                                <a href="javascript:void(0)" class="btn btn-primary">Find</a>
                            </div>
                        </div>
                        <div class="row show-gallerydata">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <div class="card card-pre">
                                    <a href="javascript:void(0)" class="add-gallery-modal" data-toggle="modal" data-target=".bs-example-modal-center">
                                        <img class="card-img-top card-pre-img-top img-fluid" src="../img/plus-sign.jpg" alt="Add Gallery">
                                    </a>
                                </div>
                            </div>                            
                        </div>

                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php include_once("layouts/footer.php"); ?>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light show-upf-success-popup" style="display:none;" data-toggle="modal" data-target=".upf-modal-success-popup"></button>
        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light show-upf-alert-popup" style="display:none;" data-toggle="modal" data-target=".upf-modal-alert-popup"></button>
        <?php include_once("layouts/footer_links.php"); ?>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){

                // add gallery form
                $('.upf-add-gallery').on('submit', function(e){
                    e.preventDefault();
                    $(this).prop('disabled', true);
                    var message="";
                    var validated=1;
                    var gallery=$('.imagename').val();
                    var title=$('.add-title').val();
                    $('.validation-tag').remove();
                    if(gallery==""){
                        $(".imagename").after("<span class='text-danger validation-tag'>Please enter gallery</span>");
                        validated=0;
                    }
                    if(title==""){
                        $(".add-title").after("<span class='text-danger validation-tag'>Please enter title</span>");
                        validated=0;
                    }
                    if(validated==1){
                      $.ajax({
                        url         : "tva/hewhoremains_gallery.php",
                        method      : "post",
                        data        : new FormData(this),
                        contentType : false,
                        processData : false,
                        // dataType : 'JSON',
                        success     : function (argument) {
                          // console.log(argument);
                            argument=argument.trim();
                            if(argument=="success"){
                                load_gallery();
                                $('.addgallerybtnclose').click();
                                message="Image saved.";
                                $('.imagename').val('');
                                $('.add-title').val('');
                                $('.add-captured-date').val('');
                                $('.add-city').val('NA');
                                $('.add-state').val('NA');
                                $('.show-upf-success-popup').click();
                                $(".succMessage").html(message);
                                $('.upf-add-gallery').prop('disabled', false);
                            }else if(argument=="duplicate"){
                                message="Don't enter same image twice";
                                $('.show-upf-alert-popup').click();
                                $(".errorMessage").html(message);
                                $('.upf-add-gallery').prop('disabled', false);
                            }else if(argument=="logout"){
                                message="Logged out";
                                $('.show-upf-alert-popup').click();
                                $(".errorMessage").html(message);
                                $('.upf-add-gallery').prop('disabled', false);
                            }else if(argument=="error"){
                                message="Something went wrong please check and try again.";
                                $('.show-upf-alert-popup').click();
                                $(".errorMessage").html(message);
                                $('.upf-add-gallery').prop('disabled', false);
                            }else if(argument=="error_uploading_file"){
                                message="Something went wrong please check image and try again.";
                                $('.show-upf-alert-popup').click();
                                $(".errorMessage").html(message);
                                $('.upf-add-gallery').prop('disabled', false);
                            }else if(argument=="invalid_file_type"){
                                message="Invalid file type.";
                                $('.show-upf-alert-popup').click();
                                $(".errorMessage").html(message);
                                $('.upf-add-gallery').prop('disabled', false);
                            }
                        }
                      }); 
                    }
                });

                // Load gallery
                load_gallery();
                function load_gallery(){
                    $.ajax({
                      url       : "tva/hewhoremains_gallery.php",
                      method    : "POST",
                      data      : {load_gallery:1},
                      dataType  : "JSON",
                      success   : function(gallery){
                        // console.log(gallery);
                        $('.show-gallerydata').html(gallery);
                      }
                    });
                }

                // call gallery
                function call_gallery(gallery_id){
                    $.ajax({
                      url       : "tva/hewhoremains_gallery.php",
                      method    : "POST",
                      data      : {call_gallery:1,gallery_id:gallery_id},
                      dataType  : "JSON",
                      success   : function(gallery){
                        // console.log(gallery);
                        $('.add-gallery').val(gallery.name);

                      }
                    });
                }

                // delete for gallery
                $('body').delegate('.upf-delet-gallery', 'click',  function(e){
                    e.preventDefault();
                    var gallery_id=$(this).attr('id');
                    if(confirm("Are you sure?")){
                        $.ajax({
                            url         : "tva/hewhoremains_gallery.php",
                            method      : "post",
                            data        : {delete_gallery:1,id:gallery_id},
                            dataType    : "JSON",
                            success     : function (argument) {
                              // console.log(argument);
                                argument=argument.trim();
                                var message="";
                                if(argument=="success"){
                                    load_gallery();
                                    $('.addgallerybtnclose').click();
                                    message="gallery deleted.";
                                    $('.show-upf-success-popup').click();
                                    $(".succMessage").html(message);
                                }else if(argument=="error"){
                                    message="yeah empty";
                                    $('.show-upf-alert-popup').click();
                                }else if(argument=="empty"){
                                    message="yeah empty";
                                    $('.show-upf-alert-popup').click();
                                    $(".errorMessage").html(message);
                                }else if(argument=="logout"){
                                    message="Logged out";
                                    $('.show-upf-alert-popup').click();
                                    $(".errorMessage").html(message);
                                }
                            }
                        });
                    } 
                });
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#upf-gallery-image')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(200);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>
</html>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0 changegallery-option">Add gallery</h5>
                <button type="button" class="addgallerybtnclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="imagename" class="col-md-4 col-form-label">Image</label>
                                    <div class="col-md-8">
                                        <form class="upf-add-gallery">
                                        <input class="form-control imagename" type="file" spellcheck="true" name="imagename" id="imagename" placeholder="Enter gallery name" onchange="readURL(this);" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-title" class="col-md-4 col-form-label">Title</label>
                                    <div class="col-md-8">
                                        <input class="form-control add-title" type="text" spellcheck="true" name="add_title" placeholder="Enter title" id="add-title" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-captured-date" class="col-md-4 col-form-label">Captured Date</label>
                                    <div class="col-md-8">
                                        <input class="form-control add-captured-date" type="date" maxlength="6" spellcheck="true" name="add_captureddate" placeholder="Enter captured date" id="add-captured-date" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-city" class="col-md-4 col-form-label">City</label>
                                    <div class="col-md-8">
                                        <select class="form-control add-city" id="add-city" name="add_city">
                                            <?php 
                                                include_once("../MCU/db.php");
                                                $city_qry=mysqli_query($con, "SELECT id, name FROM city");
                                                if(mysqli_num_rows($city_qry)>0){
                                                    echo '<option value="NA">Select</option>';
                                                    foreach($city_qry as $city_row){
                                                        echo '<option value="'.$city_row['id'].'">'.$city_row['name'].'</option>';
                                                    }
                                                }else{
                                                    echo '<option value="NA">No record found</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-state" class="col-md-4 col-form-label">State</label>
                                    <div class="col-md-8">
                                        <select class="form-control add-state" id="add-state" name="add_state">
                                            <?php 

                                                $state_qry=mysqli_query($con, "SELECT id, name FROM state");
                                                if(mysqli_num_rows($state_qry)>0){
                                                    echo '<option value="NA">Select</option>';
                                                    foreach($state_qry as $state_row){
                                                        echo '<option value="'.$state_row['id'].'">'.$state_row['name'].'</option>';
                                                    }
                                                }else{
                                                    echo '<option value="NA">No record found</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="hidden"  name="add-gallery-id-hidden" class="add-gallery-id-hidden">
                                        <input type="hidden"  name="add_gallery_btn" class="add-gallery-btn">
                                        <button type="submit" class="btn btn-primary mt-3 mt-sm-0">Save Image</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <img src="#" id="upf-gallery-image">
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="modal fade upf-modal-success-popup" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-modal="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert border p-0 mb-0">
                            <div class="card-header bg-soft-success">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h5 class="font-size-16 text-success my-1">Success Alert</h5>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="mdi mdi-checkbox-marked-circle-outline display-4 text-success"></i>
                                    </div>
                                    <h4 class="alert-heading font-18">Well done!</h4>
                                    <p class="succMessage"></p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        Ok
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade upf-modal-alert-popup" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-modal="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert border mt-4 mt-lg-0 p-0 mb-0">
                            <div class="card-header bg-soft-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h5 class="font-size-16 text-danger my-1">Danger Alert</h5>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="mdi mdi-alert-outline display-4 text-danger"></i>
                                    </div>
                                    <p class="errorMessage"></p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        Ok
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>