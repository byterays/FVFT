<nav class="horizontalMenu clearfix d-md-flex">
    <ul class="horizontalMenu-list">
        @foreach ($primary_menu as $item)      
        <li><a href="{{$item->link}}">{{$item->title}}</a></li>
        @endforeach
        @auth
        <li><a href="#">My Dashboard <span class="fa fa-caret-down m-0"></span></a>
            <ul class="sub-menu">
                <li>
                    <a href="mydash.html">My Dashboard</a>
                </li>
                <li>
                    <a href="myjobs.html">My Jobs</a>
                </li>
                <li>
                    <a href="myfavorite.html">Favorite Jobs</a>
                </li>
                <li>
                    <a href="manged.html">Manged Jobs</a>
                </li>
                <li>
                    <a href="payments.html">Payments</a>
                </li>
                <li>
                    <a href="orders.html"> Orders</a>
                </li>
                <li>
                    <a href="settings.html"> Settings</a>
                </li>
                <li>
                    <a href="tips.html">Tips</a>
                </li>
            </ul>
        </li>
        @endauth

    </ul>
</nav>