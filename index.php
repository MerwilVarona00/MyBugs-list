<?php
@include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

define('TOKEN', 'bzETgoyfAUAGJnPkqa3_OGQpZ9D_3E3Z');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');

$client = new Client();
$headers = [
  'Authorization' => TOKEN
];
$request = new Request('GET', MANTISHUB_URL.'api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();

$bugs_list = json_decode($bugs);


?>

<!DOCTYPE html>
<head>
    <html lang="en">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
      <meta charset="utf-8">
      <meta-equiv='X-UA-Compatible' content='IE=edge'>
      <link rel="stylesheet" href="style.css">
      <title>ipt10.local/lab-exercise</title>
</head>
<body>
  <div class="text">
    <br>
    <h1>IPT10 Bugs List</h1>
    <h2><u>Merwil G. Varona</u></h2>
  </div>
  <div class="table">
    <table class="table table-striped">
      <thead>
        <tr style="background-color: #D1D1D1;">
          <th scope="col">ID</th>
          <th scope="col">Summary</th>
          <th scope="col">Severity</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($bugs_list->issues as $bug)
        {
          echo '<tr>';
          echo '<th scope="row">' . $bug->id . '</th';
          echo '<td>' . $bug->summary . '</td>';
          echo '<td>' . $bug->status->name . '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>




