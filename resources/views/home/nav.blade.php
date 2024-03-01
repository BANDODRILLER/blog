<ul class="outer-nav">
    <li class="is-active">Home</li>
    <li>Works</li>
    <li>About</li>
    <li>Contact</li>
    <li>Get tickets</li>
    @if (Route::has('login'))
        @auth
            <div class="nav-item dropdown">
                <a style="color: white; font-size: 1.2rem"  class="btn-outline-sm dropdown-toggle" href="user/profile" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    {{ $user->name }}
                </a>

            </div>
        @else
            <span class="nav-item">
            <a style="color: white; font-size: 1.2rem" class="btn-outline-sm" href="/login">LOG IN</a> <br>
        </span>
            @if (Route::has('register'))
                <span class="nav-item">
                <a style="color: white; font-size: 1.2rem" class="btn-outline-sm" href="/register">SIGN UP</a>
            </span>
            @endif
        @endif
    @endif
</ul>
</div>
