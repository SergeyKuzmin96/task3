-- 1)Вывод списка email, встречающихся более чем у одного пользователя
SELECT `email` FROM `users` GROUP BY `email` HAVING COUNT(*) > 1;

-- 2)Вывод списка логинов пользователей, которые не сделали ни одного заказа
SELECT u.login
FROM users AS u
         LEFT JOIN
     (SELECT orders.user_id AS user_id, COUNT(*) as count
      FROM orders
      GROUP BY orders.user_id) AS o
     ON u.id = o.user_id
WHERE o.count IS NULL

-- 3)Вывод списка логинов пользователей которые сделали более двух заказов
SELECT u.login
FROM users AS u
         LEFT JOIN
     (SELECT orders.user_id AS user_id, COUNT(*) as count
      FROM orders
      GROUP BY orders.user_id) AS o
     ON u.id = o.user_id
WHERE o.count > 2