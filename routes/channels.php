<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('posts', function () {
    return auth()->check();
});
