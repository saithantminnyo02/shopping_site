var device ={
    width:screen.width,
    height:screen.height,
    OS:(function(){
      var userAgent = window.navigator.userAgent,
          platform = window.navigator.platform,
          macos = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
          windowos = ['Win32', 'Win64', 'Windows', 'WinCE'],
          ios = ['iPhone', 'iPad', 'iPod'],
          os = null;
      if (macos.indexOf(platform) !== -1) {
        os = 'Mac OS';
      } else if (ios.indexOf(platform) !== -1) {
        os = 'iOS';
      } else if (windowos.indexOf(platform) !== -1) {
        os = 'Window';
      } else if (/Android/.test(userAgent)) {
        os = 'Android';
      } else if (!os && /Linux/.test(platform)) {
        os = 'Linux';
      }
      return os;
    })()
  };
function lazySgnForm(object) {
 var fieldClass=object.inputClass?object.inputClass:"lazyField,lazyInput";
 var btnClass  =object.btnClass?object.btnClass:"lazyBtn";
 var parentEle =object.parent?$(object.parent):document.body;
 var accTyp;
 var sgnForm=form(),
     usrname=input("?type=text (Username) ."+fieldClass),
     contact=input("?type=text (Email) ."+fieldClass),
     pswd1  =input("?type=password (Password) ."+fieldClass),
     pswd2  =input("?type=password (Confirm Password) ."+fieldClass),
     btn    =div("(Signup) ."+btnClass),
     err_msg=p(".lazyError");
     css(sgnForm,"display:inline-block");

     append(sgnForm,err_msg,usrname,contact,pswd1,pswd2,btn);

     function validSgn(){
           text(err_msg,'');
           var username=usrname.value.trim(),
               email   =contact.value.trim(),
               pass    =pswd1.value.trim(),
               rpass   =pswd2.value.trim();
           if (username.length<=0) {
               text(err_msg,"Enter Username");
               usrname.focus();
               return false;
           }
           if (email.length<=0) {
               text(err_msg,"Enter Email");
               contact.focus();
               return false;
           }
           if (pass.length<=0) {
               text(err_msg,"Enter Password");
               pswd1.focus();
               return false;
           }
           if (rpass.length<=0) {
               text(err_msg,"Enter Confirm Password");
               pswd2.focus();
               return false;
           }
           if (!isEmail(email)) {
                if (!isPhone(email)) {
                  text(err_msg,"Email adress is invalid");
                  contact.focus();
                  return false;
                }
           }
           if (pass!=rpass) {
               text(err_msg,"Passwords do not match");
               pswd2.focus();
               return false;
           }
           if (pass.length<8 || rpass.length<8) {
               text(err_msg,"Password minium length is 8");
               pswd1.focus();
               return false;
           }
           if (!isUsername(username)) {
             text(err_msg,"Username is invalid");
             usrname.focus();
             return false;
           }
           return true;
         }
     function sendData(eve) {
           eve.preventDefault();
            if(validSgn()){
              if (object && object.file && object.callback) {
                var sendSgn=ajax(object.file,function(data) {
                  console.log(data.text);
                  text(btn,"Done");
                  setTimeout(function () {
                    text(btn,"Signup");
                  },3000);
                  object.callback(data);
                },function(data) {
                  text(span,"Error!");
                  if (data.status==404) {
                    text(".lazyError","Error 404 file not found");
                  }
                },function () {
                    text(btn,"Sending...");
                });
                var postString="username="+usrname.value.trim()+",email="+contact.value.trim()+",password="+pswd1.value.trim();
                sendSgn.post(postString);
              }
            }
          }
      btn.addEventListener("click",sendData);
      append(parentEle,sgnForm);
}
function lazyLgnForm(object) {
  var fieldClass=object.inputClass?object.inputClass:"lazyField,lazyInput";
  var btnClass  =object.btnClass?object.btnClass:"lazyBtn";
  var parentEle =(object.parent)?$(object.parent):document.body;
  var rmbBtnvalue;
      var lgnForm   =form(),
          contact=input("(Email) ?type=text ."+fieldClass),
          pwd    =input("(Password) ?type=password ."+fieldClass),
          rmbDiv =div(".lazyRemember"),
          rmbBtn =span(),
          rmbTxt =p("(Remember me)"),
          btn    =div("(Login) ."+btnClass),
          err_msg=p(".lazyError");
          css(lgnForm,"display:inline-block;text-align:left;");
          append(rmbDiv,rmbBtn,rmbTxt);
          append(lgnForm,err_msg,contact,pwd,rmbDiv,btn);
      rmbBtn.addEventListener("click",function() {
        tglClass(rmbBtn,"checked");
        rmbBtnvalue=hasClass(rmbBtn,"checked");
      });
      function validLgn(){
                text(err_msg,'');
                 var email   =contact.value.trim();
                 var pass    =pwd.value.trim();
                 if (email.length<=0) {
                     text(err_msg,"Enter Email");
                     contact.focus();
                     return false;
                 }
                 if (pass.length<=0) {
                     text(err_msg,"Enter Password");
                     pwd.focus();
                     return false;
                 }
                 if (!isEmail(email)) {
                      if (!isPhone(email)) {
                        text(err_msg,"Email adress is invalid");
                        contact.focus();
                        return false;
                      }
                 }
                 if (pass.length<8 ) {
                     text(err_msg,"Password minium length is 8");
                     pwd.focus();
                     return false;
                 }
                 return true;
               }
      function sendData(eve) {
        eve.preventDefault();
         if(validLgn()){
           if (object && object.file && object.callback) {
             var sendLgn=ajax(object.file,function(data) {
               text(btn,"Done");
               setTimeout(function () {
                 text(btn,"Login");
               },2000);
               object.callback(data);
             },function(data) {
               if (data.status==404) {
               text(".lazyError","Error 404 file not found");
               text(btn,"Error");
               }
             },function (data) {
               if (!(object && object.className && object.className.button)) {
               text(btn,"Sending...");
                 }
               });
               var postString="mail="+contact.value.trim()+",password="+pwd.value.trim()+",remember="+rmbBtnvalue+",device="+device.OS;
               sendLgn.post(postString);
             }
            }
      }
      btn.addEventListener("click",sendData);
      append(parentEle,lgnForm);
    }
