<!DOCTYPE html>
<html>
@include('layouts.app')
<head>
	<title>Vendor Package</title>
	<link href="css/packages.css" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
</head>
<body>

	<section class="pricing py-5">
  <div class="container">
  	 @if(session()->has('message'))
                        <p class="alert alert-info">
                            {{ session()->get('message') }}
                        </p>
     @endif   
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
         			 <div class="card-body">
         			   <h5 class="card-title text-muted text-uppercase text-center">Basic Package</h5>
         			   <h6 class="card-price text-center">RM10<span class="period">/month</span></h6>
         			   <hr>
         			   <ul class="fa-ul">
         			     <li><span class="fa-li"><i class="fas fa-check"></i></span><b>5 Add Voucher</b></li>
         			     <li><span class="fa-li"><i class="fas fa-check"></i></span>Edit Voucher Title</li>
         			     <li><span class="fa-li"><i class="fas fa-check"></i></span>Edit Voucher Code</li>
         			     <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Edit Voucher Description</li>
         			     <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Add Voucher Quantity</li>
         			     <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Extend Expire Date</li>
         			   </ul>
         			   <button type="button" id="basicPackage" value="basicPackage" class="btn btn-block btn-primary text-uppercase" data-toggle="modal" data-target="#myModal">Subscribe</button>
         			 </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">

         			 <div class="card-body"><span class="badge badge-danger font-weight-normal p-2">Popular</span>
         			   <h5 class="card-title text-muted text-uppercase text-center">Advance Package</h5>
         			   <h6 class="card-price text-center">RM50<span class="period">/month</span></h6>
         			   <hr>
         			   <ul class="fa-ul">
         			     <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>20 Add Voucher</strong></li>
         			     <li><span class="fa-li"><i class="fas fa-check"></i></span>Edit Voucher Title</li>
         			     <li><span class="fa-li"><i class="fas fa-check"></i></span>Edit Voucher Code</li>
         			     <li><span class="fa-li"><i class="fas fa-check"></i></span>Edit Voucher Description</li>
         			     <li><span class="fa-li"><i class="fas fa-check"></i></span>Extend Expire Date</li>
         			     <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Add Voucher Quantity</li>
         			   </ul>
         			   <button type="button" id="advancePackage" value="advancePackage" class="btn btn-block btn-primary text-uppercase" data-toggle="modal" data-target="#myModal2">Subscribe</button>
         			 </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body"><span class="badge badge-warning font-weight-normal p-2">Recommended</span>
            <h5 class="card-title text-muted text-uppercase text-center">Premium Package</h5>
            <h6 class="card-price text-center">RM150<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Add Voucher</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Edit Voucher Title</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Edit Voucher Code</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Edit Voucher Description</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Extend Expire Date</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Add Voucher Quantity</li>
            </ul>
            <button type="button" id="premiumPackage" value="premiumPackage"  class="btn btn-block btn-primary text-uppercase" data-toggle="modal" data-target="#myModal3">Subscribe</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
	var fired_button = $("button").val(); 
	$("button").click(function() {
    var fired_button = $(this).val();
    document.getElementById("pressed").value=fired_button;
    document.getElementById("pressed2").value=fired_button;
    document.getElementById("pressed3").value=fired_button;
});
</script>
</section>

<!-- The Modal -->
<form method="POST" action="{{ url('charge') }}">
	 {{ csrf_field() }}
<div class="modal" id="myModal">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Subscribe Basic Package</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	
	      <!-- Modal body -->
	      <div class="modal-body">
	        Are you sure to subscribe Basic Package?
	        <input type="hidden" id="pressed" value="" name="vendorValue"/>
	        <input type="hidden" value="10" name="amount"/>
	      </div>
	
	      <!-- Modal footer -->
	      <div class="modal-footer">
	      	<input type="submit" name="submit" value="Pay Now">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	      </div>
	
	    </div>
	  </div>
	</div>
</form>

<form method="POST" action="{{ url('charge') }}">
	{{ csrf_field() }}
<div class="modal" id="myModal2">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Subscribe Advance Package</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	
	      <!-- Modal body -->
	      <div class="modal-body">
	        Are you sure to subscribe Advance Package?
	        <input type="hidden" id="pressed2" value="" name="vendorValue"/>
	        <input type="hidden" value="50" name="amount"/>
	      </div>
	
	      <!-- Modal footer -->
	      <div class="modal-footer">
	      	<input type="submit" name="submit" value="Pay Now">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	      </div>
	
	    </div>
	  </div>
	</div>
</form>

<form method="POST" action="{{ url('charge') }}">
	{{ csrf_field() }}
<div class="modal" id="myModal3">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Subscribe Premium Package</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	
	      <!-- Modal body -->
	      <div class="modal-body">
	        Are you sure to subscribe Premium Package?
	        <input type="hidden" id="pressed3" value="" name="vendorValue"/>
	        <input type="hidden" value="150" name="amount"/>
	      </div>
	
	      <!-- Modal footer -->
	      <div class="modal-footer">
	      	<input type="submit" name="submit" value="Pay Now">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	      </div>
	
	    </div>
	  </div>
	</div>
</form>

</body>

</html>