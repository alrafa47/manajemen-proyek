<li class="nav-item">
    <a href="{{route('pegawai.index')}}" class="nav-link">
      <i class="nav-icon far fa-calendar-alt"></i>
      <p>
        Profil
        <span class="badge badge-info right"></span>
      </p>
    </a>
  </li>
<li class="nav-item menu-close">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Tugas
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('penugasan.index')}}" class="nav-link">
          <i class="fa fa-user nav-icon"></i>
          <p>Tugas Saya</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('tugas.index')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Tugas Team</p>
        </a>
      </li>
    </ul>
    </li>
  <li class="nav-item">
    <a href="{{route('proyek.index')}}" class="nav-link">
      <i class="nav-icon far fa-calendar-alt"></i>
      <p>
        History Proyek
        <span class="badge badge-info right"></span>
      </p>
    </a>
  </li>
