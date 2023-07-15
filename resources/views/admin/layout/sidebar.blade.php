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
        @if (isset($data))
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
        @if (isset($data2))
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

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-line-double'></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>
            <ul>
                <li> <a href="{{ route('slider') }}"><i class="bx bx-right-arrow-alt"></i>All Slider</a>
                </li>
                <li> <a href="{{ route('slider-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-code-alt'></i>
                </div>
                <div class="menu-title">Skill</div>
            </a>
            <ul>
                <li> <a href="{{ route('skill') }}"><i class="bx bx-right-arrow-alt"></i>All Skill</a>
                </li>
                <li> <a href="{{ route('skill-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Skill</a>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">About</div>
            </a>
            <ul>
                @php
                    $data3 = App\Models\AboutVideo::first();
                @endphp
                @if (isset($data3))
                    <li>
                        <a href="{{ route('about-video') }}"><i class="bx bx-right-arrow-alt"></i>About Video
                            Update</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('about-video-create') }}"><i class="bx bx-right-arrow-alt"></i>About Video
                            Create</a>
                    </li>
                @endif


                @php
                    $data4 = App\Models\Resume::first();
                @endphp
                @if (isset($data4))
                    <li>
                        <a href="{{ route('resume') }}"><i class="bx bx-right-arrow-alt"></i>Resume
                            Update</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('resume-create') }}"><i class="bx bx-right-arrow-alt"></i>Resume
                            Create</a>
                    </li>
                @endif

                @php
                    $data5 = App\Models\Program::first();
                @endphp
                @if (isset($data5))
                    <li>
                        <a href="{{ route('program-know') }}"><i class="bx bx-right-arrow-alt"></i>Program Know
                            Update</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('program-know-create') }}"><i class="bx bx-right-arrow-alt"></i>Program Know
                            Create</a>
                    </li>
                @endif
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-code'></i>
                </div>
                <div class="menu-title">Project</div>
            </a>
            <ul>
                <li> <a href="{{ route('project') }}"><i class="bx bx-right-arrow-alt"></i>All Project</a>
                </li>
                <li> <a href="{{ route('project-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Project</a>
                </li>
            </ul>
        </li>







    </ul>
    <!--end navigation-->
</div>
