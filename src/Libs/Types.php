<?php
namespace Hbase;

/**
 * Autogenerated by Thrift Compiler (0.9.3)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


/**
 * TCell - Used to transport a cell value (byte[]) and the timestamp it was
 * stored with together as a result for get and getRow methods. This promotes
 * the timestamp of a cell to a first-class value, making it easy to take
 * note of temporal data. Cell is used all the way from HStore up to HTable.
 */
class TCell extends TBase {
  static $_TSPEC;

  /**
   * @var string
   */
  public $value = null;
  /**
   * @var int
   */
  public $timestamp = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'value',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'timestamp',
          'type' => TType::I64,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'TCell';
  }

  public function read($input)
  {
    return $this->_read('TCell', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('TCell', self::$_TSPEC, $output);
  }

}

/**
 * An HColumnDescriptor contains information about a column family
 * such as the number of versions, compression settings, etc. It is
 * used as input when creating a table or adding a column.
 */
class ColumnDescriptor extends TBase {
  static $_TSPEC;

  /**
   * @var string
   */
  public $name = null;
  /**
   * @var int
   */
  public $maxVersions = 3;
  /**
   * @var string
   */
  public $compression = "NONE";
  /**
   * @var bool
   */
  public $inMemory = false;
  /**
   * @var string
   */
  public $bloomFilterType = "NONE";
  /**
   * @var int
   */
  public $bloomFilterVectorSize = 0;
  /**
   * @var int
   */
  public $bloomFilterNbHashes = 0;
  /**
   * @var bool
   */
  public $blockCacheEnabled = false;
  /**
   * @var int
   */
  public $timeToLive = -1;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'name',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'maxVersions',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'compression',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'inMemory',
          'type' => TType::BOOL,
          ),
        5 => array(
          'var' => 'bloomFilterType',
          'type' => TType::STRING,
          ),
        6 => array(
          'var' => 'bloomFilterVectorSize',
          'type' => TType::I32,
          ),
        7 => array(
          'var' => 'bloomFilterNbHashes',
          'type' => TType::I32,
          ),
        8 => array(
          'var' => 'blockCacheEnabled',
          'type' => TType::BOOL,
          ),
        9 => array(
          'var' => 'timeToLive',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'ColumnDescriptor';
  }

  public function read($input)
  {
    return $this->_read('ColumnDescriptor', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('ColumnDescriptor', self::$_TSPEC, $output);
  }

}

/**
 * A TRegionInfo contains information about an HTable region.
 */
class TRegionInfo extends TBase {
  static $_TSPEC;

  /**
   * @var string
   */
  public $startKey = null;
  /**
   * @var string
   */
  public $endKey = null;
  /**
   * @var int
   */
  public $id = null;
  /**
   * @var string
   */
  public $name = null;
  /**
   * @var int
   */
  public $version = null;
  /**
   * @var string
   */
  public $serverName = null;
  /**
   * @var int
   */
  public $port = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'startKey',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'endKey',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'id',
          'type' => TType::I64,
          ),
        4 => array(
          'var' => 'name',
          'type' => TType::STRING,
          ),
        5 => array(
          'var' => 'version',
          'type' => TType::BYTE,
          ),
        6 => array(
          'var' => 'serverName',
          'type' => TType::STRING,
          ),
        7 => array(
          'var' => 'port',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'TRegionInfo';
  }

  public function read($input)
  {
    return $this->_read('TRegionInfo', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('TRegionInfo', self::$_TSPEC, $output);
  }

}

/**
 * A Mutation object is used to either update or delete a column-value.
 */
class Mutation extends TBase {
  static $_TSPEC;

  /**
   * @var bool
   */
  public $isDelete = false;
  /**
   * @var string
   */
  public $column = null;
  /**
   * @var string
   */
  public $value = null;
  /**
   * @var bool
   */
  public $writeToWAL = true;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'isDelete',
          'type' => TType::BOOL,
          ),
        2 => array(
          'var' => 'column',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'value',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'writeToWAL',
          'type' => TType::BOOL,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'Mutation';
  }

  public function read($input)
  {
    return $this->_read('Mutation', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('Mutation', self::$_TSPEC, $output);
  }

}

/**
 * A BatchMutation object is used to apply a number of Mutations to a single row.
 */
class BatchMutation extends TBase {
  static $_TSPEC;

  /**
   * @var string
   */
  public $row = null;
  /**
   * @var \Hbase\Mutation[]
   */
  public $mutations = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'row',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'mutations',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\Hbase\Mutation',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'BatchMutation';
  }

  public function read($input)
  {
    return $this->_read('BatchMutation', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('BatchMutation', self::$_TSPEC, $output);
  }

}

/**
 * For increments that are not incrementColumnValue
 * equivalents.
 */
class TIncrement extends TBase {
  static $_TSPEC;

  /**
   * @var string
   */
  public $table = null;
  /**
   * @var string
   */
  public $row = null;
  /**
   * @var string
   */
  public $column = null;
  /**
   * @var int
   */
  public $ammount = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'table',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'row',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'column',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'ammount',
          'type' => TType::I64,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'TIncrement';
  }

  public function read($input)
  {
    return $this->_read('TIncrement', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('TIncrement', self::$_TSPEC, $output);
  }

}