function convertTime(sec){
  sec=Math.round(sec);
  var min=Math.round(sec/60);
  var hr=Math.round(min/60);
  var dy=Math.round(hr/24);
  var week=Math.round(dy/7);
  var month=Math.round(week/30);
  if (min<60) {
    return min+" min";
  }
  else if (hr>=1 && hr<24) {
    return hr+" hr";
  }
  else if (dy>=1 && dy<7) {
    return dy+" day";
  }
  else if (week>=1 && week<4) {
    return week+" week";
  }
  else if (month>=1 && month<4) {
    return month+" month";
  }
}
function enterEmail(object){
      var inputClass=object.inputClass?object.inputClass:"lazyInput,lazyField";
      var buttonClass=object.btnClass?object.btnClass:"lazyBtn";
      var parentEle =(object.parent)?$(object.parent):document.body;
      var fotgetForm   =form();
      fotgetForm.style.display="inline-block";
      var forgetEmail=input("(Email) ."+inputClass),
          submitBtn=div("(Send Code) ."+buttonClass),
          err_msg=span(".lazyError");
      append(fotgetForm,err_msg,forgetEmail,submitBtn);
      append(parentEle,fotgetForm);
      submitBtn.addEventListener("click",function() {
        html(err_msg,"");
        if (isEmail(forgetEmail.value.trim())) {
          if (object.file && object.callback) {
            var sendEmail=ajax(object.file,function(data) {
              text(submitBtn,"Done");
              object.callback(data);
            },function(data) {
              text(submitBtn,"Error");
              if (data.status==404) {
                text(".lazyError","Error 404 file not found");
              }
            },function (data) {
                text(submitBtn,"Sending....");
            });
            console.log(object.file);
            var postString="email="+forgetEmail.value.trim();
            sendEmail.post(postString);
          }
        }
        else {
          html(err_msg,"Invalid email");
        }
      });
    }
function enterCode(object){
      var verifyForm   =form();
      verifyForm.style.display="inline-block";
      var code=input(".lazyInput,lazyField (Enter code)"),
          submitBtn=div(".lazyBtn (Submit)"),
          err_msg=span(".lazyError");
      var parentEle =(object.parent)?$(object.parent):document.body;
      append(verifyForm,err_msg,code,submitBtn);
      append(parentEle,verifyForm);
      submitBtn.addEventListener("click",function() {
        html(err_msg,"");
        if (code.value.trim().length==object.length) {
          if (object && object.file && object.callback) {
            var signup=ajax(object.file,function(data) {
              text(submitBtn,"Submit");
              object.callback(data);
            },function(data) {
              text(submitBtn,"Error");
              if (data.status==404) {
                text(".lazyError","Error 404 file not found");
              }
            },function (data) {
              if (!(object && object.className && object.className.button)) {
                text(submitBtn,"Sending....");
              }
            });
            var postString="code="+code.value.trim()+",mail="+object.mail;
            signup.post(postString);
          }
        }
        else {
          html(err_msg,"Invalid code");
        }
      });
    }
