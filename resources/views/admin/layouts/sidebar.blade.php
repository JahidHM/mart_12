<div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{route('admin_dashboard')}}">Admin Panel</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="index.html"></a>
                </div>

                <ul class="sidebar-menu">

                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_dashboard')}}"><i class="fas fa-clipboard"></i> <span>Dashboard</span></a></li>
                     <li class="{{ Request::is('admin/profile') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_profile')}}"><i class="fas fa-user"></i><span>Profile</span></a></li>
                   
                   <li class="nav-item dropdown {{ Request::is('admin/user*') ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown">
                            <i class="fas fa-users"></i>
                            <span>Manage Users</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin/user/') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('admin_user_index')}}">
                                    <i class="fas fa-globe-americas"></i>
                                    All Users
                                </a>
                            </li>
                            
                                 <li class="{{ Request::is('admin/user/create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('admin_user_create')}}">
                                    <i class="fas fa-user-plus"></i>
                                    Add Users 
                                </a>
                            </li>
                        </ul>
                        
                        </li>

                         <li class="nav-item dropdown {{ request()->is(['admin/product-category/*', 'admin/product/*']) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown">
                            <i class="fas fa-folder"></i>
                            <span>Manage Products</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('/product-category') ? 'active' : ''  }}">
                                <a class="nav-link" href="{{route('admin_product_category_index')}}">
                                    <i class="fas fa-window-restore"></i>
                                    Categories
                                </a>
                            </li>
                            
                                 <li class="{{ Request::is('/product-category/create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('admin_product_category_create')}}">
                                    <i class="fas fa-cart-plus"></i>
                                    Add  Categories
                                </a>
                            </li>
                             <li class="{{ Request::is('/product/create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('admin_product_create')}}">
                                    <i class="fas fa-cart-plus"></i>
                                    Creat Product 
                                </a>
                            </li>
                            <li class="{{ Request::is('/product/index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('admin_product_index')}}">
                                    <i class="fas fa-window-restore"></i>
                                    All Products
                                </a>
                            </li>
                        </ul>
                        
                        </li>
                        
                    </ul>

            </aside>
        </div>