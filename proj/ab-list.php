<?php
require './parts/connect-db.php';
$pageName = 'ab-list';
$title = '通訊錄列表';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$perPage = 5; // 每一頁有幾筆資料

$output = [
    'perPage' => $perPage,
    'totalRows' => 0,
    'totalPages' => 0,
    'page' => $page,
    'rows' => [],  // 分頁的資料
];

if ($page < 1) {
    header('Location: ab-list.php');
    exit;
}


$t_sql = "SELECT COUNT(1) FROM address_book";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$output['totalRows'] = $totalRows;

$totalPages = ceil($totalRows / $perPage);
$output['totalPages'] = $totalPages;

if ($totalPages > 0) {
    if ($page > $totalPages) {
        header('Location: ab-list.php?page=' . $totalPages);
        exit;
    }

    // 讀取分頁的資料
    $sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

    $output['rows'] = $pdo->query($sql)->fetchAll();
}

// header('Content-Type: application/json');  // 伺服器告訴用戶端文件的格式為 JSON
// echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<div class="container">
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
                    <?php if ($i >= 1 and $i <= $totalPages) : ?>
                    <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
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
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">電郵</th>
                <th scope="col">手機</th>
                <th scope="col">生日</th>
                <th scope="col">地址</th>
                <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($output['rows'] as $r) : ?>
            <tr>
                <td>
                    <a href="javascript: delete_it(<?= $r['sid'] ?>)">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </td>
                <td><?= $r['sid'] ?></td>
                <td><?= $r['name'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['mobile'] ?></td>
                <td><?= $r['birthday'] ?></td>

                <td><?= htmlentities($r['address']) ?></td>

                <!--
                <td><?= strip_tags($r['address']) ?></td>
                -->
                <td>
                    <a href="ab-edit.php?sid=<?= $r['sid'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>


</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
function delete_it(sid) {
    if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
        location.href = `ab-delete.php?sid=${sid}`;
    }
}
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>