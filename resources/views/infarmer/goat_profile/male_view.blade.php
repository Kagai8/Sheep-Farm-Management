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
							  <h3 class="box-title">Employees List <span class="badge badge-pill badge-danger"> {{ count($rams) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Image </th>
											<th>Breed</th>
											<th>Color </th>
											<th>Weight </th>
											<th>Age </th>
											<th>Date Born </th>
											<th>Action</th>
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($rams as $item)
										 <tr>
											<td> <img src="{{ asset($item->goat_image) }}" style="width: 60px; height: 50px;">  </td>
											<td>{{ $item->breed->breed }}</td>
											 <td>{{ $item->goat_color }}</td>
											 <td>{{ $item->goat_weight }} </td>
											 <td> {{ $item->goat_age }}</td>
											 <td> {{ $item->date_born }}</td>


											<td width="30%" >
												 <a href="" class="btn btn-primary" title="employee Details Data"><i class="fa fa-eye"></i> </a>

												 <a href="" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

												 <a href="" class="btn btn-warning" title="Performance Report"><i class="fa fa-file-code-o"></i> </a>

												 <a href="" class="btn btn-danger" title="Delete Data" >
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