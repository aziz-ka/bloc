@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
  View Estimate
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_css/estimate.css') }}" />
@stop

{{-- Content --}}
@section('content')

  <section class="content-header">
  <h1>
    Estimate {!! $estimate->id !!}
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ route('dashboard') }}">
        <i class="fa fa-fw fa-home"></i>
        Dashboard
      </a>
    </li>
    <li><a href="{{ route('estimates') }}">Estimates</a></li>
    <li class="active">
      <a href="{{ route('estimate/show', [$estimate->id]) }}">View Estimate</a>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      @if($errors->has())
        @foreach ($errors->all() as $error)
          <div class="text-danger">{{ $error }}</div>
        @endforeach
      @endif
      <form role="form" method="post" action="{{ route('estimate/update', [$estimate->id]) }}">
        <!-- CSRF Token -->
        {!! Form::token() !!}

        <div class="panel panel-primary">
          <div class="panel-heading">Project Details</div>
          <div class="panel-body">
            <div class="form-froup col-xs-6">
              <label for="estimate_name">Estimate Name</label>
              <input name="estimate_name" type="text" class="form-control" value="{!! $estimate->estimate_name !!}">
            </div>
            <div class="form-group col-xs-6 {{ $errors-> first('name', 'has-error') }}">
              <label for="job_info">Job</label>
              <select name="job_info" class="form-control" required>
              <option value="{{ $estimate->job_info }}" selected>{!! $estimate->job_info !!}</option>
                <option value="123">123 | Brand | Description</option>
                <option value="456">456 | Brand | Description</option>
                <option value="789">789 | Brand | Description</option>
              </select>
            </div>
            <div class="form-group col-xs-6">
              <label for="comment">Comment</label>
              <textarea name="comment" rows="3" class="form-control">{!! $estimate->comment !!}</textarea>
            </div>
            <div class="form-group col-xs-6 {{ $errors-> first('name', 'has-error') }}">
              <label for="project_type">Project Type</label>
              <select name="project_type" class="form-control" required>
                <option value="{{ $estimate->project_type }}" selected>{!! $estimate->project_type !!}</option>
                <option value="HCP Campaign Development">HCP Campaign Development</option>
                <option value="HCP Print Sales Aid">HCP Print Sales Aid</option>
                <option value="HCP Spread in Print Sales Aid">HCP Spread in Print Sales Aid</option>
                <option value="HCP Modular Sales Aid">HCP Modular Sales Aid</option>
                <option value="HCP Spread in Modular sales aid">HCP Spread in Modular sales aid</option>
              </select>
              <br>
              <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et eos repellat quo neque totam beatae, voluptatibus tenetur magnam commodi praesentium adipisci, nobis eaque suscipit aspernatur, sed autem nihil. Fuga, sapiente.</div>
            </div>
            <div class="form-group col-xs-12 col-sm-2 {{ $errors-> first('name', 'has-error') }}">
              <label for="status">Status</label>
              <select name="status" class="form-control" required>
                <option value="{{ $estimate->status }}" selected>{!! $estimate->status !!}</option>
                <option value="open">Open</option>
                <option value="suspended">Suspended</option>
                <option value="restarted">Restarted</option>
                <option value="canceled">Canceled</option>
                <option value="complete">Complete</option>
                <option value="closed">Closed</option>
              </select>
            </div>
          </div>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            Estimate Levels
          </div>

          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Select</th>
                  <th>Level</th>
                  <th>Hours</th>
                  <th>Fee + OOP, $</th>
                  <th>Fees, $</th>
                  <th>Rate Card Fees, $</th>
                  <th>Rate Card Total, $</th>
                  <th>Var, %</th>
                  <th>Var, $</th>
                  <th>OOP, $</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input type="checkbox">
                  </td>
                  <td>B min</td>
                  <td>341.00</td>
                  <td>50,113</td>
                  <td>49,113</td>
                  <td>49,366</td>
                  <td>50,366</td>
                  <td>1</td>
                  <td>253</td>
                  <td>1000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            Support Configuration
          </div>

          <div class="panel-body">
            <ul class="nav nav-tabs">
              <li class="active" role="presentation">
                <a href="#nyph" role="tab" data-toggle="tab" aria-controls="New York - Manilla">
                  <i class="fa fa-check-square"></i>
                  NY / PH
                </a>
              </li>
              <li role="presentation">
                <a href="#nytor" role="tab" data-toggle="tab" aria-controls="New York - Torronto">
                  <i class="fa fa-check-square hidden"></i>
                  NY / TOR
                </a>
              </li>
              <li role="presentation">
                <a href="#nytorph" role="tab" data-toggle="tab" aria-controls="New York - Torronto - Manilla">
                  <i class="fa fa-check-square hidden"></i>
                  NY / TOR / PH
                </a>
              </li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="nyph" role="tabpanel">
              <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Functional Area</th>
                      <th>Location</th>
                      <th>Function</th>
                      <th>Rate, $</th>
                      <th>Hours</th>
                      <th>Cost, $</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
	                  @foreach ($estimateItem as $key => $item)
	                  	<tr>
		                  	<td class="hidden">
		                      <input type="hidden" name="support[{{ $key }}][id]" data-name="id" value="{{ $item->id }}" readonly>
		                  	</td>
	                      <td>
	                        <select name="support[{{ $key }}][job_function]" data-name="job_function" id="" class="form-control">
		                        <option value="{{ $item->job_function }}" selected>{!! $item->job_function !!}</option>
	                          <option value="account">Account</option>
	                          <option value="design">Design</option>
	                          <option value="development">Development</option>
	                        </select>
	                      </td>
	                      <td>
	                        <select name="support[{{ $key }}][location]" data-name="location" id="" class="form-control">
		                        <option value="{{ $item->location }}" selected>{!! $item->location !!}</option>
	                          <option value="NY">NY</option>
	                          <option value="TOR">TOR</option>
	                          <option value="PH">PH</option>
	                        </select>
	                      </td>
	                      <td>
	                        <select name="support[{{ $key }}][job_title]" data-name="job_title" id="" class="form-control">
		                        <option value="{{ $item->job_title }}" selected>{!! $item->job_title !!}</option>
	                          <option value="Merck - VP Account Director">Merck - VP Account Director</option>
	                          <option value="Merck - Account Manager">Merck - Account Manager</option>
	                          <option value="GM - PHP">GM - PHP</option>
	                        </select>
	                      </td>
	                      <td>
	                        <input name="support[{{ $key }}][rate]" data-name="rate" type="number" class="form-control" value="{{ $item->rate }}" readonly>
	                      </td>
	                      <td>
	                        <input name="support[{{ $key }}][hours]" data-name="hours" type="number" class="form-control" value="{{ $item->hours }}">
	                      </td>
	                      <td>
	                      <input name="support[{{ $key }}][allocation]" data-name="allocation" type="number" class="form-control" value="{{ $item->allocation }}" readonly>
	                      </td>
	                      <td>
	                        <button type="button" class="close remove-support" data-id="{{ $item->id }}" aria-label="Delete"><i class="fa fa-times" aria-hidden="true"></i></button>
	                      </td>
	                    </tr>
	                  @endforeach
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="nytor" role="tabpanel">
              <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Functional Area</th>
                      <th>Location</th>
                      <th>Function</th>
                      <th>Rate, $</th>
                      <th>Hours</th>
                      <th>Cost, $</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
	                  @foreach ($estimateItem as $key => $item)
	                  	<tr>
		                  	<td class="hidden">
		                      <input type="hidden" name="support[{{ $key }}][id]" data-name="id" value="{{ $item->id }}" readonly>
		                  	</td>
	                      <td>
	                        <select name="support[{{ $key }}][job_function]" data-name="job_function" id="" class="form-control">
		                        <option value="{{ $item->job_function }}" selected>{!! $item->job_function !!}</option>
	                          <option value="account">Account</option>
	                          <option value="design">Design</option>
	                          <option value="development">Development</option>
	                        </select>
	                      </td>
	                      <td>
	                        <select name="support[{{ $key }}][location]" data-name="location" id="" class="form-control">
		                        <option value="{{ $item->location }}" selected>{!! $item->location !!}</option>
	                          <option value="NY">NY</option>
	                          <option value="TOR">TOR</option>
	                          <option value="PH">PH</option>
	                        </select>
	                      </td>
	                      <td>
	                        <select name="support[{{ $key }}][job_title]" data-name="job_title" id="" class="form-control">
		                        <option value="{{ $item->job_title }}" selected>{!! $item->job_title !!}</option>
	                          <option value="Merck - VP Account Director">Merck - VP Account Director</option>
	                          <option value="Merck - Account Manager">Merck - Account Manager</option>
	                          <option value="GM - PHP">GM - PHP</option>
	                        </select>
	                      </td>
	                      <td>
	                        <input name="support[{{ $key }}][rate]" data-name="rate" type="number" class="form-control" value="{{ $item->rate }}" readonly>
	                      </td>
	                      <td>
	                        <input name="support[{{ $key }}][hours]" data-name="hours" type="number" class="form-control">
	                      </td>
	                      <td>
	                      <input name="support[{{ $key }}][allocation]" data-name="allocation" type="number" class="form-control" value="{{ $item->allocation }}" readonly>
	                      </td>
	                      <td>
	                        <button type="button" class="close remove-support" data-id="{{ $item->id }}" aria-label="Delete"><i class="fa fa-times" aria-hidden="true"></i></button>
	                      </td>
	                    </tr>
	                  @endforeach
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="nytorph" role="tabpanel">
              <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Functional Area</th>
                      <th>Location</th>
                      <th>Function</th>
                      <th>Rate, $</th>
                      <th>Hours</th>
                      <th>Cost, $</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
	                  @foreach ($estimateItem as $key => $item)
	                  	<tr>
		                  	<td class="hidden">
		                      <input type="hidden" name="support[{{ $key }}][id]" data-name="id" value="{{ $item->id }}" readonly>
		                  	</td>
	                      <td>
	                        <select name="support[{{ $key }}][job_function]" data-name="job_function" id="" class="form-control">
		                        <option value="{{ $item->job_function }}" selected>{!! $item->job_function !!}</option>
	                          <option value="account">Account</option>
	                          <option value="design">Design</option>
	                          <option value="development">Development</option>
	                        </select>
	                      </td>
	                      <td>
	                        <select name="support[{{ $key }}][location]" data-name="location" id="" class="form-control">
		                        <option value="{{ $item->location }}" selected>{!! $item->location !!}</option>
	                          <option value="NY">NY</option>
	                          <option value="TOR">TOR</option>
	                          <option value="PH">PH</option>
	                        </select>
	                      </td>
	                      <td>
	                        <select name="support[{{ $key }}][job_title]" data-name="job_title" id="" class="form-control">
		                        <option value="{{ $item->job_title }}" selected>{!! $item->job_title !!}</option>
	                          <option value="Merck - VP Account Director">Merck - VP Account Director</option>
	                          <option value="Merck - Account Manager">Merck - Account Manager</option>
	                          <option value="GM - PHP">GM - PHP</option>
	                        </select>
	                      </td>
	                      <td>
	                        <input name="support[{{ $key }}][rate]" data-name="rate" type="number" class="form-control" value="{{ $item->rate }}" readonly>
	                      </td>
	                      <td>
	                        <input name="support[{{ $key }}][hours]" data-name="hours" type="number" class="form-control">
	                      </td>
	                      <td>
	                      <input name="support[{{ $key }}][allocation]" data-name="allocation" type="number" class="form-control" value="{{ $item->allocation }}" readonly>
	                      </td>
	                      <td>
	                        <button type="button" class="close remove-support" data-id="{{ $item->id }}" aria-label="Delete"><i class="fa fa-times" aria-hidden="true"></i></button>
	                      </td>
	                    </tr>
	                  @endforeach
                  </tbody>
                </table>
              </div>
              <a class="btn btn-link add-support">Add Support</a>
            </div>
          </div>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            Milestones
          </div>
          <div class="panel-body">
            <div class="form-group {{ $errors-> first('name', 'has-error') }}">
              <div class="row">
                <div class="col-xs-6 col-sm-2">
                  <label for="{{ $estimate->milestone_0 }}">0%</label>
                  <input type="date" name="{{ $estimate->milestone_0 }}" class="form-control" value="{{ $estimate->milestone_0 }}" required>
                </div>
                <div class="col-xs-6 col-sm-2">
                  <label for="{{ $estimate->milestone_25 }}">25%</label>
                  <input type="date" name="{{ $estimate->milestone_25 }}" class="form-control" value="{{ $estimate->milestone_25 }}" required>
                </div>
                <div class="col-xs-6 col-sm-2">
                  <label for="{{ $estimate->milestone_50 }}">50%</label>
                  <input type="date" name="{{ $estimate->milestone_50 }}" class="form-control" value="{{ $estimate->milestone_50 }}" required>
                </div>
                <div class="col-xs-6 col-sm-2">
                  <label for="{{ $estimate->milestone_75 }}">75%</label>
                  <input type="date" name="{{ $estimate->milestone_75 }}" class="form-control" value="{{ $estimate->milestone_75 }}" required>
                </div>
                <div class="col-xs-6 col-sm-2">
                  <label for="{{ $estimate->milestone_100 }}">100%</label>
                  <input type="date" name="{{ $estimate->milestone_100 }}" class="form-control" value="{{ $estimate->milestone_100 }}" required>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            Revisions
          </div>
          <div class="panel-body">
            <table class="table table-hover">
            	<thead>
            		<tr>
            			<th>Rev</th>
            			<th>Level</th>
            			<th>Location</th>
            			<th>Hours</th>
            			<th>Fees</th>
            			<th>OOP</th>
            			<th>Fee + OOP</th>
            			<th>Last Modified</th>
            			<th>Current</th>
            		</tr>
            	</thead>
            	<tbody>
            		<tr>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td></td>
            			<td>
            				<button class="btn btn-default">Make Current</button>
            			</td>
            		</tr>
            	</tbody>
            </table>
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success pull-right">
            @lang('button.save')
          </button>
        </div>
      </form>
    </div>
  </div>
  <!-- row-->
</section>
@stop

@section('footer_scripts')
  <script src="{{ asset('assets/js/custom_js/createEstimate.js') }}" type="text/javascript"></script>
@stop