function json(data,replacer,space) {
             var type=typeof data;
             if (type === "string") {
               data=$String(data);
               return JSON.parse(data,replacer);
             }else if (type === "object") {
               return JSON.stringify(data,replacer,space);
             }else {
               return false;
             }
           }
function newPassword(object) {
      var verifyForm   =form();
      verifyForm.style.display="inline-block";
      var newPassword=input(".lazyInput,lazyField (New Password) ?type=password"),
          newPasswordC=input(".lazyInput,lazyField (Confirm Password) ?type=password"),
          submitBtn=div(".lazyBtn (Submit)"),
          err_msg=span(".lazyError");
      append(verifyForm,err_msg,newPassword,newPasswordC,submitBtn);
      object.parent=$(object.parent);
      append(object.parent,verifyForm);
      submitBtn.addEventListener("click",function() {
        html(err_msg,"");
        if (newPassword.value.length>=8) {
            console.log(newPassword.value);
          if (newPassword.value.trim()==newPasswordC.value.trim()) {
            if (object && object.file && object.callback) {
              var signup=ajax(object.file,function(data) {
                text(submitBtn,"Done");
                object.callback(data);
              },function(data) {
                text(submitBtn,"Error");
                if (data.status==404) {
                  text(".lazyError","Error 404 file not found");
                }
              },function (data) {
                if (!(object && object.className && object.className.button)) {
                  text(submitBtn,"Sending....");
                }
              });
              var postString="password="+newPassword.value.trim()+",mail="+object.mail;
              signup.post(postString);
            }
          }else {
            html(err_msg,"Password do not match");
          }
        }
        else {
          console.log(newPassword.value.length);
          html(err_msg,"Password minium length is 8");
        }
      });
    }
function $(pattern) {
     if(typeof pattern  === "object"){
       return pattern;
     }
     else{
       if (pattern[0]=="@") {
         pattern=pattern.slice(1);
         var element=document.getElementsByName(pattern);
         var len=element.length;
         if (len>1) {
             element=document.getElementsByName(pattern);
         }
         else {
             element=document.getElementsByName(pattern)[0];
         }
       }
       else {
         var element=document.querySelectorAll(pattern);
         var len=element.length;
         if (len>1) {
             element=document.querySelectorAll(pattern);
         }
         else {
             element=document.querySelectorAll(pattern)[0];
         }
       }
       return element;
     }
    }
function text(element,val) {
   element=$(element);
   if (val === undefined) {
     return element.textContent;
   }
   else {
     val=$String(val);
     var l=element.length;
     if (l > 1) {
       for (var i = 0; i < l; i++) {
         element[i].textContent=val;
       }
     }
     else {
       element.textContent=val;
     }
   }
 }
function isString(string) {
             if (typeof string==='string') {
               return true;
             }
             else {
               return false;
             }
           }
function isFunction( para ) {
     return typeof para === "function" && typeof para.nodeType !== "number";
 };
function isEmail(email) {
                    var emailID = email.trim();
                    var atpos = emailID.indexOf("@");
                    var dotpos = emailID.lastIndexOf(".");
                    if (atpos < 1 || ( dotpos - atpos < 2 )) {
                       return false;
                    }else {
                      return true;
                    }
                 }
function isPhone(phone) {
 if (isString(phone)) {
   phone=phone.trim();
 }
 if (phone.length>20) {
   return false;
 }
 var regExp = /[^0-9 ]/gi;
 return !(regExp.test(phone));
           }
function isUsername(name) {
             name=name.trim();
             if (name.length>20) {
               return false;
             }
             var regExp = /[^a-z ]/gi;
               return !(regExp.test(name));
                       }
