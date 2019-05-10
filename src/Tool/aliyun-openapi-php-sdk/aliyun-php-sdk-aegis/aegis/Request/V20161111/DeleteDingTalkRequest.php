<?php

namespace aegis\Request\V20161111;

/**
 * @deprecated Please use https://github.com/aliyun/openapi-sdk-php
 *
 * Request of DeleteDingTalk
 *
 * @method string getSourceIp()
 * @method string getIds()
 */
class DeleteDingTalkRequest extends \RpcAcsRequest
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
            'aegis',
            '2016-11-11',
            'DeleteDingTalk',
            'vipaegis'
        );
    }

    /**
     * @param string $sourceIp
     *
     * @return $this
     */
    public function setSourceIp($sourceIp)
    {
        $this->requestParameters['SourceIp'] = $sourceIp;
        $this->queryParameters['SourceIp'] = $sourceIp;

        return $this;
    }

    /**
     * @param string $ids
     *
     * @return $this
     */
    public function setIds($ids)
    {
        $this->requestParameters['Ids'] = $ids;
        $this->queryParameters['Ids'] = $ids;

        return $this;
    }
}
