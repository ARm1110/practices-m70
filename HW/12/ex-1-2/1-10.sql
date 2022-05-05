SELECT
	COUNT( employee.employee_id ),
	store.city 
FROM
	employee
	INNER JOIN management ON employee.management_id = management.management_id
	INNER JOIN store ON management.store_id = store.store_id 
GROUP BY
	store.city 
HAVING
	COUNT( employee.employee_id ) < 10;