function show_date_time() {
	window.setTimeout("show_date_time()",1e3);
	var BirthDay=new Date("February 14,2019 14:19:35"),
	today=new Date,
	timeold=today.getTime()-BirthDay.getTime(),
	msPerDay=864e5,
	e_daysold=timeold/msPerDay,
	daysold=Math.floor(e_daysold),
	e_hrsold=24*(e_daysold-daysold),
	hrsold=Math.floor(e_hrsold),
	e_minsold=60*(e_hrsold-hrsold),
	minsold=Math.floor(60*(e_hrsold-hrsold)),
	seconds=Math.floor(60*(e_minsold-minsold));
	span_dt_dt.innerHTML="<font color=black>"+daysold+"</font> 天 <font color=black>"+hrsold+"</font> 时 <font color=black>"+minsold+"</font> 分 <font color=black>"+seconds+"</font> 秒";} 
	show_date_time();