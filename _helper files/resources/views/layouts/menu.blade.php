@inject('myForm','App\MyForm()')
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav1">
                <span class="sr-only">القائمة الرئيسية</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">
                <img alt="Brand" src="{{asset('images/logo.png')}}" width="100px">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="nav1">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clients العملاء<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="{{$myForm->ifActive('client.create')}}"><a href="{{route('client.create')}}"> Add New Client إضافة عميل</a></li>
                        <li class="{{$myForm->ifActive('client.search')}}"><a href="{{route('client.search')}}">Search بحث</a></li>
                    </ul>
                </li>


                <li class="{{ifActive('contract.index')}}"><a href="{{route('contract.index')}}">Latest Devices آخر الأجهزة</a></li>

                @if(\Illuminate\Support\Facades\Auth::check())
                    <li><a href="{{route('auth.logout')}}">Log out تسجيل خروج</a></li>
                @else
                    <li><a href="{{route('auth.login')}}">Log in تسجيل دخول</a></li>
                @endif

            </ul>
        </div>
    </div>
</nav>
