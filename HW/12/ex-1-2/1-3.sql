SELECT
	store_id,
	AVG( employee.Salary ),
	management.name_management 
FROM
	management
	INNER JOIN employee ON employee.management_id = management.management_id 
GROUP BY
	employee.management_id;