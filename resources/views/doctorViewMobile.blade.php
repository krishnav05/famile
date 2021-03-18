<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Famile</title>
    <link rel="stylesheet" href="/css/style.css">

    
    <script src="/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/js/bootstrap.bundle.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

</head>

<body>

    <header class="head">
        <span
        style="align-items: center;color: #ffffff;font-size: 1.2rem;">Dashboard</span>
    </header>


    <div class="tabs">
        <img id="avt" src="assets/img_avatar.png" alt="Avatar">
        @foreach($profiles as $profile)
        @if ($loop->first)
        <span>{{$profile['name']}}</span>
        @endif
        @endforeach
        <a href="/dashboard"> <button style="border-color:#FF4176;border:1px solid #FF4176;color: #FF4176;margin-left: 7%;">Quick
        View</button></a>
        <a href="/prescriptions"> <button>Prescription</button></a>
        <a href="/reports"><button>Reports</button></a>
    </div>



    <div class="cards">

        <div class="my-slider mt-3">
            <div class="slider-item" style="width: 200px;margin-left: 0%;">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img style="width: 75%;" src="assets/ic-bg.svg">
                            </div>
                            <div class="col-9">
                                <p class="card-text">Blood Group</p>
                                <h5 class="card-title" style="float: left; font-size: 1.2rem;"> O+ve</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="slider-item" style="width: 200px;margin-left: 1%;">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img style="width: 75%;" src="assets/ic-bp.svg">
                            </div>
                            <div class="col-9">
                                <p class="card-text">Blood Pressure</p>
                                <h5 class="card-title" style="float: left;font-size: 1.2rem;"> 90/60mmHg</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="slider-item" style="width: 200px;margin-left: 1%;">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img style="width: 75%;" src="assets/ic-glucose.svg">
                            </div>
                            <div class="col-9">
                                <p class="card-text" >Blood Glucose</p>
                                <h5 class="card-title" style="float: left;font-size: 1.2rem;">140 mg/dL</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="slider-item" style="width: 200px;margin-left: 1%;">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img style="width: 75%;" src="assets/ic-hamo.svg">
                            </div>
                            <div class="col-9">
                                <p class="card-text" >Hemoglobin</p>
                                <h5 class="card-title" style="float: left;font-size: 1.2rem;">17.5 grams</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="slider-item" style="width: 200px;margin-left: 1%;">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img style="width: 75%;" src="assets/ic-pr.svg">
                            </div>
                            <div class="col-9">
                                <p class="card-text" >Pulse Rate</p>
                                <h5 class="card-title" style="float: left;font-size: 1.2rem;">70 bpm</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="slider-item" style="width: 200px;margin-left: 1%;">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img style="width: 75%;" src="assets/ic-temp.svg">
                            </div>
                            <div class="col-9">
                                <p class="card-text" >Temperature</p>
                                <h5 class="card-title" style="float: left;font-size: 1.2rem;">98.2 C</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <span
    style="color: #FF4176;font-weight: 600;font-size: 0.8rem;margin-left: 5%; margin-top: 20px;">Tap
    on circle to view respected visits.
</span>

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button"
    style="background-color: #ffffff;color: black;margin-right: 5%;">
    2021
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
</div>
</div>

<!--graph-start  -->


<div id="container" style="margin-top: 7%;margin-right: 4%;margin-left: 4%;">
    <div id="element"></div>
</div>


<script>
    var ele = document.getElementById('container');
    if (ele) {
        ele.style.visibility = "visible";
    }
</script>
<script src="Bubble.js" type="text/javascript"></script>


<!-- graph -->


<!-- tab -->

<a href="./preshistory"><button id="visit"><span style="padding:2px 8px 2px 8px; background-color:#ffffff;color: #33CAFF;margin-right: 10px;border-radius: 10px;">3</span>Visits
    to Doctor/Hospital<i class="fas fa-chevron-right" style="color: #ffffff;margin-left: 10px;"></i></button></a>


    <!-- tab-end -->

    <script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script src="/Bubble.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#carouselExampleControlsvickykumar').find('.carousel-item').first().addClass('active');
    });

    $('#quickView').on('click', function () {
        $('#myTabContent').css("display", "none");
        $('#Rep').css("display", "none");
        $('#gPres').css("display", "none");
        $('.customCard').css("display", "block");
    });
    $('#prescription').on('click', function () {
        $('.customCard').css("display", "none");
        $('#myTabContent').css("display", "block");
        $('#Rep').css("display", "none");
        $('#gPres').css("display", "none");
    });
    $('#reports').on('click', function () {
        $('#myTabContent').css("display", "none");
        $('#Rep').css("display", "block");
        $('#gPres').css("display", "none");
        $('.customCard').css("display", "none");
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

    $('.s2').on('click', function () {
        $('.s2.active').removeClass('active');
        $(this).addClass('active');
    });
</script>




</body>

</html>