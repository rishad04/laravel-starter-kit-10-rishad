<div class="quixnav j-custom-style">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">

            @if( hasPermission('dashboard_read'))
            <li> <a href="{{route('dashboard')}}" aria-expanded="true"> <i class="icon-chart"></i> <span class="nav-text">{{___('menus.dashboard') }}</span> </a> </li>
            @endif

            <li class="{{ (request()->is('*user*','*role*')) ? 'mm-active' : '' }}">
                <a class="has-arrow" href="javascript:void()" aria-expanded="true"> <i class="icon-people"></i> <span class="nav-text">{{___('menus.user_roles')}}</span> </a>
                <ul aria-expanded="false">
                    <li> <a href="{{ route('user.index') }}" class="{{ (request()->is('*user*')) ? 'mm-active' : '' }}">{{___('menus.users')}}</a> </li>
                    <li> <a href="{{ route('role.index') }}" class="{{ (request()->is('*role*')) ? 'mm-active' : '' }}">{{___('menus.roles')}}</a> </li>
                </ul>
            </li>

            @if(hasPermission('todo_read'))
            <li> <a href="{{ route('todo.index') }}" aria-expanded="true"> <i class="icon-notebook"></i> <span class="nav-text">{{___('menus.todo_list')}}</span> </a> </li>
            @endif

            @if(hasPermission('activity_logs_read'))
            <li> <a href="{{route('activity.logs.index')}}" aria-expanded="true"> <i class="icon-list"></i> <span class="nav-text">{{___('menus.activity_logs')}}</span> </a> </li>
            @endif

            @if(hasPermission('login_activity_read'))
            <li> <a href="{{route('login.activity.index')}}" aria-expanded="false"> <i class="icon-list"></i> <span class="nav-text">{{ ___('menus.login_activity') }}</span> </a> </li>
            @endif

            @if(hasPermission('language_read'))
            <li> <a href="{{route('language.index')}}" aria-expanded="true"> <i class="icon-flag"></i> <span class="nav-text">{{___('menus.language')}}</span> </a> </li>
            @endif

            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-wrench"></i><span class="nav-text">{{ ___('menus.settings') }}</span></a>
                <ul aria-expanded="false">

                    @if(hasPermission('general_settings_read'))
                    <li> <a href="{{route('settings.general.index')}}">{{ ___('menus.general_settings') }}</a> </li>
                    @endif

                    @if(hasPermission('mail_settings_read'))
                    <li> <a href="{{route('settings.mail')}}">{{ ___('menus.mail_setting') }}</a> </li>
                    @endif

                    @if(hasPermission('recaptcha_settings_read'))
                    <li> <a href="{{route('settings.recaptcha.index')}}">{{ ___('menus.recaptcha') }}</a> </li>
                    @endif

                    @if(hasPermission('social_login_settings_update')== true)
                    <li> <a href="{{route('social.login.settings.index')}}">{{ ___('menus.social_login_settings') }}</a> </li>
                    @endif

                    @if(hasPermission('payout_setup_settings_read')== true)
                    <li> <a href="{{route('payout.setup.settings.index')}}">{{ ___('menus.payout_setup') }}</a> </li>
                    @endif

                    @if(hasPermission('database_backup_read'))
                    <li> <a href="{{route('database.backup.index')}}">{{ ___('menus.database_backup') }}</a> </li>
                    @endif

                </ul>
            </li>

        </ul>
    </div>
</div>
