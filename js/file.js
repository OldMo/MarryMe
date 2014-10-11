function readFile(filename){
	var fso = new ActiveXObject("Scripting.FileSystemObject");
	var f = fso.OpenTextFile(filename,1);
	var s = "";
	while(!f.AtEndOfStream){
		s += f.ReadLine()+"\n";
	}
	f.Close();
	return s;
}

function writeFile(filename,content){
	
	var fso = new ActiveXObject("Scripting.FileSystemObject");
	alert(filename);
	var f = fso.OpenTextFile(filename,8,true);
	f.WriteLine(content);
	f.Close();
	alert("");
}