function isURL(str) {
 var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
   '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
   '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
   '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
   '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
   '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
 return !!pattern.test(str);
}
function $String(text){
 if (isString(text)){
   var len=text.length;
   for (var i = 0; i < len; i++) {
     len=text.length;
     if (text[i]==="$"){
       var variable="";
       for (var ii = i; ii < len; ii++) {
         variable+=text[ii];
         if (text[ii]==" ") {
           text=text.replace(variable,"|+|");
           variable=variable.replace("$","");
           variable=variable.replace(" ","");
           text=text.split("|+|");
           var isArray=variable.split(".");
           if (isArray.length>1) {
             var index;
             variable=window[isArray[0]];
             for (var i = 1; i < isArray.length; i++) {
               index=isArray[i];
               if (index[0]=="$") {
                 index=index.replace("$","");
                 index=window[index];
               }
                 variable=variable[index];
             }
           }else {
             variable=window[variable];
           }
           text=text[0]+variable+text[1];
           break;
         }
       }
     }
   }
 }
 return text;
}
function html(element,val) {
   element=$(element);
   if (val === undefined) {
     return element.innerHTML;
   }
   else {
     val=$String(val);
     var l=element.length;
     if (l > 1) {
       for (var i = 0; i < l; i++) {
         element[i].innerHTML=val;
       }
     }
     else {
       element.innerHTML=val;
     }
   }
 }
