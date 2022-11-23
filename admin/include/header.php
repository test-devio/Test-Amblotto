<header class="app-header fixed-top">
	<div class="app-header-inner">
		<div class="container-fluid py-2">
			<div class="app-header-content">
				<div class="row justify-content-between align-items-center">
					<div class="col-auto">
						<a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
								<title>Menu</title>
								<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
							</svg>
						</a>
					</div>
					<!--//col-->
					<div class="search-mobile-trigger d-sm-none col">
						<i class="search-mobile-trigger-icon fas fa-search"></i>
					</div>
					<!--//col-->
					<div class="app-search-box col">
						<form class="app-search-form">
							<!-- <input type="text" placeholder="Search..." name="search" class="form-control search-input" />
							<button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button> -->
						</form>
					</div>
					<!--//app-search-box-->
					<div class="app-utilities col-auto">
						<div class="app-utility-item app-notifications-dropdown dropdown">
						</div>
						<!--//app-utility-item-->
						<div class="app-utility-item">
						</div>
						<!--//app-utility-item-->
						<div class="app-utility-item app-user-dropdown dropdown">
							<a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" 
							role="button" aria-expanded="false">
							<img src="upload/admin/<?=$_SESSION['image_login']?>" class="rounded-circle mr-1" 
							alt="user profile"> <?=$_SESSION['user_login']?>
							</a>
							<ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="?page=profile">Admin</a></li>
								<!-- <li><a class="dropdown-item" href="settings.html">ตั้งค่า</a></li> -->
								<li><hr class="dropdown-divider" /></li>
								<li><a class="dropdown-item" href="?page=logout">Log Out</a></li>
							</ul>
						</div>
						<!--//app-user-dropdown-->
					</div>
					<!--//app-utilities-->
				</div>
				<!--//row-->
			</div>
			<!--//app-header-content-->
		</div>
		<!--//container-fluid-->
	</div>
	<!--//app-header-inner-->
	<div id="app-sidepanel" class="app-sidepanel">
		<div id="sidepanel-drop" class="sidepanel-drop"></div>
		<div class="sidepanel-inner d-flex flex-column">
			<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
			<div class="app-branding">
				<a class="app-logo" href="../admin/"><span class="logo-text">ระบบแคตตาล๊อก</span></a>
			</div>
			<!--//app-branding-->
			<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				<ul class="app-menu list-unstyled accordion" id="menu-accordion">
					<li class="nav-item">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						<a class="nav-link <?php echo !isset($_GET['page']) && empty($_GET['page']) ? 'active' : '' ?>" href="../admin/">
							<span class="nav-icon">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path
										fill-rule="evenodd"
										d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"
									/>
									<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
								</svg>
							</span>
							<span class="nav-link-text">หน้าหลัก</span>
						</a>
						<!--//nav-link-->
					</li>
					<!--//nav-item-->
					<li class="nav-item">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						<a class="nav-link <?php echo isset($_GET['page']) && $_GET['page'] == 'about' ? 'active' : '' ?>" href="?page=about">
							<span class="nav-icon">
								<!-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path
										fill-rule="evenodd"
										d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"
									/>
									<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
								</svg> -->
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
									<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
								</svg>
							</span>
							<span class="nav-link-text">จัดการข้อมูลเกี่ยวกับฉัน</span>
						</a>
						<!--//nav-link-->
					</li>
					<li class="nav-item">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						<a class="nav-link <?php echo isset($_GET['page']) && $_GET['page'] == 'product' ? 'active' : '' ?>" href="?page=product">
							<span class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
									<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
								</svg>
							</span>
							<span class="nav-link-text">จัดการข้อมูลสินค้า</span>
						</a>
						<!--//nav-link-->
					</li>
					<li class="nav-item">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						<a class="nav-link <?php echo isset($_GET['page']) && $_GET['page'] == 'producttype' ? 'active' : '' ?>"href="?page=producttype">
							<span class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
									<path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
								</svg>
							</span>
							<span class="nav-link-text">จัดการข้อมูลประเภทสินค้า</span>
						</a>
						<!--//nav-link-->
					</li>
					<!-- //nav item -->
					<li class="nav-item">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						<a class="nav-link <?php echo isset($_GET['page']) && $_GET['page'] == 'user' ? 'active' : '' ?>" href="?page=user">
							<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
								<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
								<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
							</svg>
							</span>
							<span class="nav-link-text">จัดการข้อมูลสมาชิก</span>
						</a>
						<!--//nav-link-->
					</li>
					<!-- //nav item -->
					<li class="nav-item">
						<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						<a class="nav-link <?php echo isset($_GET['page']) && $_GET['page'] == 'admin' ? 'active' : '' ?>" href="?page=admin">
							<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
								<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
								<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
							</svg>
							</span>
							<span class="nav-link-text">จัดการข้อมูลผู้ดูแลระบบ</span>
						</a>
						<!--//nav-link-->
					</li>
				</ul>
				<!--//app-menu-->
			</nav>
			<!--//app-nav-->
			<div class="app-sidepanel-footer">
				<nav class="app-nav app-nav-footer">
					<ul class="app-menu footer-menu list-unstyled">
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<!-- <a class="nav-link" href="settings.html">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path
											fill-rule="evenodd"
											d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"
										/>
										<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
									</svg>
								</span>
								<span class="nav-link-text">Settings</span>
							</a> -->
							<!--//nav-link-->
						</li>
						<!--//nav-item-->
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<!-- <a class="nav-link" href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
										<path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
									</svg>
								</span>
								<span class="nav-link-text">Download</span>
							</a> -->
							<!--//nav-link-->
						</li>
						<!--//nav-item-->
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<!-- <a class="nav-link" href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v10.755S4 11 8 11s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
										<path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
									</svg>
								</span>
								<span class="nav-link-text">License</span>
							</a> -->
							<!--//nav-link-->
						</li>
						<!--//nav-item-->
					</ul>
					<!--//footer-menu-->
				</nav>
			</div>
			<!--//app-sidepanel-footer-->
		</div>
		<!--//sidepanel-inner-->
	</div>
	<!--//app-sidepanel-->
	</header>
	<!--//app-header-->