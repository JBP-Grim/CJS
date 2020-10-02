<?php
$request = json_decode(file_get_contents('php://input'), true);
$success = 'ko';
$sanitized = filter_var_array($request, FILTER_SANITIZE_STRING);
echo json_encode($sanitized);
if($request != null && filter_var_array($request, $sanitized)){
    $to = null;
    $subject = null;
    $body = null;
    try{
        $from = $request['email'];
        $subject = $request['subject'];
        $body = $request['body'];
        echo 'pene';
        if($from != null && $subject != null && $body != null){
            $toEmail = 'oscarve.do@outlook.com';
            $htmlContent  = '<h2>Contact Request Submited</h2>
            <h4>Email<h4><p>'.$from.'</p>
            <h4>Subject<h4><p>'.$subject.'</p>
            <h4>Message<h4><p>'.$body.'</p>';
            $headers = 'From: '.$from;
            if(mail($toEmail, $subject, $htmlContent, $headers)){
                
                $success = 'ok';
            }
            else{
                echo 'es un pene';
            }
        }
    }
    catch(exception $e){

    }
}

$response = [
    'success' => $success];
//echo json_encode($response)
?>