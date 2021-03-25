@extends('adminlte::page')

@section('title', 'Famile Admin Panel')

@section('content_header')
@stop

@section('content')
<div style="width: 100%;height: 50px;background-color: #0000001A;">
  <a href="/admin/superadmin"><button style="height: 50px;width: 150px;border: none;color: white;background-color: #686868;">x Cancel</button></a>
  @if($prev != null)
  <a href="{{$prev}}"><button style="height: 50px;width: 150px;border: none;color: white;background-color: #B5B3B4;">< Previous</button></a>
  @endif
  @if($next != null)
  <a href="{{$next}}"><button style="height: 50px;width: 150px;border: none;color: white;background-color: #FC608C;float: right;">Next ></button></a>
  @endif
</div>
<div class="container">
  <div class="row">
    <div class="col">
      <img id="image" src="/prescriptions/{{$profileid}}/{{$docname}}" style="width: 100%;">
      <center>
        <form method="post" action="/admin/dumpdata">
        @csrf
        <input type="hidden" name="doc_id" value="{{$id}}">
        <input type="hidden" name="datadump" value="">
        <button id="convertButton" type="submit" style="border-radius: 4px;background-color: #000000;border: none;color: white;  padding: 10px 20px;margin-top: 5px;">Convert to Text(wait for the conversion ~ 2 minutes)</button>
        </form>
      </center>
    
    </div>
    <div class="col" style="display: block;height: 75vh;overflow-y: scroll;">
      <form method="post" action="/admin/updatePrescription">
        @csrf
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" style="color: #FFFFFF;background-color: #000000;border-collapse: collapse;border: 0px;">Prescription Details</th>
      <th scope="col" style="color: #FC608C;background-color: #000000;border-collapse: collapse;border: 0px;">
        <button style="border-radius: 4px;background-color: #55F2CD;border: none;color: black;float: right;">Save Details</button>
      </th>
    </tr>
    <tr>
      <th scope="col" style="color: #FC608C">List</th>
      <th scope="col" style="color: #FC608C">Value</th>
    </tr>
  </thead>
  <tbody>
    <input type="hidden" name="doc_id" value="{{$id}}">
    @if(isset($details) && count($details) > 0)
    @foreach($details as $detail)
    <tr>
      <td style="background-color:#E0FFFF;">Patient Name</td>
      <td><input type="" name="pname" value="{{$detail['patient_name']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Patient Age</td>
      <td><input type="number" name="page" value="{{$detail['patient_age']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Patient Gender</td>
      <td><input type="text" name="pgender" value="{{$detail['patient_gender']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Doctor Name</td>
      <td><input type="text" name="dname" value="{{$detail['doctor_name']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Doctor Qualifications</td>
      <td><input type="text" name="dqual" value="{{$detail['doctor_qualifications']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Height</td>
      <td><input type="number" name="height" value="{{$detail['height']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Weight</td>
      <td><input type="number" name="weight" value="{{$detail['weight']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Temperature (F)</td>
      <td><input type="text" name="temp" value="{{$detail['temperature']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Symptoms</td>
      <td><input type="text" name="symptoms" value="{{$detail['symptoms']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Diagnosis</td>
      <td><input type="text" name="diagnosis" value="{{$detail['diagnosis']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Hospital</td>
      <td><textarea value="{{$detail['hospital']}}" name="hospital" rows="3" cols="23"></textarea></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Consultation Date</td>
      <td><input type="date" name="cdate" value="{{$detail['consultation_date']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Follow Up Date</td>
      <td><input type="date" name="fdate" value="{{$detail['follow_up_date']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Suggestion</td>
      <td><input type="text" name="suggestion" value="{{$detail['suggestion']}}"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Health Tip</td>
      <td><input type="text" name="tip" value="{{$detail['healthtip']}}"></td>
    </tr>
    @endforeach
    @else
    <tr>
      <td style="background-color:#E0FFFF;">Patient Name</td>
      <td><input type="" name="pname"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Patient Age</td>
      <td><input type="number" name="page"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Patient Gender</td>
      <td><input type="text" name="pgender"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Doctor Name</td>
      <td><input type="text" name="dname"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Doctor Qualifications</td>
      <td><input type="text" name="dqual"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Height</td>
      <td><input type="number" name="height"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Weight</td>
      <td><input type="number" name="weight"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Temperature (F)</td>
      <td><input type="text" name="temp"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Symptoms</td>
      <td><input type="text" name="symptoms"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Diagnosis</td>
      <td><input type="text" name="diagnosis"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Hospital</td>
      <td><textarea name="hospital" rows="3" cols="23"></textarea></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Consultation Date</td>
      <td><input type="date" name="cdate"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Follow Up Date</td>
      <td><input type="date" name="fdate"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Suggestion</td>
      <td><input type="text" name="suggestion"></td>
    </tr>
    <tr>
      <td style="background-color:#E0FFFF;">Health Tip</td>
      <td><input type="text" name="tip"></td>
    </tr>
    <tr>
      <td scope="col" style="color: #000000;background-color: #55F2CD;border-collapse: collapse;border: 0px;">Prescribed Medicines</td>
      <td scope="col" style="color: #FC608C;background-color: #55F2CD;border-collapse: collapse;border: 0px;">
      </td>
    </tr>
    <tr>
      <!-- <td scope="col">
        <p style="color: #FC608C;float: left;">Medicine Name</p>
        <p style="color: #FC608C;float: right;">Frequency</p>
      </td>
      <td scope="col">
        <p style="color: #FC608C;float: left;">Duration</p>
        <p style="color: #FC608C;float: right;">Notes</p>
      </td> -->
    </tr>
    @endif
  </tbody>
