@extends('infarmer.admin_master')
@section('title')
<title>Vaccination Schedule Create</title>
@endsection
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Vaccine Schedules list <span class="badge badge-pill badge-danger"> {{ count($vaccinations) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Disease </th>
								<th>Goat Name</th>
								<th>Tag No </th>
								<th>Status </th>
								<th>Date </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
							 @foreach($vaccinations as $item)
							 <tr>
								<td> {{ $item->disease->disease }}  </td>
								<td>{{ $item->goat->name ?? 'No Name Available' }}</td>
								 <td>{{ $item->goat->id ?? 'No ID Available' }}</td>
								 
								 @if($item->status)
								 <td><span class="badge badge-pill badge-warning">Pending</span></td>
								 @else
								 <td><span class="badge badge-pill badge-success">Done</span></td>
								 @endif
								 <td>{{ $item->due_date }}</td>
								<td >
									 <a href="{{ route('vaccination.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

									 <a href="{{ route('vaccination.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" >
									 	<i class="fa fa-trash"></i></a>
									 <a href="{{ route('vaccination-details',$item->id) }}" class="btn btn-primary" title="Vaccination Schedule Details Data"><i class="fa fa-eye"></i> </a>
									 @if($item->status == 1)
									 <a href="{{ route('vaccine-inactive',$item->id) }}" class="btn btn-warning" title="Update to  Done"><i class="fa fa-arrow-down"></i> </a>
										 @else
									 <a href="{{ route('vaccine-active',$item->id) }}" class="btn btn-success" title="Update To Pending"><i class="fa fa-arrow-up"></i> </a>
									 @endif
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


<!--   ------------ Add Category Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Vaccine Scheduler </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


				 <form method="post" action="{{ route('vaccination.store') }}" >
					 	@csrf
									   
					<div class="form-group">
					<h5>Sheep Select <span class="text-danger">*</span></h5>
					<div class="controls">
						<select name="goat_id" class="form-control"  >
							<option value="" selected="" disabled="">Select Sheep</option>
							@foreach($goats as $goat)
							<option value="{{ $goat->id }}">Tag No:{{$goat->id}},{{ $goat->name }}</option>	
							@endforeach
						</select>
						@error('goat_id') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror 
					 </div>
						 </div>


					 <div class="form-group">
					<h5>Disease Select <span class="text-danger">*</span></h5>
					<div class="controls">
						<select name="disease_id" class="form-control"  >
							<option value="" selected="" disabled="">Select Disease</option>
							@foreach($diseases as $disease)
							<option value="{{ $disease->id }}">{{ $disease->disease }}</option>	
							@endforeach
						</select>
						@error('disease_id') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror 
					 </div>
						 </div>


						  <div class="form-group">
									<h5>Vet's Name  <span class="text-danger">*</span></h5>
									<div class="controls">
										 <input type="text"  name="vaccinator" class="form-control" > 
										 @error('vaccinator') 
										 <span class="text-danger">{{ $message }}</span>
										 @enderror 
									</div>
								</div>


					<div class="form-group">
									<h5>Due Date  <span class="text-danger">*</span></h5>
									<div class="controls">
										 <input type="date"  name="due_date" class="form-control" > 
										 @error('due_date') 
										 <span class="text-danger">{{ $message }}</span>
										 @enderror 
									</div>
								</div>


					<div class="form-group">
									<h5>Notes  <span class="text-danger">*</span></h5>
									<div class="controls">
										 <input type="text"  name="notes" class="form-control" > 
										 @error('notes') 
										 <span class="text-danger">{{ $message }}</span>
										 @enderror 
									</div>
								</div>
									 

							 <div class="text-xs-right">
					<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Schedule">					 
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