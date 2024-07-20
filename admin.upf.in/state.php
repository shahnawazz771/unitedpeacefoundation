<?php 
    session_start();
    if(empty($_SESSION['upf_admin_info_name'])){
        header('location:login.php');
    }
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>State | United Peace Foundation</title>
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
                                    <h4 class="mb-0 font-size-18">State</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">United Peace Foundation</a></li>
                                            <li class="breadcrumb-item active">State</li>
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
                                        <h4 class="header-title"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light add-state-modal" data-toggle="modal" data-target=".bs-example-modal-center" style="font-size: 1rem; padding: 5px 8px";>Add State</button></h4>        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th class="text_center">Sl No.</th>
                                                <th class="text_center">State Name</th>
                                                <th class="text_center">Created by</th>
                                                <th class="text_center">Created at</th>
                                                <th class="text_center">Updated by</th>
                                                <th class="text_center">Updated at</th>
                                                <th class="text_center">Action</th>
                                            </tr>
                                            </thead>        
                                            <tbody class="upf-state-table-data">
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

                // add state form
                $('.upf-add-state').on('submit', function(e){
                    e.preventDefault();
                    var message="";
                    var validated=0;
                    var state=$('.add-state').val();
                    $('.validation-tag').remove();
                    if(state==""){
                        $(".add-state").after("<span class='text-danger validation-tag'>Please enter state</span>");
                        validated=0;
                    }else{
                        $('.validation-tag').remove();
                        validated=1;
                    }
                    if(validated==1){
                        $.ajax({
                          url         : "tva/hewhoremains_state.php",
                          method      : "post",
                          data        : new FormData(this),
                          contentType : false,
                          processData : false,
                          // dataType : 'JSON',
                          success     : function (argument) {
                            // console.log(argument);
                              argument=argument.trim();
                              if(argument=="success"){
                                  load_state();
                                  $('.addstatebtnclose').click();
                                  message="state saved.";
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
                                  message="Logged out";
                                  $('.show-upf-alert-popup').click();
                                  $(".errorMessage").html(message);
                              }
                          }
                        });
                    } 
                });

                // Load state
                load_state();
                function load_state(){
                    $.ajax({
                      url       : "tva/hewhoremains_state.php",
                      method    : "POST",
                      data      : {load_state:1},
                      dataType  : "JSON",
                      success   : function(state){
                        // console.log(state);
                        $('.upf-state-table-data').html(state);
                      }
                    });
                }



                // call state
                function call_state(state_id){
                    $.ajax({
                      url       : "tva/hewhoremains_state.php",
                      method    : "POST",
                      data      : {call_state:1,state_id:state_id},
                      dataType  : "JSON",
                      success   : function(state){
                        // console.log(state);
                        $('.add-state').val(state.name);

                      }
                    });
                }

                // delete for state
                $('body').delegate('.upf-delet-state', 'click',  function(e){
                  e.preventDefault();
                  var state_id=$(this).attr('id');
                  $.ajax({
                    url         : "tva/hewhoremains_state.php",
                    method      : "post",
                    data        : {delete_state:1,state_id:state_id},
                    dataType    : "JSON",
                    success     : function (argument) {
                      // console.log(argument);
                        argument=argument.trim();
                        var message="";
                        if(argument=="success"){
                            load_state();
                            $('.addstatebtnclose').click();
                            message="state deleted.";
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

                $('body').delegate('.upf-edit-state', 'click', function(){
                    var state_id=$(this).attr('id');
                    call_state(state_id);
                    $('.changestate-option').html("Edit State Name");
                    $('.add-state-id-hidden').val(state_id);
                    $('.add-state-btn').removeAttr('name');
                    $('.add-state-btn').attr('name', 'edit-state-btn');
                    $('.add-state').val("");
                    $('.add-state').removeAttr('placeholder');
                    $('.add-state').attr('placeholder', 'Rename your state');
                });

                $('body').delegate('.add-state-modal', 'click', function(){
                    $('.changestate-option').html("Add State");
                    $('.add-state-btn').removeAttr('name');
                    $('.add-state-btn').attr('name', 'add-state-btn');
                    $('.add-state').val("");
                    $('.add-state').removeAttr('placeholder');
                    $('.add-state').attr('placeholder', 'Enter your state');
                });



            });
        </script>
    </body>
</html>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0 changestate-option">Add State</h5>
                <button type="button" class="addstatebtnclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">State</label>
                                    <div class="col-md-10">
                                        <form class="upf-add-state">
                                        <input class="form-control add-state" type="text" name="add-state" placeholder="Enter state name" id="example-text-input" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="hidden"  name="add-state-id-hidden" class="add-state-id-hidden">
                                        <input type="hidden"  name="add-state-btn" class="add-state-btn">
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