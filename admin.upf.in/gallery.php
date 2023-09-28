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

                        <div class="row">
                            <div class="col-sm-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light add-gallery-modal" data-toggle="modal" data-target=".bs-example-modal-center" style="font-size: 1rem; padding: 5px 8px";>Add gallery</button></h4>        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th class="text_center">Sl No.</th>
                                                <th class="text_center">Image</th>
                                                <th class="text_center">Title</th>
                                                <th class="text_center">Category</th>
                                                <th class="text_center">Preview page</th>
                                                <th class="text_center">Image location</th>
                                                <th class="text_center">City</th>
                                                <th class="text_center">State</th>
                                                <th class="text_center">Pincode</th>
                                                <th class="text_center">Created by</th>
                                                <th class="text_center">Created at</th>
                                                <th class="text_center">Updated by</th>
                                                <th class="text_center">Updated at</th>
                                                <th class="text_center">Action</th>
                                            </tr>
                                            </thead>        
                                            <tbody class="upf-gallery-table-data">
                                                <tr>
                                                    <td>1</td>
                                                    <td><img src="../../../upf_images/image.jpg" width="100px"></td>
                                                    <td>image.jpeg</td>
                                                    <td>osama</td>
                                                    <td>Carousal</td>
                                                    <td>Home Page</td>
                                                    <td>Carousal</td>
                                                    <td>Jamhsedpur</td>
                                                    <td>Jharkhand</td>
                                                    <td>832110</td>
                                                    <td>Shahnawaz Ahmad</td>
                                                    <td>18 Sep 2023 01:30:52 pm</td>
                                                    <td>Shahnawaz Ahmad</td>
                                                    <td>18 Sep 2023 01:30:52 pm</td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0)" class="btn btn-info waves-effect waves-light upf-edit-city" id="8" data-toggle="modal" data-target=".bs-example-modal-center"><i class="mdi mdi-pencil-outline"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-city" id="8"><i class="mdi mdi-trash-can-outline"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><img src="../../upf_images/PH.jpg" width="100px"></td>
                                                    <td>ph.jpeg</td>
                                                    <td>filename</td>
                                                    <td>Carousal</td>
                                                    <td>Home Page</td>
                                                    <td>Carousal</td>
                                                    <td>Jamhsedpur</td>
                                                    <td>Jharkhand</td>
                                                    <td>832110</td>
                                                    <td>Shahnawaz Ahmad</td>
                                                    <td>18 Sep 2023 01:30:52 pm</td>
                                                    <td>Shahnawaz Ahmad</td>
                                                    <td>18 Sep 2023 01:30:52 pm</td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0)" class="btn btn-info waves-effect waves-light upf-edit-city" id="8" data-toggle="modal" data-target=".bs-example-modal-center"><i class="mdi mdi-pencil-outline"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light upf-delet-city" id="8"><i class="mdi mdi-trash-can-outline"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>                                        
                                    </div>
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
        <script>
            $(document).ready(function(){

                // add gallery form
                $('.upf-add-gallery').on('submit', function(e){
                    e.preventDefault();
                    var message="";
                    var validated=0;
                    var gallery=$('.add-gallery').val();
                    $('.validation-tag').remove();
                    if(gallery==""){
                      $(".add-gallery").after("<span class='text-danger validation-tag'>Please enter gallery</span>");
                          validated=0;
                    }else{
                        $('.validation-tag').remove();
                            validated=1;
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
                                message="gallery saved.";
                                $('.show-upf-success-popup').click();
                                $(".succMessage").html(message);
                            }else if(argument=="duplicate"){
                                message="Don't enter same gallery twice";
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
                        $('.upf-gallery-table-data').html(gallery);
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
                  $.ajax({
                    url         : "tva/hewhoremains_gallery.php",
                    method      : "post",
                    data        : {delete_gallery:1,gallery_id:gallery_id},
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
                });

                $('body').delegate('.upf-edit-gallery', 'click', function(){
                    var gallery_id=$(this).attr('id');
                    call_gallery(gallery_id);
                    $('.changegallery-option').html("Edit gallery");
                    $('.add-gallery-id-hidden').val(gallery_id);
                    $('.add-gallery-btn').removeAttr('name');
                    $('.add-gallery-btn').attr('name', 'edit-gallery-btn');
                    $('.add-gallery').val("");
                    $('.add-gallery').removeAttr('placeholder');
                    $('.add-gallery').attr('placeholder', 'Rename your gallery');
                });

                $('body').delegate('.add-gallery-modal', 'click', function(){
                    $('.changegallery-option').html("Add gallery");
                    $('.add-gallery-btn').removeAttr('name');
                    $('.add-gallery-btn').attr('name', 'add-gallery-btn');
                    $('.add-gallery').val("");
                    $('.add-gallery').removeAttr('placeholder');
                    $('.add-gallery').attr('placeholder', 'Enter your gallery');
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
                                    <label for="example-text-input" class="col-md-4 col-form-label">Image</label>
                                    <div class="col-md-8">
                                        <form class="upf-add-gallery">
                                        <input class="form-control add-gallery" type="file" spellcheck="true" name="add-gallery" placeholder="Enter gallery name" onchange="readURL(this);" id="example-text-input" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-title" class="col-md-4 col-form-label">Title</label>
                                    <div class="col-md-8">
                                        <input class="form-control add-title" type="text" spellcheck="true" name="add-gallery" placeholder="Enter file name" id="add-title" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-category" class="col-md-4 col-form-label">Category</label>
                                    <div class="col-md-8">
                                        <select class="form-control add-category" id="add-category">
                                            <option>Logo</option>
                                            <option>Header-Logo</option>
                                            <option>Footer-Logo</option>
                                            <option>Gallery</option>
                                            <option>Testimonial</option>
                                            <option>Members</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-preview-page" class="col-md-4 col-form-label">Preview page</label>
                                    <div class="col-md-8">
                                        <select class="form-control add-category" id="add-preview-">
                                            <option>All</option>
                                            <option>Home</option>
                                            <option>About</option>
                                            <option>Latest causes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-image-location" class="col-md-4 col-form-label">Image location</label>
                                    <div class="col-md-8">
                                        <select class="form-control add-category" id="add-image-location">
                                            <option>select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-city" class="col-md-4 col-form-label">City</label>
                                    <div class="col-md-8">
                                        <select class="form-control add-city" id="add-city" name="add-city">
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
                                        <select class="form-control add-state" id="add-state" name="add-state">
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
                                    <label for="add-pincode" class="col-md-4 col-form-label">Pincode</label>
                                    <div class="col-md-8">
                                        <input class="form-control add-pincode" type="tel" maxlength="6" spellcheck="true" name="add-gallery" placeholder="Enter pincode" id="add-pincode" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="hidden"  name="add-gallery-id-hidden" class="add-gallery-id-hidden">
                                        <input type="hidden"  name="add-gallery-btn" class="add-gallery-btn">
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