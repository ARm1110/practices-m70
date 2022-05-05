SELECT
	name_management,
	COUNT(*) 
FROM
	management 
GROUP BY
	name_management 
HAVING
	COUNT(*) > 1