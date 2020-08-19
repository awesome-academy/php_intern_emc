<?php

namespace App\Traits;

trait Statusable
{
    public function getStatusAttribute()
    {
        if ($this->attributes['status'] == config('enums.status.pending')) {
            return [
                'color' => 'badge-info',
                'status' => trans('admin.status_request.pending'),
                'value' => $this->attributes['status'],
            ];
        }
        if ($this->attributes['status'] == config('enums.status.accepted')) {
            return [
                'color' => 'badge-success',
                'status' => trans('admin.status_request.success'),
                'value' => $this->attributes['status'],
            ];
        }

        if ($this->attributes['status'] == config('enums.status.reject')) {
            return [
                'color' => 'badge-danger',
                'status' => trans('admin.status_request.cancel'),
                'value' => $this->attributes['status'],
            ];
        }
    }
}

