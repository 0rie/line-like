<!doctype html>
<html>
<head>
    <title>トークの一覧を表示</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
<?php
$host = "localhost";
$mysqli = new mysqli($host, "s2010423", "s2010423new", "s2010423");
if ($mysqli->connect_error){
    die("MySQL接続エラー.<br />");
} else {
    $mysqli->set_charset("utf8");
}
$sql = "SELECT * FROM sender_2";
$res = $mysqli->query($sql);
print('<div class="container">');
print('<div class="row">');
print('<div class="col-md-3">');
while($row = $res->fetch_array()) {
    print('<p id>'.$row["name"].'</p>');
}
print('</div>');
print('<div class="col-md-8">');
$sql_address = "SELECT address FROM sender_2";
$res_address = $mysqli->query($sql_address);
while($row_address = $res->fetch_array()) {
    $sql_mail = "SELECT * FROM received_mail_2 WHERE address = $row_address"
    $res_mail = $mysqli->query($sql_mail);
    while($row_mail = $res_mail->fetch_array()){
        print('<h1>'.$row_mail["subject"].'</h1>')
        print('<p>'.$row_mail["content"].'</p>')
    }
print('</div>');
print('</div>');    
print('</div>');
$res->free();
?>
<!-- jQuery,Popper.js,Bootstrap JSの順番で読み込む-->
<!-- jQueryの読み込み -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Popper.jsの読み込み -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<!-- Bootstrapのjsの読み込み -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
