 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
         <div class="sidebar-brand-icon rounded">
             {{-- @if ($profil)
                 <img style="width: 50px; height:50px; object-fit: contain;   object-position: center;"
                     src="{{ asset('storage/' . $profil->logo) }}">
             @else --}}
             <div class="sidebar-brand-icon rotate-n-15">
                 <i class="fas fa-laugh-wink"></i>
             </div>
             {{-- @endif --}}


         </div>
         <div class="sidebar-brand-text mx-3">RentCar</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="/admin/dashboard">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>
     <!-- Nav Item - Data Mobil -->
     <li class="nav-item">
         <a class="nav-link" href="/admin/datamobil">
             <i class="fas fa-book"></i>
             <span>Data Mobil</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/admin/datacustomer">
             <i class="fas fa-book"></i>
             <span>Daftar Customer</span></a>
     </li>
     {{-- <li class="nav-item">
         <a class="nav-link" href="/admin/transaksi">
             <i class="fas fa-book"></i>
             <span>Transaksi</span></a>
     </li> --}}
     <li class="nav-item">
         <a class="nav-link" href="/admin/pembayaran">
             <i class="fas fa-book"></i>
             <span>Pembayaran</span></a>
     </li>
     <!-- Nav Item - Data Master Menu -->

     {{-- <li class="nav-item active">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Data Master</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Data Master:</h6>
                 <a class="collapse-item " href="/admin/jurusan">Jurusan</a>
                 <a class="collapse-item " href="/admin/kelas">Kelas</a>
                 <a class="collapse-item " href="/admin/siswa">Siswa</a>
             </div>
         </div>
     </li> --}}


     <!-- Nav Item - Data Master Menu -->
     {{-- <li class="nav-item ">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePelanggaran"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-bullhorn"></i>
             <span>Pelanggaran</span>
         </a>
         <div id="collapsePelanggaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Pelanggaran:</h6>
                 <a class="collapse-item " href="/admin/kategori-pelanggaran">Kategori</a>
                 <a class="collapse-item " href="/admin/jenis-pelanggaran">Bentuk Pelanggaran</a>
                 <a class="collapse-item " href="/admin/data-pelanggaran">Input Pelanggaran</a>

             </div>
         </div>
     </li>



     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item ">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
             aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Settings</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Settings:</h6>
                 <a class="collapse-item " href="/admin/profil-web">Profile Web</a>
                 <a class="collapse-item" href="/admin/konten">Konten</a>

             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/admin/users">
             <i class="fas fa-users"></i>
             <span>User</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Addons
     </div>


     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="/admin/cetak-laporan">
             <i class="fas fa-book"></i>
             <span>Cetak Laporan</span></a>
     </li> --}}

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
 </ul>
