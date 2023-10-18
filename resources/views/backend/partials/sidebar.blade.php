<div class="quixnav j-custom-style">
  <div class="quixnav-scroll">
    <ul class="metismenu" id="menu">
      <li>
        <a href="javascript:void()" aria-expanded="true">
          <i class="icon icon-chart-bar-33"></i>
          <span class="nav-text">{{__('menus.dashboard')}}</span>
        </a>
      </li>

      <li>
        <a class="has-arrow {{ (request()->is('admin/role*','admin/user*','admin/staff*')? 'mm-active':'') }}" href="javascript:void()" aria-expanded="false">
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
          <li>
            <a href="{{ route('staff.index') }}">{{__('menus.staffs')}}</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="javascript:void()" aria-expanded="true">
          <i class="icon-notebook"></i>
          <span class="nav-text">{{__('menus.todo_list')}}</span>
        </a>
      </li>

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

      <li>
        <a href="javascript:void()" aria-expanded="true">
          <i class="fa fa-language"></i>
          <span class="nav-text">{{__('menus.language')}}</span>
        </a>
      </li>

      <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
          <i class="icon-wrench"></i>
          <span class="nav-text">{{__('menus.setting')}}</span>
        </a>
        <ul aria-expanded="false">
          <li>
            <a href="./app-profile.html">{{__('menus.general_settings')}}</a>
          </li>
          <li>
            <a href="#">{{__('menus.mail_settings')}}</a>
          </li>
          <li>
            <a href="#">{{__('menus.recapcha')}}</a>
          </li>
        </ul>
      </li>

    </ul>
  </div>
</div>
