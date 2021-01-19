<header id="header" class="site-header">
    <div class="top-header clearfix">
        <div class="container">
            <ul class="socials-top">
                <li><a target="_Blank" href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a target="_Blank" href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a target="_Blank" href="https://www.google.com"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a target="_Blank" href="http://www.linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a target="_Blank" href="https://www.youtube.com"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
            <div class="phone">Call Now +234 812 731 2106</div>
        </div>
    </div>
    <div class="content-header">
        <div class="container">
            <div class="site-brand">
                <a href="index.html"><img src="images/assets/logo.png" alt=""></a>
            </div><!-- .site-brand -->
            <div class="right-header">					
                <nav class="main-menu">
                    <button class="c-hamburger c-hamburger--htx"><span></span></button>
                    <ul>
                        <li>
                            <a href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li>
                            <a href="index.html#">About</a>
                        </li>
                        <li>
                            <a href="{{ route('campaigns') }}">Campaigns</a>
                        </li>
                        <li>
                            <a href="index.html#">Clubs</a>
                        </li>
                        <li><a href="contact_us.html">Contact</a></li>
                        @if(auth()->user())
                            <li>
                                <a href="#" class="btn-primary text-white">Account<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('dashboard') }}#mycampaigns">My Campaigns</a></li>
                                    <li><a href="{{ route('dashboard') }}#myclubs">My Clubs</a></li>
                                    <li><a href="#">My Account</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li> <a href="{{ route('login') }}" class="btn-primary text-white">User Login<i class="fa fa-padlock" aria-hidden="true"></i></a></li>
                        @endif
                    </ul>
                </nav><!-- .main-menu -->
                <div class="login login-button" style="margin-right: 50px;">
						    <a href="#"></a>
				</div>
            </div><!--. right-header -->
        </div><!-- .container -->
    </div>
</header><!-- .site-header -->