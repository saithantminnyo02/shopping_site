window.addEventListener("DOMContentLoaded",()=>{
  var id=document.body.id;
  if (id=="sgnpage") {
    var object={
      file:"verifySignup.php",
      callback:function(data) {
        data.text=data.text.split(",");
        if (data.text[0]=="exists") {
          text(".lazyError","Account already exist");
        }else if (data.text[0]=="err") {
          text(".lazyError","An error occured");
        }
        else if(data.text[0]=="success"){
          hide("#form");
          var faObj={
            mail:data.text[1],
            parent:"#faForm",
            length:6,
            file:"verifyAcc.php",
            callback:function (data) {
              console.log(data.text);
              if (data.text=="wrongCode") {
                text(".lazyError","Wrong Code");
              }else if(data.text=="success") {
                addClass(".lazyError","success")
                text(".lazyError","Verified");
                setTimeout(function () {
                  window.location="login.php";
                },200);
              }else {
                text(".lazyError","An error occured");
              }
            }
          };
          enterCode(faObj);
        }
      },
      parent:"#form"
    };
    lazySgnForm(object);
    $("#Btn").addEventListener("click",function() {
      window.location="login.php";
    });
  }
  else if (id=="lgnpage") {
    var object={
      file:"verifyLogin.php",
      callback:function(data) {
        console.log(data.text);
        data.text=data.text.split(",");
        var txt=data.text[0];
        if (txt=="notVerified") {
          text(".lazyError","Account has not been verified");
          hide("#form");
          var faObj={
            mail:data.text[1],
            parent:"#faForm",
            length:6,
            file:"verifyAcc.php",
            callback:function (data) {
              if (data.text=="wrongCode") {
                text(".lazyError","Wrong Code");
              }else if(data.text=="success") {
                addClass(".lazyError","success")
                text(".lazyError","Verified");
                setTimeout(function () {
                  window.location="login.php";
                },200);
              }else {
                text(".lazyError","An error occured");
              }
            }
          };
          enterCode(faObj);
        }else if (txt=="wrongPwd") {
          text(".lazyError","Wrong Password");

        }else if(txt=="success"){
          addClass(".lazyError","success");
          text(".lazyError","Success");
          setTimeout(function () {
            window.location="account.php";
          },2000);
        }else if (txt=="notExists") {
          text(".lazyError","Account does not exists");

        }
      },
      parent:"#form"
    };
    lazyLgnForm(object);
    $("#Btn").addEventListener("click",function() {
      window.location="signup.php";
    });
    $("#fgtBtn").addEventListener("click",function() {
      window.location="forgetPassword.php";
    });
  }
  else if (id=="fgtPwd") {
    hide(".logo h3");
    var mail;
    hide("#entCd,#newPwd");
    var object={
      file:"sendForgetCode.php",
      callback:function(data) {
        data.text=data.text.split(",");
        if (data.text[0]=="success") {
          hide("#form");
          $("#entCd").style.display="inline-block";
          var codeObject={
            length:6,
            mail:data.text[1],
            file:"verifyReset.php",
            callback:function(data) {
              console.log(data.text);
              data.text=data.text.split(",");
              if (data.text[0]=="success") {
                hide("#entCd");
                $("#newPwd").style.display="inline-block";
                var newPwdOnj={
                  mail:data.text[1],
                  file:"enterNewPwd.php",
                  callback:function(data) {
                    console.log(data.text);
                    if (data.text) {
                      show(".logo h3");
                      setTimeout(function() {
                        window.location="login.php";
                      },500);
                    }
                  },
                  parent:"#newPwd"
                };
                newPassword(newPwdOnj);
              }
              else if(data.text[0]=='wrong'){
                text(".lazyError","Wrong code");
              }
            },
            parent:"#entCd"
          };
          enterCode(codeObject);
        }
        else if(data.text[0]=='ntdF'){
          text(".lazyError","Account not exist");
        }
      },
      parent:"#form"
    };
    enterEmail(object);
    $("#Btn").addEventListener("click",function() {
      window.location="login.php";
    });
  }
});
