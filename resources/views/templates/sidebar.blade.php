<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="/">
                <h5 style="color:white">SIPERPUS <i class="fa fa-book"></i></h5>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    @role('anggota')
                    <li><a href="/anggota"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="/anggota/pinjaman/riwayat"><i class="ti-bookmark"></i><span>Riwayat Pinjam</span></a>
                    </li>
                    @endrole
                    @role('pegawai')
                    <li><a href="/pegawai"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="/kelola/peminjaman/daftar"><i class="ti-agenda"></i><span>Peminjaman</span></a></li>
                    <li><a href="/kelola/buku/daftar"><i class="ti-book"></i><span>Buku</span></a></li>
                    <li><a href="/kelola/pengumuman/daftar"><i class="ti-announcement"></i><span>Pengumuman</span></a>
                    </li>
                    <li><a href="/kelola/anggota/daftar"><i class="ti-user"></i><span>Manajemen Anggota</span></a></li>
                    @role('admin')
                    <li><a href="/kelola/pegawai/daftar"><i class="fa fa-group"></i><span>Manajemen Pegawai</span></a>
                    </li>
                    @endrole
                    @endrole
                </ul>
            </nav>
        </div>
    </div>
</div>