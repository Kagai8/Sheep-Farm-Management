@extends('infarmer.admin_master')
@section('title')
<title>Sales View</title>
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
							  <h3 class="box-title">Sales List <span class="badge badge-pill badge-danger"> {{ count($sales) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Customer Name </th>
											<th>Total Amount </th>
											<th>Mode</th>
											<th>Quantity</th>
											<th>Date</th>
											<th>Action</th>
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($sales as $item)
										 <tr>
										 	<td>SL{{ $item->id }}  </td>
											<td>{{ $item->customer_name }} </td>
											<td>KES{{ $item->total_amount }}</td>
											<td>{{ $item->mode_of_payment }}</td>
											<td>{{ $item->quantity }}</td>
											<td>{{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
											

											<td >
												 <a href="{{ route('sale.details',$item->id) }}" class="btn btn-primary" title="Breeding Details Data"><i class="fa fa-eye"></i> </a>

												 <a href="{{ route('sale.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-print"></i> </a>

												 <a href="{{ route('sale.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" >
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