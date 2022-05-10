<?php
$idx = 1;
$keyword = empty($_POST['key']) ? "Image+foresh":urlencode($_POST['key']);
for ($i=0; $i <5 ; $i++) { 
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://www.google.com/search?q='.$keyword.'&tbm=isch&ei=Kut5YrKuIIKP4-EPmY2QsAQ&start='.$idx.'&sa=N',
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

    $result = preg_match_all('/src= *["\']?([^"\']*)/i', $response, $matches);
    unset($matches[0][0]);
    $datas[] = 'iklan.png';
    foreach ($matches[0] as $key => $value) {
        $datas[] = str_replace('src="', '', $value);
    }
    $idx = $idx+20;
    usleep( 10 * 1000 );
}
if (count($datas)>100) {
    $img_view = array_rand($datas, 100);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Career Tes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <form action="" method="post">
                <div class="row mx-auto my-auto">
                    <div class="col-sm-6 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Google Image Search</div>
                            </div>
                            <input type="text" class="form-control" name="key" placeholder="keyword search">
                        </div>
                    </div>
                    <div class="col-sm-3 my-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>    
        </div>
        <div class="row">
            <?php
            if (!empty($img_view)) {
                foreach ($img_view  as $key => $value) {
                    echo '<div class="col-sm-2 p-2 px-1 py-1 bg-white text-white" >
                    <img src="'.$datas[$value].'""  class="h-100 w-100" style="border-radius: 10px">
                    </div>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
