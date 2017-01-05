<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/26
 * Time: 13:53.
 */

namespace xltxlm\hbase\Config;

use Hbase\HbaseClient;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;
use xltxlm\config\TestConfig;

include_once __DIR__.'/../Libs/Hbase.php';
include_once __DIR__.'/../Libs/Types.php';

abstract class HbaseConfig implements TestConfig
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

    public function test()
    {
        $socket = new TSocket($this->getHost(), $this->getPort());

        $socket->setSendTimeout(10000); // Ten seconds (too long for production, but this is just a demo ;)
        $socket->setRecvTimeout(20000); // Twenty seconds
        $transport = new TBufferedTransport($socket);
        $protocol = new TBinaryProtocol($transport);
        $client = new HbaseClient($protocol);
        $transport->open();
        $tables = $client->getTableNames();
        if (empty($tables)) {
            throw new \Exception('Hbase服务错误，链接不上'.$this->getHost().':'.$this->getPort());
        }
        return $tables;
    }
}
