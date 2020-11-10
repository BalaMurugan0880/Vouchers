<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>    
    <!-- Export PDF js/css File -->
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="css/invoice.css" rel="stylesheet">
	<!-- Export PDF js/css File -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>





    <style type="text/css">
    	@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
  }
}
    </style>
</head>
<body>

    
    						  <div class="text-right" style="margin-top: 10px;">
    						  	<a href="/"><button class="btn btn-info"><i class="fa fa-home"></i> Home</button></a>
		 		  			    <button class="btn btn-info" id="print" style="margin-right: 15px;"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
		 		  			</div> 

		 		  			<hr>

 <div id="section-to-print">
		<div id="pdf">
		<div class="invoice overflow-auto">
		    <div style="min-width: 600px">
		        <header>
		            <div class="row">
		                <div class="col">
		                    
		                        <img src="image/googlelogo.png" style="height: 100px;" data-holder-rendered="true" />
		                </div>
		                <div class="col company-details">
		                    <h2 class="name" style="color: #3989c6;">
		                        Vouchers
		                    </h2>
		                    <div>No. 2A, Jalan Mega, Taman Mega Jaya, 56100 Kuala Lumpur, Selangor</div>
		                    <div>012-345 6789</div>
		                    <div>www.vouchers.com.my</div>
		                </div>
		            </div>
		        </header>
		        <main>
		            <div class="row contacts">
		             
		                <div class="col invoice-details">
		                    <div class="date" id="currentDate"> </div>
		                    <div>Transaction ID : {{$transID}}</div>

		                </div>
		            </div>
		            <table border="0" cellspacing="0" cellpadding="0">
		                <thead>
		                    <tr>
		                        <th>#</th>
		                        <th class="text-left">DESCRIPTION</th>
		                        <th></th>
		                        <th class="text-right">Quantity</th>
		                        <th class="text-right">Price</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <tr>
		                        <td class="no">01</td>
		                        <td class="text-left"><h3> {{$test}}</h3>


		                           @if($test == 'advancePackage')
		                           <p>20 Add Voucher, Edit Voucher Title, Edit Voucher Code, Edit Voucher Description, Extend Expire Date</p>
		                           @elseif($test == 'basicPackage')
		                           <p>5 Add Voucher, Edit Voucher Title, Edit Voucher Code</p>
		                           @elseif($test == 'premiumPackage')
		                           <p>Unlimited Add Voucher, Edit Voucher Title, Edit Voucher Code, Edit Voucher Description, Extend Expire Date, Add Voucher Quantity</p>
		                           @endif
		                        </td>
		                        <td></td>
		                        <td class="qty">1</td>
		                        <td class="total">RM{{$total}}</td>
		                    </tr>
		                </tbody>
		               		<tfoot>
		               		    <tr>
		               		        <td colspan="2"></td>
		               		        <td colspan="2">SUBTOTAL</td>
		               		        <td>RM{{$total}}</td>
		               		    </tr>
		               		</tfoot>
		            </table>
		            <br>
		            <br>
		          			 <div class="thanks">Thank you!</div>
		          			 <div class="notices">
		          			     <div>NOTICE:</div>
		          			     <div class="notice">Please Export PDF Your Invoice For Reference.</div>
		          			 </div>
		          			
		 		</main>
		        <footer>
		            Invoice was created on a computer and is valid without the signature and seal.
		        </footer>
		    </div>
		    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
		    <div></div>
		  </div>
		</div>
	</div>
<script>
 $('#print').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });

</script>
</script>
<script>
    var today = new Date();
var dd = String(today.getDate()).padStart('1');
var mm = String(today.getMonth() + 1).padStart(2, '1'); //January is 0!
var yyyy = today.getFullYear();

today = 'Date of Invoice:'+ '&nbsp'+ dd + '/' + mm + '/' + yyyy;
    document.getElementById('currentDate').innerHTML = today;
</script>

</body>
</html>