@extends('infarmer.admin_master')
@section('title')
<title>Sale Details for SL{{$sale->id  }}</title>
@endsection
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">In Depth Details for Sale ID: SL{{$sale->id  }}</h4>
			  <small class="subtitle">More description about the payment plan</small>
			</div>
			  
			<!-- /.box-header -->
			<div class="box-body">
			  	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Customer Name:</h6>
                            <p>{{ $sale->customer_name}}</p>
                    	</div>
                    </div>
                    
               	</div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Total Amount:</h6>
                            <p>KES {{ $sale->total_amount}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Mode Of Payment:</h6>
                            <p>{{ $sale->mode_of_payment}}</p>
                        </div>
                    </div>
                </div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Quantity:</h6>
                            <p>{{ $sale->quantity}} sheep</p>
                    	</div>
                    </div>
                    
               	</div>
               	
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Created By:</h6>
                            <p>{{ $sale->created_by}} </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Created At:</h6>
                            <p>{{ \Carbon\Carbon::parse($sale->created_at )->format('d F Y')}}  {{ \Carbon\Carbon::parse($sale->created_at )->format('H') }} hr {{ \Carbon\Carbon::parse($sale->created_at )->format('m')}} mins</p>
                        </div>
                    </div>
                </div>
               	
			<!-- /.box-body -->
		</div>
		  <!-- /.box -->


    		
            <div class="box">
                <div class="box-header with-border">
                  <h5 class="box-title"> Installemt Information</h5>
                </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sale Item ID</th>
                                        <th>Tag</th>
                                        
                                        <th>Amount </th>
                                        <th>Slaughter Amount</th>
                                        <th>Subtotal</th>

                                </thead>
                                <tbody>
                                    @php
                                        $totalAmount = 0;
                                    @endphp
                                    @foreach($sale->saleItems as $saleItem)
                                    @php
                                        $totalAmount += $saleItem->amount + $saleItem->slaughter_amount;
                                    @endphp
                                        <tr>
                                            <td width="10%">{{ $saleItem->id }}</td>
                                            <td>{{ $saleItem->goat_id }}</td>
                                           
                                            <td>{{ $saleItem->amount }}</td>
                                            <td>{{ $saleItem->slaughter_amount }}</td>
                                            <td>{{ $saleItem->amount + $saleItem->slaughter_amount }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                            <td colspan="4" align="right"><strong>Total:</strong></td>
                                            <td>{{ $totalAmount }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
            </div>
			<!-- /.box-body -->
		</div>
		  <!-- /.box -->
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
                    	$('select[name="subsubcategory_id"]').html('');
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



 $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 

    });
    </script>


<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>




@endsection