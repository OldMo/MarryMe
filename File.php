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

//  ����һ��XML�ĵ�������XML�汾�ͱ��롣��
$dom=new DomDocument('1.0', 'utf-8');
 
//  �������ڵ�
$information = $dom->createElement('information');
$dom->appendchild($information);
 
foreach ($data_array as $data) {
    $item = $dom->createElement('item');
    $information->appendchild($item);
	
    create_item($dom, $item, $data, $attribute_array);
}
 
echo $dom->saveXML();
writeFile($dom->saveXML());
 
/*�����ڵ�*/
function create_item($dom, $item, $data, $attribute) {
    if (is_array($data)) {
        foreach ($data as $key => $val) {
            //  ����Ԫ��
            $$key = $dom->createElement($key);
            $item->appendchild($$key);
            //  ����Ԫ��ֵ
            $text = $dom->createTextNode($val);
            $$key->appendchild($text);
        }
    }   //  end if
}   //  end function

/*��xmlд���ļ�*/
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