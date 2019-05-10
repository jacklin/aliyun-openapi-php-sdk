<?php

namespace cloudwf\Request\V20170328;

/**
 * @deprecated Please use https://github.com/aliyun/openapi-sdk-php
 *
 * Request of HeadquartersRanking
 *
 * @method string getBid()
 */
class HeadquartersRankingRequest extends \RpcAcsRequest
{

    /**
     * @var string
     */
    protected $method = 'POST';

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'cloudwf',
            '2017-03-28',
            'HeadquartersRanking',
            'cloudwf'
        );
    }

    /**
     * @param string $bid
     *
     * @return $this
     */
    public function setBid($bid)
    {
        $this->requestParameters['Bid'] = $bid;
        $this->queryParameters['Bid'] = $bid;

        return $this;
    }
}
