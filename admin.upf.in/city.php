<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>City | United Peace Foundation</title>
        <?php include_once("layouts/header_links.php"); ?>
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
                                    <h4 class="mb-0 font-size-18">City</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">United Peace Foundation</a></li>
                                            <li class="breadcrumb-item active">City</li>
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
                                        <h4 class="header-title"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center">Add City</button></h4>        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Slno</th>
                                                <th class="text-center">City name</th>
                                                <th class="text-center">Created by</th>
                                                <th class="text-center">Created at</th>
                                                <th class="text-center">Updated by</th>
                                                <th class="text-center">Updated at</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>        
                                            <tbody class="upf-city-table-data">
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

                // add city form
                $('.upf-add-city').on('submit', function(e){
                  e.preventDefault();
                  $.ajax({
                    url         : "tva/hewhoremains_city.php",
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
                            load_city();
                            $('.addcitybtnclose').click();
                            message="City saved.";
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

                        // window.location.reload;
                    }
                  }); 
                });

                // Load city

                load_city();
                function load_city(){
                    $.ajax({
                      url       : "tva/hewhoremains_city.php",
                      method    : "POST",
                      data      : {load_city:1},
                      dataType  : "JSON",
                      success   : function(city){
                        $('.upf-city-table-data').html(city);
                      }
                    });
                }
            });
        </script>
    </body>
</html>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add City</h5>
                <button type="button" class="addcitybtnclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">City Name</label>
                                    <div class="col-md-10">
                                        <form class="upf-add-city">
                                        <input class="form-control" type="text" name="add-city" placeholder="Enter city name" id="example-text-input" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="hidden"  name="add-city-btn">
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
                                    <h4 class="alert-heading font-18">Something went wrong</h4>
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