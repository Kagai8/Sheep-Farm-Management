@extends('infarmer.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Disease List <span class="badge badge-pill badge-danger"> {{ count($diseases) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Disease </th>
								<th>Created By</th>
								<th>Created At</th>
								<th>Updated At</th>
								<th>Updated By</th>	
								<th>Actions</th>							 
							</tr>
						</thead>
						<tbody>
						 @foreach($diseases as $item)
						 <tr>
							<td>{{ $item->disease }}</td>
							<td>{{ $item->created_by }}</td>
							<td>{{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
							@if( $item->updated_by )
							<td>{{ $item->updated_by }}</td>
							@else
							<td>N/A</td>
							@endif
							@if($item->updated_at )
							<td>{{ \Carbon\Carbon::parse($item->updated_at )->format('d F Y')}}</td>
							@else
							<td> N/A</td>
							@endif
							<td>
								 <a href="{{ route('disease.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
								 <a href="{{ route('disease.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" >
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


		<!--   ------------ Add Brand Page -------- -->


	         <div class="col-4">

				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Add Disease </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							 <form method="post" action="{{ route('disease.store') }}" enctype="multipart/form-data">
								 	@csrf
												   
								 <div class="form-group">
									<h5>Disease Name  <span class="text-danger">*</span></h5>
									<div class="controls">
										 <input type="text"  name="disease" class="form-control" > 
										 @error('disease') 
										 <span class="text-danger">{{ $message }}</span>
										 @enderror 
									</div>
								</div>


								 

								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Disease">
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
  



@endsection