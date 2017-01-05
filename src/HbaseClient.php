<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/5
 * Time: 12:33.
 */

namespace xltxlm\hbase;

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;
use xltxlm\hbase\Config\HbaseConfig;

final class HbaseClient
{
    /** @var TBufferedTransport */
    private $transport;
    /** @var HbaseConfig 服务器定义 */
    protected $HbaseConfig;

    /**
     * @return HbaseConfig
     */
    public function getHbaseConfig(): HbaseConfig
    {
        return $this->HbaseConfig;
    }

    /**
     * @param HbaseConfig $HbaseConfig
     *
     * @return \Hbase\HbaseClient
     */
    public function setHbaseConfig(HbaseConfig $HbaseConfig): HbaseClient
    {
        $this->HbaseConfig = $HbaseConfig;
        $socket = new TSocket($this->getHbaseConfig()->getHost(), $this->getHbaseConfig()->getPort());

        $socket->setSendTimeout(10000); // Ten seconds (too long for production, but this is just a demo ;)
        $socket->setRecvTimeout(20000); // Twenty seconds
        $this->transport = new TBufferedTransport($socket);
        $protocol = new TBinaryProtocol($this->transport);
        $client = new \Hbase\HbaseClient($protocol);

        $this->transport->open();

        return $client;
    }

    public function __destruct()
    {
        $this->transport->close();
    }
}
