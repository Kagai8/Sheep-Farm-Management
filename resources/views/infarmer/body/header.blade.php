<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>			
		  </ul>
	  </div>

	  <div nav d-flex justify-content-center align-items-center>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<div>
					
					<h2>Admin Module</h2>
					
					
				</div>
			</li>
					
		  </ul>
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  <!-- full Screen -->
	      
		  <!-- Notifications -->
		  
		  
		  


	      <!-- User Account-->
          <li class="dropdown user user-menu">	
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
				
				<img src="{{ asset('avatar/maleavatar.png') }}" alt="">
				
				
				
				

			</a>

			<ul class="dropdown-menu animated flipInX">
				
			   <li class="user-body">
			   	<a class="dropdown-item" ><i class="ti-user text-muted mr-2"></i> {{auth()->user()->name}}</a>
			   	<a class="dropdown-item" href="{{ route('user.change.password') }}"><i class="ti-lock"></i> Change Password</a>
					  <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
			   </li>
			</ul>
          </li>	
		  
			
        </ul>
      </div>
    </nav>
  </header>