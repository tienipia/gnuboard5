<?php
exit();
include_once ('./common.php');

$handle = fopen("text", "r");
if ($handle) {
    $idx = 1;
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $line = trim($line);

        if ($line) {
            $line = ltrim($line, '(');
            $line = rtrim($line, ')');

            $splits = explode(',', $line, 3);

            $splits[2] = ltrim($splits[2], '\'');
            $splits[2] = rtrim($splits[2], '\'');

            $json = json_decode($splits[2]);
            if ($json->image) {

                $json->image = ltrim($json->image, 'https://cdn-zone-a.tienipia.com/local/');
                $json->image = rtrim($json->image, '.png');
                $json->image = rtrim($json->image, '.jpg');

                if ($json->image == 'reasify.com.au/wp-content/uploads/2016/08/default-image') {
                    continue;
                }

                echo $splits[0]; // wr_1
                echo "\t";
                echo $splits[1]; // wr_2
                echo "\t";
                echo $json->image; // wr_5
                echo "\t";
                echo $json->title; // wr_subject
                echo "\n";
                echo "\n";
            }
            // echo $splits[0]; // wr_1
            // echo "\n";
            // echo $splits[1]; // wr_2
            // echo "\n";

            // if($json->pdf == '-')
            // $json->pdf = '';

            // echo $json->pdf; // wr_link2
            // echo "\n";
            // echo $json->vol; // wr_6
            // echo "\n";
            // if($json->link == '-')
            // $json->link = '';

            // echo $json->link; // wr_link1
            // echo "\n";
            // echo $json->title; // wr_subject
            // echo "\n";
            // echo $json->author; // wr_3
            // echo "\n";
            // echo $json->journal; // wr_4
            // echo "\n";
            // echo $json->page_num; // wr_7
            // echo "\n";
            // echo $json->journal_abbr; // wr_5
            // echo "\n";
            // echo $json->image; // wr_5
            // echo "\n";
            // echo "\n";

            // sql_query('update g5_write_journal set wr_parent = ' . $idx .
            // ', wr_1 = "'.$splits[0].'" '.
            // ', wr_2 = "'.$splits[1].'" '.
            // ', wr_3 = "'.$json->author.'" '.
            // ', wr_4 = "'.$json->journal.'" '.
            // ', wr_5 = "'.$json->journal_abbr.'" '.
            // ', wr_6 = "'.$json->vol.'" '.
            // ', wr_7 = "'.$json->page_num.'" '.
            // ', wr_link1 = "'.$json->link.'" '.
            // ', wr_link2 = "'.$json->pdf.'" '.
            // ', wr_subject = "'.$json->title.'" '.
            // ' where wr_id = ' . $idx ++);
        }
    }

    fclose($handle);
} else {
    // error opening the file.
}
?>
