# Billing-System

The Main Page is main.html, open it and add changes.

# Requirements

~1. Simple sql means select fuction like select customer name from table~

ANS: productlist.php-- Line 56

~2. Aggregate Functions
COUNT() – number of rows 
SUM() – total of a column
AVG() – average value
MAX() / MIN() – highest or lowest value
probably use count to get total number of products and display in products page~

ANSWER: productlist.php-- 72

~3. String matches uses Operators: LIKE, Eg: SELECT * FROM products WHERE name LIKE '%clock%';~

ANSWER: customer.php line-- 57

~4. Set Operations combine results of two or more SELECT queries. INTERSECT – common rows in both queries~
SELECT * FROM customers
INTERSECT
SELECT * FROM products
use to find the products that were purchased
ANSWER customer.php line-- 57

~5. Nested Queries is query inside another query. idk this one~

~6. View is a virtual table created by saving a select query. works same as selct just for displaying~
ANSWER: productlist.php line-- 54

~7. Triggers , you know this one. Just create an insert trigger whenever a new bill is generated and thus new entry in customer table~
ANSWER: Added this as Trigger in PHPMYADMIN:
  CREATE TRIGGER update_product_quantity
  AFTER INSERT ON customer_list
  FOR EACH ROW
  BEGIN
    UPDATE product_list
    SET Q = Q + NEW.Quantity
    WHERE PID = NEW.PID;
  END;

~8. PL/SQL Procedures , for loop if statement or functions. We can add a procedure(function) which lets us update the price of a product~
CREATE OR REPLACE PROCEDURE change (
  prod_id IN NUMBER,
  change_amt IN NUMBER
)

ANSWER:
DELIMITER //

CREATE PROCEDURE GetTotalSalesAmount(OUT total DECIMAL(10,2))
BEGIN
    SELECT SUM(`Total price`) INTO total
    FROM customer_list;
END;
//

DELIMITER ;

Run it in PHPMyAdmin->SQL Tab

CALL GetTotalSale(@total);
SELECT @total;