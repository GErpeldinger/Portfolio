<?php

namespace App\Exception;

use RuntimeException;

/**
 * Triggered when new password is the same as the ancient one when changing password.
 */
class IdenticalPasswordException extends RuntimeException
{

}
