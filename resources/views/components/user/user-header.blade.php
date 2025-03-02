@php
    $pengguna = Auth::guard('user')->user();
@endphp

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
    body {
        padding-top: 100px;
        /* Adjust this value based on your navbar height */
    }

    /* Navbarrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */
    .navbar {
        padding: 1rem 2rem;
        background: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1030;
        transition: all 0.3s ease;
    }

    .navbar.scrolled {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .navbar-brand {
        font-size: 1.5rem;
        font-weight: 600;
        color: #0a1b3f;
    }

    .navbar-brand span {
        color: #0055ff;
    }

    .profile-dropdown {
        position: relative;
    }

    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.2s ease;
    }

    .profile-img:hover {
        border-color: #0055ff;
    }

    .dropdown-menu {
        margin-top: 0.5rem;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        min-width: 200px;
    }

    .dropdown-item {
        padding: 0.75rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #1a1a1a;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #e6007e;
    }

    .dropdown-divider {
        margin: 0.5rem 0;
        border-color: #eee;
    }

    .user-info {
        padding: 1rem 1.5rem;
        background-color: #f8f9fa;
        border-radius: 8px 8px 0 0;
    }

    .user-name {
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .user-email {
        font-size: 0.875rem;
        color: #666;
    }

    /* End Navbarrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */
</style>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Job<span>Terkini.co</span></a>

        <!-- Profile Dropdown -->
        <div class="profile-dropdown dropdown">
            <img src="{{ $pengguna->foto ? asset('storage/' . $pengguna->foto) : asset('assets/images/profile/user-1.jpg') }}"
                alt="Profile picture" class="profile-img" data-bs-toggle="dropdown">

            <ul class="dropdown-menu dropdown-menu-end">
                <!-- User Info -->
                <div class="user-info">
                    <div class="user-name">{{ $pengguna->nama }}</div>
                    <div class="user-email">{{ $pengguna->email }}</div>
                </div>

                <!-- Menu Items -->
                <li><a class="dropdown-item" href="{{ route('user-profile') }}">
                        <i class="bi bi-person"></i>
                        Profile Saya
                    </a></li>
                <li><a class="dropdown-item" href="{{ route('bookmarks-index') }}">
                        <i class="bi bi-bookmark"></i>
                        Lowongan Tersimpan
                    </a></li>
                <li><a class="dropdown-item" href="{{ route('user-lamaran-history') }}">
                        <i class="bi bi-file-text"></i>
                        Lamaran Saya
                    </a></li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li><a class="dropdown-item" href="#">
                        <i class="bi bi-gear"></i>
                        Pengaturan
                    </a></li>
                <li>
                    <form action="{{ route('user-logout') }}" method="POST" class="">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit"><i
                                class="bi bi-box-arrow-right"></i>Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
