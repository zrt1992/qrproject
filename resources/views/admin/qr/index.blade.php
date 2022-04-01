@extends('layouts.master')
@section('content')
<link href="{{asset('admin-assets/assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}"
    rel="stylesheet">
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">QR</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">QR</li>
                    </ol>
                    <a type="button" href="{{route('qr.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i
                            class="fa fa-plus-circle"></i> Add New</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <style type="text/css">
            table.table tbody td {
                word-break: break-word;
                vertical-align: top;
            }
        </style>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">QR Listing</h4>
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
                            <h6 class="card-subtitle">{{$Session::get('message')}}</h6>
                        @endif
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>QR Code</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>1239941</td>
                                            <td>Some description here</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
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
@endsection
