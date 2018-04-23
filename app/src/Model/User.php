<?php declare(strict_types=1);
/**
 * PHP version 7
 * User Model
 */

namespace Demo\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Map user to model
 * @package Demo\Model
 */
class User extends Model
{
    protected $table = 'user';
}