/**
 * Holds column name and the cell.
 */
class TColumn extends TBase {
  static $_TSPEC;

  /**
   * @var string
   */
  public $columnName = null;
  /**
   * @var \Hbase\TCell
   */
  public $cell = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'columnName',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'cell',
          'type' => TType::STRUCT,
          'class' => '\Hbase\TCell',
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'TColumn';
  }

  public function read($input)
  {
    return $this->_read('TColumn', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('TColumn', self::$_TSPEC, $output);
  }

}

/**
 * Holds row name and then a map of columns to cells.
 */
class TRowResult extends TBase {
  static $_TSPEC;

  /**
   * @var string
   */
  public $row = null;
  /**
   * @var array
   */
  public $columns = null;
  /**
   * @var \Hbase\TColumn[]
   */
  public $sortedColumns = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'row',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'columns',
          'type' => TType::MAP,
          'ktype' => TType::STRING,
          'vtype' => TType::STRUCT,
          'key' => array(
            'type' => TType::STRING,
          ),
          'val' => array(
            'type' => TType::STRUCT,
            'class' => '\Hbase\TCell',
            ),
          ),
        3 => array(
          'var' => 'sortedColumns',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\Hbase\TColumn',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'TRowResult';
  }

  public function read($input)
  {
    return $this->_read('TRowResult', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('TRowResult', self::$_TSPEC, $output);
  }

}

/**
 * A Scan object is used to specify scanner parameters when opening a scanner.
 */
class TScan extends TBase {
  static $_TSPEC;

  /**
   * @var string
   */
  public $startRow = null;
  /**
   * @var string
   */
  public $stopRow = null;
  /**
   * @var int
   */
  public $timestamp = null;
  /**
   * @var string[]
   */
  public $columns = null;
  /**
   * @var int
   */
  public $caching = null;
  /**
   * @var string
   */
  public $filterString = null;
  /**
   * @var int
   */
  public $batchSize = null;
  /**
   * @var bool
   */
  public $sortColumns = null;
  /**
   * @var bool
   */
  public $reversed = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'startRow',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'stopRow',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'timestamp',
          'type' => TType::I64,
          ),
        4 => array(
          'var' => 'columns',
          'type' => TType::LST,
          'etype' => TType::STRING,
          'elem' => array(
            'type' => TType::STRING,
            ),
          ),
        5 => array(
          'var' => 'caching',
          'type' => TType::I32,
          ),
        6 => array(
          'var' => 'filterString',
          'type' => TType::STRING,
          ),
        7 => array(
          'var' => 'batchSize',
          'type' => TType::I32,
          ),
        8 => array(
          'var' => 'sortColumns',
          'type' => TType::BOOL,
          ),
        9 => array(
          'var' => 'reversed',
          'type' => TType::BOOL,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'TScan';
  }

  public function read($input)
  {
    return $this->_read('TScan', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('TScan', self::$_TSPEC, $output);
  }

}

/**
 * An Append object is used to specify the parameters for performing the append operation.
 */
class TAppend extends TBase {
  static $_TSPEC;

  /**
   * @var string
   */
  public $table = null;
  /**
   * @var string
   */
  public $row = null;
  /**
   * @var string[]
   */
  public $columns = null;
  /**
   * @var string[]
   */
  public $values = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'table',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'row',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'columns',
          'type' => TType::LST,
          'etype' => TType::STRING,
          'elem' => array(
            'type' => TType::STRING,
            ),
          ),
        4 => array(
          'var' => 'values',
          'type' => TType::LST,
          'etype' => TType::STRING,
          'elem' => array(
            'type' => TType::STRING,
            ),
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'TAppend';
  }

  public function read($input)
  {
    return $this->_read('TAppend', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('TAppend', self::$_TSPEC, $output);
  }

}

/**
 * An IOError exception signals that an error occurred communicating
 * to the Hbase master or an Hbase region server.  Also used to return
 * more general Hbase error conditions.
 */
class IOError extends TException {
  static $_TSPEC;

  /**
   * @var string
   */
  public $message = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'message',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'IOError';
  }

  public function read($input)
  {
    return $this->_read('IOError', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('IOError', self::$_TSPEC, $output);
  }

}

/**
 * An IllegalArgument exception indicates an illegal or invalid
 * argument was passed into a procedure.
 */
class IllegalArgument extends TException {
  static $_TSPEC;

  /**
   * @var string
   */
  public $message = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'message',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'IllegalArgument';
  }

  public function read($input)
  {
    return $this->_read('IllegalArgument', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('IllegalArgument', self::$_TSPEC, $output);
  }

}

/**
 * An AlreadyExists exceptions signals that a table with the specified
 * name already exists
 */
class AlreadyExists extends TException {
  static $_TSPEC;

  /**
   * @var string
   */
  public $message = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'message',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      parent::__construct(self::$_TSPEC, $vals);
    }
  }

  public function getName() {
    return 'AlreadyExists';
  }

  public function read($input)
  {
    return $this->_read('AlreadyExists', self::$_TSPEC, $input);
  }

  public function write($output) {
    return $this->_write('AlreadyExists', self::$_TSPEC, $output);
  }

}


