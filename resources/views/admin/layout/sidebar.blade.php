<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">parametre</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{url('admin/update-admin-details')}}">Profile</a></li>
                    <li><a href="{{url('admin/update-admin-password')}}">modifier mot de passe </a></li>
                </ul>
            </li>


            <li><a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">gerer utilisateurs </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{url('admin/get-users')}}">les utilisateurs</a></li>


                </ul>
            </li>
         <li>
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                <i class="flaticon-381-layer-1"></i>
                <span class="nav-text">gerer parking </span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{route('admin.parkings.index')}}">les messages</a></li>


            </ul>
        </li>

        <li>
            <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
            <i class="flaticon-381-layer-1"></i>
            <span class="nav-text">gerer place </span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{route('admin.places.index')}}"> places</a></li>


        </ul>
    </li>

        </ul>
    </div>
</div>
