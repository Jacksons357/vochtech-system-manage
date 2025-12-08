<?php

namespace App\Traits;

trait ValidatesCnpj
{
  public function validateCnpj($cnpj)
  {
    $cnpj = preg_replace('/\D/', '', $cnpj);
    if (strlen($cnpj) != 14) return false;

    return true;
  }
}
