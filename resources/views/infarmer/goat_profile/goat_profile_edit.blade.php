@extends('infarmer.admin_master')
@section('title')
<title>Sheep Profile Edit for {{ $goat_profile->goat->name}}, Tag: S{{$goat_profile->goat->id  }}</title>
@endsection
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Edit Sheep Profile for {{ $goat_profile->goat->name}}, ID: S{{$goat_profile->goat->id  }} </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
  					<form method="post" action="{{ route('goat-profile-update',['id' => $goat_profile->id]) }}" enctype="multipart/form-data" >
		 			@csrf
					 	<div class="row">
							<div class="col-12">	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									

											<div class="form-group">
												<h5>Ram Name(Male Parent): <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="ram_id" class="form-control" required="" >
														@foreach($goats as $goat)
											                <option value="{{ $goat->id }}" {{ $goat_profile->ram_id == $goat->id ? 'selected' : '' }}>
											                    {{ $goat->name }}
											                </option>
											            @endforeach
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
														@foreach($goats as $goat)
											                <option value="{{ $goat->id }}" {{ $goat_profile->ewe_id == $goat->id ? 'selected' : '' }}>
											                    {{ $goat->name }}
											                </option>
											            @endforeach
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
														@foreach($breeds as $breed)
														 <option value="{{ $breed->id }}" {{ $breed->id == $goat_profile->breed_id ? 'selected': '' }} >{{ $breed->breed }}</option>	
																	
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
												<input type="text" name="goat_color" class="form-control" required="" value="{{ $goat_profile->goat_color }}">
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
												<input type="phone" name="goat_weight" class="form-control" required="" value="{{ $goat_profile->goat_weight }}">
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
												<input type="text" name="goat_height" class="form-control" required="" value="{{ $goat_profile->goat_height }}">
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
												<input type="date" name="date_born" class="form-control" required="" value="{{ $goat_profile->date_born }}">
											     @error('date_born') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> 
										<div class="col-md-6">
											<div class="form-group">
												<h5>Sheep Maturity: <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="goat_maturity" class="form-control" required="" >
														
														  <option value="Lamb" {{ $goat_profile->sheep_maturity === 'Lamb' ? 'selected' : '' }}>Lamb</option>
												          <option value="Hogget" {{ $goat_profile->sheep_maturity === 'Hoggets' ? 'selected' : '' }}>Hogget</option>
												          <option value="Adult" {{ $goat_profile->sheep_maturity === 'Adult' ? 'selected' : '' }}>Adult</option>	
																	
														
													</select>
												 @error('goat_maturity') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
		 								</div>
									

									
			
								</div> <!-- end 3rd row  -->
								<div class="row"> <!-- start 3rd row  -->
									<div class="col-md-6">
										<div class="form-group">
											<h5>Health Status: <span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="health_status" class="form-control" required="">
												    <option value="1" {{ $goat_profile->health_status == 1 ? 'selected' : '' }}>Healthy</option>
												    <option value="2" {{ $goat_profile->health_status == 2 ? 'selected' : '' }}>Sickly</option>
												    <option value="3" {{ $goat_profile->health_status == 3 ? 'selected' : '' }}>Very Sick</option>
												    <option value="4" {{ $goat_profile->health_status == 4 ? 'selected' : '' }}>Under Treatment</option>
												</select>
											 @error('health_status') 
											 <span class="text-danger">{{ $message }}</span>
											 @enderror 
											 </div>
	 									</div>
									</div> 
										<div class="col-md-6">
											<div class="form-group">
												<h5>Life Status: <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="status" class="form-control" required="">
														<option value="1" {{ $goat_profile->status == 1 ? 'selected' : '' }}>Alive</option>
													    <option value="2" {{ $goat_profile->status == 2 ? 'selected' : '' }}>Coma</option>
													    <option value="3" {{ $goat_profile->status == 3 ? 'selected' : '' }}>Deceased</option>
													    <option value="4" {{ $goat_profile->status == 4 ? 'selected' : '' }}>Sold</option>
													</select>
												 @error('status') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
		 								</div>
									

									
			
								</div> <!-- end 3rd row  -->
								<div class="row"> <!-- start 3rd row  -->
									<div class="col-md-6">
										<div class="form-group">
											<h5>Breeding Status: <span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="breeding_status" class="form-control" required="">
												    <option value="1" {{ $goat_profile->breeding_status == 0 ? 'selected' : '' }}>Not Breeding</option>
												    <option value="2" {{ $goat_profile->breeding_status == 1 ? 'selected' : '' }}>Currently Breeding</option>
												    
												</select>
											 @error('breeding_status') 
											 <span class="text-danger">{{ $message }}</span>
											 @enderror 
											 </div>
	 									</div>
									</div> 
										<div class="col-md-6">
											<div class="form-group">
												<h5>Sale Status: <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="sale_status" class="form-control" required="">
														<option value="0" {{ $goat_profile->sale_sale_status == 0 ? 'selected' : '' }}>Not For Sale</option>
													    <option value="1" {{ $goat_profile->sale_status == 1 ? 'selected' : '' }}>Available for Sale</option>
													    
													</select>
												 @error('sale_status') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
		 								</div>
									

									
			
								</div> <!-- end 3rd row  -->
						</div>
				

						<!-- Bank Details -->
					

						 
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Edit Sheep Profile">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		</div>

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Edit Sheep Image for {{ $goat_profile->goat->name}}, ID: {{$goat_profile->goat->id  }} </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  
  					<form method="post" action="{{ route('goat-profile-image-update',['id' => $goat_profile->id]) }}" enctype="multipart/form-data" >
		 			@csrf
					 		
								<input type="hidden" name="id" value="{{ $goat_profile->id }}">
									<input type="hidden" name="old_img" value="{{ $goat_profile->goat_image }}">
										<div class="row row-sm">
											<div class="col-md-12">

												<div class="card">
													<img src="{{ asset($goat_profile->goat_image) }}" class="card-img-top" style="height: 300px; width: 390px;">
														<div class="card-body">
																     
														<p class="card-text"> 
															<div class="form-group">
																 <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
																 <input type="file" name="goat_image" class="form-control" onChange="mainThamUrl(this)"  >
																 <img src="" id="mainThmb">
															</div> 
																    </p>
																   
														</div>
												</div> 		
							
											</div><!--  end col md 3		 -->	
							 

										</div>			

							<div class="text-xs-right">
								<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
							 </div>
							
				

						<!-- Bank Details -->
					

						 
						
					</form>

		</div>

		  <!-- /.box -->
	</section>
</div>

		<!-- /.content -->

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