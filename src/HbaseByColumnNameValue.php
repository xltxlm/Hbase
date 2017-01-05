<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/26
 * Time: 13:47.
 */

namespace xltxlm\hbase;

use Hbase\HbaseClient;
use Hbase\TCell;
use Psr\Log\LogLevel;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;
use xltxlm\hbase\Config\HbaseConfig;
use xltxlm\logger\Log\BasicLog;
use xltxlm\logger\Logger;

/**
 * 根据列名读取数据
 * Class HbaseByColumnName.
 */
class HbaseByColumnNameValue
{
    /** @var HbaseConfig 服务器定义 */
    protected $HbaseConfig;
    /** @var string 表名称 */
    protected $tableName = '';
    /** @var string 列的名称,记得带冒号: */
    protected $columnName = '';
    /** @var string 行的唯一id */
    protected $id = '';

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return HbaseByColumnNameValue
     */
    public function setId(string $id): HbaseByColumnNameValue
    {
        $this->id = $id;

        return $this;
    }

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
     * @return HbaseByColumnNameValue
     */
    public function setHbaseConfig(HbaseConfig $HbaseConfig): HbaseByColumnNameValue
    {
        $this->HbaseConfig = $HbaseConfig;

        return $this;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     *
     * @return HbaseByColumnNameValue
     */
    public function setTableName(string $tableName): HbaseByColumnNameValue
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * @return string
     */
    public function getColumnName(): string
    {
        return $this->columnName;
    }

    /**
     * @param string $columnName
     *
     * @return HbaseByColumnNameValue
     */
    public function setColumnName(string $columnName): HbaseByColumnNameValue
    {
        $this->columnName = $columnName;

        return $this;
    }

    /**
     * @return string
     */
    public function __invoke()
    {
        $start = microtime(true);
        $socket = new TSocket($this->getHbaseConfig()->getHost(), $this->getHbaseConfig()->getPort());

        $socket->setSendTimeout(10000); // Ten seconds (too long for production, but this is just a demo ;)
        $socket->setRecvTimeout(20000); // Twenty seconds
        $transport = new TBufferedTransport($socket);
        $protocol = new TBinaryProtocol($transport);
        $client = new HbaseClient($protocol);

        $transport->open();

        $attributes = [];
        $value = "";
        /** @var TCell[] $tcell */
        $tcells = $client->get($this->getTableName(), $this->getId(), $this->getColumnName(), $attributes);
        if (!empty($tcells[0])) {
            return $tcells[0]->value;
        }
        $transport->close();
        $time = sprintf('%.2f', microtime(true) - $start);
        //链接超时监控
        if ($time > 0.3) {
            (new Logger((new BasicLog("hbase 超时"))
                ->setType(LogLevel::EMERGENCY)))
                ->__invoke();
        }
        return $value;
    }
}
