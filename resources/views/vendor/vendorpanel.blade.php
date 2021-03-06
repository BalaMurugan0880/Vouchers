<?php
use App\addvoucher;
$vendortype = addvoucher::vendortype();
$voucherCount = addvoucher::addvoucherCount();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Vendor Panel</title>


  <link href="css/admin.css" rel="stylesheet">
  <script src="js/admin.js" type="text/javascript"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


</head>
<body>

  <svg style="display:none;">
  <symbol id="down" viewBox="0 0 16 16">
    <polygon points="3.81 4.38 8 8.57 12.19 4.38 13.71 5.91 8 11.62 2.29 5.91 3.81 4.38" />
  </symbol>
  <symbol id="users" viewBox="0 0 16 16">
    <path d="M8,0a8,8,0,1,0,8,8A8,8,0,0,0,8,0ZM8,15a7,7,0,0,1-5.19-2.32,2.71,2.71,0,0,1,1.7-1,13.11,13.11,0,0,0,1.29-.28,2.32,2.32,0,0,0,.94-.34,1.17,1.17,0,0,0-.27-.7h0A3.61,3.61,0,0,1,5.15,7.49,3.18,3.18,0,0,1,8,4.07a3.18,3.18,0,0,1,2.86,3.42,3.6,3.6,0,0,1-1.32,2.88h0a1.13,1.13,0,0,0-.27.69,2.68,2.68,0,0,0,.93.31,10.81,10.81,0,0,0,1.28.23,2.63,2.63,0,0,1,1.78,1A7,7,0,0,1,8,15Z" />
  </symbol>
  <symbol id="collection" viewBox="0 0 16 16">
    <rect width="7" height="7" />
    <rect y="9" width="7" height="7" />
    <rect x="9" width="7" height="7" />
    <rect x="9" y="9" width="7" height="7" />
  </symbol>
  <symbol id="charts" viewBox="0 0 16 16">
    <polygon points="0.64 7.38 -0.02 6.63 2.55 4.38 4.57 5.93 9.25 0.78 12.97 4.37 15.37 2.31 16.02 3.07 12.94 5.72 9.29 2.21 4.69 7.29 2.59 5.67 0.64 7.38" />
    <rect y="9" width="2" height="7" />
    <rect x="12" y="8" width="2" height="8" />
    <rect x="8" y="6" width="2" height="10" />
    <rect x="4" y="11" width="2" height="5" />
  </symbol>
  <symbol id="comments" viewBox="0 0 16 16">
      <path d="M0,16.13V2H15V13H5.24ZM1,3V14.37L5,12h9V3Z"/><rect x="3" y="5" width="9" height="1"/><rect x="3" y="7" width="7" height="1"/><rect x="3" y="9" width="5" height="1"/>
    </symbol>
  <symbol id="pages" viewBox="0 0 16 16">
    <rect x="4" width="12" height="12" transform="translate(20 12) rotate(-180)"/><polygon points="2 14 2 2 0 2 0 14 0 16 2 16 14 16 14 14 2 14"/>
    </symbol>
  <symbol id="appearance" viewBox="0 0 16 16">
    <path d="M3,0V7A2,2,0,0,0,5,9H6v5a2,2,0,0,0,4,0V9h1a2,2,0,0,0,2-2V0Zm9,7a1,1,0,0,1-1,1H9v6a1,1,0,0,1-2,0V8H5A1,1,0,0,1,4,7V6h8ZM4,5V1H6V4H7V1H9V4h1V1h2V5Z"/>
  </symbol>
  <symbol id="trends" viewBox="0 0 16 16">
    <polygon points="0.64 11.85 -0.02 11.1 2.55 8.85 4.57 10.4 9.25 5.25 12.97 8.84 15.37 6.79 16.02 7.54 12.94 10.2 9.29 6.68 4.69 11.76 2.59 10.14 0.64 11.85"/>
  </symbol>
  <symbol id="settings" viewBox="0 0 16 16">
    <rect x="9.78" y="5.34" width="1" height="7.97"/><polygon points="7.79 6.07 10.28 1.75 12.77 6.07 7.79 6.07"/><rect x="4.16" y="1.75" width="1" height="7.97"/><polygon points="7.15 8.99 4.66 13.31 2.16 8.99 7.15 8.99"/><rect x="1.28" width="1" height="4.97"/><polygon points="3.28 4.53 1.78 7.13 0.28 4.53 3.28 4.53"/><rect x="12.84" y="11.03" width="1" height="4.97"/><polygon points="11.85 11.47 13.34 8.88 14.84 11.47 11.85 11.47"/>
    </symbol>
  <symbol id="options" viewBox="0 0 16 16">
    <path d="M8,11a3,3,0,1,1,3-3A3,3,0,0,1,8,11ZM8,6a2,2,0,1,0,2,2A2,2,0,0,0,8,6Z"/><path d="M8.5,16h-1A1.5,1.5,0,0,1,6,14.5v-.85a5.91,5.91,0,0,1-.58-.24l-.6.6A1.54,1.54,0,0,1,2.7,14L2,13.3a1.5,1.5,0,0,1,0-2.12l.6-.6A5.91,5.91,0,0,1,2.35,10H1.5A1.5,1.5,0,0,1,0,8.5v-1A1.5,1.5,0,0,1,1.5,6h.85a5.91,5.91,0,0,1,.24-.58L2,4.82A1.5,1.5,0,0,1,2,2.7L2.7,2A1.54,1.54,0,0,1,4.82,2l.6.6A5.91,5.91,0,0,1,6,2.35V1.5A1.5,1.5,0,0,1,7.5,0h1A1.5,1.5,0,0,1,10,1.5v.85a5.91,5.91,0,0,1,.58.24l.6-.6A1.54,1.54,0,0,1,13.3,2L14,2.7a1.5,1.5,0,0,1,0,2.12l-.6.6a5.91,5.91,0,0,1,.24.58h.85A1.5,1.5,0,0,1,16,7.5v1A1.5,1.5,0,0,1,14.5,10h-.85a5.91,5.91,0,0,1-.24.58l.6.6a1.5,1.5,0,0,1,0,2.12L13.3,14a1.54,1.54,0,0,1-2.12,0l-.6-.6a5.91,5.91,0,0,1-.58.24v.85A1.5,1.5,0,0,1,8.5,16ZM5.23,12.18l.33.18a4.94,4.94,0,0,0,1.07.44l.36.1V14.5a.5.5,0,0,0,.5.5h1a.5.5,0,0,0,.5-.5V12.91l.36-.1a4.94,4.94,0,0,0,1.07-.44l.33-.18,1.12,1.12a.51.51,0,0,0,.71,0l.71-.71a.5.5,0,0,0,0-.71l-1.12-1.12.18-.33a4.94,4.94,0,0,0,.44-1.07l.1-.36H14.5a.5.5,0,0,0,.5-.5v-1a.5.5,0,0,0-.5-.5H12.91l-.1-.36a4.94,4.94,0,0,0-.44-1.07l-.18-.33L13.3,4.11a.5.5,0,0,0,0-.71L12.6,2.7a.51.51,0,0,0-.71,0L10.77,3.82l-.33-.18a4.94,4.94,0,0,0-1.07-.44L9,3.09V1.5A.5.5,0,0,0,8.5,1h-1a.5.5,0,0,0-.5.5V3.09l-.36.1a4.94,4.94,0,0,0-1.07.44l-.33.18L4.11,2.7a.51.51,0,0,0-.71,0L2.7,3.4a.5.5,0,0,0,0,.71L3.82,5.23l-.18.33a4.94,4.94,0,0,0-.44,1.07L3.09,7H1.5a.5.5,0,0,0-.5.5v1a.5.5,0,0,0,.5.5H3.09l.1.36a4.94,4.94,0,0,0,.44,1.07l.18.33L2.7,11.89a.5.5,0,0,0,0,.71l.71.71a.51.51,0,0,0,.71,0Z"/>
    </symbol>
  <symbol id="collapse" viewBox="0 0 16 16">
    <polygon points="11.62 3.81 7.43 8 11.62 12.19 10.09 13.71 4.38 8 10.09 2.29 11.62 3.81"/>
  </symbol>
  <symbol id="search" viewBox="0 0 16 16">
    <path d="M6.57,1A5.57,5.57,0,1,1,1,6.57,5.57,5.57,0,0,1,6.57,1m0-1a6.57,6.57,0,1,0,6.57,6.57A6.57,6.57,0,0,0,6.57,0Z"/><rect x="11.84" y="9.87" width="2" height="5.93" transform="translate(-5.32 12.84) rotate(-45)"/>
  </symbol>
