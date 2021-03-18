<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Famile</title>
    <link rel="stylesheet" href="/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />


</head>

<body style="background-color: #f9f9f9;">
    <div class="head" style="color: #ffffff">
        <div>
            <div>
                <i class="fas fa-arrow-left fa-1.5x" onclick="window.history.back();" style="color: #ffffff;"></i>

                <span style="align-items: center;color: #ffffff;font-weight: 500;font-size: 1.2rem;display: inline;margin-left: 5%;">
                    Prescription History
                </span>
            </div>
        </div>
    </div>



    @foreach($docs as $doc)
    @if($loop->first)
    <div class="accordion" id="accordionExample" ;>
        <div class="accordion-item" style="background-color: #ffffff">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button text-start" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                style="font-weight: 500;border:0px;padding-top: 30px;padding-bottom: 30px;">
                {{$doc['created_at']}}<br>
                {{$doc['hospital']}}
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <span style="opacity: 0.5;" ;> Doctor : </span>{{$doc['doctor_name']}}<br>
            <span style="opacity: 0.5;" ;> Speciality :</span>{{$doc['doctor_qualifications']}}<br>
            <span style="opacity: 0.5;" ;> Dignosis :</span> {{$doc['diagnosis']}}
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Frequency</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Remarks</th>
                </tr>
            </thead>
            <tbody style="opacity: 0.5;">
                @foreach($meds as $med)
                @if($med['doc_id'] == $doc['doc_id'])
                <tr>
                    <th scope="row">{{$med['name']}}</th>
                    <td style="text-align: center;">{{$med['frequency']}}</td>
                    <td>{{$med['duration']}}</td>
                    <td>{{$med['notes']}}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

    </div>

</div>


<br>
@else
<div class="accordion-item" style="background-color: #ffffff">
    <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed text-start" type="button" data-bs-toggle="collapse"
        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
        style="font-weight: 500;border:0px;padding-top: 30px;padding-bottom: 30px;">
        {{$doc['created_at']}}<br>
        {{$doc['hospital']}}
    </button>
</h2>
<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
data-bs-parent="#accordionExample">
<div class="accordion-body">
    <span style="opacity: 0.5;" ;>Doctor :</span>{{$doc['doctor_name']}}<br>
    <span style="opacity: 0.5;" ;> Speciality : </span>{{$doc['doctor_qualifications']}}<br>
    <span style="opacity: 0.5;" ;>Dignosis :</span> {{$doc['diagnosis']}}

</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Frequency</th>
            <th scope="col">Duration</th>
            <th scope="col">Remarks</th>
        </tr>
    </thead>
    <tbody style="opacity: 0.5;">
       @foreach($meds as $med)
       @if($med['doc_id'] == $doc['doc_id'])
       <tr>
        <th scope="row">{{$med['name']}}</th>
        <td style="text-align: center;">{{$med['frequency']}}</td>
        <td>{{$med['duration']}}</td>
        <td>{{$med['notes']}}</td>
    </tr>
    @endif
    @endforeach
</tbody>
</table>
</div>
</div>

<br>
@endif
@endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
crossorigin="anonymous"></script>

</body>

</html>