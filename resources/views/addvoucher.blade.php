<!DOCTYPE html>
<html>
@include('layouts.app')
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<title>Add Voucher</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Welcome {{ Auth::user()->name }}</div>

					<div class="card-body">

						<form method="POST" action="/addvoucher">
							 {{ csrf_field() }}
							<div class="form-group row">
									<label for="voucherTitle" class="col-md-4 col-form-label text-md-right">Voucher Title :</label>
                           		 <div class="col-md-6">
                              		  <input id="voucherTitle" type="voucherTitle" class="form-control" name="voucherTitle"  autocomplete="voucherTitle" autofocus>
                            	</div> 
							</div>

							<div class="form-group row">
									<label for="voucherCode" class="col-md-4 col-form-label text-md-right">Voucher Code :</label>
                           		 <div class="col-md-6">
                              		  <input id="voucherCode" type="voucherCode" class="form-control" name="voucherCode"  autocomplete="voucherCode" autofocus>
                            	</div> 
							</div>

							<div class="form-group row">
									<label for="quantity" class="col-md-4 col-form-label text-md-right">Voucher Quantity :</label>
                           		 <div class="col-md-2">
                              		  <input id="quantity" type="number" class="form-control" name="quantity" min="1" max="1000" autofocus>
                            	</div> 
							</div>
							

							<div class="form-group row">
									<label for="expiredDate" class="col-md-4 col-form-label text-md-right">Expired Date(Optional) :</label>
                           		 	<div class="col-md-4">
                           		 		<input type="text" id="datepicker" name="datepicker">
   						  	  		 </div>
						
								</div>

							</div>

							<div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                                <button type="reset" class="btn btn-primary">
                                    Clear
                                </button>
                             </div>
                         </div><br>



						</form>	
					</div>

				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
    $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            minDate:new Date(),
            format:'yyyy-mm-dd'


        });
</script> 




</body>


</html>