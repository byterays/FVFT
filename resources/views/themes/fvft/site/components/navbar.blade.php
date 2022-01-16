<nav class="horizontalMenu clearfix d-md-flex">
    <ul class="horizontalMenu-list">
        @foreach ($primary_menu as $item)      
        <li><a href="{{$item->link}}">{{$item->title}}</a></li>
        @endforeach
        @auth
        <li><a href="#">My Dashboard <span class="fa fa-caret-down m-0"></span></a>
            <ul class="sub-menu">
                @if(auth()->user()->user_type=='candidate')
                <li>
                    <a href="/candidate/">My Dashboard</a>
                </li>
                <li>
                    <a href="/candidate/profile">Profile</a>
                </li>
                <li>
                    <a href="/candidate/jobs">My Jobs</a>
                </li>
                <li>
                    <a href="/candidate/settings">Settings</a>
                </li>
                @elseif(auth()->user()->user_type=='compeny')
                <li>
                    <a href="/compeny/">My Dashboard</a>
                </li>
                @endif
                <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm text-white">
                        <span class="icon1 " style="background: #ffffff00;color: #f3f6ff;"><i class="typcn typcn-power-outline fs-20"></i></span> Logout
                    </button>
                    </form>
                </li>
            </ul>
        </li>
        @endauth

    </ul>
</nav>