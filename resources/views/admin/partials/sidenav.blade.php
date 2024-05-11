<div class="sidebar {{ sidebarVariation()['selector'] }} {{ sidebarVariation()['sidebar'] }} {{ @sidebarVariation()['overlay'] }} {{ @sidebarVariation()['opacity'] }}"
     data-background="{{getImage('assets/admin/images/sidebar/2.jpg','400x800')}}">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="#" class="sidebar__main-logo"><img
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="@lang('image')"></a>
            <a href="#" class="sidebar__logo-shape"><img
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" alt="@lang('image')"></a>
            <button type="button" class="navbar__expand"></button>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('admin.dashboard')}}">
                    <a href="{{ route('dashboard') }}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('voiture*',3)}}">
                        <i class="menu-icon las la-car-side"></i>
                        <span class="menu-title">Voitures</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('types*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive(['types.index','types.add','types.edit'])}}">
                                <a href="{{route('type.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">Liste Types</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('voiture.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Liste Voitures')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('autorisations.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Autorisations de circulation')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.bookings*',3)}}">
                        <i class="menu-icon la la-dollar"></i>
                        <span class="menu-title">Reservations</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.bookings*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item">
                                <a href="{{route('bookings.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title {{menuActive('bookings.index')}}">Liste Reservations</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('bookings.create')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title {{menuActive('bookings.create')}}">Ajouter Reservation</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.clients*',3)}}">
                        <i class="menu-icon la la-user"></i>
                        <span class="menu-title">Clients</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.clients*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive(['admin.clients.index','admin.clients.add','admin.clients.edit'])}}">
                                <a href="{{route('clients.index')}}" class="nav-link">
                                    <i class="menu-icon la la-user"></i>
                                    <span class="menu-title">Liste Clients</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive(['admin.clients.index','admin.clients.add','admin.clients.edit'])}}">
                                <a href="{{route('clients.create')}}" class="nav-link">
                                    <i class="menu-icon la la-user"></i>
                                    <span class="menu-title">Ajouter Client</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.settings*',3)}}">
                        <i class="menu-icon la la-gear"></i>
                        <span class="menu-title">Paramétres</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.settings*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item">
                                <a href="{{ route('options.index') }}" class="nav-link">
                                    <i class="menu-icon la la-gear"></i>
                                    <span class="menu-title">Options supplémentaires</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{ route('convoyages.index') }}" class="nav-link">
                                    <i class="menu-icon la la-gear"></i>
                                    <span class="menu-title">Convoyages</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{ route('companies.edit', auth()->user()->company ? auth()->user()->company->id : '') }}" class="nav-link">
                                    <i class="menu-icon la la-gear"></i>
                                    <span class="menu-title">Information de Societe</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.charges*',3)}}">
                        <i class="menu-icon la la-money"></i>
                        <span class="menu-title">Charges</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.charges*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item">
                                <a href="{{route('visitetechnique.index')}}" class="nav-link">
                                    <i class="menu-icon la la-eye"></i>
                                    <span class="menu-title">Visites Technique</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('assurances.index')}}" class="nav-link">
                                    <i class="menu-icon la la-eye"></i>
                                    <span class="menu-title">Assurances</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('vignettes.index')}}" class="nav-link">
                                    <i class="menu-icon la la-eye"></i>
                                    <span class="menu-title">Vignettes</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('vidanges.index')}}" class="nav-link">
                                    <i class="menu-icon la la-eye"></i>
                                    <span class="menu-title">Vidanges</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('pannes.index')}}" class="nav-link">
                                    <i class="menu-icon la la-eye"></i>
                                    <span class="menu-title">Pannes</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('chains.index')}}" class="nav-link">
                                    <i class="menu-icon la la-eye"></i>
                                    <span class="menu-title">Chaine distributions</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('centreVisites.index')}}" class="nav-link">
                                    <i class="menu-icon la la-eye"></i>
                                    <span class="menu-title">Centres Visites</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a href="{{route('assureurs.index')}}" class="nav-link">
                                    <i class="menu-icon la la-eye"></i>
                                    <span class="menu-title">Assureur</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- sidebar end -->
