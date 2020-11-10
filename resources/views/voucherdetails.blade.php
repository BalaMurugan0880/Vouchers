<?php
use App\voucherdetails;
$voucherCount = voucherdetails::voucherCount();
?>

<!DOCTYPE html>
<html>
	@include('layouts.app')
<head>
	<title>Voucher</title>
</head>


<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">

						Welcome {{ Auth::user()->name }}
						

					</div>
					
						<div class="card-body">
							  @if(session()->has('message'))
                        <p class="alert alert-info">
                            {{ session()->get('message') }}
                        </p>
                     @endif

							<form method="POST" action="/voucherdetails">
								{{ csrf_field() }}
								 
								<div class="form-group row">
									<label for="title" class="col-md-4 col-form-label text-md-right">Title : </label>
									<div class="col-md-6">
                               			 <input id="title" type="title" class="form-control" name="title"  autocomplete="title" autofocus>
                         		   </div>     
								</div>

								<div class="form-group row">
									<label for="description" class="col-md-4 col-form-label text-md-right">Description :</label>
									<div class="col-md-6">
                               			<textarea class="form-control"  rows="3" name="description"></textarea>
                         		   </div>     
								</div>

								<div class="form-group row">
									<div class="col-md-6">
                               			<input id="voucherCount" type="hidden" class="form-control" name="voucherCount"  autocomplete="voucherCount" value="{{ $voucherCount }}">
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
                         </div>

							</form>		
						</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>