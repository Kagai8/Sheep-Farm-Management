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
							  <h3 class="box-title">Sheep Profiles for Ewes List <span class="badge badge-pill badge-danger"> {{ count($ewes) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Image </th>
											<th>Tag No </th>
											<th>Name </th>
											<th>Breed</th>
											<th>Color </th>
											<th>Weight </th>
											<th>Age </th>
											<th>Date Born </th>
											<th>Action</th>
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($ewes as $item)
										 <tr>
											<td> <img src="{{ asset($item->goat_image) }}" style="width: 60px; height: 50px;">  </td>
											<td>{{ $item->goat->id }}</td>
											<td>{{ $item->goat->name }}</td>
											<td>{{ $item->breed->breed }}</td>
											 <td>{{ $item->goat_color }}</td>
											 <td>{{ $item->goat_weight }} </td>
											 <td>
											 	@php
                						// Parse the date of birth into a Carbon instance
						                $dob = \Carbon\Carbon::createFromFormat('Y-m-d', $item->date_born);
						                
						                // Calculate the age for the current goat
						                $age = $dob->diff(Carbon\Carbon::now());
						                $years = $age->format('%y');
						                $months = $age->format('%m');
						                $days = $age->format('%d');
						            	@endphp
            						{{ $years }} yr(s), {{ $months }} mth(s),  {{ $days }} d(s)
          						</td>
											 <td> {{ $item->date_born }}</td>


											<td >
												 <a href="{{ route('goat-profile-details',$item->id) }}" class="btn btn-primary" title="Sheep Details Data"><i class="fa fa-eye"></i> </a>

												 <a href="{{ route('goat-profile-edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

												 <a href="" class="btn btn-warning" title="Performance Report"><i class="fa fa-file-code-o"></i> </a>

												 <a href="{{ route('goat-profile-delete',$item->id) }}" class="btn btn-danger" title="Delete Data" >
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


			  			  	<div class="row">
						<div class="col-12">

						 <div class="box">
							<div class="box-header with-border">
							  <h3 class="box-title">Sheep Profiles for Rams List <span class="badge badge-pill badge-danger"> {{ count($rams) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Image </th>
											<th>Name </th>
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
											<td>{{ $item->goat->name }}</td>
											<td>{{ $item->breed->breed }}</td>
											 <td>{{ $item->goat_color }}</td>
											 <td>{{ $item->goat_weight }} </td>
											 <td>
											 	@php
                						// Parse the date of birth into a Carbon instance
						                $dob = \Carbon\Carbon::createFromFormat('Y-m-d', $item->date_born);
						                
						                // Calculate the age for the current goat
						                $age = $dob->diff(Carbon\Carbon::now());
						                $years = $age->format('%y');
						                $months = $age->format('%m');
						                $days = $age->format('%d');
						            	@endphp
            						{{ $years }} years, {{ $months }} months,  {{ $days }} days
          						</td>
											 <td> {{ $item->date_born }}</td>


											<td >
												 <a href="{{ route('goat-profile-details',$item->id) }}" class="btn btn-primary" title="Sheep Details Data"><i class="fa fa-eye"></i> </a>

												 <a href="{{ route('goat-profile-edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

												 <a href="" class="btn btn-warning" title="Performance Report"><i class="fa fa-file-code-o"></i> </a>

												 <a href="{{ route('goat-profile-delete',$item->id) }}" class="btn btn-danger" title="Delete Data" >
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
			</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection