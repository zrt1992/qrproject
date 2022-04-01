@extends('layouts.master')
@section('content')
<meta name="_token" content="{{csrf_token()}}" />
<div class="page-wrapper">
    <link href="{{asset('admin-assets/assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">City</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index.cities')}}">City</a></li>
                                <li class="breadcrumb-item active">Edit City</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit City</h4>
                                <form class="needs-validation" action="{{route('update.cities',[$city->id])}}" method="POST" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">City Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$city->name}}" id="validationCustom01" placeholder="Write City Name Here" required>
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom01">City Image</label>
                                            <input type="file" class="form-control" name="image[]" multiple onchange="readURL(this);">
                                            @if ($errors->has('image'))
                                                <div class="text-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-9">
                                            <label for="validationCustom01">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" value="{{$city->meta_title}}" id="validationCustom01" placeholder="Write Meta Title" required>
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('meta_title') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-9">
                                            <label for="validationCustom01">Meta Description</label>
                                            <textarea class="form-control" name="meta_description" id="validationCustom01" placeholder="Write Meta Description" required>{{$city->meta_description}}</textarea>
                                            @if ($errors->has('meta_description'))
                                                <div class="text-danger">{{ $errors->first('meta_description') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Status</label>
                                            <select name="active" class="form-control">
                                                <option @if($city->active == 1) selected @endif value="1">Active</option>
                                                <option @if($city->active == 0) selected @endif value="0">DeActive</option>
                                            </select>
                                            @if ($errors->has('active'))
                                                <div class="text-danger">{{ $errors->first('active') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Is comming soon?</label>
                                            <select name="is_comming_soon" class="form-control">
                                                <option @if($city->is_comming_soon == 1) selected @endif value="1">Yes</option>
                                                <option @if($city->is_comming_soon == 0) selected @endif value="0">No</option>
                                            </select>
                                            @if ($errors->has('active'))
                                                <div class="text-danger">{{ $errors->first('active') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row images">
                                        @foreach($city->images as $img)
                                        <div class="col-md-3">
                                            <img src="{{Cloudder::secureShow($img->thumb_url)}}"><span class="cross" onclick="removeImage({{$img->id}});">x</span>
                                        </div>
                                        @endforeach
                                    </div>
                                    <br>
                                    <button class="btn btn-primary" type="submit" id="update-city">Update City</button>
                                </form>
                                <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
@endsection

@section('page_javascript')
<script>
function removeImage($img)
        {
            $("#update-city").prop('disabled',true);
            $("#update-city").text('please wait...');
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });
                $.ajax({
                  url: "{{ route('remove.single.images') }}",
                  method: 'post',
                  data: {
                     img_id: $img
                  },
                    success: function(result){
                        $("#update-city").prop('disabled',false);
                        $("#update-city").text('Update City');
                    },
                    error: function(result){
                        $("#update-city").prop('disabled',false);
                        $("#update-city").text('Update City');
                        alert('Please try again!');
                    }
            });
        }
        $("div").delegate(".cross", "click", function(){
            $(this).parent().remove();
        });

function readURL(input) {
        j = 0;
        $('.images').empty();
        for(var i = 0; i < input.files.length; i ++){
            if (input.files && input.files[i]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = $('<div class="col-md-3"><img src="'+e.target.result+'" width="150" height="150"><div>');
                $('.images').append(img);
                j++;
            };


            reader.readAsDataURL(input.files[i]);
            }
        }
}
</script>
@endsection
