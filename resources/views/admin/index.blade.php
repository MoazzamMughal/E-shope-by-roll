@include('admin.component.header_links')
    <div class="container-scroller">

        {{-- Sidebar start  --}}
        
        @include('admin.component.sidenav')

        {{-- Sidebar End  --}}
        <div class="container-fluid page-body-wrapper">

            {{-- Navbar start  --}}
            @include('admin.component.mainnav')

            {{-- Navbar End  --}}
            @yield('content') 
            

            @yield('product-content')

            @yield('add-product-content')
           
            @yield('edit-product-content')

            @yield('all-categories')

            @yield('edit-categories')

            @yield('add-categories')

            
        </div>
    </div>

    @include('admin.component.footer_links')

