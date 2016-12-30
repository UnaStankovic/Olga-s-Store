--This is a file which contains basic triggers for the store--

DELIMITER $$

--When a new product is chosen and quantity is determined we want to add that product to our order (to the amount), so it's price multiplied by quantity has to be added.

DROP TRIGGER IF EXISTS add_to_sum$$

CREATE TRIGGER add_to_sum
BEFORE INSERT ON Contains
FOR EACH ROW
BEGIN 
	UPDATE Order SET amount = amount + new.quantity * (SELECT price_per_piece FROM Product WHERE product.id = new.Product_id) 
		WHERE id = new.Order_id;
END $$


-- When a new Customer registers we want to immediately assign him a privilege of a Customer. C is for Customer (A is for Admin, other options might be added)

DROP TRIGGER IF EXISTS new_user_privilege$$

CREATE TRIGGER new_user_privilege
AFTER INSERT ON User
FOR EACH ROW 
BEGIN 
	UPDATE Has SET Privilege_id = 'C' WHERE User_id = new.id;
END $$	

DELIMITER ;

