@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Tags Input
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/tags/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/tags/app.css') }}" rel="stylesheet" type="text/css">
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Tags Input</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">UI features</a>
            </li>
            <li>
                <a href="tags_input">Tags Input</a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-bell-o"></i>
                            Markup
                        </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="example example_markup">
                            <h3>Markup</h3>

                            <p>
                                Just add
                                <code>data-role="tagsinput"</code>
                                to your input field to automatically change it to a tags input field.
                            </p>

                            <div class="bs-example">
                                <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo"
                                       data-role="tagsinput" />
                            </div>
                            <div class="accordion">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse"
                                           href="#accordion_example_markup">Show code</a>
                                    </div>
                                    <div id="accordion_example_markup" class="accordion-body collapse">
                                        <div class="accordion-inner highlight">
                                            <pre class="prettyprint linenums">&lt;input type=&quot;text&quot; value=&quot;Amsterdam,Washington,Sydney,Beijing,Cairo&quot; data-role=&quot;tagsinput&quot; /&gt;</pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-key"></i>
                            Categorizing tags
                        </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="example example_tagclass">
                            <h3>Categorizing tags</h3>

                            <p>
                                You can set a fixed css class for your tags, or determine dynamically by provinding a
                                custom function.
                            </p>

                            <div class="bs-example">
                                <input type="text"/>
                            </div>
                            <div class="accordion">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse"
                                           href="#accordion_example_tagclass">Show code</a>
                                    </div>
                                    <div id="accordion_example_tagclass" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                                    <pre class="prettyprint linenums">&lt;input type=&quot;text&quot; /&gt;
              &lt;script&gt;
              $('input').tagsinput({
                tagClass: function(item) {
                  switch (item.continent) {
                    case 'Europe'   : return 'label label-primary';
                    case 'America'  : return 'label label-danger label-important';
                    case 'Australia': return 'label label-success';
                    case 'Africa'   : return 'label label-primary';
                    case 'Asia'     : return 'label label-warning';
                  }
                },
                itemValue: 'value',
                itemText: 'text'
              });
              $('input').tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
              $('input').tagsinput('add', { "value": 4 , "text": "Washington"  , "continent": "America"   });
              $('input').tagsinput('add', { "value": 7 , "text": "Sydney"      , "continent": "Australia" });
              $('input').tagsinput('add', { "value": 10, "text": "Beijing"     , "continent": "Asia"      });
              $('input').tagsinput('add', { "value": 13, "text": "Cairo"       , "continent": "Africa"    });
              // Adding custom typeahead support using http://twitter.github.io/typeahead.js
              $('input').tagsinput('input').typeahead({
                valueKey: 'text',
                prefetch: '../assets/cities.json',
                template: '&lt;p&gt;\{\{text\}\}&lt;/p&gt;',                                      
                engine: Hogan
              }).bind('typeahead:selected', $.proxy(function (obj, datum) {  
                this.tagsinput('add', datum);
                this.tagsinput('input').typeahead('setQuery', '');
              }, $('input')));
&lt;/script&gt;</pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-star"></i>
                            True multi value
                        </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="example example_multivalue">
                            <h3>True multi value</h3>

                            <p>
                                Use a
                                <code>&lt;select multiple /&gt;</code>
                                as your input element for a tags input, to gain true multivalue support. Instead of a
                                comma separated string, the values will be set in an array. Existing
                                <code>&lt;option /&gt;</code>
                                elements will automatically be set as tags. This makes it also possible to create tags
                                containing a comma.
                            </p>

                            <div class="bs-example">
                                <select multiple data-role="tagsinput">
                                    <option value="Amsterdam">Amsterdam</option>
                                    <option value="Washington">Washington</option>
                                    <option value="Sydney">Sydney</option>
                                    <option value="Beijing">Beijing</option>
                                    <option value="Cairo">Cairo</option>
                                </select>
                            </div>
                            <div class="accordion ">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" href="#example_multivalue">Show
                                            code</a>
                                    </div>
                                    <div id="example_multivalue" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                                    <pre class="prettyprint linenums">&lt;select multiple data-role="tagsinput"&gt;
      &lt;option value="Amsterdam"&gt;Amsterdam&lt;/option&gt;
      &lt;option value="Washington"&gt;Washington&lt;/option&gt;
      &lt;option value="Sydney"&gt;Sydney&lt;/option&gt;
      &lt;option value="Beijing"&gt;Beijing&lt;/option&gt;
      &lt;option value="Cairo"&gt;Cairo&lt;/option&gt;
