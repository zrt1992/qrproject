@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <link href="{{asset('admin-assets/assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">QR</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('qr.index')}}">City</a></li>
                                <li class="breadcrumb-item active">Add QR</li>
                            </ol>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @if(Session::has('message'))
                    <div class="row">
                        <div class="col-6">
                            <div class="alert alert-primary" role="alert">
                                {{Session::get('message')}}
                            </div>
                        </div>
                    </div>
                @endif
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add City</h4>
                                <form class="needs-validation" action="{{route('qr.store')}}" method="POST" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">QR</label>
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="qr-code-field" placeholder="Write City Name Here" required>
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-3 mb-3" style="padding-bottom: 0px; padding-top: 35px;">
                                            <span class="btn btn-primary form-control" onclick="generateQr();">Gererate Qr</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-9">
                                            <label for="validationCustom01">Meta Description</label>
                                            <textarea class="form-control" name="meta_description" value="{{old('meta_title')}}" id="validationCustom01" placeholder="Write Meta Description" required></textarea>
                                            @if ($errors->has('meta_description'))
                                                <div class="text-danger">{{ $errors->first('meta_description') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary" type="submit">Add QR</button>
                                </form>
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
function generateQr(){
    var randomNumber = Math.floor(Math.random() * 999999);
    $("#qr-code-field").val(randomNumber);
}
</script>
@endsection