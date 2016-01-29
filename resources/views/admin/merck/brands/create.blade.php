@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
    Create New Brand
@stop

{{-- Content --}}
@section('content')

    <section class="content-header">
    <h1>
        Create New Brand
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-fw fa-home"></i>
                Dashboard
            </a>
        </li>
        <li>Brands</li>
        <li class="active">
            <a href="{{ route('brand/create') }}">Create New Brand</a>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="fa fa-fw fa-users"></i>
                        Create New Brand
                    </h4>
                </div>
                <div class="panel-body">
                    @if($errors->has())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form class="form-horizontal" role="form" method="post" action="">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group {{ $errors-> first('name', 'has-error') }}">
                            <label for="title" class="col-sm-2 control-label">
                                Brand Name
                            </label>
                            <div class="col-sm-5">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Brand Name" value="{!! Input::old('name') !!}">
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('name', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <a class="btn btn-danger" href="{{ route('brands') }}">
                                    @lang('button.cancel')
                                </a>
                                <button type="submit" class="btn btn-success">
                                    @lang('button.save')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>
@stop
