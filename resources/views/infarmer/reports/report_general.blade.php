@extends('infarmer.admin_master')
@section('title')
<title>General Cost Full Report</title>
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
								  <h3 class="box-title">General Costs Full Report <span class="badge badge-pill badge-danger"> {{ count($general_costs) }} </span></h3>
								  <div class="bb-1 clearFix">
											<div class="text-right pb-15">
					                <a href="{{ route('export-general') }}" class="btn btn-rounded btn-success" target="_blank">
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
											<th>General Cost ID </th>
											<th>Amount </th>
											<th>Reason </th>
											<th>Date </th>
											<th>Created At </th>
											<th>Created By </th>
											<th>Updated At </th>
											<th>Updated By </th>
										</tr>
									</thead>
										<tbody>
										 @foreach($general_costs as $item)
										 <tr>
											<td> GC{{ $item->id }}  </td>
											<td> {{ $item->amount }}  </td>
											<td>{{ $item->reason }}</td>
											<td >{{ $item->date }}</td>
											<td>{{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
                      <td>{{ $item->created_by }}</td>
                      @if($item->updated_by)
                      <td>{{ $item->updated_by }}</td>
                      @else
                      <td><p>No Information</p></td>
                      @endif
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