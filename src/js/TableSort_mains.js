
var IsAsc=true;

function SortTable(TableID,Col,DataType){ 
	
	IsAsc=!IsAsc; 
	var DTable=document.getElementById(TableID); 
	var DBody=DTable.tBodies[0]; 
	var DataRows=DBody.rows; 
	var MyArr=new Array; 
	for(var i=0;i<DataRows.length;i++){ 
		MyArr[i]=DataRows[i]; 
	} 
	//判断上次排序的列和这次是否为同一列 
	if(DBody.CurrentCol==Col){ 
		MyArr.reverse(); //将数组倒置 
	} 
	else{ 
		MyArr.sort(CustomCompare(Col,DataType)); 
	} 
//创建一个文档碎片，将所有的行都添加进去，相当于一个暂存架，目的是（如果直接加到document.body里面，会插入一行，就刷新一次，如果数据多了就会影响用户体验） 
//先将行全部放在暂存架里面，然后将暂存架里面的行 一起添加到document.body，这样表格只会刷新一次。 
//就像你去商店购物，要先将要买的物品（行）全部写在单子上（文档碎片），然后超市全部购买，而不会想到一样东西就去一次，那么 
	var frag=document.createDocumentFragment(); 
	for(var i=0;i<MyArr.length;i++){ 
		frag.appendChild(MyArr[i]); //将数组里的行全部添加到文档碎片中 
	} 
	DBody.appendChild(frag);//将文档碎片中的行全部添加到 body中 
	DBody.CurrentCol=Col; //记录下当前排序的列 
} 

//自定义的排序方式
function CustomCompare(Col,DataType){ 
	return function CompareTRs(TR1,TR2){ 
		var value1,value2; 
		//判断是不是有customvalue这个属性 
		if(TR1.cells[Col].getAttribute("customvalue")){ 
			value1=convert(TR1.cells[Col].getAttribute("customvalue"),DataType); 
			value2=convert(TR2.cells[Col].getAttribute("customvalue"),DataType); 
		} 
		else{ 
			value1=convert(TR1.cells[Col].firstChild.nodeValue,DataType); 
			value2=convert(TR2.cells[Col].firstChild.nodeValue,DataType); 
		} 
		if(value1 < value2) 
			return -1; 
		else if(value1 > value2) 
			return 1; 
		else 
			return 0; 
	}; 
} 
//格式转换
function convert(DataValue,DataType){ 
	switch(DataType){ 
		case "int": 
		return parseInt(DataValue); 
		case "float": 
		return parseFloat(DataValue); 
		case "date": 
		return new Date(Date.parse(DataValue)); 
		default: 
		return DataValue.toString(); 
	} 
} // JavaScript Document