<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    //HTTP Status Codes
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_FORBIDEN = 403;
    const HTTP_WRONG_METHOD = 405;
    const HTTP_NO_CONTENT = 204;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_UINTERNAL_SERVER_ERROR= 500;

    //Http Method constants
    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_POST = 'POST';
    const HTTP_METHOD_PUT = 'PUT';
    const HTTP_METHOD_DELETE = 'DELETE';
    const HTTP_METHOD_PATCH = 'PATCH';
}
