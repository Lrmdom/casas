<?php

header('Content-type: text/plain');

$myArray = Array(
    name => 'account',
    attr =>
    Array(
        id => 123456
    ),
    children => Array(
        Array(
            name => 'name',
            attr => Array(),
            children => Array(
                'BBC'
            ),
        ),
        Array(
            name => 'monitors',
            attr => Array(),
            children => Array(
                Array(
                    name => 'monitor',
                    attr => Array(
                        id => 5235632
                    ),
                    children => Array(
                        Array(
                            name => 'url',
                            attr => Array(),
                            children => Array(
                                'http://www.bbc.co.uk/'
                            )
                        )
                    )
                ),
                Array(
                    name => 'monitor',
                    attr => Array(
                        id => 5235633555
                    ),
                    children => Array(
                        Array(
                            name => 'url',
                            attr => Array(),
                            children => Array(
                                'http://www.bbc.co.uk/news'
                            )
                        )
                    )
                )
            )
        )
    )
);

function array_2_xml($array, $option) {
    if ($option == "json") {
        $json = json_encode($array);
        return $json;
    } else {


        $xml.= "<account";
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (key_exists('id', $value)) {
                    $xml.= getId($value);
                }
                $data = getName($value);
                $xml.= $data[0];
                if (is_array($data[1]) && key_exists('name', $data[1])) {

                    $xml.=getMonitors($data[1]);
                }
            }
        }
        $xml.= "\n</account>";
        return $xml;
    }
}

function getId($array) {
    foreach ($array as $key => $value) {
        $xml.= " id='$value'>";
    }
    return $xml;
}

function getName($array) {
    foreach ($array as $key => $value) {
        if (is_array($value) && key_exists('name', $value)) {
            foreach ($value as $key => $val) {
                if ($val == 'name') {
                    $xml = "\n<$val>" . $value['children'][0] . "</$val>";
                    $data = [$xml, $array[1]];
                    return $data;
                }
            }
        }
    }
}

function getMonitors($array) {
    $name = $array['name'];
    $xml.= "\n<$name>";
    $xml.= getMonitor($array['children']);
    $xml .= "\n</$name>";
    return $xml;
}

function getMonitor($array) {
    $xml = "";
    foreach ($array as $key => $value) {
        $monitor = "\n<monitor";
        $monitor .= getid($value['attr']);
        $monitor .= "\n<url>";
        $monitor .= $value["children"][0]["children"][0];
        $monitor .= "</url>";
        $monitor .= "\n</monitor>";
        $xml.=$monitor;
    }
    return $xml;
}

// optionally convert to json

echo array_2_xml($myArray, "xml");


//must test code before deploy to production
?>
