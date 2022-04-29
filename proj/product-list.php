<?php

require './parts/connect-db.php';
$pageName = 'product-list';
$title = '產品列表';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0; // 預設值為: 查看所有商品

$params = [];

$where = ' WHERE 1 ';
if (!empty($cate)) {
    $where .= " AND category_sid=$cate ";
    $params['cate'] = $cate;
}



$perPage = 4; // 每一頁有幾筆資料

$output = [
    'perPage' => $perPage,
    'totalRows' => 0,
    'totalPages' => 0,
    'page' => $page,
    'rows' => [],  // 分頁的資料
];

if ($page < 1) {
    header('Location: product-list.php');
    exit;
}


$t_sql = "SELECT COUNT(1) FROM products $where ";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$output['totalRows'] = $totalRows;

$totalPages = ceil($totalRows / $perPage);
$output['totalPages'] = $totalPages;

if ($totalPages > 0) {
    if ($page > $totalPages) {
        header('Location: product-list.php?page=' . $totalPages);
        exit;
    }

    // 讀取分頁的資料
    $sql = sprintf("SELECT `sid`, `author`, `bookname`, `category_sid`, `book_id`, `publish_date`, `pages`, `price` FROM products $where ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

    $rows = $output['rows'] = $pdo->query($sql)->fetchAll();
}

// *** 分類資料
$c_sql = "SELECT * FROM categories WHERE parent_sid=0 ORDER BY sequence";
$cates = $pdo->query($c_sql)->fetchAll();

// header('Content-Type: application/json');  // 伺服器告訴用戶端文件的格式為 JSON
// echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="btn-group-vertical" style="width: 100%;">
                <a class="btn btn-outline-primary" href="?">全部商品</a>
                <?php foreach ($cates as $c) : ?>
                <a class="btn btn-outline-primary" href="?cate=<?= $c['sid'] ?>"><?= $c['name'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=1">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $page - 1 ?>">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>
                            </li>
                            <?php for ($i = $page - 3; $i <= $page + 3; $i++) : ?>
                            <?php if ($i >= 1 and $i <= $totalPages) :
                                    $params['page'] = $i;

                                ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?<?= http_build_query($params) ?>"><?= $i ?></a>
                            </li>
                            <?php endif; ?>
                            <?php endfor; ?>
                            <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $page + 1 ?>">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $totalPages ?>">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">

                <?php foreach ($rows as $r) : ?>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="imgs/big/<?= $r['book_id'] ?>.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $r['bookname'] ?></h5>
                            <p class="card-text"><i class="fa-brands fa-bitcoin"></i> <?= $r['price'] ?></p>
                            <p class="card-text"><i class="fa-solid fa-person"></i> <?= $r['author'] ?></p>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>


        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script></script>
<?php include __DIR__ . '/parts/html-foot.php' ?>