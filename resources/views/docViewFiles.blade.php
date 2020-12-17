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
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#{{$profile['id']}}" role="tab">{{$profile['name']}}</a>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#{{$profile['id']}}" role="tab">{{$profile['name']}}</a>
    </li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content" id="myTabContent">
    @foreach($profiles as $profile)
    @if ($loop->first)
    <div class="tab-pane fade show active" id="{{$profile['id']}}" role="tabpanel">
      <div id="carouselExampleControls{{$profile['id']}}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($documents as $document)
          @if($document['profile_id' == $profile['id']])
          @if ($loop->first)
          <div class="carousel-item active">
            <img src="/prescriptions/{{$profile['id']}}/{{$document['document']}}" class="d-block w-100">
          </div>
          @else
          <div class="carousel-item">
            <img src="/prescriptions/{{$profile['id']}}/{{$document['document']}}" class="d-block w-100">
          </div>
          @endif
          @endif
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls{{$profile['id']}}" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls{{$profile['id']}}" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
    </div>
    @else
    <div class="tab-pane fade" id="{{$profile['id']}}" role="tabpanel">
      <div id="carouselExampleControls{{$profile['id']}}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach($documents as $document)
          @if($document['profile_id' == $profile['id']])
          @if ($loop->first)
          <div class="carousel-item active">
            <img src="/prescriptions/{{$profile['id']}}/{{$document['document']}}" class="d-block w-100">
          </div>
          @else
          <div class="carousel-item">
            <img src="/prescriptions/{{$profile['id']}}/{{$document['document']}}" class="d-block w-100">
          </div>
          @endif
          @endif
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls{{$profile['id']}}" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls{{$profile['id']}}" role="button" data-bs-slide="next">
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
</body>
<script type="text/javascript">
  var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
  triggerTabList.forEach(function (triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function (event) {
      event.preventDefault()
      tabTrigger.show()
    })
  })
  $('.carousel').carousel({
  wrap: false
  });
</script>
</html>