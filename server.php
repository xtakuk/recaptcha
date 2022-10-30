<?php
 $secretKey =  '6Ld_m8EiAAAAAF4nTVyl-TJ5s9oMYeG0t2iIutgr';
 $captchaResponse = $_POST['g-recaptcha-response'];
 
 // APIリクエスト
 $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captchaResponse}");
 
 // APIレスポンス確認
 $responseData = json_decode($verifyResponse);
 if ($responseData->success) {
  // echo '<h1 class="text-center"><span class="no_wrap">ありがとうございました。</span></h1>'; // 成功（ロボットではない）
   if (mail($to,"題名をこちらへ入力", $message, $headers)) {
      echo '<h1 class="text-center"><span class="no_wrap">ありがとうございました。</span></h1>';
   }
 } else {
  echo '<h1 class="text-center">Sorry unexpected error occurred, please try again later.</h1>'; // 失敗
 }
?>