</svg>


<header class="page-header">
  <nav>
    <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
      <svg width="20" height="20" aria-hidden="true">
        <use xlink:href="#down"></use>
      </svg>
    </button>
    <ul class="admin-menu">
      <li class="menu-heading">

        <h3>Welcome {{ Auth::user()->name }}</h3>
      </li>
      <li>
        <a href="/">
          <svg>
            <use xlink:href="#pages"></use>
          </svg>
          <span>Home</span>
        </a>
      </li>
      <li>
        <a href="profile">
          <svg>
            <use xlink:href="#users"></use>
          </svg>
          <span>Profile</span>
        </a>
      </li>
      <li>
        <a href="activeVoucher">
          <svg>
            <use xlink:href="#comments"></use>
          </svg>
          <span>Active Voucher</span>
        </a>
      </li>
      <li>
        <a href="expiredVoucher">
          <svg>
            <use xlink:href="#appearance"></use>
          </svg>
          <span>Expired Voucher</span>
        </a>
      </li>
      <li>
        <a href="displayVouchers">
            <svg>
              <use xlink:href="#charts"></use>
            </svg>
            <span>All Voucher's</span>
          </a>
      </li>
       @if(Auth::user()->hasRole('vendor'))
      <li>
        <a href="voucherdetails">
            <svg>
              <use xlink:href="#trends"></use>
            </svg>
            <span>Add Voucher's</span>
          </a>
      </li>
      @endif
       @if(Auth::user()->hasRole('vendor'))
      <li>
        <a href="vendorpanel">
            <svg>
              <use xlink:href="#options"></use>
            </svg>
            <span>Vendor Panel</span>
          </a>
      </li>
      @endif
        <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
          <svg aria-hidden="true">
            <use xlink:href="#collapse"></use>
          </svg>
          <span>Collapse</span>
        </button>
      </li>
    </ul>
  </nav>
