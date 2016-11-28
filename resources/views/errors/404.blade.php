@extends('layouts.master')


@section('main')

    <section class="content-header">
      <h1>
        404 Error Page
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Permission Denied</h3>

          <p>
           You donot have permission to access this page
            Meanwhile, you may <a href="{{url('/home')}}">return to home</a> 
          </p>

        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
@endsection