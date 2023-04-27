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

                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" title="@lang('main.back')" href="{{ route('dashboard.todos.index') }}">
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <hr style="margin:10px 30px">

                    <div class="col-md-12 mt-2">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title float-left">{{$todo->title}}</h5>
                                <div class="float-right">
                                    @if($todo->finished == 0)
                                        <span class="badge-pill badge-lg badge-danger">Not Finished</span>
                                    @elseif($todo->finished == 1)
                                        <span class="badge-pill badge-lg badge-success">Finished</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="card-title text-center">{{$todo->description}}</p>
                            </div>
                        </div>
                    </div>
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
