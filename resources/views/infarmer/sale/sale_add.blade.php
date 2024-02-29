@extends('infarmer.admin_master')
@section('title')
<title>Sale POS</title>
@endsection
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">POINT OF SALE </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
  					<form method="post" action="{{ route('sale.store') }}" enctype="multipart/form-data" >
		 			@csrf
					 	<div class="row">
						    <div class="col-md-3">
						        <div class="section-divider">
						            <h5>1. Payment Information</h5>
						        </div>
						        <div class="form-group">
						            <h5>Customer Name <span class="text-danger">*</span></h5>
						            <div class="controls">
						                <input type="text" name="customer_name" class="form-control">
						                @error('customer_name')
						                <span class="text-danger">{{ $message }}</span>
						                @enderror
						            </div>
						        </div>
						        <div class="form-group">
						            <h5>Mode Of Payment : <span class="text-danger">*</span></h5>
						            <div class="controls">
						                <select name="mode_of_payment" class="form-control" required="">
						                    <option value="" selected="" disabled="">Select Mode Of Payment:</option>
						                    <option value="Mpesa">Mpesa</option>
						                    <option value="Cash">Cash</option>
						                </select>
						                @error('mode_of_payment')
						                <span class="text-danger">{{ $message }}</span>
						                @enderror
						            </div>
						        </div>
						    </div>
						    <div class="col-md-9 border-left">
						        <div class="section-divider">
						            <h5>2. Sheep Information</h5>
						        </div>
						        <table class="table" id="sales_table">
						            <thead>
						                <tr>
						                    <th width="35%"><h5>Sheep</h5></th>
						                    <th width="35%"><h5>Amount</h5></th>
						                    <th width="35%"><h5>Slaughter Amount(Optional)</h5></th>
						                    <th>Add/Remove</th>
						                </tr>
						            </thead>
						            <tbody>
						                <tr class="sale-item-row">
						                    <td>
						                    	<div class="controls">
						                         <select name="goat_id[]" class="form-control" width="45%" required>
						                            <option value="" selected disabled>Select Sheep</option>
						                            @foreach($goats as $goat)
						                            <option value="{{ $goat->goat->id }}">Tag:{{ $goat->goat->id }},{{ $goat->goat->name }}</option>
						                            @endforeach
						                        </select>
						                    	</div>
						                    </td>
						                    <td><input type="text" name="amount[]" class="form-control" placeholder="Sale Amount" required=""></td>
						                    <td><input type="text" name="slaughter_amount[]" class="form-control" placeholder="Slaughter Amount" required=""></td>
						                    <td><button type="button" class="btn btn-success add-sale-item">+</button></td>
						                </tr>
						            </tbody>
						        </table>
						    </div>
						</div>

						
					

						 
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Process">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		</div>

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Print Recent Processed Sales </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Sale ID</th>
											<th>Customer Name</th>
											<th>Total Amount</th>
											<th>Mode Of Payment </th>
											<th>Action</th>

											 
										</tr>
									</thead>
										<tbody>
										 @foreach($sales as $item)
										 <tr>
											 <td>SL{{ $item->id }}</td>
											 <td>{{ $item->customer_name }}</td>
											 <td>KES {{ $item->total_amount }} </td>
											 <td>{{ $item->mode_of_payment }} </td>
											 
											 
											 


											<td>
												 <a href="{{ route('sale.receipt',$item->id) }}" class="btn btn-primary" title="Print Receipt"><i class="fa fa-print"></i> </a>

												 
											</td>
																 
										 </tr>
										  @endforeach
										</tbody>
							 
						  			</table>
								</div>
			</div>
		  <!-- /.box -->
	</section>
		<!-- /.content -->
</div>
 
 



<script>
    $(document).ready(function() {
        // Add sale item row
        $('.add-sale-item').click(function() {
            var html = '<tr class="sale-item-row">' +
                '<td>' +
                '<select name="goat_id[]" class="form-control" required>' +
                '<option value="" selected disabled>Select Sheep</option>' +
                '@foreach($goats as $goat)' +
                '<option value="{{ $goat->goat->id }}">Tag:{{ $goat->goat->id }},{{ $goat->goat->name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</td>' +
                '<td><input type="text" name="amount[]" class="form-control" placeholder="Sale Amount" required></td>' +
                '<td><input type="text" name="slaughter_amount[]" class="form-control" placeholder="Slaughter Amount" required></td>' +
                '<td><button type="button" class="btn btn-danger remove-sale-item">-</button></td>' +
                '</tr>';
            $('#sales_table tbody').append(html);
        });

        // Remove sale item row
        $(document).on('click', '.remove-sale-item', function() {
            $(this).closest('tr').remove();
        });
    });
</script>


@endsection