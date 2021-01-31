<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-md-6 col-sm-8 clearfix">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="search-box pull-left">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <ul class="breadcrumbs pull-left">
                            <li><span>Sistem Informasi Perpustakaan</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile info & task notification -->
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }}<i
                        class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    @role('anggota')
                    <a class="dropdown-item" href="/anggota/password/change">Ganti Password</a>
                    @endrole
                    @role('pegawai')
                    <a class="dropdown-item" href="/pegawai/password/change">Ganti Password</a>
                    @endrole
                    <a class="dropdown-item" href="/auth/logout">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>