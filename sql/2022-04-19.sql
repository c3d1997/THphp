
SELECT * FROM `products` JOIN `categories`;

SELECT * FROM `products` JOIN `categories`
    ON `products`.`category_sid`=`categories`.sid;

SELECT * FROM `categories` JOIN  `products`
    ON `products`.`category_sid`=`categories`.sid;

-- 別名
SELECT p.*, c.name AS `分類名稱` FROM `products` AS p JOIN `categories` AS c
    ON p.`category_sid`=c.sid;

SELECT p.*, c.name 分類名稱 FROM `products` p JOIN `categories` c
    ON p.`category_sid`=c.sid;


SELECT p.*, c.name FROM `products` p LEFT JOIN `categories` c
    ON p.`category_sid`=c.sid;
