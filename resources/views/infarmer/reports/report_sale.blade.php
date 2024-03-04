@extends('infarmer.admin_master')
@section('title')
<title>Sale Full Report</title>
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
								  <h3 class="box-title">Sales Full Report <span class="badge badge-pill badge-danger"> {{ count($sales) }} </span></h3>
								  <div class="bb-1 clearFix">
											<div class="text-right pb-15">
					                <a href="{{ route('export-sale') }}" class="btn btn-rounded btn-success" target="_blank">
							        		<span><i class="fa fa-file-excel-o"></i>Excel</span>
							    				</a>
			                </div>
					  			</div>
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
											<th>Created At </th>
											<th>Created By </th>
											<th>Updated At </th>
											
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
                      <td>{{ $item->created_by }}</td>
                      @if($item->updated_at)
                      <td>{{ \Carbon\Carbon::parse($item->updated_at )->format('d F Y')}}</td>	
                      @else
                      <td><p>No Information</p></td>
                      @endif
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