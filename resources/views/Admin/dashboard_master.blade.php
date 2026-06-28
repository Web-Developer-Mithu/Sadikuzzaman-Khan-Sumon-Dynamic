<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin | Dashboard</title>

    <!--begin::Theme Init (prevents flash of incorrect theme on load, #6043)-->
    <script>
        (() => {
            'use strict';
            const STORAGE_KEY = 'lte-theme';
            let stored = null;
            try {
                stored = localStorage.getItem(STORAGE_KEY);
            } catch {
                // localStorage may be unavailable (private mode, sandboxed iframe).
            }
            const prefersDark = globalThis.matchMedia('(prefers-color-scheme: dark)').matches;
            // Mirror the resolution in _scripts.astro: explicit "dark"/"light" win,
            // otherwise ("auto" or unset) fall back to the OS preference.
            let resolved = 'light';
            if (stored === 'dark' || stored === 'light') {
                resolved = stored;
            } else if (prefersDark) {
                resolved = 'dark';
            }
            document.documentElement.setAttribute('data-bs-theme', resolved);
            document.documentElement.style.colorScheme = resolved;
        })();
    </script>
    <!--end::Theme Init-->

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('admin/css/adminlte.css') }}" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
        onload="this.media = 'all'" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->

    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />

    <!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />
    <style>
        .footer-glow {
            animation: water-glow 4s ease-in-out infinite;
            color: #e9f7ff !important;
            padding: 0.35rem 0.8rem;
            border-radius: 0.75rem;
            border: 1px solid rgba(255, 255, 255, 0.18);
            background: rgba(12, 103, 255, 0.08);
            box-shadow: 0 0 18px rgba(0, 123, 255, 0.22);
            backdrop-filter: blur(8px);
        }

        .footer-glow a {
            color: #c8f7ff !important;
            text-decoration: none;
            font-weight: 700;
        }

        .footer-glow a:hover {
            color: #ffffff !important;
            text-shadow: 0 0 16px rgba(255, 255, 255, 0.9);
        }

        html[data-bs-theme="light"] .footer-glow {
            color: #0d6efd !important;
            background: rgba(13, 110, 253, 0.12);
            border-color: rgba(13, 110, 253, 0.22);
            box-shadow: 0 0 18px rgba(13, 110, 253, 0.16);
        }

        html[data-bs-theme="light"] .footer-glow a {
            color: #0d6efd !important;
        }

        html[data-bs-theme="light"] .footer-glow a:hover {
            color: #0a58ca !important;
            text-shadow: 0 0 12px rgba(13, 110, 253, 0.45);
        }

        @keyframes water-glow {

            0%,
            100% {
                transform: translateY(0px);
                text-shadow: 0 0 10px rgba(140, 228, 255, 0.45), 0 0 24px rgba(18, 164, 255, 0.18);
            }

            35%,
            65% {
                transform: translateY(-2px);
                text-shadow: 0 0 18px rgba(140, 228, 255, 0.85), 0 0 36px rgba(18, 164, 255, 0.28);
            }
        }

        .app-header,
        .app-sidebar,
        .app-main,
        .app-footer,
        .card,
        .small-box,
        .user-menu .dropdown-menu {
            transition: background-color 0.35s ease, color 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }

        /* Prevent visual overflow inside cards and main content */
        .card,
        .card .card-body,
        .app-main,
        .app-main img,
        .app-main table {
            overflow: hidden;
            max-width: 100%;
            word-break: break-word;
        }

        .app-wrapper {
            padding-top: 76px;
        }

        .app-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background: rgba(6, 12, 34, 0.88);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.18);
            backdrop-filter: blur(20px);
        }

        .app-header .nav-link,
        .app-header .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.85);
        }

        .app-header .nav-link:hover,
        .app-header .nav-link.active,
        .app-header .nav-link:focus {
            color: #7dd3fc !important;
        }

        .app-header .navbar-brand {
            letter-spacing: 0.06em;
            text-transform: uppercase;
            font-size: 0.95rem;
            color: #bde9ff;
        }

        .form-control-dark {
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.03);
        }

        .form-control-dark::placeholder {
            color: rgba(255, 255, 255, 0.62);
        }

        .input-group-text {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.12);
        }

        .app-header .nav-link {
            border-radius: 0.75rem;
            transition: background-color 0.25s ease, color 0.25s ease;
        }

        .app-header .nav-link:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .app-sidebar {
            background: linear-gradient(180deg, rgba(7, 15, 48, 0.96), rgba(4, 9, 28, 0.99));
            border-right: 1px solid rgba(125, 211, 252, 0.18);
            box-shadow: inset -2px 0 0 rgba(125, 211, 252, 0.08), 0 24px 60px rgba(0, 0, 0, 0.22);
            backdrop-filter: blur(22px);
            padding-top: 1.15rem;
        }

        .sidebar-brand {
            padding: 1rem 1.2rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid rgba(125, 211, 252, 0.12);
        }

        .sidebar-brand .brand-text {
            color: rgba(187, 241, 255, 0.92);
        }

        .app-sidebar .nav-link {
            color: rgba(255, 255, 255, 0.92);
            border-radius: 0.9rem;
            margin: 0.2rem 0;
            padding: 0.75rem 1.1rem;
        }

        .app-sidebar .nav-link.active,
        .app-sidebar .nav-link:hover {
            background: rgba(125, 211, 252, 0.2);
            color: #a5f3fc !important;
            box-shadow: inset 4px 0 0 0 rgba(56, 189, 248, 0.8);
        }

        .app-sidebar .nav-icon {
            color: rgba(255, 255, 255, 0.72);
        }

        .app-sidebar .nav-treeview .nav-link {
            padding-left: 2.4rem;
        }

        .app-main {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.08), rgba(15, 23, 42, 0.02));
            min-height: calc(100vh - 112px);
            padding: 2rem 0 3rem;
        }

        .card,
        .small-box,
        .user-menu .dropdown-menu {
            background: rgba(15, 23, 42, 0.82);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.14);
            backdrop-filter: blur(18px);
        }

        .card.card-glass {
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 32px 80px rgba(6, 12, 34, 0.18);
        }

        .card.card-glass .card-body {
            backdrop-filter: blur(18px);
        }

        .app-content-header h3 {
            letter-spacing: 0.02em;
            font-weight: 700;
        }

        .metric-box {
            border-radius: 1.35rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(18px);
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.12);
        }

        .metric-box .icon {
            width: 3rem;
            height: 3rem;
            display: grid;
            place-items: center;
            border-radius: 1rem;
            background: rgba(13, 110, 253, 0.14);
            color: #0ea5e9;
        }

        .metric-box h4 {
            margin-bottom: 0.25rem;
            font-weight: 700;
        }

        .metric-box p {
            color: rgba(255, 255, 255, 0.7);
        }

        .card-header,
        .small-box .inner,
        .user-header {
            background: transparent;
        }

        .card-title,
        .breadcrumb-item a,
        .breadcrumb-item.active,
        .app-content-header h3 {
            color: rgba(255, 255, 255, 0.95);
        }

        .small-box {
            border-radius: 1.25rem;
        }

        .small-box .small-box-icon {
            opacity: 0.18;
        }

        .app-footer {
            background: rgba(3, 7, 25, 0.9);
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            color: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(18px);
        }

        html[data-bs-theme="light"] .app-header {
            background: rgba(255, 255, 255, 0.92);
            border-color: rgba(33, 37, 41, 0.08);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        }

        html[data-bs-theme="light"] .app-header .nav-link,
        html[data-bs-theme="light"] .app-header .navbar-nav .nav-link {
            color: rgba(10, 25, 64, 0.98);
            font-weight: 600;
            text-shadow: 0 0 3px rgba(255, 255, 255, 0.75);
        }

        html[data-bs-theme="light"] .app-header .nav-link.active,
        html[data-bs-theme="light"] .app-header .nav-link:hover,
        html[data-bs-theme="light"] .app-header .nav-link:focus {
            color: #0b3b95 !important;
        }

        html[data-bs-theme="light"] .app-header .navbar-brand,
        html[data-bs-theme="light"] .app-header .nav-link,
        html[data-bs-theme="light"] .app-header .nav-link .bi {
            color: rgba(12, 29, 68, 0.95) !important;
        }

        html[data-bs-theme="light"] .app-header .navbar-brand {
            text-shadow: none;
        }

        html[data-bs-theme="light"] .app-header .input-group-text,
        html[data-bs-theme="light"] .app-header .form-control-dark {
            background: rgba(248, 249, 250, 0.95);
            color: rgba(12, 29, 68, 0.95);
            border-color: rgba(209, 213, 219, 0.9);
        }

        html[data-bs-theme="light"] .app-header .form-control-dark::placeholder {
            color: rgba(100, 116, 139, 0.9);
        }

        html[data-bs-theme="light"] .app-header .btn-outline-light {
            color: rgba(12, 29, 68, 0.95);
            border-color: rgba(207, 217, 224, 0.9);
            background: rgba(255, 255, 255, 0.88);
        }

        html[data-bs-theme="light"] .app-sidebar {
            background: linear-gradient(180deg, rgba(250, 252, 255, 0.98), rgba(243, 247, 255, 0.99));
            border-color: rgba(13, 110, 253, 0.16);
            box-shadow: inset -2px 0 0 rgba(13, 110, 253, 0.08), 0 8px 30px rgba(15, 23, 42, 0.06);
        }

        html[data-bs-theme="light"] .sidebar-brand {
            background: rgba(13, 110, 253, 0.08);
            border-bottom: 1px solid rgba(13, 110, 253, 0.18);
        }

        html[data-bs-theme="light"] .sidebar-brand .brand-text,
        html[data-bs-theme="light"] .app-sidebar .nav-link,
        html[data-bs-theme="light"] .app-sidebar .nav-icon {
            color: rgba(12, 29, 68, 0.96);
        }

        html[data-bs-theme="light"] .app-sidebar .nav-link {
            border-radius: 0.9rem;
            margin: 0.25rem 0;
            padding: 0.78rem 1.15rem;
            background: rgba(255, 255, 255, 0.82);
            transition: all 0.2s ease;
        }

        html[data-bs-theme="light"] .app-sidebar .nav-link.active,
        html[data-bs-theme="light"] .app-sidebar .nav-link:hover {
            background: rgba(13, 110, 253, 0.18);
            color: #0b3b95 !important;
            box-shadow: inset 4px 0 0 0 rgba(13, 110, 253, 0.45);
        }

        html[data-bs-theme="light"] .app-sidebar .nav-treeview .nav-link {
            padding-left: 2.4rem;
        }

        html[data-bs-theme="light"] .app-sidebar .nav-link .nav-icon {
            color: rgba(12, 29, 68, 0.75);
        }

        html[data-bs-theme="light"] .app-sidebar .nav-link.active .nav-icon,
        html[data-bs-theme="light"] .app-sidebar .nav-link:hover .nav-icon {
            color: #0b3b95;
        }

        html[data-bs-theme="light"] .card,
        html[data-bs-theme="light"] .small-box,
        html[data-bs-theme="light"] .user-menu .dropdown-menu,
        html[data-bs-theme="light"] .metric-box,
        html[data-bs-theme="light"] .card.card-glass {
            background: rgba(255, 255, 255, 0.98);
            border-color: rgba(209, 213, 219, 0.92);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        }

        html[data-bs-theme="light"] .card-title,
        html[data-bs-theme="light"] .breadcrumb-item a,
        html[data-bs-theme="light"] .breadcrumb-item.active,
        html[data-bs-theme="light"] .app-content-header h3,
        html[data-bs-theme="light"] .app-main,
        html[data-bs-theme="light"] body,
        html[data-bs-theme="light"] .user-menu .dropdown-menu,
        html[data-bs-theme="light"] .app-footer,
        html[data-bs-theme="light"] .metric-box h4,
        html[data-bs-theme="light"] .metric-box p {
            color: rgba(12, 29, 68, 0.95);
        }

        html[data-bs-theme="light"] .metric-box p {
            color: rgba(71, 85, 105, 0.88);
        }

        html[data-bs-theme="light"] .app-footer {
            background: rgba(251, 252, 255, 0.98);
            border-color: rgba(209, 213, 219, 0.85);
            color: rgba(71, 85, 105, 0.78);
        }

        html[data-bs-theme="light"] .app-footer {
            background: rgba(251, 252, 255, 0.98);
            border-color: rgba(13, 23, 68, 0.08);
            color: rgba(10, 25, 64, 0.74);
        }

        html[data-bs-theme="light"] .footer-glow {
            box-shadow: 0 0 18px rgba(13, 110, 253, 0.22);
        }

        @media (max-width: 992px) {
            .app-main { margin-left: 0; padding: 1.25rem .9rem 3rem; }
            .app-sidebar { position: relative; top: 0; width: 100%; height: auto; overflow: visible; }
            .sidebar-brand { padding: 0.85rem 1rem; }
            .app-content-header { padding-bottom: 1rem; }
            .app-content-header .row { gap: 1rem; }
            .app-content-header h3 { font-size: 1.4rem; }
            .app-content-header p { font-size: 0.95rem; }
            .breadcrumb { justify-content: flex-start; font-size: 0.85rem; }
            .metric-box { padding: 1.2rem; }
            .metric-box .icon { width: 2.5rem; height: 2.5rem; }
            .metric-box h4 { font-size: 1.75rem; }
            .metric-box p { font-size: 0.9rem; }
            .card.card-glass { padding: 1.4rem; }
            .card.card-glass .card-title { font-size: 1rem; }
            .card.card-glass p { font-size: 0.95rem; }
            .list-group-item { padding: 0.85rem 0.95rem; font-size: 0.92rem; }
            .btn { font-size: 0.92rem; }
            .app-main table { min-width: 100%; }
            .table-wrap { overflow-x: auto; }
        }

        @media (max-width: 768px) {
            .metric-box { min-height: auto; }
            .card.card-glass { border-radius: 1rem; }
            .app-content-header h3 { font-size: 1.25rem; }
            .app-content-header p, .breadcrumb { font-size: 0.85rem; }
            .list-group-item { padding: 0.8rem 0.9rem; }
        }

        @media (max-width: 576px) {
            .app-main { padding: 1rem .75rem 2.25rem; }
            .app-content-header { padding-bottom: 0.75rem; }
            .app-content-header .row { gap: 0.75rem; }
            .app-content-header h3 { font-size: 1.15rem; }
            .app-content-header p, .breadcrumb { font-size: 0.8rem; }
            .breadcrumb { flex-wrap: wrap; gap: 0.5rem; }
            .metric-box { padding: 1rem; }
            .metric-box .icon { width: 2.2rem; height: 2.2rem; }
            .metric-box h4 { font-size: 1.45rem; }
            .metric-box p { font-size: 0.82rem; }
            .card.card-glass { padding: 1.1rem; }
            .card.card-glass .card-title { font-size: 0.95rem; }
            .card.card-glass p { font-size: 0.88rem; }
            .btn { font-size: 0.86rem; padding: 0.5rem 0.9rem; }
            .list-group-item { padding: 0.7rem 0.85rem; font-size: 0.88rem; }
            .table-responsive { overflow-x: auto; }
            .table-responsive table { min-width: 100%; }
            .table-responsive img, .thumb { max-width: 120px; width: 100%; height: auto; }
            .app-sidebar .nav-link { font-size: 0.95rem; padding: 0.7rem 0.95rem; }
            .card-title, .app-content-header h3 { line-height: 1.2; }
        }
    </style>
    @stack('css')
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-white px-2" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list fs-5"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-flex">
                        <a href="{{ url('/admin/dashboard') }}" class="navbar-brand text-white fw-semibold ms-2">
                            Admin
                        </a>
                    </li>
                </ul>
                <form class="d-none d-lg-flex align-items-center ms-3 me-auto" style="min-width: 300px;">
                    <div class="input-group input-group-sm shadow-sm">
                        <span class="input-group-text border-0 bg-white bg-opacity-10 text-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input class="form-control form-control-dark border-0" type="search"
                            placeholder="Search analytics..." aria-label="Search">
                    </div>
                </form>
                <!--end::Start Navbar Links-->

                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                    <!--begin::Navbar Search-->

                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->

                    <!--begin::Color Mode Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="theme-toggle" aria-label="Toggle dark/light mode">
                            <i class="bi bi-sun-fill" id="theme-toggle-icon"></i>
                        </a>
                    </li>
                    <!--end::Color Mode Toggle-->

                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ auth()->user()->profile_image ? asset('profile-images/' . auth()->user()->profile_image) : asset('img/profile.jpg') }}" class="user-image rounded-circle shadow"
                                alt="{{ auth()->user()->name }}" />
                            <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header text-bg-primary">
                                <img src="{{ auth()->user()->profile_image ? asset('profile-images/' . auth()->user()->profile_image) : asset('img/profile.jpg') }}" class="rounded-circle shadow"
                                    alt="{{ auth()->user()->name }}" />
                                <p>
                                    {{ auth()->user()->name }}
                                    <small>{{ auth()->user()->hero_title ?? 'Principal Of Daulatpur College' }}</small>
                                </p>
                            </li>
                            <!--end::User Image-->
                            <!--begin::Menu Body-->

                            <!--end::Menu Body-->
                            <!--begin::Menu Footer-->
                            <li class="user-footer">
                                <a href="{{ url('/admin/profile') }}" class="btn btn-outline-secondary">Profile</a>
                                <form action="{{ url('/admin/logout') }}" method="get" class="d-inline float-end">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Log out</button>
                                </form>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <a href="{{ url('/') }}" class="brand-link d-flex align-items-center justify-content-between"
                    target="_blank">
                    <span class="brand-text fw-semibold">Visit Website</span>
                    <span class="badge bg-info text-dark">Live</span>
                </a>
            </div>
            <!--end::Sidebar Brand-->

            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2" aria-label="Main navigation">
                    <!--begin::Sidebar Menu-->


                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false"
                        id="navigation">

                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        @php
                            $blogOpen = request()->is('create-blog-news') || request()->is('admin/blog-list');
                        @endphp
                        <li class="nav-item {{ $blogOpen ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ $blogOpen ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Blog & News
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/create-blog-news') }}" class="nav-link {{ request()->is('create-blog-news') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Create Blog</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/blog-list') }}" class="nav-link {{ request()->is('admin/blog-list') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Blog List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        

                        <li class="nav-item">
                            <a href="{{ url('/admin/journals') }}" class="nav-link {{ request()->is('admin/journals*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-journal-bookmark"></i>
                                <p>Journals <span class="badge bg-info ms-2 text-dark">New</span></p>
                            </a>
                        </li>

                        @php $manageOpen = request()->is('admin/gallery*') || request()->is('admin/profile'); @endphp
                        <li class="nav-item {{ $manageOpen ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ $manageOpen ? 'active' : '' }}">
                                <i class="nav-icon bi bi-folder2-open"></i>
                                <p>
                                    Manage
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/admin/gallery') }}" class="nav-link {{ request()->is('admin/gallery*') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Gallery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/profile') }}" class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Profile Update</p>
                                    </a>
                                </li>
                            </ul>
                        </li>





                        <li class="nav-item">
                            <a href="/admin/logout" class="nav-link">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>Log out</p>
                            </a>
                        </li>
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->


        <!--begin::App Main-->
        <main class="app-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <!--end::App Main-->



        <!--begin::Footer-->
        <footer class="app-footer">
            <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline footer-glow">Developed By <a href="https://smartsoft.bd/"
                    target="_blank" class="text-decoration-none">Smart Soft Ltd.</a></div>
            <!--end::To the end-->
            <!--begin::Copyright-->
            <strong>
                Copyright &copy; Md. Sadikuzzaman&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none"></a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    @include('admin.admin_script')
    @stack('scripts')
</body>
<!--end::Body-->

</html>
