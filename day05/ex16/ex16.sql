SELECT
    COUNT(DATE) AS 'films'
FROM
    member_history
WHERE
    DATE BETWEEN '2006-10-30 00:00:00'
    AND '2007-07-27 23:59:59' OR MONTH(DATE) = 12 AND DAY(DATE) = 24;