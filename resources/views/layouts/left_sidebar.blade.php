@php
    $logo = \App\Models\BusinessSetting::latest()
        ->get()
        ->first();
@endphp


<div class="sidebar-wrapper">
    <div>

        <div class="logo-wrapper text-center border-bottom" style="padding: 3px 20px !important;"><a
                href="{{ route('/') }}"><img class="img-fluid for-light" style="height: 70px !important;"
                    src="{{ asset($logo->logo) }}" alt=""><img class="img-fluid for-dark"
                    style="height: 70px !important;" src="{{ asset($logo->logo) }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('/') }}"><img class="img-fluid"
                    src="{{ asset('/backend/assets/images/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{ route('/') }}"><img class="img-fluid"
                                src="{{ asset('backend/assets/images/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"> </i></div>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('/') }}">
                            <i class="nav-icon fa fa-home"></i>
                            <span class="fw-bold">Dashbaord</span>
                        </a>
                    </li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path d="M11.1437 17.8829H4.67114" stroke="#130F26" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.205 17.8839C15.205 19.9257 15.8859 20.6057 17.9267 20.6057C19.9676 20.6057 20.6485 19.9257 20.6485 17.8839C20.6485 15.8421 19.9676 15.1621 17.9267 15.1621C15.8859 15.1621 15.205 15.8421 15.205 17.8839Z"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M14.1765 7.39439H20.6481" stroke="#130F26" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.1153 7.39293C10.1153 5.35204 9.43436 4.67114 7.39346 4.67114C5.35167 4.67114 4.67078 5.35204 4.67078 7.39293C4.67078 9.43472 5.35167 10.1147 7.39346 10.1147C9.43436 10.1147 10.1153 9.43472 10.1153 7.39293Z"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg><span>Setting</span>
                            <div class="according-menu"><i class="fas-solid fas-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: none;">
                            @if ($user->hasPermissionTo('settings') || $user->type == 'admin')
                                <li><a class="submenu-title" href="{{ route('setting') }}">Genarel Setting
                                        <span class="sub-arrow"><i class="fa fa-angle-right"></i></span>
                                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                    </a></li>
                            @endif
                            @if ($user->hasPermissionTo('create.role') || $user->type == 'admin')
                                <li><a class="submenu-title" href="{{ route('role') }}">Role and Permission<span
                                            class="sub-arrow"><i class="fa fa-angle-right"></i></span>
                                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                    </a></li>
                            @endif
                            @if ($user->hasPermissionTo('create.role') || $user->type == 'admin')
                                <li><a class="submenu-title" href="{{ route('crm') }}"> (CRM)<span
                                            class="sub-arrow"><i class="fa fa-angle-right"></i></span>
                                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                    </a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path d="M11.1437 17.8829H4.67114" stroke="#130F26" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.205 17.8839C15.205 19.9257 15.8859 20.6057 17.9267 20.6057C19.9676 20.6057 20.6485 19.9257 20.6485 17.8839C20.6485 15.8421 19.9676 15.1621 17.9267 15.1621C15.8859 15.1621 15.205 15.8421 15.205 17.8839Z"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M14.1765 7.39439H20.6481" stroke="#130F26" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.1153 7.39293C10.1153 5.35204 9.43436 4.67114 7.39346 4.67114C5.35167 4.67114 4.67078 5.35204 4.67078 7.39293C4.67078 9.43472 5.35167 10.1147 7.39346 10.1147C9.43436 10.1147 10.1153 9.43472 10.1153 7.39293Z"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg><span>CDRS Compair</span>
                            <div class="according-menu"><i class="fas-solid fas-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: none;">
                            <li><a class="submenu-title" href="{{ route('importView') }}">Compair
                                    <span class="sub-arrow"><i class="fa fa-angle-right"></i></span>
                                    <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                </a></li>
                            <li><a class="submenu-title" href="{{ route('compairlist') }}">Compair list
                                    <span class="sub-arrow"><i class="fa fa-angle-right"></i></span>
                                    <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                                </a></li>
                        </ul>

                    </li>


                    {{-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav active" href="">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path d="M8.54248 9.21777H15.3975" stroke="#130F26" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.9702 2.5C5.58324 2.5 4.50424 3.432 4.50424 10.929C4.50424 19.322 4.34724 21.5 5.94324 21.5C7.53824 21.5 10.1432 17.816 11.9702 17.816C13.7972 17.816 16.4022 21.5 17.9972 21.5C19.5932 21.5 19.4362 19.322 19.4362 10.929C19.4362 3.432 18.3572 2.5 11.9702 2.5Z"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg><span></span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li> --}}

                    <ul>

            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
