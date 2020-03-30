<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NotificationChannels\WebPush\HasPushSubscriptions; //import the trait
use Illuminate\Notifications\Notifiable;

class Guest extends Model
{
    use Notifiable;
    use HasPushSubscriptions;

    protected $fillable = [
        'endpoint',
    ];

    /**
     * Determine if the given subscription belongs to this user.
     *
     * @param  \NotificationChannels\WebPush\PushSubscription $subscription
     * @return bool
     */
    public function pushSubscriptionBelongsToUser($subscription){
        return (int) $subscription->guest_id === (int) $this->id;
    }
}
