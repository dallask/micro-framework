<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 08-Nov-18
 * Time: 16:57
 */

namespace Framework\Http;

class RequestFactory
{

    public static function fromGlobals(
      array $query = null,
      array $body = null
    ): Request {
        return (new Request())
          ->withQueryParams($query ?: $_GET)
          ->withParsedBody($body ?: $_POST);
    }
}