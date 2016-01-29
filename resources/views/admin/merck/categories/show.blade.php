@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    View Business Group
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_css/profile.css') }}" />
@stop

@section('content')
	<h1>{{ $group->name }}</h1>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit eveniet ea quis, nobis pariatur non molestias commodi est natus sapiente. Aliquam repellendus ullam quaerat impedit natus sequi similique, voluptatibus necessitatibus.</p>
@stop