&lt;/select&gt;</pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-fighter-jet"></i>
                            Objects as tags
                        </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="box-body">
                            <div class="example example_objects_as_tags">
                                <h3>Objects as tags</h3>

                                <p>
                                    Instead of just adding strings as tags, bind objects to your tags. This makes it
                                    possible to set id values in your input field's value, instead of just the tag's
                                    text.
                                </p>

                                <div class="bs-example">
                                    <input type="text"/>
                                </div>
                                <div class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse"
                                               href="#accordion_example_objects_as_tags">Show code</a>
                                        </div>
                                        <div id="accordion_example_objects_as_tags" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                        <pre class="prettyprint linenums">&lt;input type=&quot;text&quot; /&gt;
          &lt;script&gt;
          $('input').tagsinput({
            itemValue: 'value',
            itemText: 'text'
          });
          $('input').tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
          $('input').tagsinput('add', { "value": 4 , "text": "Washington"  , "continent": "America"   });
          $('input').tagsinput('add', { "value": 7 , "text": "Sydney"      , "continent": "Australia" });
          $('input').tagsinput('add', { "value": 10, "text": "Beijing"     , "continent": "Asia"      });
          $('input').tagsinput('add', { "value": 13, "text": "Cairo"       , "continent": "Africa"    });
          $('input').tagsinput('input').typeahead({
            valueKey: 'text',
            prefetch: '../public/assets/cities.json',
            template: '&lt;p&gt;\{\{text\}\}&lt;/p&gt;',
            engine: Hogan
          }).bind('typeahead:selected', $.proxy(function (obj, datum) {
              this.tagsinput('add', datum);
              this.tagsinput('input').typeahead('setQuery', '');
          }, $('input')));
&lt;/script&gt;</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-bell-o"></i>
                            Typeahead
                        </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="example example_typeahead">
                            <h3>Typeahead</h3>
                            Typeahead is not included in Bootstrap 3, so you'll have to include your own typeahead
                            library. I'd recommed
                            <a href="http://twitter.github.io/typeahead.js/">typeahead.js</a>
                            . An example of using this is shown below.
                            <div class="bs-example">
                                <input type="text" value="Amsterdam,Washington"/>
                            </div>
                            <div class="accordion ">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" href="#example_typeahead">Show
                                            code</a>
                                    </div>
                                    <div id="example_typeahead" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                                    <pre class="prettyprint linenums">&lt;input type=&quot;text&quot; value=&quot;Amsterdam,Washington&quot; data-role=&quot;tagsinput&quot; /&gt;
        &lt;script&gt;
        $('input').tagsinput();
        // Adding custom typeahead support using http://twitter.github.io/typeahead.js
        $('input').tagsinput('input').typeahead({
          prefetch: 'citynames.json'
        }).bind('typeahead:selected', $.proxy(function (obj, datum) {  
          this.tagsinput('add', datum.value);
          this.tagsinput('input').typeahead('setQuery', '');
        }, $('input')));
        &lt;/script&gt;
</pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/vendors/tags/bower_components/typeahead.js/dist/typeahead.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tags/bower_components/hogan/lib/hogan.js') }}"></script>
    <script src="{{ asset('assets/vendors/tags/assets/app_bs3.js') }}"></script>
@stop