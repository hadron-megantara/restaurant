<div class="wrapper wrapper-boxed">
	@if($user = Auth::user())
		<nav class="sidebar">
			<div class="sidebar-content  js-simplebar">
				<a class="sidebar-brand" href="/">
                    <img src="/img/icon/logo.png" style="max-width:30px;max-height:30px">
		          <span class="align-middle">Restaurant</span>
		        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>

					<li class="sidebar-item">
						<a href="/" class="font-weight-bold sidebar-link">
				              <i class="align-middle"><span class="fa fa-home"></span></i>
							  <span class="align-middle">Dashboard</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a href="/dish" class="font-weight-bold sidebar-link">
				              <i class="align-middle"><span class="fa fa-utensils"></span></i>
							  <span class="align-middle">Dish</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a href="/category" class="font-weight-bold sidebar-link">
				              <i class="align-middle"><span class="fa fa-align-center"></span></i>
							  <span class="align-middle">Category</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a href="/table" class="font-weight-bold sidebar-link">
				              <i class="align-middle"><span class="fa fa-table"></span></i>
							  <span class="align-middle">Table</span>
			            </a>
					</li>

					<li class="sidebar-header">
						Others
					</li>
					<li class="sidebar-item">
						<a href="/employee" class="font-weight-bold sidebar-link">
				              <i class="align-middle"><span class="fa fa-users"></span></i>
							  <span class="align-middle">Employee</span>
			            </a>
					</li>
				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light bg-white sticky-top">
				<a class="sidebar-toggle d-flex mr-3">
          <i class="align-self-center" data-feather="menu"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle ml-2 d-inline-block d-sm-none" href="#" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle mt-n1" data-feather="settings"></i>
								</div>
							</a>
							<a class="nav-link nav-link-user dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="/img/icon/default-user.ico" class="avatar img-fluid rounded mr-1" alt="Admin" /> <span class="text-dark">Admin</span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="pages-profile.html">Profile</a>
								<a class="dropdown-item" href="#">Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html">Settings & Privacy</a>
								<a class="dropdown-item" href="#">Help</a>
								<a class="dropdown-item" href="#">Sign out</a>
							</div>
						</li>

					</ul>
				</div>
			</nav>
		@endif
