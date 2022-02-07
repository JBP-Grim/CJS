<?php
$request = json_decode(file_get_contents('php://input'), true);
$success = 'ko';
$sanitized = filter_var_array($request, FILTER_SANITIZE_STRING);
if($request != null && filter_var_array($request, $sanitized)){
    $to = null;
    $subject = null;
    $body = null;
    try{
        $from = $request['email'];
        $subject = $request['subject'];
        $body = $request['body'];
        if($from != null && $subject != null && $body != null){
            $toEmail = 'customerservice@commercial-cjs.com';
            $htmlContent  = 'Contact Request Submited from commercial-cjs.com
            From: '.$from.'
            Subject: '.$subject.'
            Message: '.$body;
            $headers = 'From: '.$from;
            if(mail($toEmail, $subject, $htmlContent, $headers)){
                
                $success = 'ok';
            }
            else{
            }
        }
    }
    catch(exception $e){

    }
}

$response = [
    'success' => $success];
echo json_encode($response)
?>