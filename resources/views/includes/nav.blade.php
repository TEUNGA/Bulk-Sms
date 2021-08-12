<div class='bgPrimary3 boxed header'>
    <div class="wrapper display-table roof">
        <div class="table-cell vertical-align-middle left-text supernav-menus">
            <!-- <div class="mrgRgt5 padding10TB floatLeft smallFontSize"><a href="https://mtn.cm/" target="_blank"><span class="colorCCC">Perso</span></a></div>
            <div class="mrgRgt5 padding10TB floatLeft smallFontSize"><a href="https://www.mtnbusiness.cm/" target="_blank"><span class="mrgRgt5 colorCCC">Business</span></a></div> -->
            <div class="mrgRgt5 padding10TB floatLeft smallFontSize padding5LR">
                <a href="/locale/fr"><span class="colorCCC">FR</span></a>
            </div>
            <div class="padding10TB floatLeft smallFontSize">
                <a href="/locale/en"><span class="colorCCC">EN</span></a>
            </div>			
            <div class="clear"></div>
        </div>
        <div class="table-cell vertical-align-middle right-text smallFontSize">
            @guest
                <a href="/login" class="mrgRgt10"><span class="colorCCC"><i class="fa fa-user"></i> <span class="button-text"> @lang('signin.login')</span></span></a>
            @else
                <a href="" class="mrgRgt10"><span class="colorCCC"><i class="fa fa-user"></i> <span class="button-text">Y'ello! {{auth()->user()->name}}</span></span></a>
            @endguest
            @auth
                <a class="mrgRgt10" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-in-alt colorCCC"></i><span class="colorCCC"> Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
        </div>
    </div>
</div>
<div id="mtn-header" class='bgYellowMTN boxed navmenu left-text' style="background: url('/images/mtn-ovale-rain-yellow-banner-right.png') center; background-size: cover;">
    <div class="wrapper">        
        <div class="paddingator">
            <div class="wide100 display-table">
                <div class="table-cell vertical-align-middle padding5TB" style="width:80px;">
                    <a href="/"><img alt="MTN Careers" src="/images/logos/mtn-logo.png" height="48" class="boxed bordWhite2 radius-1000s" /></a>
                </div>
            
                <div class="table-cell vertical-align-middle left-text supernav-menus header-nav-menus">
                    @auth
                    <a href="/" class="uppercase padding20 padding10TB menus-padding Bold radius-1000 ">
                        <span class="mrgRgt5 colorWhite header"><i class="fa fa-home"></i></span>
                        <span class="button-text colorPrimary3 header"> @lang('home.home')</span>
                    </a>
                    <a href="{{route('instructions') }}" class="uppercase padding20 padding10TB menus-padding Bold radius-1000 ">
                        <span class="mrgRgt5 colorWhite header"><i class="fa fa-edit"></i></span>
                        <span class="button-text colorPrimary3 header"> @lang('home.take_quiz')</span>
                    </a>
                </div>
                    @else
                        <a href="/" class="uppercase padding20 padding10TB menus-padding Bold radius-1000 ">
                            <span class="mrgRgt5 colorWhite header"><i class="fa fa-home"></i></span>
                            <span class="button-text colorPrimary3 header"> @lang('home.home')</span>
                        </a>
                        <a href="{{route('instructions') }}" class="uppercase padding20 padding10TB menus-padding Bold radius-1000 ">
                            <span class="mrgRgt5 colorWhite header"><i class="fa fa-edit"></i></span>
                            <span class="button-text colorPrimary3 header"> @lang('home.take_quiz')</span>
                        </a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <div class="height50 noDisplay" style="
    background: url(/images/mtn-ovale-big-yellow-top.png) top no-repeat; 
    background-size: auto;
    position: relative;
    top:0;
    "></div>