</table>

      <div class="row">
        <div class="col-lg-12">
          <div>
            <div class="column"><strong>
              <p style="color: #000000;float: left;">Medicine Name</p>
            </strong></div>
            <div class="column"><strong>
              <p style="color: #000000;float: left;">Frequency</p>
            </strong>
            </div>
            <div class="column">
              <strong>
              <p style="color: #000000;float: left;">Duration</p>  
              </strong>
              </div>
            <div class="column">
              <strong>
              <p style="color: #000000;float: left;">Notes</p>  
              </strong>
              </div>
          </div>
          <div id="inputFormRow">
            @foreach($meddetails as $details)
            <div class="input-group mb-3">
              <input type="text" name="title[]" class="form-control m-input" placeholder="Medicine name" autocomplete="off" value="{{$details['name']}}">
              <input type="text" name="frequency[]" class="form-control m-input" placeholder="Frequency" autocomplete="off" value="{{$details['frequency']}}">
              <input type="text" name="duration[]" class="form-control m-input" placeholder="Duration" autocomplete="off" value="{{$details['duration']}}">
              <input type="text" name="notes[]" class="form-control m-input" placeholder="Notes" autocomplete="off" value="{{$details['notes']}}">

              <div class="input-group-append">
                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
              </div>
            </div>
            @endforeach
          </div>
          
          
          <div id="newRow"></div>
          <button id="addRow" type="button" class="btn btn-info" style="background-color: #33CAFF !important;color: #000000;">+ Add Medicine</button>
          <button type="submit" class="btn btn-outline-dark">Update Prescription</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
@stop

@section('css')
<style type="text/css">
  .column {
  float: left;
  width: 23%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
@stop

@section('js')
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script src='https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js'></script>
<script type="text/javascript">
Tesseract.recognize(
  'https://app.famile.care/prescriptions/{{$profileid}}/{{$docname}}',
  'eng',
  { logger: m => console.log(m) }
).then(({ data: { text } }) => {
  console.log(text);
  $('#showconvertCheck').css('display','block');
  $('input[name="datadump"]').val(text);
});
    $("#image").ezPlus({
      zoomType: 'inner',
      cursor: 'crosshair'
    });

    // add row
    $("#addRow").click(function() {
      var html = '';
      html += '<div id="inputFormRow">';
      html += '<div class="input-group mb-3">';
      html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Medicine name" autocomplete="off">';
      html += '<input type="text" name="frequency[]" class="form-control m-input" placeholder="Frequency" autocomplete="off">';
      html += '<input type="text" name="duration[]" class="form-control m-input" placeholder="Duration" autocomplete="off">';
      html += '<input type="text" name="notes[]" class="form-control m-input" placeholder="Notes" autocomplete="off">';
      html += '<div class="input-group-append">';
      html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
      html += '</div>';
      html += '</div>';
      $('#newRow').append(html);
    });
    // remove row
    $(document).on('click', '#removeRow', function() {
      $(this).closest('#inputFormRow').remove();
    });
  </script>
@stop