
SELECT 1+5;

SELECT RAND();  -- 亂數

SELECT MD5('123456'); -- e10adc3949ba59abbe56e057f20f883e

SELECT SHA1('123456'); -- 7c4a8d09ca3762af61e59520943dc26494f8941b

SELECT NOW(); -- 當下時間

SELECT 1 FROM `categories`;

SELECT *, `sid`*`sid` sq_sid FROM `categories`;

SELECT p.*, c.name 
    FROM `products` p 
    LEFT JOIN `categories` c 
        ON p.`category_sid`=c.sid
    WHERE c.name IS NULL;  -- 判斷是不是空值

SELECT p.*
    FROM `products` p 
    LEFT JOIN `categories` c 
        ON p.`category_sid`=c.sid
    WHERE c.name IS NOT NULL;

SELECT * FROM `categories` WHERE parent_sid != 0;

SELECT * FROM `categories` WHERE parent_sid <> 0;


SELECT * FROM `products` WHERE `author`='平田豊';

SELECT * FROM `products` WHERE `author` LIKE '平田%';

SELECT * FROM `products` WHERE `author` LIKE '%陳%';

-- 標籤
-- 學員, 課程 C001, 講師

-- 影片, 類型, 平台

-- GROUP BY
SELECT `category_sid` FROM `products` GROUP BY `category_sid`;

SELECT `category_sid`, COUNT(1) FROM `products` GROUP BY `category_sid`;

SELECT *, COUNT(1) FROM `products` GROUP BY `category_sid`; -- MySQL8 會出錯


SELECT c.name, c.sid, COUNT(1) FROM `products` p
    JOIN `categories` c ON p.`category_sid`=c.sid
    GROUP BY p.`category_sid`;


SELECT o.*, od.price, od.quantity, p.bookname FROM orders o
    JOIN order_details od
        ON o.sid=od.order_sid
    JOIN products p
        ON p.sid=od.product_sid
    WHERE o.sid=11;
    -- 取得某筆訂單的內容

SELECT o.*, od.price, od.quantity, p.bookname FROM orders o
    JOIN order_details od
        ON o.sid=od.order_sid
    JOIN products p
        ON p.sid=od.product_sid
    WHERE o.member_sid=1;
    -- 取得某個會員所有訂單細目

-- 2017 年之後的訂單
SELECT * FROM `orders` WHERE `order_date` > '2017-01-01';

-- 2017-10-03 當天的所有訂單
SELECT * FROM `orders` 
    WHERE `order_date` >= '2017-10-03' AND `order_date` < '2017-10-04';
    
-- 2016-06 月份
SELECT * FROM `orders` 
    WHERE `order_date` >= '2016-06-01' AND `order_date` < '2016-07-01';

-- 建立檢視表
CREATE VIEW test_view AS SELECT * FROM `categories`;

CREATE VIEW detail_view AS 
    SELECT od.*, p.bookname FROM `order_details` od
    JOIN `products` p ON od.product_sid=p.sid;


-- 子查詢
SELECT `product_sid` FROM `order_details` WHERE `order_sid`=11;

SELECT * FROM `products` WHERE sid IN (
    SELECT `product_sid` FROM `order_details` WHERE `order_sid`=11
);

SELECT p.*, od.price od_price FROM products p
    JOIN 
        (SELECT `product_sid`, `price` FROM `order_details` WHERE `order_sid`=11)
            od
        ON p.sid=od.product_sid;
