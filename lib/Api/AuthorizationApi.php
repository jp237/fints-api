<?php
/**
 * AuthorizationApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * finAPI RESTful Services
 *
 * finAPI RESTful Services
 *
 * OpenAPI spec version: v1.81.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.8
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;
use Psr\Http\Client\ClientInterface;
use Buzz\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * AuthorizationApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AuthorizationApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param \Psr\Http\Client\ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        \Psr\Http\Client\ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new \Buzz\Client\FileGetContents();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getToken
     *
     * Get tokens
     *
     * @param  string $grant_type Determines the required type of authorization:password - authorize a user; client_credentials - authorize a client;refresh_token - refresh a user&#39;s access_token. (required)
     * @param  string $client_id Client identifier (required)
     * @param  string $client_secret Client secret (required)
     * @param  string $refresh_token Refresh token. Required for grant_type&#x3D;refresh_token only. (optional)
     * @param  string $username User identifier. Required for grant_type&#x3D;password only. (optional)
     * @param  string $password User password. Required for grant_type&#x3D;password only. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\AccessToken
     */
    public function getToken($grant_type, $client_id, $client_secret, $refresh_token = null, $username = null, $password = null)
    {
        list($response) = $this->getTokenWithHttpInfo($grant_type, $client_id, $client_secret, $refresh_token, $username, $password);
        return $response;
    }

    /**
     * Operation getTokenWithHttpInfo
     *
     * Get tokens
     *
     * @param  string $grant_type Determines the required type of authorization:password - authorize a user; client_credentials - authorize a client;refresh_token - refresh a user&#39;s access_token. (required)
     * @param  string $client_id Client identifier (required)
     * @param  string $client_secret Client secret (required)
     * @param  string $refresh_token Refresh token. Required for grant_type&#x3D;refresh_token only. (optional)
     * @param  string $username User identifier. Required for grant_type&#x3D;password only. (optional)
     * @param  string $password User password. Required for grant_type&#x3D;password only. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\AccessToken, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTokenWithHttpInfo($grant_type, $client_id, $client_secret, $refresh_token = null, $username = null, $password = null)
    {
        $returnType = '\Swagger\Client\Model\AccessToken';
        $request = $this->getTokenRequest($grant_type, $client_id, $client_secret, $refresh_token, $username, $password);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->sendRequest($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\AccessToken',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\BadCredentialsError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 423:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTokenAsync
     *
     * Get tokens
     *
     * @param  string $grant_type Determines the required type of authorization:password - authorize a user; client_credentials - authorize a client;refresh_token - refresh a user&#39;s access_token. (required)
     * @param  string $client_id Client identifier (required)
     * @param  string $client_secret Client secret (required)
     * @param  string $refresh_token Refresh token. Required for grant_type&#x3D;refresh_token only. (optional)
     * @param  string $username User identifier. Required for grant_type&#x3D;password only. (optional)
     * @param  string $password User password. Required for grant_type&#x3D;password only. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTokenAsync($grant_type, $client_id, $client_secret, $refresh_token = null, $username = null, $password = null)
    {
        return $this->getTokenAsyncWithHttpInfo($grant_type, $client_id, $client_secret, $refresh_token, $username, $password)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTokenAsyncWithHttpInfo
     *
     * Get tokens
     *
     * @param  string $grant_type Determines the required type of authorization:password - authorize a user; client_credentials - authorize a client;refresh_token - refresh a user&#39;s access_token. (required)
     * @param  string $client_id Client identifier (required)
     * @param  string $client_secret Client secret (required)
     * @param  string $refresh_token Refresh token. Required for grant_type&#x3D;refresh_token only. (optional)
     * @param  string $username User identifier. Required for grant_type&#x3D;password only. (optional)
     * @param  string $password User password. Required for grant_type&#x3D;password only. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTokenAsyncWithHttpInfo($grant_type, $client_id, $client_secret, $refresh_token = null, $username = null, $password = null)
    {
        $returnType = '\Swagger\Client\Model\AccessToken';
        $request = $this->getTokenRequest($grant_type, $client_id, $client_secret, $refresh_token, $username, $password);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getToken'
     *
     * @param  string $grant_type Determines the required type of authorization:password - authorize a user; client_credentials - authorize a client;refresh_token - refresh a user&#39;s access_token. (required)
     * @param  string $client_id Client identifier (required)
     * @param  string $client_secret Client secret (required)
     * @param  string $refresh_token Refresh token. Required for grant_type&#x3D;refresh_token only. (optional)
     * @param  string $username User identifier. Required for grant_type&#x3D;password only. (optional)
     * @param  string $password User password. Required for grant_type&#x3D;password only. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTokenRequest($grant_type, $client_id, $client_secret, $refresh_token = null, $username = null, $password = null)
    {
        // verify the required parameter 'grant_type' is set
        if ($grant_type === null || (is_array($grant_type) && count($grant_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $grant_type when calling getToken'
            );
        }
        // verify the required parameter 'client_id' is set
        if ($client_id === null || (is_array($client_id) && count($client_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $client_id when calling getToken'
            );
        }
        // verify the required parameter 'client_secret' is set
        if ($client_secret === null || (is_array($client_secret) && count($client_secret) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $client_secret when calling getToken'
            );
        }

        $resourcePath = '/oauth/token';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($grant_type !== null) {
            $queryParams['grant_type'] = ObjectSerializer::toQueryValue($grant_type);
        }
        // query params
        if ($client_id !== null) {
            $queryParams['client_id'] = ObjectSerializer::toQueryValue($client_id);
        }
        // query params
        if ($client_secret !== null) {
            $queryParams['client_secret'] = ObjectSerializer::toQueryValue($client_secret);
        }
        // query params
        if ($refresh_token !== null) {
            $queryParams['refresh_token'] = ObjectSerializer::toQueryValue($refresh_token);
        }
        // query params
        if ($username !== null) {
            $queryParams['username'] = ObjectSerializer::toQueryValue($username);
        }
        // query params
        if ($password !== null) {
            $queryParams['password'] = ObjectSerializer::toQueryValue($password);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation revokeToken
     *
     * Revoke a token
     *
     * @param  string $token The token that the client wants to get revoked (required)
     * @param  string $token_type_hint A hint about the type of the token submitted for revocation (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function revokeToken($token, $token_type_hint = null)
    {
        $this->revokeTokenWithHttpInfo($token, $token_type_hint);
    }

    /**
     * Operation revokeTokenWithHttpInfo
     *
     * Revoke a token
     *
     * @param  string $token The token that the client wants to get revoked (required)
     * @param  string $token_type_hint A hint about the type of the token submitted for revocation (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function revokeTokenWithHttpInfo($token, $token_type_hint = null)
    {
        $returnType = '';
        $request = $this->revokeTokenRequest($token, $token_type_hint);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->sendRequest($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation revokeTokenAsync
     *
     * Revoke a token
     *
     * @param  string $token The token that the client wants to get revoked (required)
     * @param  string $token_type_hint A hint about the type of the token submitted for revocation (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function revokeTokenAsync($token, $token_type_hint = null)
    {
        return $this->revokeTokenAsyncWithHttpInfo($token, $token_type_hint)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation revokeTokenAsyncWithHttpInfo
     *
     * Revoke a token
     *
     * @param  string $token The token that the client wants to get revoked (required)
     * @param  string $token_type_hint A hint about the type of the token submitted for revocation (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function revokeTokenAsyncWithHttpInfo($token, $token_type_hint = null)
    {
        $returnType = '';
        $request = $this->revokeTokenRequest($token, $token_type_hint);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'revokeToken'
     *
     * @param  string $token The token that the client wants to get revoked (required)
     * @param  string $token_type_hint A hint about the type of the token submitted for revocation (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function revokeTokenRequest($token, $token_type_hint = null)
    {
        // verify the required parameter 'token' is set
        if ($token === null || (is_array($token) && count($token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $token when calling revokeToken'
            );
        }

        $resourcePath = '/oauth/revoke';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($token !== null) {
            $queryParams['token'] = ObjectSerializer::toQueryValue($token);
        }
        // query params
        if ($token_type_hint !== null) {
            $queryParams['token_type_hint'] = ObjectSerializer::toQueryValue($token_type_hint);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
