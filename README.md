# PHP-CRUD
# database schema 
  databse name : newinfo
  CREATE TABLE IF NOT EXISTS pinfo (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    fname VARCHAR(20) NOT NULL,
                    lname VARCHAR(20) NOT NULL,
                    email VARCHAR(40) NOT NULL,
                    age INT(6),
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP )
