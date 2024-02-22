@extends('infarmer.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">In Depth Details for {{ $goat_profile->goat->name}}, ID: {{$goat_profile->goat->id  }}</h4>
			  <small class="subtitle">More description about the general profile</small>
			</div>
			<div class="box-header ">
				<h7 class="box-title">Gender: {{ $goat_profile->goat->goat_gender}} </h7>
			</div>
			<div class="box-header">
			  <h7 class="box-title">Breed: {{ $goat_profile->breed->breed}} </h7>
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
                            <h6>Goat Color/Markings:</h6>
                            <p>{{ $goat_profile->goat_color}}</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Goat Maturity:</h6>
                            <p>{{ $goat_profile->goat_maturity}}</p>
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Goat Weight:</h6>
                            <p>{{ $goat_profile->goat_weight}} Kgs</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Goat Height:</h6>
                            <p>{{ $goat_profile->goat_height}} cms</p>
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Date Born:</h6>
                            <p>{{ $goat_profile->date_born}} </p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Age:</h6>
                            <p>
                            	@php
                						// Parse the date of birth into a Carbon instance
						                $dob = \Carbon\Carbon::createFromFormat('Y-m-d', $goat_profile->date_born);
						                
						                // Calculate the age for the current goat
						                $age = $dob->diff(Carbon\Carbon::now());
						                $years = $age->format('%y');
						                $months = $age->format('%m');
						                $days = $age->format('%d');
						            	@endphp
            						{{ $years }} years, {{ $months }} months,  {{ $days }} days
                            </p>
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Health Status:</h6>
                            @if($goat_profile->healthy_status == 1)
                            <p><span class="badge badge-pill badge-success">Healthy</span></p>
                            @elseif($goat_profile->healthy_status == 2)
                            <p><span class="badge badge-pill badge-warning">Sickly</span></p>
                            @elseif($goat_profile->healthy_status == 3)
                            <p><span class="badge badge-pill badge-danger">Very Sick</span></p>
                            @else
                            <p><span class="badge badge-pill badge-primary">Under Treatment</span></p>
                            @endif
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Life Status:</h6>
                            @if($goat_profile->status == 1)
                            <p><span class="badge badge-pill badge-success">Alive</span></p>
                            @elseif($goat_profile->status == 2)
                            <p><span class="badge badge-pill badge-light">Coma</span></p>
                            @else
                            <p><span class="badge badge-pill badge-danger">Deceased</span></p>
                            @endif
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Breeding Status:</h6>
                            @if($goat_profile->breeding_status == 0)
                            <p><span class="badge badge-pill badge-info">Not Breeding</span></p>
                            @else
                            <p><span class="badge badge-pill badge-success">Currently Breeding</span></p>
                            @endif
                    	</div>
                    </div>
                    
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Created At:</h6>
                            <p>{{ \Carbon\Carbon::parse($goat_profile->created_at )->format('d F Y')}}  {{ \Carbon\Carbon::parse($goat_profile->updated_at )->format('H') }} hr {{ \Carbon\Carbon::parse($goat_profile->updated_at )->format('m')}} mins</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Updated At:</h6>
                            <p>{{ \Carbon\Carbon::parse($goat_profile->updated_at )->format('d F Y')}}   {{ \Carbon\Carbon::parse($goat_profile->updated_at )->format('H') }} hr {{ \Carbon\Carbon::parse($goat_profile->updated_at )->format('m')}} mins</p>
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Sheep Profile Created By:</h6>
                            <p>{{ $goat_profile->created_by}}</p>
                    	</div>
                    </div>
                    
               	</div>
			</div>
			<!-- /.box-body -->
		</div>
		  <!-- /.box -->


		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Image for {{ $goat_profile->goat->name}}, ID: {{$goat_profile->goat->id  }}</h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  	 <div class="card-body d-flex justify-content-center align-items-center" >
				        <img src="{{ asset($goat_profile->goat_image) }}" alt="Goat Image" class="card-img-top" style="height: 340px; width: 390px;">
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