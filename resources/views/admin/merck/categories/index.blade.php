@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Business Groups List
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Business Groups</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li> Pricing Tool</li>
            <li>
                <a href="{{ route('business-groups') }}">Business Groups</a>
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
	                        Business Groups List
	                    </h4>
	                    <div class="pull-right">
	                    <a href="{{ route('business-group/create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
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
                                @foreach ($groups as $group)
                                <tr>
                                    <td>{!! $group->id !!}</td>
                                    <td><a href="{{ route('business-group/show', [$group->id]) }}">{!! $group->name !!}</a></td>
                                    <td>{!! $group->created_at !!}</td>
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
