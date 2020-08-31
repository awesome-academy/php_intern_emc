<li class="dropdown no-arrow mx-1 show">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="true">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter notification_count">{{Auth::user()->unreadNotifications->count()}}</span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
         aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            {{trans('admin.notify.title')}}
            <a href="#" class="float-right js-btn-mark-all">{{trans('admin.notify.mark_all')}}</a>
        </h6>

        <div class="dropdown-divider"></div>
        <div id="all_notifications">
            @foreach(Auth::user()->notifications as $notification)
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{$notification->created_at}}</div>
                        @if ($notification->type === 'App\Notifications\OrderStatus')
                            <span class="font-weight-bold">{{trans('admin.notify.order_id')}} 
                                {{$notification->data['order_id']}} {{trans('admin.notify.content_order')}}
                        @else
                            <span class="font-weight-bold">{{$notification->data['product_name']}} 
                                {{trans('admin.notify.content')}}
                        @endif
                        <span class="badge {{$notification->data['color']}}">{{$notification->data['status']}}</span>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>

        <a class="dropdown-item text-center small js-btn-delete-noty" href="#">{{trans('admin.notify.delete_all')}}</a>
    </div>
</li>
