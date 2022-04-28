<?php

// SELECT * FROM `members` WHERE `email`='ming@gg.com' AND `password`=SHA1('123456');

require './parts/connect-db.php';
$pageName = 'login';
$title = '登入';

?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
form .warning {
    color: red;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">登入管理者</h5>

                    <form name="form1" method="post" onsubmit="checkForm(); return false;" novalidate>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email帳號</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>


                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
function checkForm() {

    // TODO: 檢查欄位資料.

    let isPass = true; // 有沒有通過檢查

    if (!$('#email').val().trim() || !$('#password').val().trim()) {
        isPass = false;

        alert('兩個欄位都要填寫');
    }

    // AJAX
    if (isPass) {
        $.post('login-api.php', $(document.form1).serialize(), function(data) {
            console.log(data);
            if (data.success) {
                alert('登入成功');
                location.href = 'index_.php';
            } else {
                alert(data.error || '登入失敗');
            }

        }, 'json');
    }


}
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>