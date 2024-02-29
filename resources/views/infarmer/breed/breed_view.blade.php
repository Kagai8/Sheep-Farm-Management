@extends('infarmer.admin_master')
@section('title')
<title>Breeds List</title>
@endsection
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
			<section class="content">
			  	<div class="row">
					<div class="col-12">

						 <div class="box">
							<div class="box-header with-border">
							  <h3 class="box-title">Sheep Breeds List <span class="badge badge-pill badge-danger"> {{ count($breeds) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Breed ID</th>
											<th>Breed Name</th>
											<th>Created By </th>
											
											<th>Action</th>

											 
										</tr>
									</thead>
										<tbody>
										 @foreach($breeds as $item)
										 <tr>
											 <td>B{{ $item->id }}</td>
											 <td>{{ $item->breed }}</td>
											 <td>{{ $item->created_by }} </td>
											 
											 
											 


											<td width="30%">
												 <a href="{{ route('breed.edit',$item->id) }}" class="btn btn-primary" title="Edit User Details"><i class="fa fa-edit"></i> </a>

												 <a href="{{ route('breed.delete',$item->id) }}" class="btn btn-danger" title="Delete User" >
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

	 
	 


			  </div>
			  <!-- /.row -->
			</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection