<marquee> Selamat Datang di GA-MAS (GA Management System) adalah aplikasi untuk memudahkan pekerjaan Divisi GA</marquee>
<div class="row">
    <div class="col s12 m6">
        <div class="card blue">
            <div class="card-content white-text">
                <p class="card-title">Perizinan Yang Akan Habis</p>
                <div class="row dashboard-row">
                    <div class="col s2">
                        <i class="large material-icons">event</i>
                    </div>
                    <div class="col s10">
                        <h4 class="dashboard-title">
                            <?php echo ($event) ? $event->nama : '-'; ?>
                        </h4>
                        <h6 class="dashboard-title">
                            <?php echo ($event) ? date_format(date_create($event->tanggal_berakhir), 'd F Y') : '-'; ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <div class="card red darken-1">
            <div class="card-content white-text x">
                <p class="card-title">Inventaris</p>
                <div class="row dashboard-row">
                    <div class="col s2">
                        <i class="large material-icons">work</i>
                    </div>
                    <div class="col s10">
                        <h4 class="dashboard-title">
                            <?php echo ($loker) ? $loker->nama_perusahaan : '-'; ?>
                        </h4>
                        <h6 class="dashboard-title">
                            <?php echo ($loker) ? date_format(date_create($loker->tanggal_berakhir), 'd F Y') : '-'; ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>