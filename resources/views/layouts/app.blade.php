<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Toko Faiz</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('template/img/favicon.png') }}" type="image/png" />

    <!-- Google Font: Inter -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <link
        href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet"
        type="text/css" />

    <!-- SB Admin 2 -->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet" />

    <!-- Animate.css -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Custom Style -->
    <style>
        /* ===== Body & Font ===== */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fc;
            color: #343a40;
        }

        /* ===== Navbar (Topbar) ===== */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        /* ===== Sidebar ===== */
        .navbar-nav.bg-white.sidebar {
            background-color: #ffffff;
            border-right: 1px solid #e3e6f0;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.03);
        }

        .sidebar-brand-text {
            color: #2c3e50;
            font-weight: 700;
            font-size: 1.25rem;
        }

        /* Sidebar links */
        .navbar-nav .nav-item .nav-link {
            color: #495057 !important;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
        }

        .navbar-nav .nav-item .nav-link:hover,
        .navbar-nav .nav-item.active .nav-link {
            color: #4e73df !important;
            background-color: #e7f0fe;
            border-radius: 0.375rem;
        }

        /* Sidebar icon colors */
        .navbar-nav .nav-item .nav-link i {
            font-size: 1.1rem;
            margin-right: 0.75rem;
            color: #6c757d;
            transition: color 0.2s ease;
        }

        .navbar-nav .nav-item .nav-link:hover i,
        .navbar-nav .nav-item.active .nav-link i {
            color: #4e73df;
        }

        /* Sidebar dividers */
        .sidebar-divider {
            border-top: 1px solid #dee2e6 !important;
        }

        .sidebar-heading {
            font-size: 0.85rem;
            text-transform: uppercase;
            color: #6c757d;
            padding: 0.75rem 1rem;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        /* ===== Cards ===== */
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.07);
            background-color: #fff;
        }

        /* ===== Buttons ===== */
        .btn-primary {
            background-color: #4e73df;
            border: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
        }

        .btn-secondary {
            background-color: #adb5bd;
            border: none;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background-color: #868e96;
        }

        /* ===== Footer ===== */
        .sticky-footer {
            background-color: #ffffff;
            color: #6c757d;
            font-size: 14px;
            box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.05);
        }

        /* ===== Scroll to top button ===== */
        .scroll-to-top {
            background-color: #4e73df;
            color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease;
        }

        .scroll-to-top:hover {
            background-color: #2e59d9;
        }

        /* ===== Loader ===== */
        #loader {
            background-color: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body id="page-top">
    <!-- Loader -->
    <div
        id="loader"
        style="
            position: fixed;
            width: 100%;
            height: 100%;
        ">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid animate__animated animate__fadeIn">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Faiz Ramdani 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
        class="modal fade"
        id="logoutModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button
                        class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button
                        class="btn btn-secondary"
                        type="button"
                        data-dismiss="modal">
                        Cancel
                    </button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Loader script -->
    <script>
        window.addEventListener('load', function () {
            document.getElementById('loader').style.display = 'none';
        });
    </script>
</body>

</html>
