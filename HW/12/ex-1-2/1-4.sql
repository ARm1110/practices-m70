SELECT DISTINCT
	store.city,
	management.name_management 
FROM
	store
	INNER JOIN management ON store.store_id = management.management_id 
WHERE
	city = 'اصفهان';