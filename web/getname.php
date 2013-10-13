<html>

<?php 

$UPC = $_GET['foodname'];
require_once 'XML/RPC.php';

$rpc_key = 'b2b93b685e84982b94d3f4ba07a35cae0f6c4114';    // Set your rpc_key here

// Setup the URL of the XML-RPC service
$client = new XML_RPC_Client('/xmlrpc', 'http://www.upcdatabase.com');


// Construct the entire parameter list (an array) for the call.
// The array contains a single XML_RPC_Value object, a struct.
// The struct is constructed from a PHP associative array, and each
// value needs to be an XML_RPC_Value object.

$params = array( new XML_RPC_Value( array(
    'rpc_key' => new XML_RPC_Value($rpc_key, 'string'),
	    'upc' => new XML_RPC_Value($UPC, 'string'),
		    ), 'struct'));

// Construct the XML-RPC request.  Substitute your chosen method name
$msg = new XML_RPC_Message('lookup', $params);

//Set debug info to true.  Useful for testing, shows the response from the server
// $client->setDebug(1);

//More debug info, create the payload before sending.
//Not necessary to function, but useful to test
// $msg->createPayload();

//TEST Print the response to the screen for testing
 //echo "<pre>" . print_r($msg->payload, true) . "</pre><hr />";

//Actually have the client send the message to the server.  Save response.
$resp = $client->send($msg);

//If there was a problem sending the message, the resp will be false
if (!$resp)
{
	    //print the error code from the client and exit
		    echo 'Communication error: ' . $client->errstr;
			    exit;
}

//If the response doesn't have a fault code, show the response as the array it is
if(!$resp->faultCode())
{
	    //Store the value of the response in a variable
		    $val = $resp->value();
			    //Decode the value, into an array.
				    $data = XML_RPC_decode($val);
					    //Optionally print the array to the screen to inspect the values
             session_start(); 
            $foodname = $data['description'];
            echo $foodname;
            $quote  = strPos($foodname," ");
            echo $quote;
            if(!empty($quote))
            {
            $foodname = substr($foodname,0,$quote);
            }
            preg_replace("/<!--.*?-->/", "", $foodname);
            $result = preg_replace("/[^a-zA-Z0-9]+/", "", html_entity_decode($foodname));
            echo $result;
            $_SESSION['foodName'] = $result;
            echo '<script> window.location.href = "http://codeniko.net/foodforsong/web/getPic.php";</script>';



}else{
	    //If something went wrong, show the error
		    echo 'Fault Code: ' . $resp->faultCode() . "\n";
			    echo 'Fault Reason: ' . $resp->faultString() . "\n";
}
?>
</html>
