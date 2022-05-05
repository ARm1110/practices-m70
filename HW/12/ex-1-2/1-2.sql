SELECT
	employee.employee_id,
	employee.NAME,
	management.name_management 
FROM
	employee
	INNER JOIN management ON employee.employee_id = management.management_id;