<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/26
 * Time: 13:53.
 */

namespace xltxlm\hbase\Config;

include_once __DIR__.'/../Libs/Hbase.php';
include_once __DIR__.'/../Libs/Types.php';

abstract class HbaseConfig
{
    /** @var string 主机ip地址 */
    protected $host = '';
    /** @var string 端口号 */
    protected $port = 9090;

    /**
     * @return string
     */
    final public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     *
     * @return $this
     */
    final public function setHost(string $host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return string
     */
    final public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @param string $port
     *
     * @return $this
     */
    final public function setPort(string $port)
    {
        $this->port = $port;

        return $this;
    }
}
