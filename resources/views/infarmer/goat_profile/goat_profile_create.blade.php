@extends('infarmer.admin_master')
@section('title')
<title>Sheep Profile Create</title>
@endsection

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Create Sheep Profile </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
  					<form method="post" action="{{ route('goat-profile-store') }}" enctype="multipart/form-data" >
		 			@csrf
					 	<div class="row">
							<div class="col-12">
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-12">
	 									

											<div class="form-group">
												<h5>Sheep Name : <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="goat_id" class="form-control" required="" >
														<option value="" selected="" disabled="">Select Sheep Name:</option>
														@foreach($goats as $goat)
											 			<option value="{{ $goat->id }}">((Tag No: {{$goat->id}})), {{ $goat->name }}</option>	
														@endforeach

													</select>
												 @error('goat_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
				
										
									</div> <!-- end col md 4 -->

									
			
								</div> <!-- end 1st row  -->	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									

											<div class="form-group">
												<h5>Ram Name(Male Parent): <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="ram_id" class="form-control" required="" >
														<option value="" selected="" disabled="">Select Ram Name:</option>
														@foreach($rams as $ram)
											 			<option value="{{ $ram->id }}">{{ $ram->name }}</option>	
														@endforeach
														<option value="Unknown">Unknown</option>
													</select>
												 @error('ram_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
				
										
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									

											<div class="form-group">
												<h5>Ewe Name(Female Parent): <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="ewe_id" class="form-control" required="" >
														<option value="" selected="" disabled="">Select Ewe Name:</option>
														@foreach($ewes as $ewe)
											 			<option value="{{ $ewe->id }}">{{ $ewe->name }}</option>	
														@endforeach
														<option value="Unknown">Unknown</option>
													</select>
												 @error('ewe_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
				
										
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 1st row  -->	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									

											<div class="form-group">
												<h5>Breed Name: <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="breed_id" class="form-control" required="" >
														<option value="" selected="" disabled="">Select Breed Name:</option>
														@foreach($breeds as $breed)
											 			<option value="{{ $breed->id }}">{{ $breed->breed }}</option>	
														@endforeach
													</select>
												 @error('breed_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
				
										
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">
											<div class="form-group">
												<h5>Markings/Color:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="goat_color" class="form-control" required="">
											     @error('goat_color') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 1st row  -->
								<div class="row"> <!-- start 2nd row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Goat's Weight:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="phone" name="goat_weight" class="form-control" required="">
											     @error('goat_weight') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

								<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Goat's Height: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="goat_height" class="form-control" required="">
											     @error('goat_height') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 2nd row  -->

								<div class="row"> <!-- start 3rd row  -->
									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Date of Birth: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="date" name="date_born" class="form-control" required="">
											     @error('date_born') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> 
									

									
			
								</div> <!-- end 3rd row  -->
								<div class="row"> <!-- start 5th row  -->

									<div class="col-md-12">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Goat Image  <span class="text-danger">*</span></h5>
												<div class="controls">
													 <input type="file" name="goat_image" class="form-control" onChange="mainThamUrl(this)" required="" >
													     @error('goat_image') 
														 <span class="text-danger">{{ $message }}</span>
														 @enderror
													 <img src="" id="mainThmb">
												</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									
									
			
								</div> <!-- end 5th row  -->
								
								
								
						</div>
				

						<!-- Bank Details -->
					

						 
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Sheep Profile">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		</div>
		  <!-- /.box -->
	</section>
		<!-- /.content -->
</div>
 
 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });



 $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 

    });
    </script>


<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>




@endsection