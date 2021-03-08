<h4 style="margin-left:20px;">{{ __('messages.creator_manage') }}</h4>
  <ul class="nav">
    <li class="nav-item {{ Request::is('new_creators*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('new_creators*') ? 'active' : '' }}" href="{{ route('new_creators.index') }}">
            <i class="fa fa-user-circle nav-icon mr-4"></i>
            <span>{{ __('messages.new_register_request_list') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('creators*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('creators*') ? 'active' : '' }}" href="{{ route('creators.index') }}">
            <i class="fa fa-user-circle-o nav-icon mr-4"></i>
            <span>{{ __('messages.current_creator_list') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('delete_creators*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('delete_creators*') ? 'active' : '' }}" href="{{ route('delete_creators.index') }}">
            <i class="fa fa-user-o nav-icon mr-4"></i>
            <span>{{ __('messages.deleted_creator_list') }}</span>
        </a>
    </li>
    <!-- <li class="nav-item {{ Request::is('monthly_subscriptions*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('monthly_subscriptions*') ? 'active' : '' }}" href="{{ route('monthly_subscriptions.index') }}">
            <i class="fa fa-user-o nav-icon mr-4"></i>
            <span>{{ __('messages.monthly_subscription_list') }}</span>
        </a>
    </li> -->
  </ul>

<h4 style="margin-left:20px;">{{ __('messages.user_manage') }}</h4>
  <ul class="nav">
    <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
            <i class="fa fa-user-circle-o nav-icon mr-4"></i>
            <span>{{ __('messages.current_user_list') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('delete_users*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('delete_users*') ? 'active' : '' }}" href="{{ route('delete_users.index') }}">
            <i class="fa fa-user-o nav-icon mr-4"></i>
            <span>{{ __('messages.deleted_user_list') }}</span>
        </a>
    </li>
  </ul>

<h4 style="margin-left:20px;">{{ __('messages.payment_manage') }}</h4>
  <ul class="nav">
    <li class="nav-item {{ Request::is('admin_payment*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('admin_payment*') ? 'active' : '' }}" href="{{ route('admin_payment.index') }}">
            <i class="fa fa-user-circle nav-icon mr-4"></i>
            <span>{{ __('messages.admin_payment') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('creator_payment*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('creator_payment*') ? 'active' : '' }}" href="{{ route('creator_payment.index') }}">
            <i class="fa fa-user-circle-o nav-icon mr-4"></i>
            <span>{{ __('messages.creator_payment') }}</span>
        </a>
    </li>
  </ul>
