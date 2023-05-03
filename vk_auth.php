<?php
$client_id = 51633091; // ID приложения ВКонтакте
$client_secret = S9vH9r1enZ6Qcbz4Hfxx; // Секретный ключ приложения ВКонтакте
$redirect_uri = /welcome.html; // Адрес переадресации после авторизации
$scope = 'email'; // Запрашиваемые права доступа (email - для получения email-адреса пользователя)

if (isset($_GET['code'])) {
  $code = $_GET['code'];
  $url = 'https://oauth.vk.com/access_token?client_id=' . $client_id . '&client_secret=' . $client_secret . '&redirect_uri=' . urlencode($redirect_uri) . '&code=' . $code;
  $data = file_get_contents($url);
  $response = json_decode($data);
  $access_token = $response->access_token;
  $user_id = $response->user_id;
  $email = $response->email;
  // Сохраните access_token, user_id и email в базу данных или сессию
  // ...
} else {
  $url = 'https://oauth.vk.com/authorize?client_id=' . $client_id . '&redirect_uri=' . urlencode($redirect_uri) . '&response_type=code&scope=' . $scope;
  header('Location: ' . $url);
}
?>
