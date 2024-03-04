@extends('infarmer.admin_master')
@section('title')
<title>Search Results</title>
@endsection
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
 
@if(isset($goat_profile) && $goat_profile->count() > 0)
		<!-- Main content -->
			<section class="content">
			  	<div class="row">
					<div class="col-12">

						 <div class="box">
							<div class="box-header with-border">
							  <h3 class="box-title">Search Result </h3>
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
											<th>Age </th>
											<th>Date Born </th>
											<th>Action</th>
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($goat_profile as $item)
										 <tr>
											<td> <img src="{{ asset($item->goat_image) }}" style="width: 60px; height: 50px;">  </td>
											<td>S{{ $item->goat->id }}</td>
											<td>{{ $item->goat->name }}</td>
											<td>{{ $item->breed->breed }}</td>
											 
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
			</section>
		<!-- /.content -->
	  
	  </div>
@else
			<section>
				<div>
					<div class="row">
						<div class="col-12">
							<div class="box">
								<div class="box-body">
									<p>No Results Found</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>

@endif


@endsection