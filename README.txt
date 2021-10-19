This a web-based menu-drive program (using PHP) which performs a set of database operations(using Mysql) for the application related to music CD industry. 


proj2_menu.html: main menu contains links to 6 promblems;


1.php: Insert a Producer to table Producers.   *name can't be empty*
INSERT INTO Producers (producer_name,address) VALUES('','')
Output: SELECT * FROM Producers ORDER BY producer_name


2.php: Insert a CD to table CDs, Insert CD title with his producer to table Produce,  Insert CD title with its supplier to table Supply. *title, producer and supplier can't be empty*
INSERT INTO CDs (title, type, year) VALUES('','','')
INSERT INTO Produce (title, producer_name) VALUES('','')
INSERT INTO Supply (title, supplier_name) VALUES('','')
Output: SELECT * FROM CDs NATURAL JOIN Produce NATURAL JOIN Supply ORDER BY title


3.php: Insert a customer to table Customers, Insert (title, SSN, date, period) to table Rent. *SSN, title can't be empty*
INSERT INTO Rent (title, SSN, date, period) VALUES('','',,)
INSERT INTO Customers (customer_name, telephone, SSN) VALUES('','','')
Output: SELECT * FROM Customers NATURAL JOIN Rent ORDER BY SSN


4.php: Insert a VIP to table Customers and VIPs; Insert (title, SSN, date, period) to table Rent. *SSN, title can't be empty*
INSERT INTO VIPs (SSN, discount, starting_date) VALUES('0000000',50,'1996-10-20')
INSERT INTO Rent (title, SSN, date, period) VALUES('BETA','0000000','2008-1-21',111)
INSERT INTO Customers (customer_name, telephone, SSN) VALUES('JOHN','0000000','0000000')
Output: SELECT * FROM Customers NATURAL JOIN Rent NATURAL JOIN VIPs ORDER BY SSN


5.php: Find names and Tel# of all customers who borrowed a particular CD and are supposed to return by a particular date.
e.g.
SELECT customer_name,telephone FROM Customers NATURAL JOIN Rent where title='LOVE OF MY LIFE' and DATE_ADD(date,INTERVAL period day)='2020-12-4'
Output:  Shuoxin Liu 1111111


6.php: List producers information who produce CD of a particular artist released in a particular year.
e.g.
SELECT * FROM Producers where producer_name IN (SELECT producer_name FROM Songs NATURAL JOIN CDs NATURAL JOIN Produce WHERE artist='B' and year='2000')
Output: 88rising	  2229 Ocean Ave
              mc hotdog  877 Bay Ridge Ave 5E