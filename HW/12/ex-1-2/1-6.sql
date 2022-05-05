SELECT
	employee_id,
	employee.NAME,
	store.city,
	store.ZIP 
FROM
	employee
	INNER JOIN management ON employee.management_id = management.management_id
	INNER JOIN store ON management.store_id = store.store_id;