@extends('infarmer.admin_master')
@section('title')
<title>Vaccination Schedule Edit for ID: V{{ $vaccination->id}}</title>
@endsection
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Edit Vaccination for {{ $vaccination->goat->name}}, ID: {{$vaccination->goat->id  }} </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
  					<form method="post" action="{{ route('vaccination.update',['id' => $vaccination->id]) }}" enctype="multipart/form-data" >
		 			@csrf
					 	<div class="row">
							<div class="col-12">	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									

											<div class="form-group">
												<h5>Goat: <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="goat_id" class="form-control" required="" >
														@foreach($goats as $goat)
											                <option value="{{ $goat->id }}" {{ $vaccination->goat_id == $goat->id ? 'selected' : '' }}>
											                    {{ $goat->name }}
											                </option>
											            @endforeach
													</select>
												 @error('goat_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
				
										
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									

											<div class="form-group">
												<h5>Disease: <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="disease_id" class="form-control" required="" >
														@foreach($diseases as $disease)
											                <option value="{{ $disease->id }}" {{ $vaccination->disease_id == $disease->id ? 'selected' : '' }}>
											                    {{ $disease->disease }}
											                </option>
											            @endforeach
													</select>
												 @error('disease_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
		 									</div>
				
										
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 1st row  -->	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									

										<div class="form-group">
											<div class="form-group">
												<h5>Vaccinator's Name:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="vaccinator" class="form-control" required="" value="{{ $vaccination->vaccinator }}">
											     @error('vaccinator') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
				
										
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Due Date: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="date" name="due_date" class="form-control" required="" value="{{ $vaccination->due_date }}">
											     @error('due_date') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> 
			
								</div> <!-- end 1st row  -->
								<div class="row"> <!-- start 2nd row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Date of Vaccination: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="date" name="actual_date" class="form-control" required="" value="{{ $vaccination->actual_date }}">
											     @error('actual_date') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> 

								
			
								</div> <!-- end 2nd row  -->

								<div class="row"> <!-- start 8th row  -->
									<div class="col-md-12">
								     	<div class="form-group">
											<h5>Notes: </h5>
												<div class="controls">
													<textarea id="editor2" name="notes" rows="7" cols="100">
													{{$vaccination->notes}}
													</textarea>       
										 		</div>
										</div>
									</div> <!-- end col md 6 -->
								</div> <!-- end 8th row  -->
								
						</div>
				

						<!-- Bank Details -->
					

						 
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Edit Vaccine Schedule">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		</div>

		
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