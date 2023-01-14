@extends('backend.layout.master')
@section('title')
    الاجابات
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
                    <h1 class="page-title">الاجابات</h1>
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
                     
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                            
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                              
                                        @foreach(App\Models\Answer::where('question_id',$row->id)->get() as $answer)
                                
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$answer->name}}</td>
                                        </tr>
                                    @endforeach
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
