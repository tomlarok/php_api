<?php
/* Operacje wymiany danych, obługa danych w JSONach, metod POST, GET.. */

class DataExchange
{
  private $user;

  private $password;

  private $company;

  private $postfields;

    private $getfield;

    public $url;

    public $requestMethod;

    protected $httpStatusCode;

    public function __construct(array $settings)
    {
        if (!function_exists('curl_init'))
        {
            throw new RuntimeException('URL error');
        }

        if (!isset($settings['password'])
            || !isset($settings['user'])
            || !isset($settings['company']))
        {
            throw new InvalidArgumentException('Brak danych logowania');
        }

        $this->password = $settings['password'];
        $this->password = $settings['password'];
        $this->company= $settings['company'];
    }


    public function setPostfields(array $array)
    {


        return $this;
    }

    public function setGetfield($string)
    {


        return $this;
    }

    /**
     * Get getfield string (simple getter)
     *
     * @return string $this->getfields
     */
    public function getGetfield()
    {
        return $this->getfield;
    }

    /**
     * Get postfields array (simple getter)
     *
     * @return array $this->postfields
     */
    public function getPostfields()
    {
        return $this->postfields;
    }


    public function authorization($url, $requestMethod)
    {

    }

    public function performRequest($return = true, $curlOptions = array())
    {

    }


    public function request($url, $method = 'get', $data = null, $curlOptions = array())
    {
        if (strtolower($method) === 'get')
        {
            $this->setGetfield($data);
        }
        else
        {
            $this->setPostfields($data);
        }

        return $this->buildOauth($url, $method)->performRequest(true, $curlOptions);
    }

    /**
     * Get the HTTP status code for the previous request
     *
     * @return integer
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
}
