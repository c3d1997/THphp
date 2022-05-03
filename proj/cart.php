<?php
session_start();
$pageName = 'cart';
$title = '購物車列表';
require './parts/connect-db.php';

$rows = [];
$sids = [];
if (!empty($_SESSION['cart'])) {

    $sids = array_keys($_SESSION['cart']);

    $sql = sprintf("SELECT * FROM products WHERE sid IN (%s)", implode(',', $sids));


    $stmt = $pdo->query($sql);

    while ($r = $stmt->fetch()) {
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $rows[$r['sid']] = $r;
    }
}

/*
echo json_encode([
    'rows' => $rows,
    'sids' => $sids,
]);
*/
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">商品圖</th>
                        <th scope="col">商品名稱</th>
                        <th scope="col">單價</th>
                        <th scope="col">數量</th>
                        <th scope="col">小計</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($sids as $sid) :
                        $item = $rows[$sid];
                        $total += $item['price'] * $item['quantity'];
                    ?>
                    <tr data-sid="<?= $sid ?>">
                        <td><a href="#" onclick="removeItem(event); event.preventDefault()">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                        <td>
                            <img src="imgs/small/<?= $item['book_id'] ?>.jpg" alt="">
                        </td>
                        <td><?= $item['bookname'] ?></td>
                        <td class="price" data-price="<?= $item['price'] ?>"></td>
                        <td>
                            <select class="form-select form-select-sm quantity"
                                style="display:inline-block; width:auto">
                                <?php for ($i = 1; $i <= 20; $i++) : ?>
                                <option value="<?= $i ?>" <?= $item['quantity'] == $i ? 'selected' : '' ?>><?= $i ?>
                                </option>
                                <?php endfor; ?>
                            </select>
                        </td>
                        <td class="sub-total"></td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>


        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="alert alert-primary" role="alert">
                總計: <span id="total-price"></span>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
const dallorCommas = function(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
};

const calcPrices = () => {
    const trs = $('tbody > tr');

    let totalPrice = 0;
    trs.each(function() {
        const tr = $(this);
        const price = +tr.find('.price').attr('data-price');
        tr.find('.price').text('$ ' + dallorCommas(price)); // 顯示單價
        const quantity = +tr.find('select').val();
        tr.find('.sub-total').text('$ ' + dallorCommas(price * quantity)); // 顯示小計
        totalPrice += price * quantity;
    });

    $('#total-price').text('$ ' + dallorCommas(totalPrice));

};
calcPrices();

$('.quantity').on('change', function() {
    const me = $(this);
    // console.log('me:', me);
    const quantity = me.val();
    const sid = me.closest('tr').attr('data-sid');

    // console.log('tr:', me.find('tr'));

    $.get('cart-api.php', {
        sid,
        quantity
    }, function(data) {
        console.log(data);
        showCount(data);
        calcPrices(); // 重算所有價格
    }, 'json');

});

const removeItem = event => {

    const me = $(event.currentTarget);
    const sid = me.closest('tr').attr('data-sid');
    $.get('cart-api.php', {
        sid
    }, function(data) {
        console.log(data);
        me.closest('tr').remove();
        showCount(data);
        calcPrices(); // 重算所有價格
    }, 'json');

}
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>