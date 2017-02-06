<?php
class DB
{
    // init the database connection
    private static function init()
    {
        $user = 'root';
        $password = 'root';
        $db = 'Wax_Palm';
        $host = 'localhost';
        $port = 3306;

        $link = mysqli_connect( $host, $user, $password, $db, $port);

        return $link;
    }

    // SELECT...
    // returns array of results
    public static function select(string $query)
    {
        $aReturn = array();
        $link = self::init();

        $result = mysql_query($query, $link);
        if ($result)
        {
            $rows = mysql_num_rows($result);
            $resultArray = mysql_fetch_array($result);

            $aReturn['rowcount'] = $rows;
            $aReturn['rows'] = $resultArray;
        }
        else
        {
            // query failed
            $aReturn['rowcount'] = 0;
        }
        
        return $aReturn;
    }
}
?>