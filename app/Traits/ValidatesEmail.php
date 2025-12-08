<?php

namespace App\Traits;

trait ValidatesEmail
{
  /**
   * Valida se o email informado é válido.
   *
   * @param string $email
   * @return bool
   */
  public function validateEmail($email)
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }
}
