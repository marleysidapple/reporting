@extends('layouts.master')

@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report
        <small>{{$report->mrn}}</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Pathology Reporting
            <small class="pull-right">Date: {{$report->created_at}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Patient Detail
          <address>
            <strong>Name: {{$report->patient->name}}</strong><br>
            Age: {{$report->patient->age}} years<br>
            Address: {{$report->patient->address}}<br>
            Phone: {{$report->patient->phone}}<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         &nbsp;
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice {{$report->mrn}}</b><br>
          <br>
          <b>Report ID:</b>{{sprintf("%05s", $report->id)}}<br>
          <b>Generated Date:</b>{{$report->created_at}}<br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <tr>
              <th>Clinical History</th>
              <td>{{$report->clinical_history}}</td>
            </tr>

            <tr>
              <th>Specimen</th>
              <td>{{$report->specimen}}</td>
            </tr>

              <tr>
              <th>Diagnosis</th>
              <td>{!! $report->diagnosis !!}</td>
            </tr>

              <tr>
              <th>Gross Description</th>
              <td>{!! $report->gross_description !!}</td>
            </tr>
            
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

     

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-envelope"></i>&nbsp;Mail Report</a>
           <a href="{{url('report/'.$report->id .'/edit')}}" class="btn btn-success pull-right" style="margin-right: 5px;">
            <i class="fa fa-pencil"></i> Edit Report
          </a>
          <a href="{{url('report/download/'.$report->id)}}" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Export To PDF
          </a>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
@endsection


@section('script')
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
  </script>
@endsection
