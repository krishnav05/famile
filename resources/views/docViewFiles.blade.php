<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
  <style type="text/css">
    .nav-tabs {
      border-bottom: 0px solid transparent;
    }
    .nav-tabs .nav-link {
      border: 0px solid transparent;
    }
    .btn-group-xs > .btn, .btn-xs {
      padding: .25rem .4rem;
      font-size: .5rem;
      line-height: .6;
      border-radius: .2rem;
    }
    .upper-name{
      font-size: 10px;
      font-weight: 600;
    }
    .s2.active{
      font-weight: bold;
      opacity: 1;
      border-bottom: 3px solid #FC608C;
    }
    .s2{
      opacity: 0.5;
    }
  </style>
  <title>Famile</title>
</head>
<body>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-4">
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
          @foreach($profiles as $profile)
          @if ($loop->first)
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="{{str_replace(' ', '', $profile['name'])}}-tab" data-bs-toggle="tab" href="#{{str_replace(' ', '', $profile['name'])}}" role="tab" aria-controls="{{str_replace(' ', '', $profile['name'])}}" aria-selected="true"><span class="upper-name" style="float: left;">{{$profile['name']}}</span></a>
          </li>
          @else
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="{{str_replace(' ', '', $profile['name'])}}-tab" data-bs-toggle="tab" href="#{{str_replace(' ', '', $profile['name'])}}" role="tab" aria-controls="{{str_replace(' ', '', $profile['name'])}}" aria-selected="false">{{$profile['name']}}</a>
          </li>
          @endif
          @endforeach
        </ul>
      </div>
      <div class="col-3">
        <button type="button" id="quickView" class="btn btn-outline-secondary btn-xs custom-button">Quick View</button>
      </div>
      <div class="col-3">
        <button type="button" id="prescription" class="btn btn-outline-secondary btn-xs custom-button">Prescription</button>
      </div>
      <div class="col-2">
        <button type="button" id="reports" class="btn btn-outline-secondary btn-xs custom-button">Reports</button>
      </div>
    </div>
    <div class="my-slider mt-3">
      <div class="slider-item" style="width: 200px;">
        <div class="card p-2 m-2">
          <div class="card-body">
            <p class="card-text" style="color:#FC608C;">Blood Group</p>
            <h5 class="card-title"> O+ve</h5>  
          </div>
        </div>
      </div>
      <div class="slider-item" style="width: 200px;">
        <div class="card  p-2 m-2">
          <div class="card-body">
            <p class="card-text"  style="color:#FC608C;">Blood Pressure</p>
            <h5 class="card-title"> 90/60mmHg</h5>
          </div>
        </div>
      </div>
      <div class="slider-item" style="width: 200px;">
        <div class="card  p-2 m-2">
          <div class="card-body">
            <p class="card-text"  style="color:#FC608C;">Blood Glucose</p>
            <h5 class="card-title">140 mg/dL</h5>
          </div>
        </div>
      </div>
      <div class="slider-item" style="width: 200px;">
        <div class="card p-2 m-2">
          <div class="card-body">
            <p class="card-text"  style="color:#FC608C;">Hemoglobin</p>
            <h5 class="card-title">17.5 grams</h5>
          </div>
        </div>
      </div>
      <div class="slider-item" style="width: 200px;">
        <div class="card p-2 m-2">
          <div class="card-body">
            <p class="card-text"  style="color:#FC608C;">Pulse Rate</p>
            <h5 class="card-title">70 bpm</h5>
          </div>
        </div>
      </div>
      <div class="slider-item" style="width: 200px;">
        <div class="card p-2 m-2">
          <div class="card-body">
            <p class="card-text"  style="color:#FC608C;">Temperature</p>
            <h5 class="card-title">98.2 C</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-5 mb-5">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          @foreach($profiles as $profile)
          <div class="text-muted">{{$profile['name']}} health History</div>
          @endforeach
        </li>
        <li class="list-group-item">
          <div class="slider2">
            <div class="slider-item s2 active text-center" style="width: 120px;">
              20 Dec'20
            </div>
            <div class="slider-item s2 text-center" style="width: 120px;">
              11 Nov'19
            </div>
            <div class="slider-item s2 text-center" style="width: 120px;">
              20 Dec'20
            </div>
            <div class="slider-item s2 text-center" style="width: 120px;">
              20 oct'19
            </div>
          </div>
          
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col-5 text-muted">Doctor Name</div>
            <div class="col-7 fw-bold">Dr. ABHISHEK GOYAL</div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col-5 text-muted">Hospital</div>
            <div class="col-7 fw-bold">Hinduja Hospital</div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col-5 text-muted">Location</div>
            <div class="col-7 fw-bold">Mahim, Mumbai</div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col-5 text-muted">Speciality</div>
            <div class="col-7 fw-bold">Pediatrician</div>
          </div>
          
        </li>
        <li class="list-group-item text-center" style="background-color: #33CAFF;color: #fff;font-weight: bold;">PRESCRIPTION HISTORY</li>
      </ul>
    </div>
    <div class="tab-content" id="myTabContent">
      @foreach($profiles as $profile)
      @if ($loop->first)
      <div class="tab-pane active" id="{{str_replace(' ', '', $profile['name'])}}" role="tabpanel" aria-labelledby="{{str_replace(' ', '', $profile['name'])}}-tab">
        <div id="carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false" data-bs-wrap="false">
          <div class="carousel-inner">
            @foreach($documents as $document)
            @if($document['profile_id'] == $profile['id'])
            <div class="carousel-item" align="center">
              <img src="/prescriptions/{{$profile['id']}}/{{$document['document']}}" class="d-block" style="max-height: 90vh;">
            </div>
            @endif
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" role="button" data-bs-slide="prev">
            <i class="fas fa-arrow-left fa-2x" style="color: #FF338A !important;"></i>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" role="button" data-bs-slide="next">
            <i class="fas fa-arrow-right fa-2x" style="color: #FF338A !important;"></i>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
      @else
      <div class="tab-pane" id="{{str_replace(' ', '', $profile['name'])}}" role="tabpanel" aria-labelledby="{{str_replace(' ', '', $profile['name'])}}-tab">
        <div id="carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false" data-bs-wrap="false">
          <div class="carousel-inner">
            @foreach($documents as $document)
            @if($document['profile_id'] == $profile['id'])
            <div class="carousel-item" align="center">
              <img src="/prescriptions/{{$profile['id']}}/{{$document['document']}}" class="d-block" style="max-height: 90vh;">
            </div>
            @endif
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" role="button" data-bs-slide="prev">
            <i class="fas fa-arrow-left fa-2x" style="color: #FF338A !important;"></i>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" role="button" data-bs-slide="next">
            <i class="fas fa-arrow-right fa-2x" style="color: #FF338A !important;"></i>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
      @endif
      @endforeach
    </div>
    <div class="row text-center" id="Rep" style="display: none;"><h5>No Reports Available Yet</h5></div>
    <div class="row text-center" id="gPres" style="display: none;"><h5>No Prescriptions Available Yet</h5></div>
  </div> 

  
  <!-- Optional JavaScript; choose one of the two! -->
  
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
  <script type="text/javascript">
    @foreach($profiles as $profile)
    $(document).ready(function () {
      $('#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}').find('.carousel-item').first().addClass('active');
    });
    @endforeach

    $('#quickView').on('click',function(){
      $('#myTabContent').css("display", "block");
      $('#Rep').css("display", "none");
      $('#gPres').css("display", "none");
    });
    $('#prescription').on('click',function(){
      $('#myTabContent').css("display", "none");
      $('#Rep').css("display", "none");
      $('#gPres').css("display", "block");
    });
    $('#reports').on('click',function(){
      $('#myTabContent').css("display", "none");
      $('#Rep').css("display", "block");
      $('#gPres').css("display", "none");
    });
    const slider = tns({
     container: '.my-slider',
     loop: false,
     items: 1,
     slideBy: 'page',
     nav: false,    
     speed: 400,
     controls: false,
     mouseDrag: true,

   });


    const slider2 = tns({
     container: '.slider2',
     loop: false,
     items: 1,
     slideBy: 'page',
     nav: false,    
     speed: 400,
     controls: false,
     mouseDrag: true,

   });

    $('.s2').on('click',function(){
      $('.s2.active').removeClass('active');
      $(this).addClass('active');
    });
  </script>
</body>
</html>