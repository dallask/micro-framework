<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 08-Nov-18
 * Time: 17:06
 */

namespace Framework\Http;

interface ResponseInterface
{

    public function getBody();

    /**
     * @param mixed $body
     *
     * @return static
     */
    public function withBody($body);

    public function getStatusCode();

    public function getReasonPhrase();

    /**
     * @param mixed  $code
     * @param string $reasonPhrase
     *
     * @return static
     */
    public function withStatus($code, $reasonPhrase = '');

    public function getHeaders(): array;

    public function hasHeader($header): bool;

    public function getHeader($header);

    /**
     * @param string $header
     * @param mixed  $value
     *
     * @return static
     */
    public function withHeader($header, $value);
}
