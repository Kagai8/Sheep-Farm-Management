@extends('infarmer.admin_master')
@section('title')
<title>Breeding Record Details for BR{{ $breeding_event->id}}</title>
@endsection
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">In Depth Details for Breeding Event ID: {{ $breeding_event->id}} </h4>
			  <small class="subtitle">More description about the general breeding event</small>
			</div>
			  
			<!-- /.box-header -->
			<div class="box-body">
			  	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Ram Parent:</h6>
                            <p>{{ $ram_parent->name}}</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Ewe Parent:</h6>
                            <p>{{ $ewe_parent->name}}</p>
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Ram Parent Tag No:</h6>
                            <p>{{ $ram_parent->id}}</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Ewe Parent Tag No:</h6>
                            <p>{{ $ewe_parent->id}}</p>
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Breeding Date:</h6>
                            <p>{{ $breeding_event->breeding_date}}</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Expected Pregnancy Date:</h6>
                            <p>{{ $breeding_event->expected_pregnancy_date}}</p>
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Expected Birth Date:</h6>
                            <p>{{ $breeding_event->expected_birth_date}} Kgs</p>
                    	</div>
                    </div>
                    
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Actual Pregnancy Date:</h6>
                            @if($breeding_event->actual_pregnancy_date)
                            <p>{{ $breeding_event->actual_pregnancy_date}} </p>
                            @else
                            <p>No Date Provided </p>
                            @endif
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Actual Birth Date:</h6>
                            @if($breeding_event->actual_birth_date)
                            <p>{{ $breeding_event->actual_birth_date}}</p>
                            @else
                            <p>No Date Provided</p>
                            @endif
                    	</div>
                    </div>
               	</div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Number Of Kids:</h6>
                            @if($breeding_event->no_of_kids)
                            <p>{{ $breeding_event->no_of_kids}} Kid(s)</p>
                            @else
                            <p>No Kids Info Yet</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Breeding Status:</h6>
                            @if($breeding_event->status == 0)
                            <p><span class="badge badge-pill badge-info">Breeding Ongoing</span></p>
                            @else
                            <p><span class="badge badge-pill badge-success">Breeding Done</span></p>
                            @endif
                        </div>
                    </div>
                </div>
               	
               	
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Created At:</h6>
                            <p>{{ \Carbon\Carbon::parse($breeding_event->created_at )->format('d F Y')}}  {{ \Carbon\Carbon::parse($breeding_event->updated_at )->format('H') }} hr {{ \Carbon\Carbon::parse($breeding_event->updated_at )->format('m')}} mins</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Updated At:</h6>
                            <p>{{ \Carbon\Carbon::parse($breeding_event->updated_at )->format('d F Y')}}   {{ \Carbon\Carbon::parse($breeding_event->updated_at )->format('H') }} hr {{ \Carbon\Carbon::parse($breeding_event->updated_at )->format('m')}} mins</p>
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Breeding Event Created By:</h6>
                            <p>{{ $breeding_event->created_by}}</p>
                    	</div>
                    </div>
                    
               	</div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" >
                            <h6>Breeding Event Notes:</h6>
                            <p>{{ $breeding_event->notes}}</p>
                        </div>
                    </div>
                    
                </div>
			</div>
			<!-- /.box-body -->
		</div>
		  <!-- /.box -->


		
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