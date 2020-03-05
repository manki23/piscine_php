<?PHP
    session_start();
    include './registration/db_install_funct.php';
    ft_reset_db();
    ft_create_table();
    ft_fill_table();
?>