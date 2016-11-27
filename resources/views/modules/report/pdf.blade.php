<html>
<head>
  <title>Lab Report</title>
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" media="all">
  <style type="text/css">
  *{
    font-family: 'Open Sans', sans-serif;
    font-size: 12px;
  }

  .wrapper{
    margin:20px;
  }

  .report th{
    width: 20%;
  }

  '
        table th, table td { 
         border:1px solid #000;
         padding;0.5em;
      };

      .report td  {
        padding: 10px;
      }
       
  </style>
</head>

<body>
  <div class="row">
    <div class="col-sm-12">
        <div class="wrapper">
          <h4>Pathology Lab Report : 00192037</h4>
          <hr/>
          <table class="table table-bordered">
            <tr>
              <th>Patient Name</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Contact No.</th>
              <th>Address</th>
              <th>Generated Date</th>
            </tr>

            <tr>
              <td>{{$report->patient->name}}</td>
              <td>{{$report->patient->age}}</td>
              <td>{{$report->patient->gender}}</td>
              <td>{{$report->patient->phone}}</td>
              <td>{{$report->patient->address}}</td>
              <td>{{$report->created_at}}</td>
            </tr>
          </table>


          <h4>Report Detail</h4>
          <hr/>
            <table class="table table-bordered report">
            <tr>
              <th>Clinical History</th>
              <td>{{$report->clinical_history}}</td>
            </tr>

            <tr>
              <th>Specimen</th>
              <td>{{$report->clinical_history}}</td>
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
    </div>
  </div>
</body>
  

</html>
