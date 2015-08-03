<?php
include_once './Config.php';

$GLOBALS['THRIFT_ROOT'] = 'C:/xampp/htdocs/32hourstartup/web';
/* Remember these two files? */
require_once $GLOBALS['THRIFT_ROOT'].'/T/Types.php';
require_once $GLOBALS['THRIFT_ROOT'].'/T/Topics.php';
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
use Topics\TopicsClient;
// Set server host and port

function getTrending($locality) {

$host = "localhost";
$port = 9092;
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME,3306);

try {


    //Thrift connection handling
    $socket = new TSocket( $host , $port );
    $transport = new TBufferedTransport($socket);
    $protocol = new TBinaryProtocol($transport);

    // get our example client
    $client = new TopicsClient($protocol);
    $transport->open();


    $response = "";
    $result = "";
    $local = $locality;

    // mysql query
    $check = $db->query("SELECT * FROM comments where locality ='$local'");

    if (mysqli_num_rows($check) > 0)  {

    while($row = $check->fetch_assoc()) {
    $response = $response . "|" .$row["comment"];
        
    }
    }
    else{
        $response = "error";
        return "";
         }
    // echo json response
    //echo $response;


    $result = $client->getTrending($response);
    //echo $result;
    $Topics = array();
    foreach(explode("||",$result) as $r) {
        //echo $r;
    if ($r != "")
    {$parts = explode("|",$r);
    $Topics[$parts[0]] = $parts[1];
}
    }

    $transport->close();

} catch (TException $tx) {
    print 'Something went wrong: '.$tx->getMessage()."\n";
}

//echo serialize($Topics);

return $Topics;
}

//getTrending('kknagar');

?>
