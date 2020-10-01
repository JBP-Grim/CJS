<?php
$request = json_decode(file_get_contents("php://input"), true);
$success = "ko";
$sanitized = filter_var($request);
if($request != null && filter_var($request, $sanitized)){
    $to = null;
    $subject = null;
    $body = null;
    try{
        $from = $request["email"];
        $subject = $request["subject"];
        $body = $request["body"];
        if($from != null && $subject != null && $body != null){
            $toEmail = "customerservice@commercial-cjs.com";
            $htmlContent  = "<h2>Contact Request Submited</h2>
            <h4>Email<h4><p>".$from."</p>
            <h4>Subject<h4><p>".$subject."</p>
            <h4>Message<h4><p>".$body."</p>";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";
            $headers .= "From: Name<".$from.">\r\n";

            if(mail($toEmail, $subject, $htmlContent, $headers)){
                $success = "ok";
            }
        }
    }
    catch(exception $e){

    }
}

$response[] = array(
    "success" => $success
);
echo json_encode($response)
?>