</header>

<section class="page-content">
  @include('layouts.app')









  <!--Container For Update voucher details -->
  <div class="container">
       <div class="row">

        <div class="card-deck">
          <div class="col-sm">
              <div class="card text-white bg-primary" style="width: 19rem;">
                 <div class="card-body">
                   <h3 class="card-title">Vouchers Redeemed</h3>
                   <p class="card-text">
                  

                       <h5>{{$total_redeemed}} Vouchers Redeemed</h5> 

            
                   </p>
                   
                 </div>
              </div>
           </div>
           <div class="col-sm">
               <div class="card text-white bg-danger" style="width: 19rem;">
                  <div class="card-body">
                    <h3 class="card-title">Vouchers Added</h3>
                    <p class="card-text">
                      @foreach ($test as $testing)

                       <h5>{{$testing->addvoucher_count}} Vouchers Added</h5> 

                      @endforeach

                    </p>
                    
                  </div>
               </div>
           </div>
           <div class="col-sm">
             <div class="card text-white bg-secondary" style="width: 19rem;">
                <div class="card-body">
                  <h3 class="card-title">Subscription</h3>
                  <p class="card-text">
                        @if($vendortype ==  'basicPackage')
                          <h5>Basic Package</h5>
                        @elseif($vendortype == 'advancePackage')
                            <h5>Advance Package</h5>
                        @elseif($vendortype == 'premiumPackage')
                            <h5>Premium Package</h5>
                        @endif
                  </p>
                  <br>
                  <br>
                  
                </div>
             </div>
           </div>
        </div>

      </div>

    </div>
      <br>

      <div class="container-fluid" id="page-content">
    <div class="padding">
        <div class="row">
            <div class="container-fluid d-flex justify-content-center">
                <div class="col-sm-8 col-md-6">
                    <div class="card">
                        <div class="card-body" style="height: 420px">
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
  <section class="grid">
    

    <article>

      <div class="container-fluid py-3">
         
            @if($vendortype ==  'basicPackage')
            <div class="alert alert-info">
               <b>Basic Package privilege are editable Voucher Title & Voucher Code Only.</b> 
               <b>Subscribe To Advance Package For More Privilege.</b> 
               <b><a style="text-decoration:none" href="package">Subscribe Now!</a></b> 
            </div>
            @elseif($vendortype == 'advancePackage')
            <div class="alert alert-info">
               <b>Advance Package privilege are editable all except Quantity Of Voucher.</b> 
               <b>Subscribe To Premium Package For More Privilege.</b> 
               <b><a style="text-decoration:none" href="package">Subscribe Now!</a></b> 	
            </div>
            @elseif(is_null($vendortype))
            <div class="alert alert-info">
               <b>Subscribe A Package To Get Editable Vouchers Privilege.</b> &nbsp;
               <b><a style="text-decoration:none" href="package">Subscribe Now!</a></b> 
            </div>
            @endif
			@if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Voucher ID</th>
					<th>Voucher Title</th>
					<th>Voucher Code</th>
          			<th>Quantity</th>
					<th>Description</th>
					<th>Expired Date</th>
					<th>Action</th>
				</tr>

			</thead>

			<tbody>
				
			@foreach ($data as $row)
			<form method="POST" action="/vendorpanel">
					@csrf

				@if($vendortype ==  'basicPackage')
					<tr>
						<td>
							<input id="voucherid" type="voucherid" value="{{$row->voucher_id}}" class="form-control" name="voucherid"  autocomplete="voucherid" disabled>
						</td>

						<td>
							<input id="voucherTitle" type="voucherTitle" value="{{$row->voucherTitle}}" class="form-control" name="voucherTitle"  autocomplete="voucherTitle" autofocus>
						</td>

						<td>
							<input id="voucherCode" type="voucherCode" value="{{$row->voucherCode}}" class="form-control" name="voucherCode"  autocomplete="voucherCode" autofocus>
						</td>

           				<td>
           					<input id="quantity" type="number" value="{{$row->quantity}}" class="form-control" name="quantity" min="1" max="1000" disabled>
           				</td>

						<td>
							<textarea class="form-control" rows="1" name="description" disabled>{{$row->description}}</textarea>
						</td> 

						<td>
							<input type="text" id="datepicker" class="form-control" value="{{$row->expiredDate}}" name="datepicker" disabled>
						</td> 

						<td>
							<button type="submit" class="btn btn-outline-primary">Update</button>
						</td>

					</tr>

				@elseif($vendortype ==  'advancePackage')
					<tr>
						<td>
							<input id="voucherid" type="voucherid" value="{{$row->voucher_id}}" class="form-control" name="voucherid"  autocomplete="voucherid" disabled>
						</td>

						<td>
							<input id="voucherTitle" type="voucherTitle" value="{{$row->voucherTitle}}" class="form-control" name="voucherTitle"  autocomplete="voucherTitle" autofocus>
						</td>

						<td>
							<input id="voucherCode" type="voucherCode" value="{{$row->voucherCode}}" class="form-control" name="voucherCode"  autocomplete="voucherCode" autofocus>
						</td>

           				<td>
           					<input id="quantity" type="number" value="{{$row->quantity}}" class="form-control" name="quantity" min="1" max="1000" disabled>
           				</td>

						<td>
							<textarea class="form-control" rows="1" name="description" >{{$row->description}}</textarea>
						</td> 

						<td>
							<input type="text" id="datepicker" class="form-control" value="{{$row->expiredDate}}" name="datepicker">
						</td> 

						<td>
							<button type="submit" class="btn btn-outline-primary">Update</button>
						</td>

					</tr>

					@elseif($vendortype ==  'premiumPackage')
					<tr>
						<td>
							<input id="voucherid" type="voucherid" value="{{$row->voucher_id}}" class="form-control" name="voucherid"  autocomplete="voucherid" disabled>
						</td>

						<td>
							<input id="voucherTitle" type="voucherTitle" value="{{$row->voucherTitle}}" class="form-control" name="voucherTitle"  autocomplete="voucherTitle" autofocus>
						</td>

						<td>
							<input id="voucherCode" type="voucherCode" value="{{$row->voucherCode}}" class="form-control" name="voucherCode"  autocomplete="voucherCode" autofocus>
						</td>

           				<td>
           					<input id="quantity" type="number" value="{{$row->quantity}}" class="form-control" name="quantity" min="1" max="1000">
           				</td>

						<td>
							<textarea class="form-control" rows="1" name="description" >{{$row->description}}</textarea>
						</td> 

						<td>
							<input type="text" id="datepicker" class="form-control" value="{{$row->expiredDate}}" name="datepicker">
						</td> 

						<td>
							<button type="submit" class="btn btn-outline-primary">Update</button>
						</td>

					</tr>

					@else
					<tr>
						<td>
							<input id="voucherid" type="voucherid" value="{{$row->voucher_id}}" class="form-control" name="voucherid"  autocomplete="voucherid" disabled>
						</td>

						<td>
							<input id="voucherTitle" type="voucherTitle" value="{{$row->voucherTitle}}" class="form-control" name="voucherTitle"  autocomplete="voucherTitle" disabled>
						</td>

						<td>
							<input id="voucherCode" type="voucherCode" value="{{$row->voucherCode}}" class="form-control" name="voucherCode"  autocomplete="voucherCode" autofocus>
						</td>

           				<td>
           					<input id="quantity" type="number" value="{{$row->quantity}}" class="form-control" name="quantity" min="1" max="1000" disabled>
           				</td>

						<td>
							<textarea class="form-control" rows="1" name="description" disabled>{{$row->description}}</textarea>
						</td> 

						<td>
							<input type="text" id="datepicker" class="form-control" value="{{$row->expiredDate}}" name="datepicker" disabled>
						</td> 

						<td>
							<button type="submit" class="btn btn-outline-primary">Update</button>
						</td>

					</tr>

				@endif

			</form>
          @endforeach
				
			</tbody>

		</table>

	</div>


