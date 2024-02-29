@extends('infarmer.admin_master')
@section('title')
<title>User Add and Users List</title>
@endsection
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-7">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Users list <span class="badge badge-pill badge-danger"> {{ count($users) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>User ID </th>
								<th> Name </th>
								<th>Email </th>
								
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
							 @foreach($users as $item)
							 <tr>
							 	<td> {{ $item->id }}  </td>
								<td> {{ $item->name }}  </td>
								<td>{{ $item->email }}</td>
								 
								<td >
												 <a href="{{ route('edit-user',$item->id) }}" class="btn btn-primary" title="Edit User Details"><i class="fa fa-edit"></i> </a>

												 <a href="{{ route('delete-user',$item->id) }}" class="btn btn-danger" title="Delete User" >
												 	<i class="fa fa-trash"></i></a>
											</td>
													 
							 </tr>
							  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


          <div class="col-5">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Create New User </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


				 <form method="post" action="{{ route('store-user') }}" >
					 	@csrf
									   
					


						  <div class="form-group">
								<h5>User's Full Name:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="name" class="form-control" required="">
											     @error('name') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
						</div>

						<div class="form-group">
								<h5>Username:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="username" class="form-control" required="">
											     @error('username') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
						</div>

						<div class="form-group">
								<h5>User's Email:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="email" name="email" class="form-control" required="">
											     @error('email') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
						</div>


					<div class="form-group">
									<h5>User's Password:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="password" name="password" class="form-control" required="">
											      	@error('password') 
										                <span class="text-danger">{{ $message }}</span>
										            @else
										                <small class="text-muted">Minimum 8 characters</small>
										            @enderror
									 	  		</div>
								</div>



					<div class="form-group">
									
									 	<div class="form-group">
											<h5>Gender <span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="gender" class="form-control" required="" >
													<option value="" selected="">Select Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>	
												</select>
												@error('gender') 
											 <span class="text-danger">{{ $message }}</span>
											 @enderror 
											 </div>
										</div>
									
								</div>
									 

							 <div class="text-xs-right">
					<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add User">					 
										</div>
				</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
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
    });
    </script>



@endsection