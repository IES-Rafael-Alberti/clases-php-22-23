SELECT m.nombre as mascota, u.nombre as 'acogido por' FROM mascota as m INNER JOIN usuario as u ON m.id_usuario = u.id; 
SELECT * FROM `mascota` WHERE id_usuario is NULL; 