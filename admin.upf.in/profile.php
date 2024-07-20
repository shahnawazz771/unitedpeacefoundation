<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Profile | United Peace Foundation</title>
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
                                    <h4 class="mb-0 font-size-18">Profile</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">United Peace Foundation</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
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
                                        <h4 class="header-title"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light add-profile-modal" data-toggle="modal" data-target=".bs-example-modal-center" style="font-size: 1rem; padding: 5px 8px";>Add profile</button></h4>        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th class="text_center">Sl No.</th>
                                                <th class="text_center">Image</th>
                                                <th class="text_center">Name</th>
                                                <th class="text_center">D.O.B</th>
                                                <th class="text_center">Parent's Name</th>
                                                <th class="text_center">Phone number</th>
                                                <th class="text_center">Address</th>
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
                                            <tbody class="upf-profile-table-data">
                                                <tr>
                                                    <td>1</td>
                                                    <td><img src="../../../upf_images/image.jpg" width="100px"></td>
                                                    <td>orphan1</td>
                                                    <td>2/5/2012</td>
                                                    <td>shafak</td>
                                                    <td>12397654</td>
                                                    <td>local</td>
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
                                                    <td>orphan2</td>
                                                    <td>25/4/1999</td>
                                                    <td>anzar</td>
                                                    <td>97654321</td>
                                                    <td>outside</td>
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

                // add profile form
                $('.upf-add-profile').on('submit', function(e){
                    e.preventDefault();
                    var message="";
                    var validated=0;
                    var profile=$('.add-profile').val();
                    $('.validation-tag').remove();
                    if(profile==""){
                      $(".add-profile").after("<span class='text-danger validation-tag'>Please enter profile</span>");
                          validated=0;
                    }else{
                        $('.validation-tag').remove();
                            validated=1;
                    }
                    if(validated==1){
                      $.ajax({
                        url         : "tva/hewhoremains_profile.php",
                        method      : "post",
                        data        : new FormData(this),
                        contentType : false,
                        processData : false,
                        // dataType : 'JSON',
                        success     : function (argument) {
                          // console.log(argument);
                            argument=argument.trim();
                            if(argument=="success"){
                                load_profile();
                                $('.addprofilebtnclose').click();
                                message="profile saved.";
                                $('.show-upf-success-popup').click();
                                $(".succMessage").html(message);
                            }else if(argument=="duplicate"){
                                message="Don't enter same profile twice";
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

                // Load profile
                load_profile();
                function load_profile(){
                    $.ajax({
                      url       : "tva/hewhoremains_profile.php",
                      method    : "POST",
                      data      : {load_profile:1},
                      dataType  : "JSON",
                      success   : function(profile){
                        // console.log(profile);
                        $('.upf-profile-table-data').html(profile);
                      }
                    });
                }

                // call profile
                function call_profile(profile_id){
                    $.ajax({
                      url       : "tva/hewhoremains_profile.php",
                      method    : "POST",
                      data      : {call_profile:1,profile_id:profile_id},
                      dataType  : "JSON",
                      success   : function(profile){
                        // console.log(profile);
                        $('.add-profile').val(profile.name);

                      }
                    });
                }

                // delete for profile
                $('body').delegate('.upf-delet-profile', 'click',  function(e){
                  e.preventDefault();
                  var profile_id=$(this).attr('id');
                  $.ajax({
                    url         : "tva/hewhoremains_profile.php",
                    method      : "post",
                    data        : {delete_profile:1,profile_id:profile_id},
                    dataType    : "JSON",
                    success     : function (argument) {
                      // console.log(argument);
                        argument=argument.trim();
                        var message="";
                        if(argument=="success"){
                            load_profile();
                            $('.addprofilebtnclose').click();
                            message="profile deleted.";
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

                $('body').delegate('.upf-edit-profile', 'click', function(){
                    var profile_id=$(this).attr('id');
                    call_profile(profile_id);
                    $('.changeprofile-option').html("Edit profile");
                    $('.add-profile-id-hidden').val(profile_id);
                    $('.add-profile-btn').removeAttr('name');
                    $('.add-profile-btn').attr('name', 'edit-profile-btn');
                    $('.add-profile').val("");
                    $('.add-profile').removeAttr('placeholder');
                    $('.add-profile').attr('placeholder', 'Rename your profile');
                });

                $('body').delegate('.add-profile-modal', 'click', function(){
                    $('.changeprofile-option').html("Add profile");
                    $('.add-profile-btn').removeAttr('name');
                    $('.add-profile-btn').attr('name', 'add-profile-btn');
                    $('.add-profile').val("");
                    $('.add-profile').removeAttr('placeholder');
                    $('.add-profile').attr('placeholder', 'Enter your profile');
                });

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#upf-profile-image')
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0 changeprofile-option">Add Profile</h5>
                <button type="button" class="addprofilebtnclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="add-title" class="col-md-2 col-form-label">Orphan's Name</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-title" type="text" spellcheck="true" name="add-profile" placeholder="Enter orphan's name" id="add-title" spellcheck="false" data-ms-editor="true">
                                    </div>
                                    <label for="add-title" class="col-md-1 col-form-label">Photo</label>
                                    <div class="col-md-3">
                                        <img src="../../../upf_images/image.jpg" width="100px">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-phonenumber" class="col-md-2 col-form-label">Phone Number</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-phonenumber" type="tel" maxlength="10" spellcheck="true" name="add-profile" placeholder="Enter phone number" id="add-phonenumber" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-dob" class="col-md-2 col-form-label">Date Of Birth</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-dob" type="date" spellcheck="true" name="add-profile" id="add-dob" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-mothername" class="col-md-2 col-form-label">Mother's Name</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-mothername" type="text" spellcheck="true" name="add-profile" placeholder="Enter mother's name" id="add-mothername" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-reasonofdeath" class="col-md-2 col-form-label">If Died (cause of death)</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-reasonofdeath" type="text" spellcheck="true" name="add-profile" placeholder="Enter the reason of death" id="add-reasonofdeath" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-motherdeathdate" class="col-md-2 col-form-label">Date of death</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-motherdeathdate" type="date" spellcheck="true" name="add-profile" id="add-motherdeathdate" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-guardianname" class="col-md-2 col-form-label">Guardian's Name</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-guardianname" type="text" spellcheck="true" name="add-profile" placeholder="Enter guardian's name" id="add-guardianname" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-relation" class="col-md-2 col-form-label">Relation with orphan</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-relation" type="text" spellcheck="true" name="add-profile" placeholder="Enter relation with orphan" id="add-relation" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-motheroccupation" class="col-md-2 col-form-label">Mother's Occupation</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-motheroccupation" type="text" spellcheck="true" name="add-profile" placeholder="Enter mother's occupation" id="add-motheroccupation" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-incomesource" class="col-md-2 col-form-label">Source Of Income</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-incomesource" type="text" spellcheck="true" name="add-profile" placeholder="Enter source of income" id="add-incomesource" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-fathername" class="col-md-2 col-form-label">Father's Name</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-fathername" type="text" spellcheck="true" name="add-profile" placeholder="Enter father's name" id="add-fathername" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-fatherdeathcause" class="col-md-2 col-form-label">Cause Of Death</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-fatherdeathcause" type="text" spellcheck="true" name="add-profile" placeholder="Enter the reason of death" id="add-fatherdeathcause" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-fatherdeathdate" class="col-md-2 col-form-label">Date Of Death</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-fatherdeathdate" type="date" spellcheck="true" name="add-profile" id="add-fatherdeathdate" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-totalfamilymember" class="col-md-2 col-form-label">Total Family Member </label>
                                    <div class="col-md-6">
                                        <input class="form-control add-totalfamilymember" type="tel" spellcheck="true" name="add-profile" placeholder="Enter total family member" id="add-totalfamilymember" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-fulladdress" class="col-md-2 col-form-label">Full Address</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control add-fulladdress" name="add-profile" placeholder="Enter full address here" id="add-fulladdress"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="add-bankaccount" class="col-md-2 col-form-label">Bank Account Details</label>
                                    <div class="col-md-6">
                                        <input class="form-control add-bankaccount" type="text" spellcheck="true" name="add-profile" placeholder="Enter complete details of bank" id="add-bankaccount" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="hidden"  name="add-profile-id-hidden" class="add-profile-id-hidden">
                                        <input type="hidden"  name="add-profile-btn" class="add-profile-btn">
                                        <button type="submit" class="btn btn-primary mt-3 mt-sm-0" >Save Profile</button>
                                    </div>
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