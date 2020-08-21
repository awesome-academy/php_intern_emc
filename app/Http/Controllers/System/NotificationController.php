<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class NotificationController extends Controller
{
    public function markAllRead()
    {
        try {
            Auth::user()->unreadNotifications()->get()->markAsRead();
            return response()->json(['message' => trans('admin.noti.mark_all_success')]);
        } catch (Exception $exception) {
            return response()->json(['message' => trans('admin.noti.mark_all_success')]);
        }
    }

    public function deleteAllNotificationByUser()
    {
        try {
            Auth::user()->notifications()->delete();
            return response()->json(['message' => trans('admin.noti.mark_all_success')]);
        } catch (Exception $exception) {
            return response()->json(['message' => trans('admin.noti.mark_all_success')]);
        }
    }
}
