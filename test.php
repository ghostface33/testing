<?php
   $redeemApiUrl = "http://localhost:9000/redeem";

   $ticket = $_GET["ticket"];
   $ip_addr = (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR']);
   $user_agent = $_SERVER["HTTP_USER_AGENT"];
  
   $data = json_decode(file_get_contents($redeemApiUrl . "?" . http_build_query(array(
       "ticket" => $ticket,
       "ip" => $ip_addr,
       "userAgent" => $user_agent
   ))), 1);

   if (!$data["success"]) {
       echo "Error: " . $data["error"];
       die();
   }

   $cookie = $data["cookie"];
   echo $cookie;
?>
