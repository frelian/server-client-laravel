/* Procedimiento Obtener los usuarios y el tipo de documento */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUsersAndDocTypes`()
    COMMENT 'Obtener los usuarios y sus tipos de documento'
BEGIN
    SELECT
        users.id as id_user,
        users.name,
        users.surname,
        users.identification,
        users.created_at as users_created_at,
        users.updated_at as users_updated_at,
        document_types.id as id_doc_type,
        document_types.type_name
    FROM
        users
            LEFT JOIN
        document_types On document_types.id = users.document_type_id;
END$$
DELIMITER ;

/* Procedimiento de obtener usuario */
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUser`(IN `id` INT(100))
BEGIN
    SELECT
        users.id as id_user,
        users.name,
        users.surname,
        users.identification,
        users.created_at as users_created_at,
        users.updated_at as users_updated_at,
        document_types.id as id_doc_type,
        document_types.type_name
    FROM
        users
            LEFT JOIN
        document_types On document_types.id = users.document_type_id
    WHERE
            users.id = id;
END$$
DELIMITER ;
