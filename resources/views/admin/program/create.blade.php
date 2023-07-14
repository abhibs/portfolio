@extends('admin.layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin Program Know</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Program Know</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf


                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <h6 class="mb-0">Image</h6>
                                        </div>
                                        <div class="col-sm-10 text-secondary">
                                            <input type="file" name="image" class="form-control" id="image" />
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <h6 class="mb-0"> </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ url('no_image.jpg') }}" alt="Admin"
                                                style="width:100px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-2">
                                            <h6 class="mb-0">Program Know</h6>
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input type="text" name="" class="form-control" id=""
                                                placeholder="Enter Program Name" />
                                        </div>
                                        <div class="col-sm-4 text-secondary">
                                            <input type="text" name="" class="form-control" id=""
                                                placeholder="Enter Program Know 1 to 100 " />
                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <button id="btnCakePrice2" style="border: none;"
                                                class="form-control text-danger" type="button"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div id="WeightContainer2"></div>


                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Add Program Know" />
                                        </div>
                                    </div>
                            </div>

                            </form>



                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script>
        $("#btnCakePrice2").bind("click", function() {
            var div = $("<div />");
            div.html(GetDynamicWeight2(""));
            $("#WeightContainer2").append(div);
        });
        $("body").on("click", ".removeGrossBtn2", function() {
            $(this).closest(".dynamicRadio2").remove();
        });

        function GetDynamicWeight2(value) {
            return `<div class="dynamicRadio2"> <div class="row mb-3">       <div class="col-sm-2">
      </div>
      <div class="col-sm-4 text-secondary">
         <input type="text" name="" class="form-control" id="" placeholder="Enter Program Name" />
      </div>
      <div class="col-sm-4 text-secondary">
         <input type="text" name="" class="form-control" id="" placeholder="Enter Program Know 1 to 100 " />
      </div>
        <div class="col-sm-2 form-group"><button style="border: none;" class="form-control text-danger removeGrossBtn2" id=""><i class="fa fa-minus"></i></button></div></div></div> `
        }
    </script>
@endsection
