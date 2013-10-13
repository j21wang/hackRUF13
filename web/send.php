<?php 

$whoto = $_GET['id'];
$url = $_GET['songUrl'];

echo $whoto;

sendmail($whoto,$url);


function sendmail($to,$songUrl)
{
    $url = 'http://sendgrid.com/';
    $user = 'foodforsong';
    $pass = 'fudizg00d';

    $params = array(
        'api_user'  => $user,
        'api_key'   => $pass,
        'to'        => $to,
        'subject'   => 'You liked a song http://rd.io/x/QitDQE0e/',
        'html'      => '',
        'text'      => 'Listen Again here <333 ',
        'from'      => 'foodforthought@dontReply.com',
    );


    $request =  $url.'api/mail.send.json';

    // Generate curl request
    $session = curl_init($request);
    // // Tell curl to use HTTP POST
    curl_setopt ($session, CURLOPT_POST, true);
    // // Tell curl that this is the body of the POST
    curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
    // // Tell curl not to return headers, but do return the response
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    //
    // // obtain response
    $response = curl_exec($session);
    curl_close($session);
    //
    // // print everything out
    print_r($response);
}

?>
