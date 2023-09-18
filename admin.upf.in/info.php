<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Info | United Peace Foundation</title>
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
                                    <h4 class="mb-0 font-size-18">Info</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">United Peace Foundation</a></li>
                                            <li class="breadcrumb-item active">Info</li>
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
                                        <h4 class="header-title"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light add-info-modal" data-toggle="modal" data-target=".bs-example-modal-center" style="font-size: 1rem; padding: 5px 8px";>Add Info</button></h4>        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th class="text_center">Sl No.</th>
                                                <th class="text_center">Name</th>
                                                <th class="text_center">Domain Name</th>
                                                <th class="text_center">Phone Number</th>
                                                <th class="text_center">Created by</th>
                                                <th class="text_center">Created at</th>
                                                <th class="text_center">Updated by</th>
                                                <th class="text_center">Updated at</th>
                                                <th class="text_center">Action</th>
                                            </tr>
                                            </thead>        
                                            <tbody class="upf-info-table-data">
                                            <tr>
                                                <td>loading...</td>
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

                // add info form
                $('.upf-add-info').on('submit', function(e){
                  e.preventDefault();
                  $.ajax({
                    url         : "tva/hewhoremains_info.php",
                    method      : "post",
                    data        : new FormData(this),
                    contentType : false,
                    processData : false,
                    // dataType : 'JSON',
                    success     : function (argument) {
                      // console.log(argument);
                        argument=argument.trim();
                        var message="";
                        if(argument=="success"){
                            load_info();
                            $('.addinfobtnclose').click();
                            message="info saved.";
                            $('.show-upf-success-popup').click();
                            $(".succMessage").html(message);
                        }else if(argument=="duplicate"){
                            message="yeah empty";
                            $('.show-upf-alert-popup').click();
                        }else if(argument=="error"){
                            message="yeah empty";
                            $('.show-upf-alert-popup').click();
                        }else if(argument=="empty"){
                            message="yeah empty";
                            $('.show-upf-alert-popup').click();
                            $(".errorMessage").html(message);
                        }else if(argument=="logout"){
                            message="Oh no logout";
                            $('.show-upf-alert-popup').click();
                            $(".errorMessage").html(message);
                        }
                    }
                  }); 
                });

                // Load info
                load_info();
                function load_info(){
                    $.ajax({
                      url       : "tva/hewhoremains_info.php",
                      method    : "POST",
                      data      : {load_info:1},
                      dataType  : "JSON",
                      success   : function(info){
                        // console.log(info);
                        $('.upf-info-table-data').html(info);
                      }
                    });
                }

                // delete for info
                $('body').delegate('.upf-delet-info', 'click',  function(e){
                  e.preventDefault();
                  var info_id=$(this).attr('id');
                  $.ajax({
                    url         : "tva/hewhoremains_info.php",
                    method      : "post",
                    data        : {delete_info:1,info_id:info_id},
                    dataType    : "JSON",
                    success     : function (argument) {
                      // console.log(argument);
                        argument=argument.trim();
                        var message="";
                        if(argument=="success"){
                            load_info();
                            $('.addinfobtnclose').click();
                            message="info deleted.";
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
                            message="Oh no logout";
                            $('.show-upf-alert-popup').click();
                            $(".errorMessage").html(message);
                        }
                    }
                  }); 
                });

                $('body').delegate('.upf-edit-info', 'click', function(){
                    var info_id=$(this).attr('id');
                    $('.changeinfo-option').html("Edit info");
                    $('.add-info-id-hidden').val(info_id);
                    $('.add-info-btn').removeAttr('name');
                    $('.add-info-btn').attr('name', 'edit-info-btn');
                    $('.add-name').val("");
                    $('.add-domainname').val("");
                    $('.add-phonenumber').val("");
                    $('.add-name').removeAttr('placeholder');
                    $('.add-name').attr('placeholder', 'Rename your name');
                    $('.add-domainname').removeAttr('placeholder');
                    $('.add-domainname').attr('placeholder', 'Rename domain name');
                    $('.add-phonenumber').removeAttr('placeholder');
                    $('.add-phonenumber').attr('placeholder', 'Rename phone number');
                });

                $('body').delegate('.add-info-modal', 'click', function(){
                    $('.changeinfo-option').html("Add info");
                    $('.add-info-btn').removeAttr('name');
                    $('.add-info-btn').attr('name', 'add-info-btn');
                    $('.add-name').val("");
                    $('.add-domainname').val("");
                    $('.add-phonenumber').val("");
                    $('.add-name').removeAttr('placeholder');
                    $('.add-name').attr('placeholder', 'Enter your name');
                    $('.add-domainname').removeAttr('placeholder');
                    $('.add-domainname').attr('placeholder', 'Enter your domain name');
                    $('.add-phonenumber').removeAttr('placeholder');
                    $('.add-phonenumber').attr('placeholder', 'Enter your phone number');
                });



            });
        </script>
    </body>
</html>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0 changeinfo-option">Add info</h5>
                <button type="button" class="addinfobtnclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="add-name" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-6">
                                        <form class="upf-add-info">
                                        <input class="form-control add-name" type="text" spellcheck="true" name="add-name" placeholder="Enter info name" id="add-name" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-domainname" class="col-md-2 col-form-label">Domain Name</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-domainname" type="text" spellcheck="true" name="add-domainname" placeholder="Enter info name" id="add-domainname" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-phonenumber" class="col-md-2 col-form-label">Phone Number</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-phonenumber" type="text" spellcheck="true" name="add-phonenumber" placeholder="Enter info name" id="add-phonenumber" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="hidden"  name="add-info-id-hidden" class="add-info-id-hidden">
                                        <input type="hidden"  name="add-info-btn" class="add-info-btn">
                                        <button type="submit" class="btn btn-primary mt-3 mt-sm-0">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                    <h4 class="alert-heading font-18">Don't input the same info name twice</h4>
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