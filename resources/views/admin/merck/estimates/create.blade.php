@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
  Create New Estimate
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_css/estimate.css') }}" />
@stop

{{-- Content --}}
@section('content')

  <section class="content-header">
  <h1>
    Create New Estimate
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
      <a href="{{ route('estimate/create') }}">Create New Estimate</a>
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
      <form role="form" method="post" action="{{ route('estimate/create') }}">
        <!-- CSRF Token -->
        {!! Form::token() !!}

        <div class="panel panel-primary">
          <div class="panel-heading">Project Details</div>
          <div class="panel-body">
            <div class="form-froup col-xs-6">
              <label for="estimate_name">Estimate Name</label>
              <input name="estimate_name" type="text" class="form-control">
            </div>
            <div class="form-group col-xs-6 {{ $errors-> first('name', 'has-error') }}">
              <label for="job_info">Job</label>
              <select name="job_info" class="form-control" required>
                <option value="">-- Select --</option>
                <option value="123">123 | Brand | Description</option>
                <option value="456">456 | Brand | Description</option>
                <option value="789">789 | Brand | Description</option>
              </select>
            </div>
            <div class="form-group col-xs-6">
              <label for="comment">Comment</label>
              <textarea name="comment" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group col-xs-6 {{ $errors-> first('name', 'has-error') }}">
              <label for="project_type">Project Type</label>
              <select name="project_type" class="form-control" required>
                <option value="">-- Select --</option>
                <option value="HCP Campaign Development">HCP Campaign Development</option>
                <option value="HCP Print Sales Aid">HCP Print Sales Aid</option>
                <option value="HCP Spread in Print Sales Aid">HCP Spread in Print Sales Aid</option>
                <option value="HCP Modular Sales Aid">HCP Modular Sales Aid</option>
                <option value="HCP Spread in Modular sales aid">HCP Spread in Modular sales aid</option>
              </select>
              <br>
              <div class="alert alert-success" role="alert">
                Choose a <strong>Project Type</strong> to continue
              </div>
              <div class="project-description hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et eos repellat quo neque totam beatae, voluptatibus tenetur magnam commodi praesentium adipisci, nobis eaque suscipit aspernatur, sed autem nihil. Fuga, sapiente.</div>
            </div>
            <div class="form-group col-xs-12 col-sm-2 {{ $errors-> first('name', 'has-error') }}">
              <label for="status">Status</label>
              <select name="status" class="form-control" required>
                <option value="">-- Select --</option>
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

        <div class="panel panel-primary levels hidden">
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
                  <th>Fees, $</th>
                  <th>OOP, $</th>
                  <th>Fee + OOP, $</th>
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
                  <td>1000</td>
                  <td>50,366</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel panel-primary hidden">
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
                    <tr>
                      <td>
                        <select name="support[0][job_function]" data-name="job_function" id="" class="form-control">
                          <option value="account">Account</option>
                          <option value="design">Design</option>
                          <option value="development">Development</option>
                        </select>
                      </td>
                      <td>
                        <select name="support[0][location]" data-name="location" id="" class="form-control">
                          <option value="ny">NY</option>
                          <option value="tor">TOR</option>
                          <option value="ph">PH</option>
                        </select>
                      </td>
                      <td>
                        <select name="support[0][job_title]" data-name="job_title" id="" class="form-control">
                          <option value="Merck - VP Account Director">Merck - VP Account Director</option>
                          <option value="Merck - Account Manager">Merck - Account Manager</option>
                          <option value="GM - PHP">GM - PHP</option>
                        </select>
                      </td>
                      <td>
                        <input name="support[0][rate]" data-name="rate" type="number" class="form-control" value="137" readonly>
                      </td>
                      <td>
                        <input name="support[0][hours]" data-name="hours" type="number" class="form-control">
                      </td>
                      <td>
                      <input name="support[0][allocation]" data-name="allocation" type="number" class="form-control" value="2342" readonly>
                      </td>
                      <td>
                        <button type="button" class="close remove-support" aria-label="Delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                      </td>
                    </tr>
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
                    <tr>
                      <td>
                        <select name="support[0][job_function]" data-name="job_function" id="" class="form-control">
                          <option value="account">Account</option>
                          <option value="design">Design</option>
                          <option value="development">Development</option>
                        </select>
                      </td>
                      <td>
                        <select name="support[0][location]" data-name="location" id="" class="form-control">
                          <option value="ny">NY</option>
                          <option value="tor">TOR</option>
                          <option value="ph">PH</option>
                        </select>
                      </td>
                      <td>
                        <select name="support[0][job_title]" data-name="job_title" id="" class="form-control">
                          <option value="Merck - VP Account Director">Merck - VP Account Director</option>
                          <option value="Merck - Account Manager">Merck - Account Manager</option>
                          <option value="GM - PHP">GM - PHP</option>
                        </select>
                      </td>
                      <td>
                        <input name="support[0][rate]" data-name="rate" type="number" class="form-control" value="137" readonly>
                      </td>
                      <td>
                        <input name="support[0][hours]" data-name="hours" type="number" class="form-control">
                      </td>
                      <td>
                      <input name="support[0][allocation]" data-name="allocation" type="number" class="form-control" value="2342" readonly>
                      </td>
                      <td>
                        <button type="button" class="close remove-support" aria-label="Delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                      </td>
                    </tr>
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
                    <tr>
                      <td>
                        <select name="support[0][job_function]" data-name="job_function" id="" class="form-control">
                          <option value="account">Account</option>
                          <option value="design">Design</option>
                          <option value="development">Development</option>
                        </select>
                      </td>
                      <td>
                        <select name="support[0][location]" data-name="location" id="" class="form-control">
                          <option value="ny">NY</option>
                          <option value="tor">TOR</option>
                          <option value="ph">PH</option>
                        </select>
                      </td>
                      <td>
                        <select name="support[0][job_title]" data-name="job_title" id="" class="form-control">
                          <option value="Merck - VP Account Director">Merck - VP Account Director</option>
                          <option value="Merck - Account Manager">Merck - Account Manager</option>
                          <option value="GM - PHP">GM - PHP</option>
                        </select>
                      </td>
                      <td>
                        <input name="support[0][rate]" data-name="rate" type="number" class="form-control" value="137" readonly>
                      </td>
                      <td>
                        <input name="support[0][hours]" data-name="hours" type="number" class="form-control">
                      </td>
                      <td>
                      <input name="support[0][allocation]" data-name="allocation" type="number" class="form-control" value="2342" readonly>
                      </td>
                      <td>
                        <button type="button" class="close remove-support" aria-label="Delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <a class="btn btn-link add-support">Add Support</a>
            </div>
          </div>
        </div>

        <div class="panel panel-primary hidden">
          <div class="panel-heading">
            Milestones
          </div>
          <div class="panel-body">
            <div class="form-group {{ $errors-> first('name', 'has-error') }}">
              <div class="row">
                <div class="col-xs-6 col-sm-2">
                  <label for="milestone_0">0%</label>
                  <input type="date" name="milestone_0" class="form-control" required>
                </div>
                <div class="col-xs-6 col-sm-2">
                  <label for="milestone_25">25%</label>
                  <input type="date" name="milestone_25" class="form-control" required>
                </div>
                <div class="col-xs-6 col-sm-2">
                  <label for="milestone_50">50%</label>
                  <input type="date" name="milestone_50" class="form-control" required>
                </div>
                <div class="col-xs-6 col-sm-2">
                  <label for="milestone_75">75%</label>
                  <input type="date" name="milestone_75" class="form-control" required>
                </div>
                <div class="col-xs-6 col-sm-2">
                  <label for="milestone_100">100%</label>
                  <input type="date" name="milestone_100" class="form-control" required>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-primary hidden">
          <div class="panel-heading">
            Fees &amp; Expenses
          </div>
          <div class="panel-body">
            <div class="form-group {{ $errors-> first('name', 'has-error') }}">
              <div class="row">
                <div class="col-xs-4">
                  <label for="po_fees">Purchase Order Fees</label>
                    <input type="number" name="po_fees" class="form-control" required>
                </div>
                <div class="col-xs-4">
                  <label for="sow_fees">Scope Of Work Fees</label>
                  <input type="number" name="sow_fees" class="form-control" required>
                </div>
                <div class="col-xs-4">
                  <label for="actual_fees">Actual Fees</label>
                  <input type="number" name="actual_fees" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="form-group {{ $errors-> first('name', 'has-error') }}">
              <div class="row">
                <div class="col-xs-4">
                  <label for="po_expenses">Purchase Order Expenses</label>
                  <input type="number" name="po_expenses" class="form-control" required>
                </div>
                <div class="col-xs-4">
                  <label for="sow_expenses">Scope Of Work Expenses</label>
                  <input type="number" name="sow_expenses" class="form-control" required>
                </div>
                <div class="col-xs-4">
                  <label for="actual_expenses">Actual Expenses</label>
                  <input type="number" name="actual_expenses" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="form-group {{ $errors-> first('name', 'has-error') }}">
              <div class="row">
                <div class="col-xs-4 col-xs-offset-8">
                  <label for="actual_total">Actual Total</label>
                  <input type="number" name="actual_total" class="form-control" required>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="form-group {{ $errors-> first('name', 'has-error') }}">
          <label for="">Is Current?</label>
          <br>
          <label class="radio-inline" for="is_current">
            <input type="radio" name="is_current" value="yes"> Yes
          </label>
          <label class="radio-inline" for="is_curren">
            <input type="radio" name="is_curren" value="no"> No
          </label>
        </div> -->

        <div class="form-group save-cancel hidden">
          <a class="btn btn-danger" href="{{ route('estimates') }}">
            @lang('button.cancel')
          </a>
          <button type="submit" class="btn btn-success">
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



