<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin-dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dasboard</div>
            </a>
        </li>

        @php
            $data = App\Models\SocialMedia::first();
        @endphp
        @if(isset($data))
        <li>
            <a href="{{ route('social-media') }}">
                <div class="parent-icon"><i class='lni lni-chrome'></i>
                </div>
                <div class="menu-title">Social Media Update</div>
            </a>
        </li>
        @else
        <li>
            <a href="{{ route('social-media-create') }}">
                <div class="parent-icon"><i class='lni lni-chrome'></i>
                </div>
                <div class="menu-title">Social Media Create</div>
            </a>
        </li>
        @endif

        @php
            $data2 = App\Models\NameContent::first();
        @endphp
        @if(isset($data2))
        <li>
            <a href="{{ route('name-content') }}">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Name and Content Update</div>
            </a>
        </li>
        @else
        <li>
            <a href="{{ route('name-content-create') }}">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Name and Content Create</div>
            </a>
        </li>
        @endif





    </ul>
    <!--end navigation-->
</div>
