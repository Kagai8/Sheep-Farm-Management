@extends('infarmer.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Create Breeding Event </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
  					<form method="post" action="{{ route('breeding-event-store') }}" enctype="multipart/form-data" >
		 			@csrf
					 	<div class="row">
							<div class="col-12">
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									

											<div class="form-group">
												<h5>Ram Name(Male Parent): <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="ram_id" class="form-control" required="" >
														<option value="" selected="" disabled="">Select Ram Name:</option>
														@foreach($rams as $ram)
											 			<option value="{{ $ram->id }}">((Tag No: {{$ram->id}})), {{ $ram->name }}</option>	
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
											 			<option value="{{ $ewe->id }}">((Tag No: {{$ewe->id}})){{ $ewe->name }}</option>	
														@endforeach
														<option value="Unknown">Unknown</option>
													</select>
												 @error('ewe_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
				
										
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 1st row  --><br>	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Breeding Date: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="date" name="breeding_date" class="form-control" required="">
											     @error('breeding_date') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> 

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Expected Pregnancy Date: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="date" name="expected_pregnancy_date" class="form-control" required="">
											     @error('expected_pregnancy_date') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> 
			
								</div> <!-- end 1st row  --><br>
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Expected Birth Date: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="date" name="expected_birth_date" class="form-control" required="">
											     @error('expected_birth_date') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> 

									
			
								</div> <!-- end 1st row  -->
								<br><br>

								

								<div class="row"> <!-- start 8th row  -->
									<div class="col-md-12">
								     	<div class="form-group">
											<h5>Notes: </h5>
												<div class="controls">
													<textarea id="editor2" name="notes" rows="7" cols="100">
													
													</textarea>       
										 		</div>
										</div>
									</div> <!-- end col md 6 -->
								</div> <!-- end 8th row  -->

								
			
								

								
								
								
								
								
						</div>
				

						<!-- Bank Details -->
					

						 
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Breeding Status">
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