<?php
include_once './Config.php';

$GLOBALS['THRIFT_ROOT'] = '/var/www/html/PMF';
/* Remember these two files? */
require_once $GLOBALS['THRIFT_ROOT'].'/Types.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Senti.php';
/* Dependencies. In the proper order. */
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Protocol/TProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TBufferedTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Type/TMessageType.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Factory/TStringFuncFactory.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/StringFunc/TStringFunc.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/StringFunc/Core.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Type/TType.php';

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TSocketPool;
use Thrift\Transport\TFramedTransport;
use Thrift\Transport\TBufferedTransport;
use Senti\SentiClient;
// Set server host and port


function getSentimentByCook($key)
{

$host = "localhost";
$port = 9091;
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME,3306);


try {

    //Thrift connection handling
    $socket = new TSocket($host,$port);
    $transport = new TBufferedTransport($socket);
    $protocol = new TBinaryProtocol($transport);
    // get our example client
    $client = new SentiClient($protocol);
    $transport->open();

    $response = "";
    $result = "";
    $k = $key;

    // mysql query
    $check = $db->query("SELECT * FROM reviews where cookID ='$k'");

    if (mysqli_num_rows($check) > 0)  {

    while($row = $check->fetch_assoc()) {
    $response = $response . "|" .$row["review"];
    }
    }
    else{
        $response = "error";
         }
    // echo json response
    //echo $response;


    $result = $client->getSentiment($response);



    $transport->close();

} catch (TException $tx) {
    echo 'Something went wrong: '.$tx->getMessage()."\n";
}

echo $result;

return $result;
}

function getSentimentByFood($cid,$fid) {

$host = "localhost";
$port = 9091;
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME,3306);


try {

    //Thrift connection handling
    $socket = new TSocket( $host , $port );
    $transport = new TBufferedTransport($socket, 1024, 1024);
    $protocol = new TBinaryProtocol($transport);

    // get our example client
    $client = new SentiClient($protocol);
    $transport->open();


    $response = "";
    $result = "";

    // mysql query
    $check = $db->query("SELECT * FROM reviews where cookID ='$cid' and foodID = '$fid'");

    if (mysqli_num_rows($check) > 0)  {

    while($row = $check->fetch_assoc()) {
    $response = $response . "|" . $row["review"];
    }
    }
    else{
        $response = "error";
         }
    // echo json response
    //echo $response;


    $result = $client->getSentiment($response);



    $transport->close();

} catch (TException $tx) {
    print 'Something went wrong: '.$tx->getMessage()."\n";
}

echo $result;

return $result;
}

// $cooID = 1;
// $fooID = 1;

// getSentimentByCook($cooID);
// getSentimentByFood($cooID,$fooID);

?>

