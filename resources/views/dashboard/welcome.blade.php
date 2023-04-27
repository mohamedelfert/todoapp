@extends('dashboard.layouts.app')
@section('title')
    {{ $title }}
@endsection
@push('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('dashboard/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@endpush
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ $title }}</h2>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}" class="default-color">@lang('main.dashboard')</a>
                </li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="box-header with-border">
                        <span style="display: block;margin-bottom:10px">Last 20 Todo Lists</span>
                    </div>
                </div>

                <hr style="margin:10px 30px">

                <div class="card-body">

                    @if($todos->count() > 0)
                        <h4 class="text-center" style="display: block;margin-bottom:10px">Not Finished</h4>
                        <div class="row">
                            @foreach($todos as $todo)
                                @if($todo->finished == 0)
                                    <div class="col-md-3 mt-2">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$todo->title}}</h5>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('dashboard.todos.show',$todo->id) }}"
                                                   class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                <span class="badge-pill badge-lg badge-danger">Not Finished</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title text-center text-danger">No Data Found</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <hr style="margin:10px 30px">

                    @if($todos->count() > 0)
                            <h4 class="text-center" style="display: block;margin-bottom:10px">Finished</h4>
                        <div class="row">
                            @foreach($todos as $todo)
                                @if($todo->finished == 1)
                                    <div class="col-md-3 mt-2">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$todo->title}}</h5>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('dashboard.todos.show',$todo->id) }}"
                                                   class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                <span class="badge badge-pill badge-success">Finished</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title text-center text-danger">No Data Found</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
        <!--/div-->
    </div>

@endsection
@push('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('dashboard/js/modal.js') }}"></script>
@endpush