</div>
      

    </article>

  
  </section>
  <footer class="page-footer">
    
    </small>
  </footer>
</section>

<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
  
    $(document).ready(function() {
        var ctx = $("#chart-line");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                
                labels: [ @foreach ($vouchersqty as $test2) "{{$test2->quantity}}", @endforeach],
               
                datasets: [{
                   data: [ @foreach ($vouchersqty as $test2) "{{$test2->quantity}}", @endforeach],    
                    label: "Voucher Quantity",
                    borderColor: "#8e5ea2",
                    fill: true,
                    backgroundColor: '#8e5ea2'
            
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Vouchers Details'
                }
            }
        });
    });
</script>

<script type="text/javascript">
  const body = document.body;
const menuLinks = document.querySelectorAll(".admin-menu a");
const collapseBtn = document.querySelector(".admin-menu .collapse-btn");
const toggleMobileMenu = document.querySelector(".toggle-mob-menu");
const collapsedClass = "collapsed";

collapseBtn.addEventListener("click", function() {
  this.getAttribute("aria-expanded") == "true"
    ? this.setAttribute("aria-expanded", "false")
    : this.setAttribute("aria-expanded", "true");
  this.getAttribute("aria-label") == "collapse menu"
    ? this.setAttribute("aria-label", "expand menu")
    : this.setAttribute("aria-label", "collapse menu");
  body.classList.toggle(collapsedClass);
});

toggleMobileMenu.addEventListener("click", function() {
  this.getAttribute("aria-expanded") == "true"
    ? this.setAttribute("aria-expanded", "false")
    : this.setAttribute("aria-expanded", "true");
  this.getAttribute("aria-label") == "open menu"
    ? this.setAttribute("aria-label", "close menu")
    : this.setAttribute("aria-label", "open menu");
  body.classList.toggle("mob-menu-opened");
});

for (const link of menuLinks) {
  link.addEventListener("mouseenter", function() {
    body.classList.contains(collapsedClass) &&
    window.matchMedia("(min-width: 768px)").matches
      ? this.setAttribute("title", this.textContent)
      : this.removeAttribute("title");
  });
}
</script>

</body>
</html>