Insert into the Clients table
INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword, clientLevel, comment) 
VALUES ('Tony', 'Stark', 'tony@starkent.com' ,'IamIronm@n', '1',  'I am the real Ironman');


UPDATE clients
SET clientLevel = 3
WHERE clientFirstname = 'Tony' and clientLastname = 'Stark';

UPDATE inventory
SET invDescription = replace(invDescription, 'small interior', 'spacious interior')
WHERE invMake = 'GM' and invModel = 'Hummer';


SELECT inventory.invModel, carclassification.classificationId
FROM inventory
INNER JOIN carclassification
ON inventory.classificationId = carclassification.classificationId
WHERE carclassification.classificationName = 'SUV';


DELETE FROM inventory WHERE invId = 1;
UPDATE inventory
SET invImage = concat('/phpmotors', invImage), invThumbnail = concat('/phpmotors', invThumbnail)