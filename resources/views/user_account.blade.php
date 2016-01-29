@extends('layouts.default')

{{-- Page title --}}
@section('title')
User Account
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/iCheck/skins/minimal/blue.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/user_account.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datepicker/css/datepicker.css') }}">

@stop

{{-- Page content --}}
@section('content')
    <div class="container">
        <div class="welcome">
            <h3>My Account</h3>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <!--main content-->
                    <div class="position-center">
                        <!-- Notifications -->
                        @include('notifications')

                        <div>
                            <h3 class="text-primary">Personal Information</h3>
                        </div>
                        <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data" action="{{ route('my-account') }}" method="post" >
                            {{--{!!  Form::model($user, array('route' => 'my-account', $user->id))  !!}--}}
                            {{--<input type="hidden" name="_token" value="">--}}
                            {!! Form::token() !!}
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Avatar:</label>
                                <div class="col-lg-6">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                            @if($user->pic)
                                                <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="img"/>
                                            @else
                                                <img src="http://placehold.it/200x150" alt="..." />
                                            @endif
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="pic" id="pic" />
                                                            </span>
                                            <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cd-block">
                                <div class="cd-content">
                                    <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                        <label class="col-lg-2 control-label">
                                            First Name:
                                            <span class='require'>*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-user-md text-primary"></i>
                                            </span>
                                                <input type="text" placeholder=" " name="first_name" id="u-name" class="form-control" value="{!! Input::old('first_name',$user->first_name) !!}"></div>
                                            <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>
                                        </div>

                                    </div>

                                    <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                                        <label class="col-lg-2 control-label">
                                            Last Name:
                                            <span class='require'>*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-user-md text-primary"></i>
                                            </span>
                                                <input type="text" placeholder=" " name="last_name" id="u-name" class="form-control" value="{!! Input::old('last_name',$user->last_name) !!}"></div>
                                            <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                <label class="col-lg-2 control-label">
                                    Email:
                                    <span class='require'>*</span>
                                </label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-fw fa-envelope text-primary"></i>
                                                                </span>
                                        <input type="text" placeholder=" " id="email" name="email" class="form-control" value="{!! Input::old('email',$user->email) !!}"></div>
                                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <h5 class="text-danger"><strong>If you don't want to change password, leave both fields empty</strong></h5>
                                </div>
                            </div>
                            <div class="cd-block">
                                <div class="cd-content">
                                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                        <label class="col-lg-2 control-label">
                                            Password:
                                            <span class='require'>*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-key text-primary"></i>
                                            </span>
                                                <input type="password" name="password" placeholder=" " id="pwd" class="form-control"></div>
                                            <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cd-block">
                                <div class="cd-content">
                                    <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                                        <label class="col-lg-2 control-label">
                                            Confirm Password:
                                            <span class='require'>*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-key text-primary"></i>
                                            </span>
                                                <input type="password" name="password_confirm" placeholder=" " id="cpwd" class="form-control"></div>
                                            <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Gender: </label>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="male" @if($user->gender === "male") checked="checked" @endif />
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="female" @if($user->gender === "female") checked="checked" @endif />
                                            Female
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="other" @if($user->gender === "other") checked="checked" @endif />
                                            Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="prf-contacts sttng">
                                <h3 class="text-primary">Contact: </h3>
                            </div>
                            <div class="cd-block">
                                <div class="cd-content">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">
                                            Address:
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea rows="5" cols="30" class="form-control" id="add1" name="address">{!! Input::old('address',$user->address) !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="cd-block">
                                        <div class="cd-content">
                                            <div class="form-group">
                                                <label class="control-label  col-md-2">Select Country: </label>
                                                <div class="col-md-6">
                                                    <select name="country" id="sample4" class="form-control select2">
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia</option>
                                                        <option value="BA">Bosnia and Herzegowina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BV">Bouvet Island</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="BN">Brunei Darussalam</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option>
                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo</option>
                                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Cote d'Ivoire</option>
                                                        <option value="HR">Croatia (Hrvatska)</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="TF">French Southern Territories</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HM">Heard and Mc Donald Islands</option>
                                                        <option value="VA">Holy See (Vatican City State)</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran (Islamic Republic of)</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                                        <option value="KR">Korea, Republic of</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Lao People's Democratic Republic</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macau</option>
                                                        <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia, Federated States of</option>
                                                        <option value="MD">Moldova, Republic of</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="AN">Netherlands Antilles</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="MP">Northern Mariana Islands</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Reunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russian Federation</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint LUCIA</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="WS">Samoa</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">Sao Tome and Principe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SK">Slovakia (Slovak Republic)</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SH">St. Helena</option>
                                                        <option value="PM">St. Pierre and Miquelon</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syrian Arab Republic</option>
                                                        <option value="TW">Taiwan, Province of China</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania, United Republic of</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks and Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US">United States</option>
                                                        <option value="UM">United States Minor Outlying Islands</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VE">Venezuela</option>
                                                        <option value="VN">Viet Nam</option>
                                                        <option value="VG">Virgin Islands (British)</option>
                                                        <option value="VI">Virgin Islands (U.S.)</option>
                                                        <option value="WF">Wallis and Futuna Islands</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                        <option value="{{Input::old('country',$user->country)}}" selected>{{Input::old('country',$user->country)}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="state">State:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-fw fa-dot-circle-o text-primary"></i>
                                                                </span>
                                                <input type="text" placeholder=" " id="state" class="form-control" name="state"  value="{!! Input::old('state',$user->state) !!}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="city">City:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-fw fa-dot-circle-o text-primary"></i>
                                                                </span>
                                                <input type="text" placeholder=" " id="city" class="form-control" name="city"  value="{!! Input::old('city',$user->city) !!}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="zip">Zip:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-fw fa-dot-circle-o text-primary"></i>
                                                                </span>
                                                <input type="text" placeholder=" " id="zip" class="form-control" name="zip"  value="{!! Input::old('zip',$user->zip) !!}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">
                                            Phone:
                                            <span class='require'>*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-phone text-primary"></i>
                                            </span>
                                                <input type="text" placeholder=" " id="phone" name="phone" maxlength="10" class="form-control" value="{!! Input::old('phone',$user->phone) !!}"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">
                                            DOB:
                                        </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-calendar text-primary"></i>
                                            </span>
                                            {!!  Form::text('dob', Input::old('dob',$user->dob), array('id' => 'datepicker','class' => 'form-control', 'data-date-format'=> 'yyyy-mm-dd'))  !!} </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <h3 class="text-primary">social networks</h3>
                            </div>
                            <div class="cd-block">
                                <div class="cd-content">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Facebook: </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-facebook text-primary"></i>
                                            </span>
                                                <input type="text" placeholder=" " id="fb-name" name="facebook" class="form-control" value="{!! Input::old('facebook',$user->facebook) !!}"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Twitter: </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-twitter text-primary"></i>
                                            </span>
                                                <input type="text" placeholder=" " id="twitter" name="twitter" class="form-control" value="{!! Input::old('twitter',$user->twitter) !!}"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Google Plus: </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-google text-primary"></i>
                                            </span>
                                                <input type="text" placeholder=" " id="g-plus" name="google_plus" class="form-control" value="{!! Input::old('google_plus',$user->google_plus) !!}"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Skype:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-fw fa-skype text-primary"></i>
                                                                </span>
                                                <input type="text" placeholder=" " id="skype" name="skype" class="form-control" value="{!! Input::old('skype',$user->skype) !!}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Flickr:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-fw fa-flickr text-primary"></i>
                                                                </span>
                                                <input type="text" placeholder=" " id="flickr" name="flickr" class="form-control" value="{!! Input::old('flickr',$user->flickr) !!}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Youtube:</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-fw fa-youtube text-primary"></i>
                                                                </span>
                                                <input type="text" placeholder=" " id="youtube" name="youtube" class="form-control" value="{!! Input::old('youtube',$user->youtube) !!}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-6">
                                            <label class="checkbox-inline mar-left">
                                                <input type="checkbox" name="subscribed" value="1" class="minimal-red" checked/>
                                                &nbsp; Send me latest news and updates.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>{{--{!!  Form::close()  !!}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/holder/holder.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/select2/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/user_account.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datepicker/js/bootstrap-datepicker.js') }}"></script>

@stop
