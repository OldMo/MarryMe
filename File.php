<?PHP
$data_array = array(
    array(
	'id' = '',
    'blessing' => 'content',
    'name' => 'jl',
    'count' => '1',
	'date'	=>'2009-10-11',
    )
);

//  创建一个XML文档并设置XML版本和编码。。
$dom=new DomDocument('1.0', 'utf-8');
 
//  创建根节点
$information = $dom->createElement('information');
$dom->appendchild($information);
 
foreach ($data_array as $data) {
    $item = $dom->createElement('item');
    $information->appendchild($item);
	
    create_item($dom, $item, $data, $attribute_array);
}
 
echo $dom->saveXML();
writeFile($dom->saveXML());
 
/*创建节点*/
function create_item($dom, $item, $data, $attribute) {
    if (is_array($data)) {
        foreach ($data as $key => $val) {
            //  创建元素
            $$key = $dom->createElement($key);
            $item->appendchild($$key);
            //  创建元素值
            $text = $dom->createTextNode($val);
            $$key->appendchild($text);
        }
    }   //  end if
}   //  end function

/*将xml写入文件*/
function writeFile($content){
	$fp = fopen("file/pray.xml","w");
   
    if(!$fp){
        echo "system error";
        exit();
    }else {
            fwrite($fp,$content);
            fclose($fp);
    }
}
?>