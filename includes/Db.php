<?php

class JaDB
{

    private static $wpdb;

    public static function init()
    {
        global $wpdb;
        self::$wpdb = $wpdb;
    }

    public static function createDbTables()
    {

        $charset_collate = self::$wpdb->get_charset_collate();
        $table_name = self::$wpdb->prefix . 'reviews';

        $sql = "CREATE TABLE $table_name (
        id int(11) NOT NULL AUTO_INCREMENT,
        review_stars int(255) NOT NULL,
        reviewer_img varchar(500) NOT NULL,
        review_content text NOT NULL,
        reviewer_name varchar(255) NOT NULL,
        review_date datetime NOT NULL,
        PRIMARY KEY (id)
      ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        return true;
    }

    public static function dropDbTable()
    {
        self::$wpdb->query("DROP TABLE IF EXISTS " . self::$wpdb->prefix . "reviews");
    }

    public static function is_table_exists()
    {
        $result = self::$wpdb->get_results("SHOW TABLES LIKE '" . self::$wpdb->prefix . "reviews'");
        $table = count($result) > 0;
        if ($table == 0) {
            self::createDbTables();
        }
    }
}

JaDB::init();
