<?php

namespace Cdn\Request\V20180510;

/**
 * @deprecated Please use https://github.com/aliyun/openapi-sdk-php
 *
 * Request of DescribeRangeDataByLocateAndIspService
 *
 * @method string getIspNames()
 * @method string getSecurityToken()
 * @method string getDomainNames()
 * @method string getLocationNames()
 * @method string getEndTime()
 * @method string getStartTime()
 * @method string getOwnerId()
 */
class DescribeRangeDataByLocateAndIspServiceRequest extends \RpcAcsRequest
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
            'Cdn',
            '2018-05-10',
            'DescribeRangeDataByLocateAndIspService'
        );
    }

    /**
     * @param string $ispNames
     *
     * @return $this
     */
    public function setIspNames($ispNames)
    {
        $this->requestParameters['IspNames'] = $ispNames;
        $this->queryParameters['IspNames'] = $ispNames;

        return $this;
    }

    /**
     * @param string $securityToken
     *
     * @return $this
     */
    public function setSecurityToken($securityToken)
    {
        $this->requestParameters['SecurityToken'] = $securityToken;
        $this->queryParameters['SecurityToken'] = $securityToken;

        return $this;
    }

    /**
     * @param string $domainNames
     *
     * @return $this
     */
    public function setDomainNames($domainNames)
    {
        $this->requestParameters['DomainNames'] = $domainNames;
        $this->queryParameters['DomainNames'] = $domainNames;

        return $this;
    }

    /**
     * @param string $locationNames
     *
     * @return $this
     */
    public function setLocationNames($locationNames)
    {
        $this->requestParameters['LocationNames'] = $locationNames;
        $this->queryParameters['LocationNames'] = $locationNames;

        return $this;
    }

    /**
     * @param string $endTime
     *
     * @return $this
     */
    public function setEndTime($endTime)
    {
        $this->requestParameters['EndTime'] = $endTime;
        $this->queryParameters['EndTime'] = $endTime;

        return $this;
    }

    /**
     * @param string $startTime
     *
     * @return $this
     */
    public function setStartTime($startTime)
    {
        $this->requestParameters['StartTime'] = $startTime;
        $this->queryParameters['StartTime'] = $startTime;

        return $this;
    }

    /**
     * @param string $ownerId
     *
     * @return $this
     */
    public function setOwnerId($ownerId)
    {
        $this->requestParameters['OwnerId'] = $ownerId;
        $this->queryParameters['OwnerId'] = $ownerId;

        return $this;
    }
}
