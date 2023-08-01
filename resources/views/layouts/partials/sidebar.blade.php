   <!-- Start::app-sidebar -->
   <aside class="app-sidebar sticky" id="sidebar">

       <!-- Start::main-sidebar-header -->
       <div class="main-sidebar-header" style="height: unset !important; ">
           <a href="#" class="header-logo">
               <img src="{{ asset('assets/logo/logo_full_light.png') }}" alt="logo" class="desktop-logo " style="height:48px">
               <img src="{{ asset('assets/logo/logo_small_light.png') }}" alt="logo" class="toggle-logo ">
               <img src="{{ asset('assets/logo/logo_full_light.png') }}" alt="logo" class="desktop-dark " style="height:48px">
               <img src="{{ asset('assets/logo/logo_small_light.png') }}" alt="logo" class="toggle-dark ">
           </a>
       </div>
       <!-- End::main-sidebar-header -->

       <!-- Start::main-sidebar -->
       <div class="main-sidebar" id="sidebar-scroll">

           <!-- Start::nav -->
           <nav class="main-menu-container nav nav-pills flex-column sub-open">
               <div class="slide-left" id="slide-left">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                       viewBox="0 0 24 24">
                       <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                   </svg>
               </div>
               <ul class="main-menu">
                   <!-- Start::slide__category -->
                   <li class="slide__category"><span class="category-name">Main</span></li>
                   <!-- End::slide__category -->

                   <!-- Start::slide -->
                   <li class="slide">
                       <a href="{{ route('home') }}"
                           class="side-menu__item {{ request()->is('home*') ? 'active' : '' }}">
                           <i class="bx bxs-dashboard side-menu__icon"></i>
                           <span class="side-menu__label">Dashboard</span>
                       </a>
                   </li>
                   <!-- End::slide -->

                   <!-- Start::slide__category -->
                   <li class="slide__category"><span class="category-name">Users</span></li>
                   <!-- End::slide__category -->

                   <!-- Start::slide -->
                   <li class="slide">
                       <a href="{{ route('customers.index') }}"

                           class="side-menu__item {{ request()->is('customers*')|| request()->is('vehicles*') || request()->is('drivers*')  ? 'active' : '' }}">
                           <i class="bx bxs-user side-menu__icon"></i>
                           <span class="side-menu__label">Customers</span>
                       </a>
                   </li>

                   <li class="slide">
                       <a href="{{ route('serviceprovider.index') }}"
                           class="side-menu__item {{ request()->is('serviceprovider*') ||  request()->is('fuel_station*') ? 'active' : '' }}">
                           <i class="bx bxs-user side-menu__icon"></i>
                           <span class="side-menu__label">Service Providers</span>
                       </a>
                   </li>

                   <!-- Start::slide__category -->
                   <li class="slide__category"><span class="category-name">Vehicles</span></li>
                   <!-- End::slide__category -->

                   <!-- Start::slide -->

                   <li class="slide">
                       <a href="{{ route('vehicle_make.index') }}"
                           class="side-menu__item {{ request()->is('vehicle_make*') ? 'active' : '' }}">
                           <i class="bx bxs-car side-menu__icon"></i>
                           <span class="side-menu__label">Vehicle Make</span>
                       </a>
                   </li>

                   <li class="slide">
                       <a href="{{ route('vehicle_modal.index') }}"
                           class="side-menu__item {{ request()->is('vehicle_modal*') ? 'active' : '' }}">
                           <i class="bx bxs-car side-menu__icon"></i>
                           <span class="side-menu__label">Vehicle Models</span>
                       </a>
                   </li>

                    <!-- Start::slide__category -->
                    <li class="slide__category"><span class="category-name">Setting</span></li>
                    <li class="slide">
                        <a href="{{ route('logout') }}"
                            class="side-menu__item">
                            <i class="bx bxs-exit side-menu__icon"></i>
                            <span class="side-menu__label">Logout</span>
                        </a>
                    </li>
                    <!-- End::slide -->

               </ul>
               <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                       width="24" height="24" viewBox="0 0 24 24">
                       <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                       </path>
                   </svg></div>
           </nav>
           <!-- End::nav -->

       </div>
       <!-- End::main-sidebar -->

   </aside>
   <!-- End::app-sidebar -->
