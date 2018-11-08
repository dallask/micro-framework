<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 08-Nov-18
 * Time: 17:07
 */

namespace Framework\Http;

interface ServerRequestInterface
{

    public function getQueryParams(): array;

    /**
     * @param array $query
     *
     * @return static
     */
    public function withQueryParams(array $query);

    public function getParsedBody();

    /**
     * @param $data
     *
     * @return static
     */
    public function withParsedBody($data);
}
