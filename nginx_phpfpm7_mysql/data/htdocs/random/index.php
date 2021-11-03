<?php
// 選抜不可なメンバー
$mustnt_mem = array(9, 10, 11, 14, 20, 23, 24, 25, 27, 28, 33, 35, 37, 40, 41, 43, 42, 34, 4, 22, 38, 30, 8, 5, 13, 15, 12, 39, 26, 36, 13, 29, 2, 17, 21, 32, 31, 3, 7, 18,19);
//選抜可能なメンバー
$ena_mem = [];
// 選抜される５人のメンバー
$member = [];

// 選抜不可のメンバーから選抜可能なメンバーを割り出す
$a = 0;
for ($i = 1; $i <= 43; $i++) {

  $flag = 0;

  // 選択不可なメンバーを検索（照合）
  for ($a = 0; $a < count($mustnt_mem); $a++) {
    if ($i == $mustnt_mem[$a]) {
      // 選択不可なメンバーがいるとき,その場所でフラグを立てて照合用ループ終了
      $flag = 1;
      break;
    }
  }

  if ($flag == 0) {
    // 選択可能なメンバーのとき、選択可能メンバーに追加
    $ena_mem[] = $i;
  }
}

// メンバーを５人決める
while (count($member) < 1) {

  $flag = 0;
  $rand = mt_rand(0, count($ena_mem) - 1);

  for ($i = 0; $i < count($member); $i++) {
    if ($ena_mem[$rand] == $member[$i]) {
      // 重複あり
      $flag = 1;
    }
  }

  if ($flag == 0) {
    // 重複がなければ、選抜メンバーに追加
    $member[] = $ena_mem[$rand];
  }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>complete.php</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="mt-5 w-25 mx-auto">
    <p class="h1 text-primary text-center">ランダム選抜</p>
    <table class="table table-hover table-bordered text-center">
      <tr class="table-primary">
        <td>出席番号</td>
      </tr>
      <?php for ($i = 0; $i < count($member); $i++) { ?>
        <tr>
          <td><?php echo $member[$i]; ?></td>
        </tr>
      <?php } ?>
    </table>
    <form>
      <button type="submit" class="btn btn-primary">振り直す</button>
    </form>
</body>

</html>
