
INSERT INTO 
`address_book` 
(`sid`, `name`, `email`, `mobile`, `birthday`, `address`, `created_at`)
VALUES 
(NULL, '李小明3', 'ming@test.com', '0918123567', '2003-04-08', '台南市', '2022-04-18 08:03:46.000000'),
(NULL, '李小明4', 'ming@test.com', '0918123567', '2003-04-08', '台南市', '2022-04-18 08:03:46.000000'),
(NULL, '李小明5', 'ming@test.com', '0918123567', '2003-04-08', '台南市', '2022-04-18 08:03:46.000000'),
(NULL, '李小明6', 'ming@test.com', '0918123567', '2003-04-08', '台南市', '2022-04-18 08:03:46.000000'),
(NULL, '李小明7', 'ming@test.com', '0918123567', '2003-04-08', '台南市', '2022-04-18 08:03:46.000000');

-- --------------------------------
-- 操作資料表 CRUD: create, read, update, delete

-- recordset: 資料集, 查詢結果的暫存的表

SELECT * FROM `address_book` ORDER BY `name` ASC; -- 升冪
SELECT * FROM `address_book` ORDER BY `name` DESC; -- 降冪
SELECT * FROM `address_book` ORDER BY `name` DESC, `sid` DESC;


-- 刪除資料
DELETE FROM address_book WHERE `sid` = 5;


-- 修改資料
UPDATE `address_book` SET `name` = '李小明77' WHERE `sid` = 2;
UPDATE `address_book` SET `name` = '李小明99'; -- 修改所有資料





