<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
        <h4> Admin Panel </h4>
    </div>
    <ul class="c-sidebar-nav ps ps--active-y">

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ 'home' }}">
                <span class="c-sidebar-nav-icon">
                    <i class="fa fa-settings" style="color: #339af0;" aria-hidden="true"></i>
                </span>Dashboard</a>
        </li>
        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <span class="c-sidebar-nav-icon">
                    <i class="fa fa-circle"></i>
                </span>
                Data Center
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('packages') }}">Package</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('theatertype') }}">Theater Type</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('theater') }}">Theater</a></li>
            </ul>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ url('merchant') }}">
                <span class="c-sidebar-nav-icon">
                    <i class="fa fa-circle" aria-hidden="true"></i>
                </span>Merchant
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ url('merchant-theater') }}">
                <span class="c-sidebar-nav-icon">
                    <i class="fa fa-circle" aria-hidden="true"></i>
                </span>Merchant Theater Linkage
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <span class="c-sidebar-nav-icon">
                    <i class="fa fa-circle" aria-hidden="true"></i>
                </span>Logout
            </a>
        </li>

    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>