@extends('layouts.master')


@section('main')

    <!-- Main content -->
    <section class="content">
    	<h3>Operator Profle</h3>
    	<hr/>
    	<div class="row">
    		<div class="col-sm-12">
    			<table class="table table-bordered table-hover">
    				<tr>
    					<th>Name</th>
    					<th>{{$operator->name}}</th>
    				</tr>

    				<tr>
    					<th>Email</th>
    					<th>{{$operator->email}}</th>
    				</tr>

    				<tr>
    					<th>Created Date</th>
    					<th>{{$operator->created_at}}</th>
    				</tr>
    			</table>

    		</div>
    	</div>
    </section>

@endsection