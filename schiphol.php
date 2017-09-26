html>
   <head>
      <title>Public flight</title>      
   </head>
   <body>
      
      <?php
     echo "<h1>Public flight API</h1>";
     $app_id = "Yaac41c4b
     $app_key = "620076012e7b8ee7f815b52b7edc1fa9";
     $curl = curl_init("https://api.schiphol.nl/public-flights/flights?app_id=".$app_id."&app_key=".$app_key);
     curl_setopt_array($curl, array(
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "GET",
       CURLOPT_HTTPHEADER => array(
         "resourceversion: v3"
       ),
     ));
     $response = curl_exec($curl);
     $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
     curl_close($curl);
     if ($http_code != 200) {
       echo $http_code . " Error when calling the public flight api: " . $response;
     } else {
       $array = json_decode($response, true);
       echo "<table>";
       foreach ($array['flights'] as $flight ){
          echo "<tr>";
          echo "<td>". $flight['flightName']."</td>";
          echo "<td>". (string)$flight['scheduleDate'] ."</td>";
          echo "</tr>";
       }
       echo "</table>";			
      }
      ?>
   </body>
</html>