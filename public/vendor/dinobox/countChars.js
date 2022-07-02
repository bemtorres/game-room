function countChars(obj, maxLength = 20, text = 'limitC'){
  var strLength = obj.value.length;
  var charRemain = (maxLength - strLength);
  if(charRemain < 0){
    document.getElementById(text).innerHTML = '<span style="color: red;">Has superado el límite de '+maxLength+' caracteres</span>';
  }else{
    document.getElementById(text).innerHTML = charRemain+' caracteres restantes';
  }
}