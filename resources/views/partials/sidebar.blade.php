       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-car"></i>
               </div>
               <div class="sidebar-brand-text mx-3">Car Booking <sup< /sup>
               </div>
           </a>



           <!-- Divider -->
           <hr class="sidebar-divider my-0">

           <!-- Nav Item - Dashboard -->
           <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
               <a class="nav-link" href="/dashboard">
                   <i class="fas fa-fw fa-tachometer-alt"></i>

                   @if (auth()->user()->is_admin === 1)
                       <span>Home</span>
               </a>
           @else
               <span>Home</span></a>
               @endif
           </li>

           {{-- Divider --}}
           <hr class="sidebar-divider">

           @if(Auth::user()->is_admin === 0)
           <div class="sidebar-heading">
               Users
           </div>

           <li class="nav-item {{ Request::is('dashboard/bookings/create') ? 'active' : '' }}">
               <a class="nav-link" href="/dashboard/bookings/create">
                   <i class="fas fa-fw fa-book"></i>
                   <span>Booking Mobil</span>
               </a>
           </li>

           <li class="nav-item {{ Request::is('dashboard/bookings') ? 'active' : '' }}">
               <a class="nav-link" href="/dashboard/bookings">
                   <i class="fas fa-fw fa-envelope"></i>
                   <span>Status Peminjaman</span>
               </a>
           </li>
           <li class="nav-item {{ Request::is('dashboard/laporan') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard/laporan">
                    <i class="fas fa-fw fa-print"></i>
                    <span>History</span>
                </a>
            </li>
           @endif


           @can('admin')
               <!-- Heading -->
               <div class="sidebar-heading">
                   Administrator
               </div>

               <li class="nav-item {{ Request::is('dashboard/users*') ? 'active' : '' }}">
                   <a class="nav-link" href="/dashboard/users">
                       <i class="fas fa-fw fa-users"></i>
                       <span>Karyawan</span>
                   </a>
               </li>

               <li class="nav-item {{ Request::is('dashboard/carmodels*') ? 'active' : '' }}">
                   <a class="nav-link" href="/dashboard/carmodels">
                       <i class="fas fa-fw fa-car"></i>
                       <span>Mobil</span>
                   </a>
               </li>

               <li class="nav-item {{ Request::is('dashboard/history-pinjam') ? 'active' : '' }}">
                   <a class="nav-link" href="/dashboard/history-pinjam">
                       <i class="fas fa-fw fa-book"></i>
                       <span>Data Peminjaman</span>
                   </a>
               </li>

               <li class="nav-item {{ Request::is('dashboard/history-kembali') ? 'active' : '' }}">
                   <a class="nav-link" href="/dashboard/history-kembali">
                       <i class="fas fa-fw fa-envelope"></i>
                       <span>Data Pengembalian</span>
                   </a>
               </li>

               <li class="nav-item {{ Request::is('dashboard/laporan') ? 'active' : '' }}">
                   <a class="nav-link" href="/dashboard/laporan">
                       <i class="fas fa-fw fa-print"></i>
                       <span>Laporan</span>
                   </a>
               </li>
           @endcan
       </ul>
       <!-- End of Sidebar -->
