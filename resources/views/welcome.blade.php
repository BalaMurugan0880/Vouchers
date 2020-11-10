<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/flipcard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/e07be0b1c4.js"></script>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="     sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        

        <style type="text/css">
    /* Google logo */
        .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 5%;
  width: 50%;
    }

/* Styles for wrapping the search box */

.main {
    width: 100%;
    margin: auto;
    margin-top: 20px;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
    padding-left: 2.375rem;

}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}

.h3 {
    text-align: center;
}

.arrow {
  text-align: center;
  margin: 8% 0;
}
.bounce {
  -moz-animation: bounce 2s infinite;
  -webkit-animation: bounce 2s infinite;
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-30px);
  }
  60% {
    transform: translateY(-15px);
  }
}


    </style>
    </head>
    <body>
        @include('layouts.app')

            <div class="content">
                 <img src="image/googlelogo.png" class="center" style="width:250px;height:100px;">
    <div class="container">
        <div class="main">
        <div class="input-group">
          <input type="text" class="form-control h-25 d-inline-block" placeholder="Search For Your Favourite Brand" >
          <div class="input-group-append">
             <button class="btn btn-secondary" type="button" style="height: 35px;">
              <i class="fa fa-search"></i>
             </button>
             </div>
             </div>
            </div>
        </div>
        <br>
        <br>
        
<!-- Line below search -->
<hr class="my-4">


<br>
<h3 class="h3">Popular Vouchers</h3>
<br>
<br>
 
<div class="container">
  <div class="row text-center">
    <div class="col-md-4 card-container">
      <div class="card card-flip shadow-lg  bg-white">
        <div class="front card-block">
          <!-- To add FontAwesome Icons use Unicode characters and to set size use font-size instead of fa-*x because when calculating the height (see js), the size of the icon is not calculated if using classes -->
          <img src="image/grablogo.png" height="150" width="150">

        </div>
        <div class="back card-block">
          <h2>Grab Car</h2>
             <div class="arrow bounce">
                    <h4>Click Here</h4>
                 <p class="fa fa-arrow-down fa-2x" > </p>
            </div>
          <a href="travel" class="btn btn-outline-primary">Reedem Voucher</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 card-container">
      <div class="card card-flip shadow-lg  bg-white">
        <div class="front card-block">
          <img src="image/adidaslogo.png" height="150" width="150">

        </div>
        <div class="back card-block">
           <h2>Adidas</h2>
           <div class="arrow bounce">
                    <h4>Click Here</h4>
                 <p class="fa fa-arrow-down fa-2x" > </p>
            </div>
          <a href="fashion" class="btn btn-outline-primary">Reedem Voucher</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 card-container">
      <div class="card card-flip shadow-lg  bg-white">
        <div class="front card-block">
          <img src="image/kfclogo.png" height="150" width="200">
        </div>
        <div class="back card-block">
           <h2>KFC</h2>
           <div class="arrow bounce">
                    <h4>Click Here</h4>
                 <p class="fa fa-arrow-down fa-2x" > </p>
            </div>
          <a href="foodNbeverage" class="btn btn-outline-primary">Reedem Voucher</a>
        </div>
      </div>
    </div>


<script type="text/javascript">
    $(document).ready(function() {
  var front = document.getElementsByClassName("front");
  var back = document.getElementsByClassName("back");

  var highest = 0;
  var absoluteSide = "";

  for (var i = 0; i < front.length; i++) {
    if (front[i].offsetHeight > back[i].offsetHeight) {
      if (front[i].offsetHeight > highest) {
        highest = front[i].offsetHeight;
        absoluteSide = ".front";
      }
    } else if (back[i].offsetHeight > highest) {
      highest = back[i].offsetHeight;
      absoluteSide = ".back";
    }
  }
  $(".front").css("height", highest);
  $(".back").css("height", highest);
  $(absoluteSide).css("position", "absolute");
});
</script>


</body>
</html>
