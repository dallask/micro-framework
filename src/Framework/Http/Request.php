<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Oct-18
 * Time: 18:13
 */

namespace Framework\Http;


class Request {

  public function getQueryParams(): array {
    return $_GET;
  }

  public function getParsedBody() {
    return $_POST ?: NULL;
  }

}