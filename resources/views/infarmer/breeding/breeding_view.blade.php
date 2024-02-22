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
							  <h3 class="box-title">Breeding Events List <span class="badge badge-pill badge-danger"> {{ count($breeding_events) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Ram </th>
											<th>Ewe </th>
											<th>Breeding Date </th>
											<th>Status</th>
											<th>Action</th>
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($breeding_events as $item)
										 <tr>
										 	<td>BE{{ $item->id }}  </td>
											<td>Tag No: {{ $item->ram->id }},{{ $item->ram->name }} </td>
											<td>Tag No: {{ $item->ewe->id }}, {{ $item->ewe->name }}</td>
											<td>{{ $item->breeding_date }}</td>
											@if($item->status == 1)
											 <td><span class="badge badge-pill badge-success">Breeding</span></td>
											 @else
											 <td><span class="badge badge-pill badge-warning">Breeding Done</span> </td>
											 @endif

											<td >
												 <a href="{{ route('breeding-event-details',$item->id) }}" class="btn btn-primary" title="Breeding Details Data"><i class="fa fa-eye"></i> </a>

												 <a href="{{ route('breeding-event-edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

												 @if($item->status == 1)
												 	<a href="{{ route('breeding-event-inactive',$item->id) }}" class="btn btn-warning" title="End Breeding?"><i class="fa fa-arrow-down"></i> </a>
													 @else
												 <a href="{{ route('breeding-event-active',$item->id) }}" class="btn btn-success" title="Update To Breeding"><i class="fa fa-arrow-up"></i> </a>
												 @endif

												 <a href="{{ route('breeding-event-delete',$item->id) }}" class="btn btn-danger" title="Delete Data" >
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