<?php

namespace App\Exception;

use RuntimeException;

/**
 * Triggered when the new password and the repeated new password are the same when changing password.
 */
class DifferentPasswordException extends RuntimeException
{

}
