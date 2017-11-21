/*
	Christopher Raymond & Laramie DeBaun	
	Databases 2017 fall
	Populate DB with basic starter data
*/

INSERT INTO `customer` VALUES('Christopher Raymond', '512-555-8822', '1111 Maple Street', 'christopher@gmail.com', 'GoodLuck', '1234pass', '2017-11-08 00:00:00', NULL);
INSERT INTO `customer` VALUES('John Smith', '512-555-1234', '1234 Main Street', 'john@smith.com', 'J.Smith', 'pass1234', '2017-11-15 00:00:00', NULL);
INSERT INTO `customer` VALUES('Laramie Debaun', '512-555-0122', '1234 Mitchell Circle', 'lman123@yahoo.com', 'lman123', 'password234', '2017-11-09 00:00:00', NULL);

INSERT INTO `order` VALUES(1, 1, 2, '1.50', '3.00', NULL);
INSERT INTO `order` VALUES(2, 1, 1, '3.00', '3.00', NULL);
INSERT INTO `order` VALUES(3, 1, 3, '2.00', '6.00', NULL);

INSERT INTO `product` VALUES(NULL, 'Hot Dog', 'MAINDISH', 50, '1.50', 'hotdog.png');
INSERT INTO `product` VALUES(NULL, 'Hamburger', 'MAINDISH', 32, '3.00', 'hamburger.png');
INSERT INTO `product` VALUES(NULL, 'Pizza', 'MAINDISH', 36, '2.00', 'pizza.png');

CREATE VIEW ORDERS AS
	SELECT O.ORDER_NUM AS ORDER_NUM, C.`NAME` AS `NAME`, P.DESCRIPTION AS DESCRIPTION, O.QUANTITY AS QUANTITY, O.TOTAL_PAID AS TOTAL_PAID
	FROM `ORDER` O
	LEFT OUTER JOIN PRODUCT P ON O.PRODUCT_ID = P.PRODUCT_ID
	LEFT OUTER JOIN CUSTOMER C ON O.CUST_IDNO = C.IDNUMBER
	ORDER BY O.ORDER_NUM ASC;
    
CREATE VIEW PRODUCTS AS
	SELECT DESCRIPTION, `TYPE`, QUANTITY, COST, PRODUCT_IMAGE FROM PRODUCT ORDER BY PRODUCT_ID ASC;

CREATE VIEW CUSTOMERS AS
	SELECT `NAME`, PHONENO, ADDRESS, EMAIL, USERNAME, CREATEDDATE FROM CUSTOMER ORDER BY IDNUMBER ASC;

CREATE VIEW AVAILABLE_FOOD AS
	SELECT DESCRIPTION, `TYPE`, QUANTITY, COST, PRODUCT_IMAGE FROM PRODUCT WHERE QUANTITY > 0 ORDER BY PRODUCT_ID ASC;
