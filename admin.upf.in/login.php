<?php 
    session_start();
    if(!empty($_SESSION['upf_admin_info_name'])){
        header('location:index.php');
    }
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login | United Peace Foundation</title>
        <?php include_once("layouts/header_links.php"); ?>

    </head>

    <body style="background-color: #67c18c">
        <!-- bg-primary bg-pattern // this is for primary bootstrap background inside class -->
        <div class="account-pages my-5 pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="index.php" class="logo"><img src="assets/images/logo-upf.png" height="150px" width="148px" alt="logo"></a>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Sign in to United Peace Foundation.</h5>
                                    <form class="form-horizontal user-login-form" action="#">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="username">Email/Phone number</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter email/phone number">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="userpassword">Password</label>
                                                    <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Enter password">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <input type="hidden" name="user-login-access">
                                                    <button class="btn btn-success btn-block waves-effect waves-light login-btn" type="submit">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>

        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light show-upf-alert-popup" style="display:none;" data-toggle="modal" data-target=".upf-modal-alert-popup"></button>
        <!-- end Account pages -->
        <?php include_once("layouts/footer_links.php"); ?>
        
        <script>
            $(document).ready(function(){

                // user login form
                $('.user-login-form').on('submit', function(e){
                    e.preventDefault();
                    $('.login-btn').prop('disabled', true);
                    var message="";
                    var validated=1;
                    var username=$("#username").val();
                    var userpassword=$("#userpassword").val();
                    $('.validation-tag').remove();
                    if(username==""){
                        $("#username").after("<span class='text-danger validation-tag'>Please enter username</span>");
                        validated=0;
                    }else{
                        $('.validation-tag').remove();
                        validated=1;
                    }
                    if(userpassword==""){
                        $("#userpassword").after("<span class='text-danger validation-tag'>Please enter password</span>");
                        validated=0;
                    }else{
                        $('.validation-tag').remove();
                        validated=1;
                    }
                    if(validated==1){
                        $.ajax({
                            url         : "tva/hewhoremains_auth.php",
                            method      : "post",
                            data        : new FormData(this),
                            contentType : false,
                            processData : false,
                            // dataType : 'JSON',
                            success     : function (argument) {
                              // console.log(argument);
                                argument=argument.trim();
                                if(argument=="success"){
                                    $('.user-login-form').after('<p class="text-success">Loging in</p>');
                                    window.location.href="index.php";
                                }else if(argument=="not"){
                                    $('.login-btn').prop('disabled', false);
                                    message="Invalid credential";
                                    $('.show-upf-alert-popup').click();
                                }
                            }
                        });                         
                    }
                });
            });
        </script>
    </body>
</html>
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