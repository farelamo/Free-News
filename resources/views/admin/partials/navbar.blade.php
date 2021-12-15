<div class="horizontal-bar">
    <div class="logo-box"><a href="#" class="logo-text">Connect</a></div>
    <a href="#" class="hide-horizontal-bar"><i class="material-icons">close</i></a>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="horizontal-bar-menu">
                    <ul>
                        <li><a href="/admin/home">Dashboard</a></li>
                        <li><a href="/admin/news">Berita</a></li>
                        <li><a href="/admin/category">Kategori</a></li>
                        <li><a href="/admin/messages">Pesan</a></li>
                        @if (Auth::user()->role == "admin")
                            <li><a href="/admin/user">Pengaturan Admin</a></li>
                        @endif
                        
                        {{-- <li><a href="#">Pages<i class="material-icons">keyboard_arrow_down</i></a>
                            <ul>
                                <li>
                                    <a href="404.html">404</a>
                                </li>
                                <li>
                                    <a href="500.html">500</a>
                                </li>
                                <li>
                                    <a href="sign-in.html">Sign In</a>
                                </li>
                                <li>
                                    <a href="sign-up.html">Sign Up</a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>