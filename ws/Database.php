<?php

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            // Configuración coincidente con tu usuario de Ubuntu
            $host = "127.0.0.1"; // Usamos la IP para forzar la conexión TCP
            $dbname = "colegio";  // Nombre de tu BD según tu consulta
            $user = "admin_daw"; // El usuario administrador que creamos
            $password = "Contrasena123*"; // La contraseña que asignamos

            // El DSN correcto para MySQL en Ubuntu
            $dsn = "mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4";

            try {
                self::$connection = new PDO(
                    $dsn,
                    $user,
                    $password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch (PDOException $e) {
                // Si hay un error, lo mostramos para depurar en local
                die("Error de conexión a la BD: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}