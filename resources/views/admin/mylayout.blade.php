<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ url('assets/css/admin/mylayout.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
        <i class='bx bxl-dropbox' ></i>
            <span class="logo_name">SpaceBox</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{ route('admin.getListUser') }}" class="active" >
                    <i class='bx bx-user' ></i>
                    <span class="links_name">Quản Lý Người Dùng</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="links_name">Quản Lý Room</span>
                </a>
            </li>
            
            <li>
                <a href="#">
                    <i class='bx bx-cog' ></i>
                    <span class="links_name">Setting</span>
                </a>
            </li>
            <li class="log_out">
                <a href="{{ route('account.logout') }}">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="managers">
                    @yield('title')
                </span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search' ></i>
            </div>
            <div class="profile-details">
                @if (Auth::check())
                    <span class="admin_name">{{Auth::user()->username }}</span>
                    <img src="{{ url('assets/images/adminLogo.png') }}" alt="">
                @endif
            </div>
        </nav>

        <div class="home-content">
            @yield('content')
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if(sidebar.classList.contains("active")){
                sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
            }else{

                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    </script>

</body>
</html>