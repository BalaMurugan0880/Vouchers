<!DOCTYPE html>

<html>
@extends('layouts.app')
<head>

    <title>Company register</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="     sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <style type="text/css">
       .file {
  visibility: hidden;
  position: absolute;
}
   </style>

</head>
    @section('content')
<body>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{ Auth::user()->name }}</div>
                
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/home" enctype="multipart/form-data">
                         {{ csrf_field() }}

                     <div class="form-group row">
                         <label for="companyName" class="col-md-4 col-form-label text-md-right">Company Name :</label>
                            <div class="col-md-6">
                                <input id="companyName" type="companyName" class="form-control" name="companyName"  autocomplete="companyName" autofocus>
                                @error('companyName')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>     
                     </div>

                     <div class="form-group row">
                         <label for="companyregNo" class="col-md-4 col-form-label text-md-right">Company Register No (SSM) :</label>
                            <div class="col-md-6">
                                <input id="companyregNo" type="companyregNo" class="form-control" name="companyregNo"  autocomplete="companyregNo" autofocus>
                                @error('companyregNo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>     
                     </div>

                      <div class="form-group row">
                         <label for="category" class="col-md-4 col-form-label text-md-right">Category :</label>
                            <div class="col-md-6">
                                <select name="category" id="category" class="custom-select custom-select-md mb-3">
                                  <option value="Travel">Travel</option>
                                  <option value="Fashion">Fashion</option>
                                  <option value="Health&Beauty">Health & Beauty</option>
                                  <option value="Food&Beverage">Food & Beverage</option>
                                </select>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>     
                     </div>

                     <div class="form-group row">
                         <label for="file" class="col-md-4 col-form-label text-md-right">Company Logo :</label>
                            <div class="col-md-6">

                                <input type="file" name="file[]" class="file" >
                                  <div class="input-group my-1">
                                    <input type="text" class="form-control" disabled placeholder="Upload Logo" id="file" name="file[]">
                                   
                                    <div class="input-group-append">
                                     <button type="button" class="browse btn btn-primary">Browse...</button>
                                    </div>
                                  </div>

                                  <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail" style="width: 150px; height: 150px;">
                                
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

<script type="text/javascript">
    $(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
}); 
</script>

</body>
@endsection
</html>






