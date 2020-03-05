<?php
$tab_key = array();
$tab_value[] = array();

function ft_get_book()
{
    global $tab_value, $tab_key;
    if (!($mysqli = mysqli_connect('localhost', 'root', 'rootroot', 'rush00')))
        array_push($errors, "Error: failed to connect to the database");
    $sql = "SELECT * FROM book_table;";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
        { 
            $tmp = array();
            foreach($row as $key=>$value)
            {
                if ($i == 0)        
                    array_push($tab_key, $key);
                    array_push($tmp, $value);
            }
            $tab_value[$i] = $tmp;
            $i++;
        }      
    }
    else
        array_push($errors, "Error: no data the database");
    mysqli_close($mysqli);
    return $tab_value;
}

function ft_display_book()
{
    global $tab_value, $tab_key;
    if (!($mysqli = mysqli_connect('localhost', 'root', 'rootroot', 'rush00')))
        array_push($errors, "Error: failed to connect to the database");
    $sql = "SELECT * FROM book_table;";
    $result = mysqli_query($mysqli, $sql);
    
    if (mysqli_num_rows($result) > 0)
    {
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
        { 
            $tmp = array();
            foreach($row as $key=>$value)
            {
                if ($i == 0)        
                    array_push($tab_key, $key);
                    array_push($tmp, $value);
            }
            $tab_value[$i] = $tmp;
            $i++;
        }      
    }
    else
        array_push($errors, "Error: no data the database");
    mysqli_close($mysqli);
    ?>
    <table class="db_management">
        <thead><tr>
            <?PHP
            foreach ($tab_key as $elem)
                echo "<th>".$elem."</th>";
            ?>
        </tr></thead>
        <tbody>
            <tr>
                <?PHP
                    $i = 0;
                    while ($i < count($tab_value))
                    {
                        foreach($tab_value[$i] as $elem)
                            echo "<td>".$elem."</td>";
                        echo "</tr><tr>";
                        $i++;
                    }
                ?>
            </tr>
        </tbody>

    </table>
    
      <?PHP
}

function ft_display_category()
{
    global $tab_value, $tab_key;
    if (!($mysqli = mysqli_connect('localhost', 'root', 'rootroot', 'rush00')))
        array_push($errors, "Error: failed to connect to the database");
    $sql = "SELECT * FROM category_table;";
    $result = mysqli_query($mysqli, $sql);
    
    if (mysqli_num_rows($result) > 0)
    {
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
        { 
            $tmp = array();
            foreach($row as $key=>$value)
            {
                if ($i == 0)        
                    array_push($tab_key, $key);
                array_push($tmp, $value);
            }
            $tab_value[$i] = $tmp;
            $i++;
        }
            
    } else
        array_push($errors, "Error: no data the database");
    mysqli_close($mysqli);
    ?>
    <table class="db_management">
        <thead><tr>
            <?PHP
            foreach ($tab_key as $elem)
                echo "<th>".$elem."</th>";
            ?>
        </tr></thead>
        <tbody>
            <tr>
                <?PHP
                    $i = 0;
                    while ($i < count($tab_value))
                    {
                        foreach($tab_value[$i] as $elem)
                            echo "<td><input autocomplete >".$elem."</input></td>";
                        echo "</tr><tr>";
                        $i++;
                    }
                ?>
            </tr>
        </tbody>

    </table>
    
      <?PHP
}

function ft_display_user()
{
    global $tab_value, $tab_key;
    if (!($mysqli = mysqli_connect('localhost', 'root', 'rootroot', 'rush00')))
        array_push($errors, "Error: failed to connect to the database");
        $sql = "SELECT * FROM user_table;";
        $result = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($result) > 0)
        {
            $i = 0;
            while($row = mysqli_fetch_assoc($result))
            { 
                $tmp = array();
                foreach($row as $key=>$value)
                {
                    if ($i == 0)        
                        array_push($tab_key, $key);
                        array_push($tmp, $value);
                }
                $tab_value[$i] = $tmp;
                $i++;
            }
                
        } else
            array_push($errors, "Error: no data the database");
    mysqli_close($mysqli);
    ?>
    <table class="db_management">
        <thead><tr>
            <?PHP
            foreach ($tab_key as $elem)
                echo "<th>".$elem."</th>";
            ?>
        </tr></thead>
        <tbody>
            <tr>
                <?PHP
                    $i = 0;
                    while ($i < count($tab_value))
                    {
                        foreach($tab_value[$i] as $elem)
                            echo "<td>".$elem."</td>";
                        echo "</tr><tr>";
                        $i++;
                    }
                ?>
            </tr>
        </tbody>

    </table>
    
      <?PHP
}

?>