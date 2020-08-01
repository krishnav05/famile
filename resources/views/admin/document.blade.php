@extends('adminlte::page')

@section('title', 'Famile Admin Panel')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <img src="/prescriptions/{{$profileid}}/{{$docname}}" style="width: 100%;">
    </div>
    <div class="col">
      <p style="text-align: center;">Update Details</p>
      <form method="post" action="/admin/updatePrescription">
        @csrf
      <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">List</th>
      <th scope="col">Value</th>
    </tr>
  </thead>
  <tbody>
    <input type="hidden" name="doc_id" value="{{$id}}">
    @if(isset($details) && count($details) > 0)
    @foreach($details as $detail)
    <tr>
      <td>Patient Name</td>
      <td><input type="" name="pname" value="{{$detail['patient_name']}}"></td>
    </tr>
    <tr>
      <td>Patient Age</td>
      <td><input type="number" name="page" value="{{$detail['patient_age']}}"></td>
    </tr>
    <tr>
      <td>Patient Gender</td>
      <td><input type="text" name="pgender" value="{{$detail['patient_gender']}}"></td>
    </tr>
    <tr>
      <td>Doctor Name</td>
      <td><input type="text" name="dname" value="{{$detail['doctor_name']}}"></td>
    </tr>
    <tr>
      <td>Doctor Qualifications</td>
      <td><input type="text" name="dqual" value="{{$detail['doctor_qualifications']}}"></td>
    </tr>
    <tr>
      <td>Height</td>
      <td><input type="number" name="height" value="{{$detail['height']}}"></td>
    </tr>
    <tr>
      <td>Weight</td>
      <td><input type="number" name="weight" value="{{$detail['weight']}}"></td>
    </tr>
    <tr>
      <td>Temperature (F)</td>
      <td><input type="text" name="temp" value="{{$detail['temperature']}}"></td>
    </tr>
    <tr>
      <td>Symptoms</td>
      <td><input type="text" name="symptoms" value="{{$detail['symptoms']}}"></td>
    </tr>
    <tr>
      <td>Diagnosis</td>
      <td><input type="text" name="diagnosis" value="{{$detail['diagnosis']}}"></td>
    </tr>
    <tr>
      <td>Hospital</td>
      <td><textarea value="{{$detail['hospital']}}" name="hospital" rows="3" cols="23"></textarea></td>
    </tr>
    <tr>
      <td>Consultation Date</td>
      <td><input type="date" name="cdate" value="{{$detail['consultation_date']}}"></td>
    </tr>
    <tr>
      <td>Follow Up Date</td>
      <td><input type="date" name="fdate" value="{{$detail['follow_up_date']}}"></td>
    </tr>
    @endforeach
    @else
    <tr>
      <td>Patient Name</td>
      <td><input type="" name="pname"></td>
    </tr>
    <tr>
      <td>Patient Age</td>
      <td><input type="number" name="page"></td>
    </tr>
    <tr>
      <td>Patient Gender</td>
      <td><input type="text" name="pgender"></td>
    </tr>
    <tr>
      <td>Doctor Name</td>
      <td><input type="text" name="dname"></td>
    </tr>
    <tr>
      <td>Doctor Qualifications</td>
      <td><input type="text" name="dqual"></td>
    </tr>
    <tr>
      <td>Height</td>
      <td><input type="number" name="height"></td>
    </tr>
    <tr>
      <td>Weight</td>
      <td><input type="number" name="weight"></td>
    </tr>
    <tr>
      <td>Temperature (F)</td>
      <td><input type="text" name="temp"></td>
    </tr>
    <tr>
      <td>Symptoms</td>
      <td><input type="text" name="symptoms"></td>
    </tr>
    <tr>
      <td>Diagnosis</td>
      <td><input type="text" name="diagnosis"></td>
    </tr>
    <tr>
      <td>Hospital</td>
      <td><textarea name="hospital" rows="3" cols="23"></textarea></td>
    </tr>
    <tr>
      <td>Consultation Date</td>
      <td><input type="date" name="cdate"></td>
    </tr>
    <tr>
      <td>Follow Up Date</td>
      <td><input type="date" name="fdate"></td>
    </tr>
    @endif
  </tbody>
</table>

      <div class="row">
        <div class="col-lg-12">
          <div id="inputFormRow">
            @foreach($meddetails as $details)
            <div class="input-group mb-3">
              <input type="text" name="title[]" class="form-control m-input" placeholder="Enter name" autocomplete="off" value="{{$details['name']}}">
              <input type="text" name="frequency[]" class="form-control m-input" placeholder="Enter frequency" autocomplete="off" value="{{$details['frequency']}}">
              <input type="text" name="duration[]" class="form-control m-input" placeholder="Enter duration" autocomplete="off" value="{{$details['duration']}}">
              <input type="text" name="notes[]" class="form-control m-input" placeholder="Enter notes" autocomplete="off" value="{{$details['notes']}}">

              <div class="input-group-append">
                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
              </div>
            </div>
            @endforeach
          </div>

          <div id="newRow"></div>
          <button id="addRow" type="button" class="btn btn-info">Add Row</button>
          <button type="submit" class="btn btn-outline-dark">Update Prescription</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
@stop

@section('css')
@stop

@section('js')
<script type="text/javascript">
    // add row
    $("#addRow").click(function() {
      var html = '';
      html += '<div id="inputFormRow">';
      html += '<div class="input-group mb-3">';
      html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter name" autocomplete="off">';
      html += '<input type="text" name="frequency[]" class="form-control m-input" placeholder="Enter frequency" autocomplete="off">';
      html += '<input type="text" name="duration[]" class="form-control m-input" placeholder="Enter duration" autocomplete="off">';
      html += '<input type="text" name="notes[]" class="form-control m-input" placeholder="Enter notes" autocomplete="off">';
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