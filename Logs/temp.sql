CREATE DEFINER=`root`@`localhost` PROCEDURE `flight_data` (IN `origin_code` VARCHAR(10), IN `destination_code` VARCHAR(10), IN `travellers` INT, IN `dep` VARCHAR(20), IN `d` DATETIME, IN `type` VARCHAR(20))  NO SQL
BEGIN
	IF (type = 'eseats') THEN
        SELECT *
        FROM instances i, routes r, airplane ap
        WHERE i.Route_ID = r.Route_ID
        AND i.plane_ID = ap.Code 
        AND r.departure_airport_code = origin_code
        AND r.arrival_airport_code = destination_code
        AND i.eseats > 0
        AND i.eseats >= travellers
        AND departure LIKE dep
        AND i.departure > d
        ORDER BY i.ecost;
    ELSEIF (type = 'bseats') THEN
        SELECT *
        FROM instances i, routes r, airplane ap
        WHERE i.Route_ID = r.Route_ID
        AND i.plane_ID = ap.Code 
        AND r.departure_airport_code = origin_code
        AND r.arrival_airport_code = destination_code
        AND i.bseats > 0
        AND i.bseats >= travellers
        AND departure LIKE dep
        AND i.departure > d
        ORDER BY i.bcost;
    ELSE
    	SELECT *
        FROM instances i, routes r, airplane ap
        WHERE i.Route_ID = r.Route_ID
        AND i.plane_ID = ap.Code 
        AND r.departure_airport_code = origin_code
        AND r.arrival_airport_code = destination_code
        AND i.fseats > 0
        AND i.fseats >= travellers
        AND departure LIKE dep
        AND i.departure > d
        ORDER BY i.fcost;
    END IF;
END