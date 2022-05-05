SELECT
	store.store_id,
	store.ZIP,
	store.city,
	management.name_management,
	COUNT( employee.employee_id ) AS count 
FROM
	employee
	INNER JOIN management ON employee.management_id = management.management_id
	INNER JOIN store ON management.store_id = store.store_id 
WHERE
	store.city = 'اصفهان' 
GROUP BY
	store.store_id;