function addClass(element,class_name) {
 element=$(element);
 var cl=class_name.split(",");
 if (element.length===undefined) {
   for (var j = 0; j < cl.length; j++) {
     element.classList.add(cl[j]);
     }
 }
 else {
   for (var i = 0; i < element.length; i++) {
     for (var j = 0; j < cl.length; j++) {
       element[i].classList.add(cl[j]);
       }
   }
 }
}
function tglClass(element,class_name) {
 element=$(element);
 var cl=class_name.split(",");
 if (element.length===undefined) {
   for (var j = 0; j < cl.length; j++) {
     element.classList.toggle(cl[j]);
     }
 }
 else {
   for (var i = 0; i < element.length; i++) {
     for (var j = 0; j < cl.length; j++) {
       element[i].classList.toggle(cl[j]);
       }
   }
 }
}
function rmvClass(element,class_name) {
 element=$(element);
 var cl=class_name.split(",");
 if (element.length===undefined) {
   for (var j = 0; j < cl.length; j++) {
     element.classList.remove(cl[j]);
     }
 }
 else {
   for (var i = 0; i < element.length; i++) {
     for (var j = 0; j < cl.length; j++) {
       element[i].classList.remove(cl[j]);
       }
   }
 }
}
function hasClass(element,class_name) {
element=$(element);
var classes=class_name.split(",");
var classes_length=classes.length;
var result=false;
if (element.length===undefined) {
  for (var i = 0; i < classes_length; i++) {
    result=element.classList.contains(classes[i]);
  }
}
else {
  for (var i = 0; i < element.length; i++) {
    for (var ii = 0; ii < cl.length; ii++) {
      result=element[i].classList.contains(classes[ii]);
    }
  }
}
return result;
}
function css(element,css_style) {
   element=$(element);
   var len=css_style.length-1;
   if (css_style[len]==";") {
     css_style=css_style.substring(0,len);
   }
   css_style=$String(css_style);
   var css=css_style.split(";");
   if (element.length){
     var l=element.length;
     for (var i = 0; i < l; i++) {
       for (var j = 0; j < css.length; j++) {
         var p=css[j].split(":");
         p[0]=p[0].trim();
         p[1]=p[1].trim();
         element[i].style.setProperty(p[0],p[1]);
       }
     }
   }
   else {
     for (var i = 0; i < css.length; i++) {
          var p=css[i].split(":");
          p[0]=p[0].trim();
          p[1]=p[1].trim();
          element.style.setProperty(p[0],p[1]);
     }
   }
}
function reverseString(str) {
    return str.split("").reverse().join("");
}
function copyCmd(text) {
  var txtarea = document.createElement("textarea");
  document.body.appendChild(txtarea);
  txtarea.style.left="-2000px";
  txtarea.style.width=0;
  txtarea.style.height=0;
  txtarea.style.opacity=0;
  txtarea.value = text;
  txtarea.focus();
  txtarea.select();
  var status=document.execCommand('copy');
  document.body.removeChild(txtarea);
  return status;
}
function copy(text) {
 text=$String(text);
if (!navigator.clipboard) {
  return copyCmd(text);
}
else {
  if (navigator.clipboard.writeText(text)){
    return true;
  }
  else{
    return copyCmd(text);
  }
}
}
function ajax(filename,success,failure,processing) {

 if (this === undefined || this === window) {
   return new ajax(filename,success,failure,processing);
 }
 if (window.XMLHttpRequest) {
 var ajx=new XMLHttpRequest();
 }
 else {
 var ajx=new ActiveXObject("Microsoft.XMLHTTP");
 }
var file=filename;
ajx.onreadystatechange=function(){
 this.data={
   text:ajx.responseText,
   status:ajx.status,
   xml:ajx.responseXML,
 };
 if (processing) {
   if (ajx.readyState<=3) {
      processing(this.data);
   }
 }
 if (ajx.readyState==4) {
   if (ajx.status ==200) {
     if (success) {
       success(this.data);
     }
     else {
       log("Success function is not defined for"+this);
     }
   }
   else {
     if (failure) {
       failure(this.data);
     }
   }
   }
}
this.post=function(string) {
 var data="";
 if (string) {
   string=string.split(",");
   var len=string.length;
   for (var i = 0; i < len; i++) {
     data+=string[i]+"&";
   }
   data=data.substring(0,data.length-1);
 }
 ajx.open("POST",file,true);
 ajx.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 ajx.send(data);
};
this.get=function() {
 ajx.open("GET",file,true);
 //ajx.responseType = 'json';
 ajx.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 ajx.send();
};
}
function p(query) {
  query=query?query:"";
  return create("p "+query);
}
function div(query) {
  query=query?query:"";
  return create("div "+query);
}
function h2(query) {
  query=query?query:"";
  return create("h2 "+query);
}
function h3(query) {
  query=query?query:"";
  return create("h3 "+query);
}
function input(query) {
  query=query?query:"";
  return create("input "+query);
}
function img(query) {
  query=query?query:"";
  return create("img "+query);
}
function attr(element,property,val) {
 element=$(element);
 if (val === undefined) {
   return element.getAttribute(property);
 }
 else {
   var l=element.length;
   if (!l) {
     element.setAttribute(property,val);
   }
   else {
     for (var i = 0; i < l; i++) {
       element[i].setAttribute(property,val);
     }
   }
 }
}
function create(query) {
  query=query.split(/[()]+/);
  if (query.length>2) {
    query[0]+=query[2];
  }
  var query,valueString,i,ii;
  var string=query[0].split(" ");
  var element=document.createElement(string[0]);

  if (query.length>1) {
    if (string[0]=="input") {
      element.placeholder=query[1];
    }else {
      html(element,query[1]);
    }
  }
  for ( i = 1; i < string.length; i++) {
     query=string[i][0];
     valueString=string[i].slice(1);
     if (query==".") {
       addClass(element,valueString);
     }
     else if (query=="#") {
       element.id=valueString;
     }
     else if (query=="?") {
       valueString=valueString.split(",");
       for (ii = 0; ii < valueString.length; ii++) {
         valueString[ii]=valueString[ii].split("=");
         var property=valueString[ii][0];
         var val=valueString[ii][1];

         attr(element,property,val);
       }
     }
     else if (query=="@") {
       element.name=valueString;
     }
  }
  return element;
}
function append() {
  var par=arguments[0];
  for (var i = 1; i < arguments.length; i++) {
    par.appendChild(arguments[i]);
  }
}
function span(query) {
  query=query?query:"";
  return create("span "+query);
}
function a(query) {
  query=query?query:"";
  return create("a "+query);
}
function form(query) {
  query=query?query:"";
  return create("form "+query);
}
function echo(text) {
 text=$String(text);
 document.write(text);
           }
function hide(element) {
   element=$(element);
   if (typeof(element.length)=="number"){
     for (var i = 0; i < element.length; i++) {
       element[i].style.display="none";
     }
   }
   else {
       element.style.display="none";
   }
}
function show(element) {
   element=$(element);
   if (typeof(element.length)=="number"){
     for (var i = 0; i < element.length; i++) {
       element[i].style.display="block";
     }
   }
   else {
       element.style.display="block";
   }
}
function click(element,fun) {
  element=$(element);
  if (element.length>1) {
    for (var i = 0; i < element.length; i++) {
      element[i].addEventListener("click",fun);
    }
  }else {
    element.addEventListener("click",fun);
  }
}
function vibrate(pattern){
 if (window.navigator.vibrate(pattern)){
   return true;
 }
 else {
   return false;
 }
}
