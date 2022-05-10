<?php
function image_api($key,$idx)
{ 
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_USERAGENT => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT        5.1; .NET CLR 1.1.4322)',
      CURLOPT_URL => "https://www.google.com/search?q=New+car&tbm=isch",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Cookie: 1P_JAR=2022-05-10-01; AEC=AakniGN6BijUpkjs7wKOM98xakH5Knya9NuLTU2X-Sk7m7SvfKyWhXze7A; NID=511=RK9t3A39VftYwpw1bmnjZKfjxp2KDlUgeUEwc0i5jKyfhahIAmE_Lb_zvnS7gjnsjZTZ_ZLFldT07QTgfcCDpbxe9K9KM1frIluZIuDkeE3s6Jo4xsfWERk4UrnJbuPRQTh92rg-HHf5q-ofYJ8V5qzNwnKscHH23gDsKYylmC4'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

// $response = file_get_contents("https://www.google.com/search?q=elevator+drop+key&ie=UTF-8&tbm=isch&ei=Kut5YrKuIIKP4-EPmY2QsAQ&start=31&sa=100");

// curl_close($curl);

// header("Content-Type:application/json");
// for ($i=1; $i < 41 ; $i+20) { 
  $data[] = image_api("New+Car",21); 
// }
print_r($data);
$result = preg_match_all('/src= *["\']?([^"\']*)/i', $data[0], $matches);
unset($matches[0][0]);
// foreach ($matches[0] as $key => $value) {
//     // print_r($value);
//     echo "<img src='".str_replace('src="', '', $value)."' width='300px'>";
// }
// print_r($data);
print_r($matches[0]);
