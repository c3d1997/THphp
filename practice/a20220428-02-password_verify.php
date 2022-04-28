<?php

$hash = '$2y$10$nodh5nAtnY2FG6J3tCyiuuFAnY3CRV5Ga3/ETRmhaUu3.n7H8QspG';


echo password_verify('123456', $hash) ? 'yes' : 'nono';