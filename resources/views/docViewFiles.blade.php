<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Famile</title>
</head>
<body>
    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
    @foreach($profiles as $profile)
    @if ($loop->first)
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="{{str_replace(' ', '', $profile['name'])}}-tab" data-bs-toggle="tab" href="#{{str_replace(' ', '', $profile['name'])}}" role="tab" aria-controls="{{str_replace(' ', '', $profile['name'])}}" aria-selected="true">{{$profile['name']}}</a>
    </li>
    @else
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="{{str_replace(' ', '', $profile['name'])}}-tab" data-bs-toggle="tab" href="#{{str_replace(' ', '', $profile['name'])}}" role="tab" aria-controls="{{str_replace(' ', '', $profile['name'])}}" aria-selected="false">{{$profile['name']}}</a>
    </li>
    @endif
    @endforeach
  </ul>
<div class="tab-content" id="myTabContent">
  @foreach($profiles as $profile)
  @if ($loop->first)
  <div class="tab-pane active" id="{{str_replace(' ', '', $profile['name'])}}" role="tabpanel" aria-labelledby="{{str_replace(' ', '', $profile['name'])}}-tab">
    <div id="carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($documents as $document)
          @if($document['profile_id'] == $profile['id'])
          <div class="carousel-item">
            <img src="/prescriptions/{{$profile['id']}}/{{$document['document']}}" class="d-block w-100">
          </div>
          @endif
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
  </div>
  @else
  <div class="tab-pane" id="{{str_replace(' ', '', $profile['name'])}}" role="tabpanel" aria-labelledby="{{str_replace(' ', '', $profile['name'])}}-tab">
    <div id="carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($documents as $document)
          @if($document['profile_id'] == $profile['id'])
          <div class="carousel-item">
            <img src="/prescriptions/{{$profile['id']}}/{{$document['document']}}" class="d-block w-100">
          </div>
          @endif
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
  </div>
  @endif
  @endforeach
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
  <script type="text/javascript">
    @foreach($profiles as $profile)
    $(document).ready(function () {
      $('#carouselExampleControls{{str_replace(' ', '', $profile['name'])}}').find('.carousel-item').first().addClass('active');
    });
    @endforeach
  </script>
</body>
</html>