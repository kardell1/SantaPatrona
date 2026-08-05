<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Models{
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Carbon;

    /**
     * @property int $id
     * @property string|null $code
     * @property string $name
     * @property string|null $direction
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property-read Collection<int, User> $users
     * @property-read int|null $users_count
     *
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereCode($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereDirection($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Branch whereUpdatedAt($value)
     */
    class Branch extends \Eloquent {}
}

namespace App\Models{
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Notifications\DatabaseNotificationCollection;
    use Illuminate\Support\Carbon;
    use Modules\IAM\Models\Role;

    /**
     * @property int $id
     * @property bool $is_locked
     * @property Carbon|null $email_verified_at
     * @property string $username
     * @property string $password
     * @property string|null $remember_token
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property int $role_id
     * @property-read Collection<int, Branch> $branches
     * @property-read int|null $branches_count
     * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
     * @property-read int|null $notifications_count
     * @property-read Role $role
     *
     * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsLocked($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRoleId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
     */
    class User extends \Eloquent {}
}
