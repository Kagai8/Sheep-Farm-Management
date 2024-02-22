@extends('infarmer.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-9">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">General Cost List <span class="badge badge-pill badge-danger"> {{ count($general_costs) }} </span></h3>
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
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
							@php
                        $totalGeneralCost = 0;
                    @endphp
							 @foreach($general_costs as $item)
							 @php
                            $totalGeneralCost += $item->amount;
                        @endphp
							 <tr>
							 	<td> GC{{ $item->id }}  </td>
								<td> {{ $item->amount }}  </td>
								<td>{{ $item->reason }}</td>
								 <td width="20%">{{ $item->date }}</td>
								<td >
									 <a href="{{ route('general.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

									 <a href="{{ route('general.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" >
									 	<i class="fa fa-trash"></i></a>
									 <a href="{{ route('general.details',$item->id) }}" class="btn btn-primary" title="Vaccination Schedule Details Data"><i class="fa fa-eye"></i> </a>
									 
								</td>
													 
							 </tr>
							  @endforeach
							  <tr>
                        <td colspan="4" align="right"><strong>Total General Cost:</strong></td>
                        <td>{{ $totalGeneralCost }}</td>
                    </tr>
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


          <div class="col-3">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Create General Cost </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


				 <form method="post" action="{{ route('general.store') }}" >
					 	@csrf
									   


						 <div class="form-group">
								<h5>Amount:  <span class="text-danger">*</span></h5>
								<div class="controls">
									 <input type="text"  name="amount" class="form-control" > 
									 @error('amount') 
									 <span class="text-danger">{{ $message }}</span>
									 @enderror 
								</div>
						</div>


						  <div class="form-group">
								<h5>Cost Reason  <span class="text-danger">*</span></h5>
								<div class="controls">
									 <input type="text"  name="reason" class="form-control" > 
									 @error('reason') 
									 <span class="text-danger">{{ $message }}</span>
									 @enderror 
								</div>
						</div>


					<div class="form-group">
									<h5>Date  <span class="text-danger">*</span></h5>
									<div class="controls">
										 <input type="date"  name="date" class="form-control" > 
										 @error('date') 
										 <span class="text-danger">{{ $message }}</span>
										 @enderror 
									</div>
								</div>
									 

							 <div class="text-xs-right">
					<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Cost">					 
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
  

 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>



@endsection