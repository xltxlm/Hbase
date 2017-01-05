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
    public function setHbaseConfig(HbaseConfig $HbaseConfig)
    {
        $this->HbaseConfig = $HbaseConfig;
        $socket = new TSocket($HbaseConfig->getHost(), $HbaseConfig->getPort());

        $socket->setSendTimeout(10000); // Ten seconds (too long for production, but this is just a demo ;)
        $socket->setRecvTimeout(20000); // Twenty seconds
        $transport = new TBufferedTransport($socket);
        $client = new \Hbase\HbaseClient(new TBinaryProtocol($transport));

        $transport->open();

        return $client;
    }
}
