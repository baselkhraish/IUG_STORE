<div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('adminasset/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('adminasset/assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('adminasset/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('adminasset/assets/images/logo-light.png') }}" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        {{-- Menu --}}
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                        {{-- Dashboards --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link" data-key="t-analytics"> <i class="mdi mdi-cart"></i> <span data-key="t-dashboards">Dashboards</span> </a>
                        </li>

                        {{-- Stores --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarStores" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarStores">
                                <i class="mdi mdi-store"></i> <span data-key="t-Stores">Stores</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarStores">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.store.index') }}" class="nav-link" data-key="t-analytics"> All Stores </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.store.create') }}" class="nav-link" data-key="t-crm"> Add Store </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- Products --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#Products" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="Products">
                                <i class="mdi mdi-reproduction"></i> <span data-key="t-Products">Products</span>
                            </a>
                            <div class="collapse menu-dropdown" id="Products">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.product.index') }}" class="nav-link" data-key="t-analytics"> All Products </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.product.create') }}" class="nav-link" data-key="t-crm"> Add Product </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        {{-- Purchase Transaction --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#Transaction" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="Transaction">
                                <i class="mdi mdi-cart"></i> <span data-key="t-Transaction">Payment</span>
                            </a>
                            <div class="collapse menu-dropdown" id="Transaction">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.transaction') }}" class="nav-link" data-key="t-analytics"> Purchase Transaction </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.total') }}" class="nav-link" data-key="t-crm"> Total Of Purchases </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- Trash --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.trash') }}" class="nav-link" data-key="t-analytics"> <i class="ri-delete-bin-line"></i> <span data-key="t-Trash">Trash</span> </a>

                        </li>


                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
