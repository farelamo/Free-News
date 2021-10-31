<!DOCTYPE html>
<html lang="en">
    @include('admin/partials/head')
    <body>
        
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="page-container">
            
                @include('admin/partials/headnav')
                @include('admin/partials/navbar')

                <div class="page-content">
                    @yield('isi')
                </div>
                @include('admin/partials/footer')
            </div>
        </div>
        
        @include('admin/partials/script')
    </body>
</html>