@extends('infarmer.admin_master')
@section('title')
<title>Edit User: {{ $user->name }}</title>
@endsection
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Edit System User </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
  					<form method="post" action="{{ route('update-user',['id' => $user->id]) }}" enctype="multipart/form-data" >
		 			@csrf
		 			<input type="hidden" name="id" value="{{ $user->id }}">
			 			<div class="box-header with-border">
				  			<h4 class="box-title" style="text-decoration: underline;">Edit User Credentials </h4>
						</div>
					 	<div class="row">
							<div class="col-12">	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>User's Full Name:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="name" class="form-control" required="" value="{{ $user->name }}">
											     @error('name') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">
											<div class="form-group">
												<h5>User's Email:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="email" name="email" class="form-control" required="" value="{{ $user->email }}">
											     @error('email') 
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
												<h5>System Role: </h5>
												<div class="controls">
													<select name="role_id" class="form-control" >
						                                <option value="" selected="" disabled="">Select System Role:</option>
						                                <option value="1" @if($user->role_id == 1) selected @endif>User</option>
						                                <option value="2" @if($user->role_id == 2) selected @endif>Manager</option>
						                                <option value="3" @if($user->role_id == 3) selected @endif>Chairman</option>
						                                <option value="4" @if($user->role_id == 4) selected @endif>Admin</option>
						                            </select>
						                            @error('role_id')
						                            <span class="text-danger">{{ $message }}</span>
						                            @enderror
												 </div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

								<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>User's Password:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="password" name="password" class="form-control" value="{{ $user->email }}">
											      	@error('password') 
										                <span class="text-danger">{{ $message }}</span>
										            @else
										                <small class="text-muted">Minimum 8 characters</small>
										            @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									
			
								</div> <!-- end 2nd row  -->
							<div class="row"> <!-- start 5th row  -->

								<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Username:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="username" class="form-control"  value="{{ $user->username }}">
											      	@error('username') 
										                <span class="text-danger">{{ $message }}</span>
										            @else
										                <small class="text-muted">Minimum 8 characters</small>
										            @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Gender: <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="gender" class="form-control" required="">
						                                <option value="" selected="" disabled="">Select Gender:</option>
						                                <option value="Female" @if($user->gender == 'Female') selected @endif>Female</option>
						                                <option value="Male" @if($user->gender == 'Male') selected @endif>Male</option>
						                                
						                            </select>
						                            @error('gender')
						                            <span class="text-danger">{{ $message }}</span>
						                            @enderror
												 </div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->


									

									
									
			
								</div> <!-- end 5th row  -->
								
								
								
						</div>
					

						<!-- Bank Details -->
					
					

						 <br><br>
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Edit System User ">
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