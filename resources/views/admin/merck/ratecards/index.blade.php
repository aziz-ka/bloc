@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Regions List
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Regions</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li> Pricing Tool</li>
            <li>
                <a href="{{ route('regions') }}">Regions</a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
	<section class="content">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-primary ">
	                <div class="panel-heading clearfix">
	                    <h4 class="panel-title pull-left"> <i class="fa fa-fw fa-bell-o"></i>
	                        Regions List
	                    </h4>
	                    <div class="pull-right">
	                    <a href="{{ route('region/create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
	                    </div>
	                </div>
	                <br />
	                <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('groups/table.id')</th>
                                    <th>@lang('groups/table.name')</th>
                                    <th>@lang('groups/table.created_at')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regions as $region)
                                <tr>
                                    <td>{!! $region->id !!}</td>
                                    <td><a href="{{ route('region/show', [$region->id]) }}">{!! $region->name !!}</a></td>
                                    <td>{!! $region->created_at !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
	                </div>
	            </div>
	        </div>
	    </div>    <!-- row-->
	</section>
@stop
