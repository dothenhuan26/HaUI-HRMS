<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});

//Broadcast::channel('Modules.User.Models.User.{id}', function ($user, $id) {
//    return (int)$user->id === (int)$id;
//});

Broadcast::channel('Modules.User.Models.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('public-chat', function ($user) {
    if ($user != null) {
        return [
            'id'     => $user->id,
            'name'   => $user->name,
            'avatar' => $user->avatar?->url ?? asset("assets/img/user.jpg"),
        ];
    }
    return false;
});
