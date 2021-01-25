<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <h5 style="color:white">SIPERPUS <i class="fa fa-book"></i></h5>
            {{-- <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a> --}}
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li><a href="maps.html"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="/kelola/peminjaman/daftar"><i class="ti-agenda"></i><span>Peminjaman</span></a></li>
                    <li><a href="/kelola/buku/daftar"><i class="ti-book"></i><span>Buku</span></a></li>
                    <li><a href="/kelola/anggota/daftar"><i class="ti-user"></i><span>Manajemen Anggota</span></a></li>
                    @role('admin')
                    <li><a href="/kelola/pegawai/daftar"><i class="fa fa-group"></i><span>Manajemen Pegawai</span></a>
                    </li>
                    @endrole
                </ul>
            </nav>
        </div>
    </div>
</div>