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
        <title>User | United Peace Foundation</title>
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
                                    <h4 class="mb-0 font-size-18">User</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">United Peace Foundation</a></li>
                                            <li class="breadcrumb-item active">User</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>   

                        <!-- end page title -->

                        <div class="row">
                            <div class="col-sm-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body" style="width: auto;overflow-x: auto;white-space: nowrap;">
                                        <h4 class="header-title"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light add-user-modal" data-toggle="modal" data-target=".bs-example-modal-center" style="font-size: 1rem; padding: 5px 8px";>Add User</button></h4>        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th class="text_center">Sl No.</th>
                                                <th class="text_center">Name</th>
                                                <th class="text_center">Email</th>
                                                <th class="text_center">Phone Number</th>
                                                <th class="text_center">Address</th>
                                                <th class="text_center">City</th>
                                                <th class="text_center">State</th>
                                                <th class="text_center">Pincode</th>
                                                <th class="text_center">Role</th>
                                                <th class="text_center">Created by</th>
                                                <th class="text_center">Created at</th>
                                                <th class="text_center">Updated by</th>
                                                <th class="text_center">Updated at</th>
                                                <th class="text_center">Action</th>
                                            </tr>
                                            </thead>        
                                            <tbody class="upf-user-table-data">
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

                // add user form
                $('.upf-add-user').on('submit', function(e){
                  e.preventDefault();
                    var message="";
                    var validated=1;
                    var username=$(".add-name").val();
                    var email=$(".add-email").val();
                    var phonenumber=$(".add-phonenumber").val();
                    var address=$(".add-address").val();
                    var pincode=$(".add-pincode").val();
                    var password=$(".add-password").val();
                    $('.validation-tag').remove();
                    if(username==""){
                        $(".add-name").after("<span class='text-danger validation-tag'>Please enter username</span>");
                        validated=0;
                    }else{
                        $('.validation-tag').remove();
                        validated=1;
                    }
                    if(email==""){
                        $(".add-email").after("<span class='text-danger validation-tag'>Please enter email</span>");
                        validated=0;
                    }else{
                        $('.validation-tag').remove();
                        validated=1;
                    }
                    if(phonenumber==""){
                        $(".add-phonenumber").after("<span class='text-danger validation-tag'>Please enter phone number</span>");
                        validated=0;
                    }else{
                        $('.validation-tag').remove();
                        validated=1;
                    }
                    if(address==""){
                        $(".add-address").after("<span class='text-danger validation-tag'>Please enter address</span>");
                        validated=0;
                    }else{
                        $('.validation-tag').remove();
                        validated=1;
                    }
                    if(pincode==""){
                        $(".add-pincode").after("<span class='text-danger validation-tag'>Please enter pincode</span>");
                        validated=0;
                    }else{
                        $('.validation-tag').remove();
                        validated=1;
                    }
                    if(password==""){
                        $(".add-password").after("<span class='text-danger validation-tag'>Please enter password</span>");
                        validated=0;
                    }else{
                        $('.validation-tag').remove();
                        validated=1;
                    }
                    if(validated==1){
                        $.ajax({
                            url         : "tva/hewhoremains_user.php",
                            method      : "post",
                            data        : new FormData(this),
                            contentType : false,
                            processData : false,
                            // dataType : 'JSON',
                            success     : function (argument) {
                              // console.log(argument);
                                argument=argument.trim();
                                if(argument=="success"){
                                    load_user();
                                    $('.adduserbtnclose').click();
                                    message="user saved.";
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

                // Load user
                load_user();
                function load_user(){
                    $.ajax({
                      url       : "tva/hewhoremains_user.php",
                      method    : "POST",
                      data      : {load_user:1},
                      dataType  : "JSON",
                      success   : function(user){
                        // console.log(user);
                        $('.upf-user-table-data').html(user);
                      }
                    });
                }

                // call user
                function call_user(user_id){
                    $.ajax({
                      url       : "tva/hewhoremains_user.php",
                      method    : "POST",
                      data      : {call_user:1,user_id:user_id},
                      dataType  : "JSON",
                      success   : function(user){
                        // console.log(user);
                        $('.add-name').val(user.name);
                        $('.add-email').val(user.email);
                        $('.add-phonenumber').val(user.contact);
                        $('.add-address').val(user.address);
                        $('.add-pincode').val(user.pincode);
                        $('.add-city').val(user.city_id);
                        $('.add-state').val(user.state_id);

                      }
                    });
                }

                // delete for user
                $('body').delegate('.upf-delet-user', 'click',  function(e){
                  e.preventDefault();
                  var user_id=$(this).attr('id');
                  $.ajax({
                    url         : "tva/hewhoremains_user.php",
                    method      : "post",
                    data        : {delete_user:1,user_id:user_id},
                    dataType    : "JSON",
                    success     : function (argument) {
                      // console.log(argument);
                        argument=argument.trim();
                        var message="";
                        if(argument=="success"){
                            load_user();
                            $('.adduserbtnclose').click();
                            message="User Deleted.";
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

                $('body').delegate('.upf-edit-user', 'click', function(){
                    var user_id=$(this).attr('id');
                    call_user(user_id)
                    $('.changeuser-option').html("Edit User");
                    $('.add-user-id-hidden').val(user_id);
                    $('.add-user-btn').removeAttr('name');
                    $('.add-user-btn').attr('name', 'edit-user-btn');
                    $('.add-name').val("");
                    $('.add-email').val("");
                    $('.add-phonenumber').val("");
                    $('.add-address').val("");
                    $('.add-pincode').val("");
                    $('.add-city').val("NA");
                    $('.add-state').val("NA");
                    $('.add-password').val("");
                    $('.add-name').removeAttr('placeholder');
                    $('.add-name').attr('placeholder', 'Re-enter user full name');
                    $('.add-email').removeAttr('placeholder');
                    $('.add-email').attr('placeholder', 'Re-enter user email ');
                    $('.add-phonenumber').removeAttr('placeholder');
                    $('.add-phonenumber').attr('placeholder', 'Re-enter user phone number');
                    $('.add-address').removeAttr('placeholder');
                    $('.add-address').attr('placeholder', 'Re-enter user address');
                    $('.add-pincode').removeAttr('placeholder');
                    $('.add-pincode').attr('placeholder', 'Re-enter user pincode');
                    $('.add-password').removeAttr('placeholder');
                    $('.add-password').attr('placeholder', 'Enter user password');
                });

                $('body').delegate('.add-user-modal', 'click', function(){
                    $('.changeuser-option').html("Add User");
                    $('.add-user-btn').removeAttr('name');
                    $('.add-user-btn').attr('name', 'add-user-btn');
                    $('.add-name').val("");
                    $('.add-email').val("");
                    $('.add-phonenumber').val("");
                    $('.add-address').val("");
                    $('.add-pincode').val("");
                    $('.add-city').val("NA");
                    $('.add-state').val("NA");
                    $('.add-password').val("");
                    $('.add-name').removeAttr('placeholder');
                    $('.add-name').attr('placeholder', 'Enter user full name');
                    $('.add-email').removeAttr('placeholder');
                    $('.add-email').attr('placeholder', 'Enter user email ');
                    $('.add-phonenumber').removeAttr('placeholder');
                    $('.add-phonenumber').attr('placeholder', 'Enter user phone number');
                    $('.add-address').removeAttr('placeholder');
                    $('.add-address').attr('placeholder', 'Enter user address');
                    $('.add-pincode').removeAttr('placeholder');
                    $('.add-pincode').attr('placeholder', 'Enter user pincode');
                    $('.add-password').removeAttr('placeholder');
                    $('.add-password').attr('placeholder', 'Enter user password');
                });



            });
        </script>
    </body>
</html>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0 changeuser-option">Add User</h5>
                <button type="button" class="adduserbtnclose" data-dismiss="modal" aria-label="Close">
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
                                    <div class="col-md-10">
                                        <form class="upf-add-user">
                                        <input class="form-control add-name" type="text" spellcheck="true" name="add-name" placeholder="Enter user name" id="add-name" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-email" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control add-email" type="text" spellcheck="true" name="add-email" placeholder="Enter user name" id="add-email" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-phonenumber" class="col-md-2 col-form-label">Phone Number</label>
                                    <div class="col-md-10">
                                        <input class="form-control add-phonenumber" type="tel" maxlength="10" spellcheck="true" name="add-phonenumber" placeholder="Enter user name" id="add-phonenumber" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-address" class="col-md-2 col-form-label">Address</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control add-address" spellcheck="true" name="add-address" placeholder="Enter user address" id="add-address" spellcheck="false" data-ms-editor="true"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-pincode" class="col-md-2 col-form-label">Pincode</label>
                                    <div class="col-md-10">
                                        <input class="form-control add-pincode" type="tel" maxlength="6" spellcheck="true" name="add-pincode" placeholder="Enter user pincode" id="add-pincode" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-city" class="col-md-2 col-form-label">City</label>
                                    <div class="col-md-4">
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
                                    <label for="add-state" class="col-md-2 col-form-label">State</label>
                                    <div class="col-md-4">
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
                                    <label for="add-password" class="col-md-2 col-form-label">Password</label>
                                    <div class="col-md-4">
                                        <input class="form-control add-password" type="password" spellcheck="true" name="add-password" placeholder="Enter user password" id="add-password" spellcheck="false" data-ms-editor="true">
                                    </div>
                                    <label for="add-role" class="col-md-2 col-form-label">Role</label>
                                    <div class="col-md-4">
                                        <select class="form-control add-role" id="add-role" name="add-role">
                                            <option>Administrator</option>
                                            <option>Employee</option>
                                            <option>User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="hidden"  name="add-user-id-hidden" class="add-user-id-hidden">
                                        <input type="hidden"  name="add-user-btn" class="add-user-btn">
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