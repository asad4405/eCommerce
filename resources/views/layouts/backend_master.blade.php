<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('backend_assets') }}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend_assets') }}/images/favicon.png" type="image/x-icon">
    <title>Fastkart - Dashboard</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="{{ asset('backend_assets') }}/css/linearicon.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/ratio.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/remixicon.css">

    <!-- Data Table css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/datatables.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/date-picker.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/bootstrap.css">

    <!-- Bootstrap-tag input css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/bootstrap-tagsinput.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vector-map.css">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="{{ asset('backend_assets') }}/css/vendors/slick.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/style.css">

    <!--Dropzon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/vendors/dropzone.css">

    <!-- Select2 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets') }}/css/select2.min.css">

    <!-- Selectize -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="m-0 header-wrapper">
                <div class="p-0 header-logo-wrapper">
                    <div class="logo-wrapper">
                        <a href="{{ route('dashboard') }}">
                            <img class="img-fluid main-logo" src="{{ asset('backend_assets') }}/images/logo/1.png"
                                alt="logo">
                            <img class="img-fluid white-logo"
                                src="{{ asset('backend_assets') }}/images/logo/1-white.png" alt="logo">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('backend_assets') }}/images/logo/1.png" class="img-fluid"
                                alt="">
                        </a>
                    </div>
                </div>

                <form class="form-inline search-full" action="javascript:void(0)" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Fastkart .." name="q" title="" autofocus>
                                <i class="close-search" data-feather="x"></i>
                                <div class="spinner-border Typeahead-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="p-0 nav-right col-6 pull-right right-header">
                    <ul class="nav-menus">
                        <li>
                            <span class="header-search">
                                <i class="ri-search-line"></i>
                            </span>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="notification-box">
                                <i class="ri-notification-line"></i>
                                <span class="badge rounded-pill badge-theme">4</span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <i class="ri-notification-line"></i>
                                    <h6 class="mb-0 f-18">Notitications</h6>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-primary"></i>Delivery processing <span
                                            class="pull-right">10 min.</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-success"></i>Order Complete<span
                                            class="pull-right">1 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                            class="pull-right">3 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                            class="pull-right">6 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0)">Check all notification</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <div class="mode">
                                <i class="ri-moon-line"></i>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                @if (auth()->user()->profile_photo)
                                    <img class="user-profile rounded-circle"
                                        src="{{ asset('uploads/profile_photos') }}/{{ auth()->user()->profile_photo }}"
                                        alt="not found">
                                @else
                                    <img class="user-profile rounded-circle"
                                        src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="">
                                @endif
                                <div class="user-name-hide media-body">
                                    <span>{{ auth()->user()->name }}</span>
                                    <p class="mb-0 font-roboto">{{ auth()->user()->role }}<i
                                            class="middle ri-arrow-down-s-line"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li>
                                    <a href="all-users.html">
                                        <i data-feather="users"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="order-list.html">
                                        <i data-feather="archive"></i>
                                        <span>Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.edit') }}">
                                        <i data-feather="settings"></i>
                                        <span>Profile Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            <i data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="{{ route('dashboard') }}" data-bs-original-title="" title="">
                            <img class="img-fluid for-white"
                                src="{{ asset('backend_assets') }}/images/logo/full-white.png" alt="logo">
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="{{ route('dashboard') }}">
                            <img class="img-fluid main-logo main-white"
                                src="{{ asset('backend_assets') }}/images/logo/logo.png" alt="logo">
                            <img class="img-fluid main-logo main-dark"
                                src="{{ asset('backend_assets') }}/images/logo/logo-white.png" alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>

                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"></li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                                        <i class="ri-home-line"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                @if (auth()->user()->role == 'Admin')
                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-list-check-2"></i>
                                            <span>Banner</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('banner') }}">Update Banner</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-list-check-2"></i>
                                            <span>Category</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('category.create') }}">Add New Category</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('category.index') }}">Category List</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-list-check-2"></i>
                                            <span>Delivery Cost Option</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('delivery.create') }}">Add New Delivery</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('delivery.index') }}">Delivery Cost List</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif

                                @if (auth()->user()->role == 'Vendor')
                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-list-settings-line"></i>
                                            <span>Attributes</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('attribute.create') }}">Add Attributes</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('attribute.index') }}">Attributes</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-store-3-line"></i>
                                            <span>Product</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('product.create') }}">Add New Product</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('product.index') }}">All Products</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-store-3-line"></i>
                                            <span>Products Stock</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('stock.create') }}">Add New Stocks</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('stock.index') }}">Product Inventory</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-price-tag-3-line"></i>
                                            <span>Coupons</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('coupon.create') }}">Create Coupon</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('coupon.index') }}">Coupon List</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Users</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{ route('all.users') }}">All users</a>
                                        </li>
                                        <li>
                                            <a href="add-new-user.html">Add new user</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-archive-line"></i>
                                        <span>Orders</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="order-list.html">Order List</a>
                                        </li>
                                        <li>
                                            <a href="order-detail.html">Order Detail</a>
                                        </li>
                                        <li>
                                            <a href="order-tracking.html">Order Tracking</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                        href="{{ route('index.review') }}">
                                        <i class="ri-star-line"></i>
                                        <span>Product Review</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-settings-line"></i>
                                        <span>Settings</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="{{ route('profile.edit') }}">Profile Setting</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                                        <i class="ri-file-chart-line"></i>
                                        <span>Reports</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="right-arrow" id="right-arrow">
                            <i data-feather="arrow-right"></i>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->

            @yield('content')



            <!-- footer start-->
            <div class="container-fluid">
                <footer class="footer">
                    <div class="row">
                        <div class="text-center col-md-12 footer-copyright">
                            <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- footer End-->
        </div>
        <!-- index body end -->

    </div>
    <!-- Page Body End -->
    </div>
    <!-- page-wrapper End-->

    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn--yes btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- latest js -->
    <script src="{{ asset('backend_assets') }}/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('backend_assets') }}/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="{{ asset('backend_assets') }}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{ asset('backend_assets') }}/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="{{ asset('backend_assets') }}/js/scrollbar/simplebar.js"></script>
    <script src="{{ asset('backend_assets') }}/js/scrollbar/custom.js"></script>

    <!-- bootstrap tag-input js -->
    <script src="{{ asset('backend_assets') }}/js/bootstrap-tagsinput.min.js"></script>
    <script src="{{ asset('backend_assets') }}/js/sidebar-menu.js"></script>

    <!-- Sidebar jquery -->
    <script src="{{ asset('backend_assets') }}/js/config.js"></script>

    <!-- tooltip init js -->
    <script src="{{ asset('backend_assets') }}/js/tooltip-init.js"></script>

    <!-- Plugins JS -->
    {{-- <script src="{{ asset('backend_assets') }}/js/sidebar-menu.js"></script> --}}
    <script src="{{ asset('backend_assets') }}/js/notify/bootstrap-notify.min.js"></script>
    <script src="{{ asset('backend_assets') }}/js/notify/index.js"></script>

    <!-- Apexchar js -->
    <script src="{{ asset('backend_assets') }}/js/chart/apex-chart/apex-chart1.js"></script>
    <script src="{{ asset('backend_assets') }}/js/chart/apex-chart/moment.min.js"></script>
    <script src="{{ asset('backend_assets') }}/js/chart/apex-chart/apex-chart.js"></script>
    <script src="{{ asset('backend_assets') }}/js/chart/apex-chart/stock-prices.js"></script>
    <script src="{{ asset('backend_assets') }}/js/chart/apex-chart/chart-custom1.js"></script>


    <!-- slick slider js -->
    <script src="{{ asset('backend_assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('backend_assets') }}/js/custom-slick.js"></script>

    <!-- customizer js -->
    <script src="{{ asset('backend_assets') }}/js/customizer.js"></script>

    <!-- ratio js -->
    <script src="{{ asset('backend_assets') }}/js/ratio.js"></script>

    <!-- sidebar effect -->
    <script src="{{ asset('backend_assets') }}/js/sidebareffect.js"></script>

    <!-- Theme js -->
    <script src="{{ asset('backend_assets') }}/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--Dropzon js -->
    <script src="{{ asset('backend_assets') }}/js/dropzone/dropzone.js"></script>
    <script src="{{ asset('backend_assets') }}/js/dropzone/dropzone-script.js"></script>

    <!-- ck editor js -->
    <script src="{{ asset('backend_assets') }}/js/ckeditor.js"></script>
    <script src="{{ asset('backend_assets') }}/js/ckeditor-custom.js"></script>

    <!-- select2 js -->
    <script src="{{ asset('backend_assets') }}/js/select2.min.js"></script>
    <script src="{{ asset('backend_assets') }}/js/select2-custom.js"></script>

    <!-- Data table js -->
    <script src="{{ asset('backend_assets') }}/js/jquery.dataTables.js"></script>
    <script src="{{ asset('backend_assets') }}/js/custom-data-table.js"></script>

    <!-- selectize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('footer_script')
</body>

</html>
