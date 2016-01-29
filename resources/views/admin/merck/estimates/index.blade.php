@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
  All Estimates
  @parent
@stop

{{-- page level styles --}}
@section('header_styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_css/estimate.css') }}" />
@stop


{{-- Page content --}}
@section('content')
  <section class="content-header">
    <h1>Estimates</h1>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('dashboard') }}">
          <i class="fa fa-fw fa-home"></i>
          Dashboard
        </a>
      </li>
      <li> Pricing Tool</li>
      <li>
        <a href="{{ route('estimates') }}">Estimates</a>
      </li>
    </ol>
  </section>

  <!-- Main content -->
	<section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">
              <i class="fa fa-fw fa-bell-o"></i>
              All Estimates
              <a href="{{ route('estimate/create') }}" class="btn btn-link pull-right create-estimate"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
            </h4>
          </div>
          <br />
          <div class="panel-body">
            <!-- <div class="table-responsive"> -->
              <table class="table table-hover" id="estimates-table">
                <thead>
                  <tr>
                    <th>Job Number</th>
                    <th>Brand</th>
                    <th>Job Type</th>
                    <th>Estimate Name</th>
                    <th>Region</th>
                    <th>Fees+OOP</th>
                    <th>Last Modified</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($estimates as $estimate)
                  <tr>
                    <td>{!! $estimate->job_number !!}</td>
                    <td>{!! $estimate->brand_id !!}</td>
                    <td><a href="{{ route('estimate/show', [$estimate->id]) }}">{!! $estimate->project_type !!}</a></td>
                    <td>{!! $estimate->estimate_name !!}</td>
                    <td>{!! $estimate->region !!}</td>
                    <td>{!! $estimate->fees !!}</td>
                    <td>{!! $estimate->updated_at !!}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
	</section>
@stop

@section('footer_scripts')
  <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#estimates-table').dataTable();
    });
  </script>
@stop


