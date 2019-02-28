
function RemoveChinese(strValue) {  
    if(strValue!= null && strValue != ""){  
        var reg = /[\u4e00-\u9fa5]/g;   
       return strValue.replace(reg, "");   
    }  
    else  
        return "";  
}  
