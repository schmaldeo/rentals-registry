CREATE TABLE info(
    id int NOT NULL AUTO_INCREMENT, 
    item text, 
    borrower text, 
    date date, 
    returned tinyint(1) DEFAULT '0', 
    returndate date, 
    receiver text, 
    type text, 
    PRIMARY KEY(id)
);