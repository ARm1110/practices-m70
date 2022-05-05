SELECT
	city,
	AVG( Salary ) AS Salary 
FROM
	employee
	FULL JOIN store ON employee_id 
	AND store.store_id 
WHERE
	city = 'اصفهان';