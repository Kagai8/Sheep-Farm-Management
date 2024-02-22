@extends('infarmer.admin_master')
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
											  <h3 class="box-title">Sheep List Ewes<span class="badge badge-pill badge-danger"> {{ count($ewes) }} </span></h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">
												<div class="table-responsive">
												  <table id="example1" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>Tag ID</th>
															<th>Sheep Name</th>
															<th>Sheep Gender</th>
															<th>Created By </th>
															
															<th>Action</th>

															 
														</tr>
													</thead>
														<tbody>
														 @foreach($ewes as $item)
														 <tr>
															 <td>S{{ $item->id }}</td>
															 <td>{{ $item->name }}</td>
															 <td>{{ $item->goat_gender }}</td>
															 <td>{{ $item->created_by }} </td>
															 
															 
															 


															<td width="30%">
																 <a href="{{ route('goat.edit',$item->id) }}" class="btn btn-primary" title="Edit Sheep Details"><i class="fa fa-edit"></i> </a>

																 <a href="{{ route('goat.delete',$item->id) }}" class="btn btn-danger" title="Delete Sheep" >
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

			  			  	<div class="row">
						<div class="col-12">

										 <div class="box">
											<div class="box-header with-border">
											  <h3 class="box-title">Sheep List Rams<span class="badge badge-pill badge-danger"> {{ count($rams) }} </span></h3>
											</div>
											<!-- /.box-header -->
											<div class="box-body">
												<div class="table-responsive">
												  <table id="example1" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>Tag ID</th>
															<th>Sheep Name</th>
															<th>Sheep Gender</th>
															<th>Created By </th>
															
															<th>Action</th>

															 
														</tr>
													</thead>
														<tbody>
														 @foreach($rams as $item)
														 <tr>
															 <td>S{{ $item->id }}</td>
															 <td>{{ $item->name }}</td>
															 <td>{{ $item->goat_gender }}</td>
															 <td>{{ $item->created_by }} </td>
															 
															 
															 


															<td width="30%">
																 <a href="{{ route('goat.edit',$item->id) }}" class="btn btn-primary" title="Edit Sheep Details"><i class="fa fa-edit"></i> </a>

																 <a href="{{ route('goat.delete',$item->id) }}" class="btn btn-danger" title="Delete Sheep" >
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