<div class="quixnav j-custom-style">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">

            @if( hasPermission('dashboard_read') == true)
            <li> <a href="{{route('dashboard')}}" aria-expanded="true"> <i class="icon icon-chart-bar-33"></i> <span class="nav-text">{{__('menus.dashboard') }}</span> </a> </li>
            @endif

            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="true">
                    <i class="icon-people"></i>
                    <span class="nav-text">{{__('menus.user_roles')}}</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ route('user.index') }}">{{__('menus.users')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('role.index') }}">{{__('menus.roles')}}</a>
                    </li>
                </ul>
            </li>
            @if(hasPermission('todo_read') == true)
                <li>
                    <a href="{{ route('todo.index') }}" aria-expanded="true">
                        <i class="icon-notebook"></i>
                        <span class="nav-text">{{__('menus.todo_list')}}</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="javascript:void()" aria-expanded="true">
                    <i class="icon-list"></i>
                    <span class="nav-text">{{__('menus.activity_logs')}}</span>
                </a>
            </li>

            <li>
                <a href="javascript:void()" aria-expanded="true">
                    <i class="icon-docs"></i>
                    <span class="nav-text">{{__('menus.backup')}}</span>
                </a>
            </li>

            @if(hasPermission('language_settings_read') == true)
            <li> <a href="javascript:void()" aria-expanded="true"> <i class="fa fa-language"></i> <span class="nav-text">{{__('menus.language')}}</span> </a> </li>
            @endif

            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-wrench"></i><span class="nav-text">{{ __('menus.settings') }}</span></a>
                <ul aria-expanded="false">

                    @if(hasPermission('general_settings_read') == true)
                    <li> <a href="{{route('settings.general.index')}}">{{ __('menus.general_settings') }}</a> </li>
                    @endif

                    @if(hasPermission('email_settings_read') == true)
                    <li> <a href="{{route('settings.mail.index')}}">{{ __('menus.mail_setting') }}</a> </li>
                    @endif

                    @if(hasPermission('recaptcha_settings_read') == true)
                    <li> <a href="{{route('settings.recaptcha.index')}}">{{ __('menus.recaptcha') }}</a> </li>
                    @endif

                    @if(hasPermission('sms_settings_read') == true)
                    <li> <a href="{{route('sms-settings.index')}}">{{ __('menus.sms_settings') }}</a> </li>
                    @endif

                    @if(hasPermission('social_login_settings_update')== true)
                    <li> <a href="{{route('social.login.settings.index')}}">{{ __('menus.social_login_settings') }}</a> </li>
                    @endif

                    @if(hasPermission('payout_setup_settings_read')== true)
                    <li> <a href="{{route('payout.setup.settings.index')}}">{{ __('menus.payout_setup') }}</a> </li>
                    @endif

                    @if(hasPermission('database_backup_read') == true)
                    <li> <a href="{{route('database.backup.index')}}">{{ __('menus.database_backup') }}</a> </li>
                    @endif

                </ul>
            </li>

        </ul>
    </div>
</div>
