<?php
require './parts/connect-db.php';

$sql = "SELECT * FROM `categories` ORDER BY sequence";

$rows = $pdo->query($sql)->fetchAll();
//echo json_encode($rows);

$dict = [];
foreach ($rows as $r) {
    $dict[$r['sid']] = $r;
}

// echo json_encode($dict);

foreach ($dict as &$r2) {
    //$dict[$r['sid']] = $r;
    if ($r2['parent_sid'] != '0') {
        $parent = &$dict[$r2['parent_sid']];

        $parent['children'][] = &$r2;
    }
}

$result = [];
foreach ($dict as &$r3) {

    if ($r3['parent_sid'] == '0') {
        $result[] = &$r3;
    }
}
?>
<?php include __DIR__ . '/parts/html-head.php' ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php foreach ($result as $m1) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $m1['name'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($m1['children'] as $m2) : ?>
                        <li>
                            <a class="dropdown-item" href="#<?= $m2['sid'] ?>">
                                <?= $m2['name'] ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</nav>


<div class="container">
    <h2>Hello</h2>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
window.addEventListener('hashchange', function() {
    console.log(location.hash);
});
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>