        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="background-color: #075308 !important">
            <div class="app-brand demo m-0 border-bottom" style="background-color: #075308 !important">
              <a href="{{ route('landing') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <img src="https://filemanager.layananberhentikuliah.com/storage/files/WvEebn5l9SpYXZKATBrOi1rgsM1Skc6TpQFBPjVa.png" style="max-width: 150px" alt="">
                </span>
              </a>
  
              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>
  
            <div class="menu-inner-shadow"></div>
  
            <ul class="menu-inner py-1 mt-3">
              <!-- Dashboard -->
              <li class="menu-item {{ Route::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="menu-link text-white">
                  <i class="menu-icon tf-icons bx bxs-home"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
                </a>
              </li>

              <!-- Users -->
              <li class="menu-item {{ Route::is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link text-white">
                  <i class="menu-icon tf-icons bx bxs-user"></i>
                  <div data-i18n="Users">Admin</div>
                </a>
              </li>
              <!-- Documents -->
              <li class="menu-item {{ Route::is('documents*') ? 'active' : '' }}">
                <a href="{{ route('documents.index') }}" class="menu-link text-white">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Documents">File Manager</div>
                </a>
              </li>
              <!-- Pages -->
              <li class="menu-item {{ Route::is('page*') ? 'active' : '' }}">
                <a href="{{ route('page.index') }}" class="menu-link text-white">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Pages">Halaman</div>
                </a>
              </li>
              <!-- Parent Pages -->
              <li class="menu-item {{ Route::is('parent-pages*') ? 'active' : '' }}">
                <a href="{{ route('parent-pages.index') }}" class="menu-link text-white">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Parent Pages">2 Menu</div>
                </a>
              </li>
              <!-- Nesting Pages -->
              <li class="menu-item {{ Route::is('nesting-page*') ? 'active' : '' }}">
                <a href="{{ route('nesting-page.index') }}" class="menu-link text-white">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Nesting Pages">Nesting Pages</div>
                </a>
              </li>
              <!-- Akreditasi -->
              <li class="menu-item {{ Route::is('akreditasi-departments*') ? 'active' : '' }}">
                <a href="{{ route('akreditasi-departments.index') }}" class="menu-link text-white">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Akreditasi">Akreditasi</div>
                </a>
              </li>
              <!-- Content -->
              <li class="menu-item {{ Route::is('content*') ? 'active' : '' }}">
                <a href="{{ route('content.index') }}" class="menu-link text-white">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Content">Content</div>
                </a>
              </li>
              <!-- Leader -->
              <li class="menu-item {{ Route::is('leaders*') ? 'active' : '' }}">
                <a href="{{ route('leaders.index') }}" class="menu-link text-white">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Leader">Leader</div>
                </a>
              </li>
            </ul>
          </aside>
          <!-- / Menu -->