SELECT * FROM users WHERE username = '$username' AND password = '$password';
INSERT INTO products (name, category, supplier, quantity, price)
VALUES ('$name', '$category', '$supplier', '$quantity', '$price');
SELECT * FROM products WHERE name LIKE '%$search%';
SELECT * FROM products WHERE name LIKE '%$search%' AND category = '$filterCategory';
DELETE FROM products WHERE id=$id;
SELECT DISTINCT category FROM products;
