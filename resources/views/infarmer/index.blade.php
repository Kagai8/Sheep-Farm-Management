@extends('infarmer.admin_master')
@section('title')
<title>Dashboard</title>
@endsection
@section('admin')


<div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-primary-light rounded w-60 h-60">
								<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">No of Sheep</p>
								<h3 class="text-white mb-0 font-weight-500">{{App\Models\Goat::count()}} Sheep<small class="text-success"></small></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-warning-light rounded w-60 h-60">
								<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Kids</p>
								<h3 class="text-white mb-0 font-weight-500">{{App\Models\GoatProfile::where('goat_maturity','!=', 'Adult')->count()}} Kid(s)<small class="text-success"></small></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-info-light rounded w-60 h-60">
								<i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Females </p>
								<h3 class="text-white mb-0 font-weight-500"> {{App\Models\Goat::where('goat_gender','=', 'Ewe')->count()}} Female(s)<small class="text-danger"> </small></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-danger-light rounded w-60 h-60">
								<i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Males</p>
								<h3 class="text-white mb-0 font-weight-500">{{App\Models\Goat::where('goat_gender','=', 'Ram')->count()}} Male(s)<small class="text-danger"></small></h3>
								
							</div>
						</div>
					</div>
				</div>
				<div class="box">
	                <div class="box-header with-border">
	                  <h5 class="box-title"> Vaccination OverDue</h5>
	                </div> 
                    <div class="box-body">
                        <div class="table-responsive">
                        	@if(isset($overdueVaccinations) && $overdueVaccinations->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vaccination ID</th>
                                        <th>Goat Name</th>
                                        <th>Tag</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($overdueVaccinations as $vaccination)
									    <tr>
									        <td>{{ $vaccination->disease->disease ?? 'No Disease Available' }}</td>
									        <td>{{ $vaccination->goat->name ?? 'No Name Available' }}</td>
									        <td>{{ $vaccination->goat->id ?? 'No ID Available' }}</td>
									        <td>
									            @if($vaccination->status == 1)
									                <span class="badge badge-pill badge-warning">Pending</span>
									            @else
									                <span class="badge badge-pill badge-success">Done</span>
									            @endif
									        </td>
									        <td>{{ $vaccination->due_date }}</td>
									    </tr>
									@endforeach

                                </tbody>
                            </table>
                            @else
                            <table class="table table-striped table-bordered">
                                <p>No Data To Display</p>
                            </table>
                            @endif
                        </div>
                    </div>
            	</div>
				<div class="box">
                	<div class="box-header with-border">
	                  <h5 class="box-title"> Vaccination Due This Week</h5>
	                </div>
                
                    <div class="box-body">
                        <div class="table-responsive">
                        	@if(isset($upcomingVaccinations) && $upcomingVaccinations->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vaccination ID</th>
                                        <th>Goat Name</th>
                                        <th>Tag</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($upcomingVaccinations as $vaccination)
                                    <tr>
										<td>{{ $vaccination->disease->disease ?? 'No Disease Available' }}</td>
								        <td>{{ $vaccination->goat->name ?? 'No Name Available' }}</td>
								        <td>{{ $vaccination->goat->id ?? 'No ID Available' }}</td>
								        <td>
								            @if($vaccination->status == 1)
								                <span class="badge badge-pill badge-warning">Pending</span>
								            @else
								                <span class="badge badge-pill badge-success">Done</span>
								            @endif
								        </td>
								        <td>{{ $vaccination->due_date }}</td>
							 		</tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <table class="table table-striped table-bordered">
                                <p>No Data To Display</p>
                            </table>
                            @endif
                        </div>

                    </div>
            	</div>
            	<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-primary-light rounded w-60 h-60">
								<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Total Sales</p>
								<h3 class="text-white mb-0 font-weight-500">{{App\Models\Sale::count()}} Sale(s)<small class="text-success"></small></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-warning-light rounded w-60 h-60">
								<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Sales(Sum)</p>
								<h3 class="text-white mb-0 font-weight-500">KES {{$totalAmount}}<small class="text-success"></small></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-info-light rounded w-60 h-60">
								<i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">General Costs </p>
								<h3 class="text-white mb-0 font-weight-500">KES {{$totalGeneralCostAmount}}<small class="text-danger"> </small></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-danger-light rounded w-60 h-60">
								<i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Costs @ Goat(TOTAL)</p>
								<h3 class="text-white mb-0 font-weight-500">KES {{ $totalCostAmount}}<small class="text-danger"></small></h3>
								
							</div>
						</div>
					</div>
				</div>
				<div class="box">
	                <div class="box-header with-border">
	                  <h5 class="box-title"> Recent Sales</h5>
	                </div>
	                <!-- /.box-header -->
	                <div class="box-body">
	                    <div class="table-responsive">
	                    	@if(isset($RecentSales) && $RecentSales->count() > 0)
	                        <table class="table table-striped table-bordered">
	                            <thead>
	                                <tr>
	                                    <th>Sale ID</th>
										<th>Customer Name</th>
										<th>Total Amount</th>
										<th>Mode Of Payment </th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                @foreach($RecentSales as $recent_sale)
	                                <tr>
										<td>SL{{ $recent_sale->id }}</td>
										 <td>{{ $recent_sale->customer_name }}</td>
										 <td>KES {{ $recent_sale->total_amount }} </td>
										 <td>{{ $recent_sale->mode_of_payment }} </td>	 
							 		</tr>
	                                @endforeach
	                            </tbody>
	                        </table>
	                        @else
	                        <table class="table table-striped table-bordered">
	                            <p>No Data To Display</p>
	                        </table>
	                        @endif
	                    </div>
	                </div>
            	</div>
			</div>
		</section>

</div>


@endsection