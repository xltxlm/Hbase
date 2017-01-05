<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2017/1/4
 * Time: 13:21.
 */

namespace xltxlm\hbase\tests;

use Hbase\HbaseClient;
use PHPUnit\Framework\TestCase;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;

class HbaseGetsAll extends TestCase
{

    public function test1()
    {
        $hbase = new Hbase();
        $socket = new TSocket($hbase->getHost(), $hbase->getPort());

        $socket->setSendTimeout(10000); // Ten seconds (too long for production, but this is just a demo ;)
        $socket->setRecvTimeout(20000); // Twenty seconds
        $transport = new TBufferedTransport($socket);
        $protocol = new TBinaryProtocol($transport);
        $client = new HbaseClient($protocol);

        $transport->open();

        echo("scanning tables...\n");
        $tables = $client->getTableNames();
        foreach ($tables as $table) {
            echo "<pre>-->";
            print_r($table);
            echo "<--@in ".__FILE__." on line ".__LINE__."\n";
            echo("column families in {$table}:\n");
            $descriptors = $client->getColumnDescriptors($table);
            asort($descriptors);
            foreach ($descriptors as $col) {
                echo("  column: {$col->name}, maxVer: {$col->maxVersions}\n");
            }
        }

        $dummy_attributes = array();
#

        // Run a scanner on the rows we just created
        echo "Starting scanner...\n";
        $dummy_attributes = [];
        $scanner = $client->scannerOpen('VideoInfo', '', ['info:show_count'], $dummy_attributes);
        try {
            while (true) {
                print_r($client->scannerGet($scanner));
                if ($i++ > 2)
                    break;
            }
        } catch (\Exception $e) {
            $client->scannerClose($scanner);
            echo "Scanner finished\n";
        }
    }

    public function testconfig()
    {
        (new Hbase())
            ->test();
    }
}
