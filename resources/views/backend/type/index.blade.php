@extends('backend.layout.master')
@section('title')
    نوع السؤال
@endsection
@section('css')

@endsection
@section('content')
    <!--app-content open-->
    <div class="app-content">
        <div class="side-app">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">نوع السؤال</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
{{--                            <button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal">Add new quiz</button>--}}
                        @include('backend.type.create')
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
{{--                                        <th>action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$row->name}}</td>
{{--                                            <td>--}}

{{--                                                <button class="btn btn-success btn-sm"   data-bs-toggle="modal" data-bs-target="#edit{{$row->id}}"><i class="fa fa-edit"></i>  </button>--}}
{{--                                                <button class="btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i>--}}
{{--                                                </button>--}}
{{--                                            </td>--}}
                                            @include('backend.type.edit')
                                            @include('backend.type.deleted')
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- CONTAINER END -->

@endsection
@section('js')

@endsection
