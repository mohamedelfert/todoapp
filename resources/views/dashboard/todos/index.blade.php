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
                        <span style="display: block;margin-bottom:10px">@lang('main.todo_list') : <small>( {{ $todos->total() }} )</small></span>
                        <div class="row">
                            <div class="col-md-4">
                                @if(auth()->user()->hasPermissionTo('todo-create'))
                                    <a class="btn btn-primary btn-sm" href="{{ route('dashboard.todos.create') }}"
                                       title="@lang('main.create')"><i class="fa fa-plus"></i></a>
                                @else
                                    <a class="btn btn-primary btn-sm disabled" title="@lang('main.create')"><i class="fa fa-plus"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <hr style="margin:10px 30px">

                <div class="card-body">

                    @if($todos->count() > 0)
                        <div class="row">
                        @foreach($todos as $todo)
                            <div class="col-md-3 mt-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                            <h5 class="card-title">{{$todo->title}}</h5>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('dashboard.todos.show',$todo->id) }}"
                                           class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('dashboard.todos.edit',$todo->id) }}"
                                           class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger"
                                           data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{$todo->id}}" title="@lang('main.delete')">
                                            <i class="las la-trash"></i></a>
                                        @if($todo->finished == 0)
                                            <a href="{{ route('dashboard.finish',$todo->id) }}">
                                                <span class="badge badge-pill badge-warning">Click To Finish</span>
                                            </a>
                                        @elseif($todo->finished == 1)
                                            <span class="badge badge-pill badge-success">Finished</span>
                                        @endif
                                    </div>
                                  </div>
                            </div>

                            <!-- delete -->
                            <div class="modal" id="delete{{$todo->id}}">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">@lang('main.delete')</h6>
                                            <button aria-label="Close" class="close"
                                                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('dashboard.todos.destroy', $todo->id) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <p>@lang('main.delete_msg')</p><br>
                                                <input type="hidden" name="id" id="id" value="{{$todo->id}}">
                                                <input class="form-control" name="title" id="title"
                                                       value="{{$todo->title}}" type="text" readonly>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">@lang('main.cancel')
                                                </button>
                                                <button type="submit" class="btn btn-danger">@lang('main.confirm')</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

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
