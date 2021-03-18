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




    <div class="accordion" id="accordionExample" ;>
        <div class="accordion-item" style="background-color: #ffffff">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                    style="font-weight: 500;border:0px;padding-top: 30px;padding-bottom: 30px;">
                    29 Aug 2020 | 06:30 pm <br>
                    Sharda hospital
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <span style="opacity: 0.5;" ;> Doctor : </span>Akash Gupta<br>
                    <span style="opacity: 0.5;" ;> Speciality :</span> Neurologist<br>
                    <span style="opacity: 0.5;" ;> Dignosis :</span> Fever
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
                        <tr>
                            <th scope="row">Satrin</th>
                            <td style="text-align: center;">2</td>
                            <td>1 week</td>
                            <td>After Dinner</td>
                        </tr>
                        <tr>
                            <th scope="row">Aspirin</th>
                            <td style="text-align: center;">2</td>
                            <td>15 days</td>
                            <td>After Dinner</td>

                        </tr>
                        <tr>
                            <th scope="row">Dygeine</th>
                            <td style="text-align: center;">3</td>
                            <td>10 days</td>
                            <td>Before Dinner</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>


        <br>
        
        <div class="accordion-item" style="background-color: #ffffff">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                    style="font-weight: 500;border:0px;padding-top: 30px;padding-bottom: 30px;">
                    29 Aug 2020 | 01:34 am<br>
                    HINDUJA
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <span style="opacity: 0.5;" ;>Doctor :</span> Manish Rawat<br>
                    <span style="opacity: 0.5;" ;> Speciality : </span> General Physician<br>
                    <span style="opacity: 0.5;" ;>Dignosis :</span> Cavity

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
                        <tr>
                            <th scope="row">Satrin</th>
                            <td style="text-align: center;">2</td>
                            <td>1 week</td>
                            <td>After Dinner</td>
                        </tr>
                        <tr>
                            <th scope="row">Aspirin</th>
                            <td style="text-align: center;">2</td>
                            <td>15 days</td>
                            <td>After Dinner</td>

                        </tr>
                        <tr>
                            <th scope="row">Dygeine</th>
                            <td style="text-align: center;">3</td>
                            <td >10 days</td>
                            <td>Before Dinner</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <div class="accordion-item" style="background-color: #ffffff" >
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"style="font-weight: 500; border:0px;padding-top: 30px;padding-bottom: 30px;">
                    26 Aug 2020 | 05:30 pm<br>
                    Sheel Hospital
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <span style="opacity: 0.5;" ;> Doctor :</span> Priyanka Rai<br>
                    <span style="opacity: 0.5;" ;>Speciality :</span> Endocrinologist<br>
                    <span style="opacity: 0.5;" ;>Dignosis :</span> Cavity
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
                        <tr>
                            <th scope="row">Satrin</th>
                            <td style="text-align: center;">2</td>
                            <td>1 week</td>
                            <td>After Dinner</td>
                        </tr>
                        <tr>
                            <th scope="row">Aspirin</th>
                            <td style="text-align: center;">2</td>
                            <td>15 days</td>
                            <td>After Dinner</td>

                        </tr>
                        <tr>
                            <th scope="row">Dygeine</th>
                            <td style="text-align: center;">3</td>
                            <td>10 days</td>
                            <td>Before Dinner</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="accordion-item"style="background-color: #ffffff">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed text-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree"style="font-weight: 500;border:0px;padding-top: 30px;padding-bottom: 30px;">
                    26 Aug 2020 | 12:30 pm<br>
                    Medical College
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <span style="opacity: 0.5;" ;> Doctor :</span> Kamal Hasan<br>
                    <span style="opacity: 0.5;" ;>Speciality :</span> Dermatologist<br>
                    <span style="opacity: 0.5;" ;>Dignosis :</span> Cavity
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
                        <tr>
                            <th scope="row">Satrin</th>
                            <td style="text-align: center;">2</td>
                            <td>1 week</td>
                            <td>After Dinner</td>
                        </tr>
                        <tr>
                            <th scope="row">Aspirin</th>
                            <td style="text-align: center;">2</td>
                            <td>15 days</td>
                            <td>After Dinner</td>

                        </tr>
                        <tr>
                            <th scope="row">Dygeine</th>
                            <td style="text-align: center;">3</td>
                            <td>10 days</td>
                            <td>Before Dinner</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>

</html>