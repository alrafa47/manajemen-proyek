<li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Mastering
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('jabatan.index')}}" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pegawai.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('bidangkeahlian.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bidang Keahlian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('proyek.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Proyek
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
