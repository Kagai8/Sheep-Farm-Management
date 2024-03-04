@extends('infarmer.admin_master')
@section('title')
<title>Cost Full Report</title>
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
								  <h3 class="box-title">Costs Full Report <span class="badge badge-pill badge-danger"> {{ count($costs) }} </span></h3>
								  <div class="bb-1 clearFix">
											<div class="text-right pb-15">
					                <a href="{{ route('export-cost') }}" class="btn btn-rounded btn-success" target="_blank">
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
											<th>Cost ID </th>
											<th>Goat Name </th>
											<th>Tag No </th>
											<th>Amount </th>
											<th>Date</th>
											<th>Created At </th>
											<th>Created By </th>
											<th>Updated At </th>
											<th>Updated By </th>
										</tr>
									</thead>
										<tbody>
										 @foreach($costs as $item)
										 <tr>
											<td> {{ $item->id }}  </td>
											<td> {{ $item->goat->name }}  </td>
											<td>{{ $item->goat->id }}</td>
											<td>{{ $item->amount }}</td>
											<td width="20%">{{ $item->date }}</td>
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