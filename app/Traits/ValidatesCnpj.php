<?php

namespace App\Traits;

trait ValidatesCnpj
{
  public function validateCnpj($cnpj)
  {
    $cnpj = preg_replace('/\D/', '', $cnpj);

    if (strlen($cnpj) != 14) {
      return false;
    }

    if (preg_match('/^(.)\1*$/', $cnpj)) {
      return false;
    }

    // Validação dos dígitos verificadores
    $lengths = [5, 6];
    for ($t = 12; $t < 14; $t++) {
      $sum = 0;
      $pos = $lengths[$t - 12];
      for ($i = 0; $i < $t; $i++) {
        $sum += $cnpj[$i] * $pos;
        $pos--;
        if ($pos < 2) $pos = 9;
      }
      $digit = ($sum % 11 < 2) ? 0 : 11 - ($sum % 11);
      if ($cnpj[$t] != $digit) {
        return false;
      }
    }

    return true;
  }
}
