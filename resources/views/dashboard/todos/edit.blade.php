@extends('dashboard.layouts.app')
@section('title')
    {{ $title }}
@endsection
@push('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('dashboard/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@endpush
@section('content')

    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ $title }}</h2>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}" class="default-color">@lang('main.dashboard')</a></li>
                <li class="breadcrumb-item active">@lang('main.edit_todo')</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>@lang('main.error')</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" title="@lang('main.back')" href="{{ route('dashboard.todos.index') }}">
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <hr style="margin:30px 30px">

                    <form action="{{ route('dashboard.todos.update',$todo->id) }}" method="POST">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="form-group">
                            <label for="title" class="form-label">@lang('main.title')</label>
                            <input type="text" name="title" id="title" value="{{$todo->title}}" class="form-control" placeholder="Enter a Title">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">@lang('main.description')</label>
                            <textarea rows="5" name="description" id="description" type="text" class="form-control" placeholder="Add a Description">{{$todo->description}}</textarea>
                        </div>
                        <input type="hidden" name="_method" value="put" />
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
@push('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('dashboard/js/modal.js') }}"></script>
@endpush
