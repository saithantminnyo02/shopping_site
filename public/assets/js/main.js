var recordDataObj=new Array(),recordReqTyp,usrPic;
var currentOrderId;
var dashboardUpd,transcationUpd,profileUpd;
function generateHash(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return "sp_"+result;
}
var monthArr=new Array(),monthInc=new Array(),monthOut=new Array(),monthDif=new Array();
window.addEventListener("DOMContentLoaded",(ev)=>{
  click("#logout",function () {
    fetch("logout.php")
    .then(response => {
      window.location="../index.php";
    })
    .catch(err=>console.log(err));
  });

  function setPpBtm() {
    var getProfile=ajax("getUserData.php",
  function (data) {
    var profileData=json(data.text);
    $("#usrPic").src=profileData["pic"];
    usrPic=profileData["pic"];
  });
    getProfile.post("data=profile");
  }
  var updateStatus=ajax("activeStatus.php",function (data) {
    console.log(data.text);
  });
  updateStatus.post("status="+navigator.onLine);
  setPpBtm();
  var bdyDom;
  var keyPres=false;
  var d = new Date();
  var n = d.getFullYear();
  var iconDiv=$(".iconDiv");
  var imgDiv=new Array();
  var imgArr=[img("?src=../img/dashboard.svg .icon"),
              img("?src=../img/transcation.png .icon"),
              img("?src=../uploads/defaultPp.png .profile #usrPic"),
              img("?src=../img/exchange.svg .icon"),
              img("?src=../img/shop.png .icon")];
  var loading=div(".loader");
  var bdy =$("#body");
  //hide(loading);
  //append(bdy,loading);
  var currentImg=false;
  imgArr.forEach(setImg);
  function setImg(item,index){
   imgDiv[index]=div();
   append(imgDiv[index],item);
   append(iconDiv,imgDiv[index]);
   click(imgDiv[index],function (element) {
     clickImg(element,index);
   });
  }
  clickImg(imgDiv[0],0);
  function clickImg(element,i) {
      if (currentImg) {
        currentImg.src=currentImg.src.replace("Active","");
      }
      var cur=imgArr[i].src.replace("Active","");
          curArr=cur.split("/");
          curArrLast=curArr[curArr.length-1].split(".");
          cur=cur.replace(curArrLast[0],curArrLast[0]+"Active");
      var fileName=imgArr[i].src.replace("img","php");
          fileName=fileName.replace(curArrLast[1],"php");
      imgArr[i].src=(hasClass(imgArr[i],"profile"))?imgArr[i].src:cur;
      fileName=(hasClass(imgArr[i],"profile"))?"profile.php":fileName;
      updateBody(fileName);
      currentImg=imgArr[i];
      currentDiv=imgDiv[i]
  }
  function updateBody(filename) {
    bdyDom=ajax(filename
      ,function(data) {    //Success
        html(bdy,data.text);
        fileLast=filename.split("/");
        fileLast=fileLast[fileLast.length-1];
        pageName=fileLast.split(".");
        html(".Mob #cur_pg_name",pageName[0]);
        if (fileLast=="dashboard.php") {
          var chartBefore,escepted,trusted,hated,record01,record02,beforeLevel,level,apiBefore,delApiNo;
          if (transcationUpd) {
            clearInterval(transcationUpd);
            transcationUpd=false;
          }
          else if (profileUpd) {
            clearInterval(profileUpd);
            profileUpd=false;
          }
          click(".accountsShowUpClick,.accClose p",function () {
            rmvClass(".accountsShowUp","show");
            rmvClass(".accountNotFound","show");
            rmvClass(".accountShow","show");
          });
          click("#searchBtn",function () {
            var id=$("#searchBar input").value;
            var pP=ajax("searchAcc.php",function (data) {
              console.log(data.text);
              if(data.text=='notF'){
                addClass(".accountsShowUp","show");
                addClass(".accountNotFound","show");
                setTimeout(function (){
                  $(".accountsShowUpClick").click();
                },1000);
              }
              else {
                dataObj=data.text.split(",");
                dataObj[4]=(Number(dataObj[4])>999)?"999+":dataObj[4];
                dataObj[5]=(Number(dataObj[5])>999)?"999+":dataObj[5];
                dataObj[6]=(Number(dataObj[6])>999)?"999+":dataObj[6];
                $(".accShowDetail img").src=dataObj[3];
                html("#showUpUsr",dataObj[0]);
                text("#showUpBio",dataObj[1]);
                text("#showUpWeb",dataObj[2]);
                text("#accR p",dataObj[5]);
                text("#accT p",dataObj[4]);
                text("#accH p",dataObj[6]);
                (Number(dataObj[7]))?addClass("#accT img","ed"):rmvClass("#accT img","ed");
                (Number(dataObj[8]))?addClass("#accR img","ed"):rmvClass("#accR img","ed");
                (Number(dataObj[9]))?addClass("#accH img","ed"):rmvClass("#accH img","ed");
                addClass(".accountsShowUp","show");
                addClass(".accountShow","show");
                updateR();
                updateT();
                updateH();
              }
            });
            pP.post("accId="+id);
          });
          click(".accShowOvu div img",function (e) {
            var ele=e.srcElement;
            tglClass(ele,"ed");
            var yes=hasClass(ele,"ed");
            var type=ele.id;
            var aj=ajax("modifyLike.php",function (data) {
              var dataObj=data.text.split(",");
              dataObj[0]=(Number(dataObj[0])>999)?"999+":dataObj[0];//trust
              dataObj[1]=(Number(dataObj[1])>999)?"999+":dataObj[1];//respect
              dataObj[2]=(Number(dataObj[2])>999)?"999+":dataObj[2];//hate
              text("#accT p",dataObj[0]);
              text("#accR p",dataObj[1]);
              text("#accH p",dataObj[2]);
            });
            aj.post("type="+type+",yes="+yes+",whom="+$("#searchBar input").value);
            updateR();
            updateT();
            updateH();
          });
          click("#generateApi",function() {

            addClass(".apiPopUp","show");
            $("#lvl1").click();
            html("#hashKey",generateHash(20));
          });
          click(".apiDone",function () {
            var apiName=$("#apiName");
            var apiWeb=$("#apiWeb");
            rmvClass("#apiName,#apiWeb","err");
            if (!isUsername(apiName.value) || apiName.value.length<3) {
              addClass("#apiName","err");
              return  false;
            }
            if (!isURL(apiWeb.value)) {
              addClass("#apiWeb","err");
              return  false;
            }
            var sendApi=ajax("createApi.php",function(data) {
              console.log(data.text);
              $(".apiCancel").click();
              fetchApi();
            });
            sendApi.post("apiKey="+html("#hashKey")+",apiName="+apiName.value+",apiWeb="+apiWeb.value+",apiLevel="+level);
          });
          click("#lvl1,#lvl2,#lvl3",function (e) {
            var ele=e.srcElement.id;
            if (beforeLevel) rmvClass("#"+beforeLevel,"active");
            addClass("#"+ele,"active");
            beforeLevel=ele;
            level=ele;
            console.log(level);
          });
          click(".apiPopUpClick,.apiCancel",function() {
            rmvClass(".apiPopUp","show");
            $("#apiName").value=null;
            $("#apiWeb").value=null;
            html("#hashKey","");
            $("#curKeyCpy").src="../img/copy.png";
          });
          click("#curKeyCpy",function () {
            copy(html("#hashKey"));
            $("#curKeyCpy").src="../img/copied.png";
          });
          click(".pattern div",function (e) {

            var k=e.srcElement.innerText;
              if(!isNaN(k)){
                if (amount.length<=6 && Number(amount+k)<=1000000) {
                amount+=k;
                if (amount.length>1 && amount[0]=="0") {
                  amount=amount.substring(1,amount.length);
                }
              }
              else {
                vibrate([200,200]);
              }
              }else {
                amount=amount.substring(0,amount.length-1);
              }
              html("#amt",amount+"  Ks");
          });
          click("#continue",function () {
            if (i==0) {
              balance=Number(amount);
              if (balance<200) {
                html("#notEnough","Minium transfer amount is 200Ks");
              }else {
                var sendAmt=ajax("getUserData.php",function (data) {
                  if (data.text>=balance+200) {
                      html("#notEnough","");
                      hide("#amt");
                      hide(".pattern");
                      show(".recieverDetail");
                      rmvClass("#preview","hide");
                      scanner.addListener('scan', function (content) {
                      var hasAcc=ajax("getUserData.php",function(data) {
                        console.log(data.text);
                      if (data.text) {
                        if (data.text=="full") {
                          html("#notEnough","Reciever balance reached maximum");
                        }
                        else if(data.text=="wrong"){
                          html("#notEnough","Wrong adress");
                        }
                        else if(data.text=="success"){
                          html("#notEnough","");
                          hide(".recieverDetail");
                          show(".sendConfirm");
                          show("#cancel");
                          scanner.stop();
                          html("#continue","Send");
                          html("#sendCnfAmt",balance+"Ks");
                          html("#sendCnfEma","To:"+content);
                          em=content;
                          i=2;
                        }
                      }
                    });
                      hasAcc.post("data=hasAcc/"+content+"/"+balance);
                  });
                       Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                      scanner.start(cameras[0]);
                    } else {
                      addClass("#preview","hide");
                    }
                       }).catch(function (e) {
                      addClass("#preview","hide");
                  });
                      i=1;
                  }
                  else {
                      html("#notEnough","Insufficent balance");
                  }
                });
                sendAmt.post("data=balance");
              }
            }
            else if (i==1) {
                  em=$("#recMail").value;
              var hasAcc1=ajax("getUserData.php",function(data) {
                console.log(data.text);
              if (data.text) {
                if (data.text=="full") {
                  html("#notEnough","Reciever balance reached maximum");
                }
                else if(data.text=="wrong"){
                  html("#notEnough","Wrong adress");
                }
                else if(data.text=="success"){
                  html("#notEnough","");
                  hide(".recieverDetail");
                  show(".sendConfirm");
                  show("#cancel");
                  scanner.stop();
                  html("#continue","Send");
                  html("#sendCnfAmt",balance+"Ks");
                  html("#sendCnfEma","To:"+em);
                  em=content;
                  i=2;
                }
              }

            });
              hasAcc1.post("data=hasAcc/"+em+"/"+balance);
            }
            else if (html("#continue")=="Send") {
              var sendMny=ajax("transferMny.php",function (data) {
                console.log(data.text);
                if(data.text){
                  updateDash();
                  cancelSend();
                }
                else {
                  console.log(em);
                }
              });
              var recieverMail=html("#sendCnfEma");
              recieverMail=recieverMail.replace("To:",'');
              var sendData="adress="+recieverMail+",amt="+balance+",description="+desc;
              sendMny.post(sendData);
            }
          });
          click("#cancel",function () {
            cancelSend();
          });
          function fetchApi() {

            var fetchhApi=ajax("fetchApi.php",function (data) {
              var jsonObj=data.text.split("/");
              if (apiBefore) {
                if (apiBefore==data.text) {
                  return  false;
                }
              }
              var apiDiv=$(".apiesDiv");
              html(apiDiv,'');
              var t=false;
              for (var i = 0; i < jsonObj.length-1; i++) {
                var api=json(jsonObj[i]);
                var id=api.id;
                var apiCon=div(".apiCon #con"+id);
                var apiDet=div(".apiDetail");
                var apiH2Div=div(".apiNamDiv");//f
                var apiH2=h2();//f
                var apiKeyDiv=div(".apiNamDiv .cpo");
                var apiKey=p("#p"+id);//f
                var apiCpySp=span();//f
                var apiCpy=img("?src=../img/copy.png #cpy"+id);//f
                var apiWebDiv=div(".apiNamDiv");
                var apiWeb=p();
                var apiLvlDiv=div(".apiNamDiv");
                var apiLvl=p("#lvl"+id);
                var apiAccDiv=div(".apiNamDiv .expt");
                var apiAccepted=p("#accept"+id);
                var apiExpSp=span();//f
                var apiExp=img("?src=../img/export.png #exp"+id);//f
                var apiDelOrd=div(".apiNamDiv");
                var apiDel=div("(Delete) .DD #del"+id);
                var apiOrd=div("(Orders) .OD #ord"+id);
                html(apiH2,api.name);
                html(apiKey,api.credential);
                html(apiWeb,api.website);
                html(apiAccepted,"MMK:"+api.accepted);
                html(apiLvl,"Level:"+api.level);
                append(apiH2Div,apiH2);
                append(apiExpSp,apiExp);
                append(apiCpySp,apiCpy);
                append(apiKeyDiv,apiKey,apiCpySp);
                append(apiAccDiv,apiAccepted,apiExpSp);
                append(apiWebDiv,apiWeb);
                append(apiLvlDiv,apiLvl);
                append(apiDelOrd,apiOrd,apiDel);
                append(apiDet,apiH2Div,apiKeyDiv,apiWebDiv,apiLvlDiv,apiAccDiv,apiDelOrd);
                append(apiCon,apiDet);
                append(apiDiv,apiCon);
                t=true;

              }
              if (t) {
                click('.cpo span img',function(e) {
                  var cpyId=e.srcElement.id;
                  pId=cpyId.replace("cpy","p");
                  if(copy(html("#"+pId))){
                    $("#"+cpyId).src="../img/copied.png";
                  }
                  setTimeout(function () {
                    $("#"+cpyId).src="../img/copy.png";
                  },1000)
                });
                click('.expt span img',function(e) {
                  var expId=e.srcElement.id;
                  expId=expId.replace('exp','');
                  var exportMny=ajax("exportMoney.php",function(data) {
                    addClass('.expPopUp',"show");
                    if (data.text=='full') {
                      html('.expShow h2',"Failed!");
                      html('.detail',"Sorry your account balance has reached the maximum.Please withdraw money first!");
                      html('.newBDetail','');
                      html('.addedAmt','');
                      html('.lefted','');
                    }
                    else {
                      var ret=data.text.split(",");
                      balance=Number(ret[1])+Number(ret[2]);
                      added=Number(ret[2]);
                      html('.expShow h2',"Success");
                      html('.detail',"Congratulations!Money has been successfully added to your account.");
                      html('.newBDetail','New Balance:'+balance);
                      html('.addedAmt','Added amount:'+added);
                      html('.addedAmt','Left amount:'+ret[3]);
                    }
                  });
                  exportMny.post("expId="+expId);
                });
                click('#expOK,.expPopUpClick',function () {
                  rmvClass('.expPopUp',"show");
                });
                click('.DD',function(e) {
                  var id=e.srcElement.id;
                  id=id.replace("del",'');
                  delApiNo=id;
                  addClass('.apiDelPopUp','show');
                });
                click('.OD',function(e) {
                  var id=e.srcElement.id;
                  id=id.replace("ord",'');
                  var before;
                  clearInterval(dashboardUpd);
                  html('#body',"");
                  var body=$("#body"),
                      H2=h2(),
                      ordMainDiv=div(".ordDiv"),
                      ordStateHome=div(".ordStHm");
                      ordState=div(".ordState");
                      pending=div("#pending (Pending)"),
                      finieshed=div("#finieshed (Finished)"),
                      goHome=div(".goHome (Back)"),
                      ordTbl=div('.ordTbl');
                      ordBdy=div('.ordTblBdy')
                  append(ordState,pending,finieshed);
                  append(ordStateHome,ordState,goHome);
                  append(ordMainDiv,H2,ordStateHome,ordTbl);
                  append(body,ordMainDiv);
             var  ordRow=div('.ordRowH'),
                  ordId=p('.oId (Order Id)'),
                  ordDesc=p('.oDesc (Description)'),
                  ordAmt=p('.oAmt (Amount)'),
                  ordFee=p('.oFee (Fee)'),
                //ordCre=p('.oCre');
                  ordDone=p('.oDoneH');
                  append(ordRow,ordId,ordDesc,ordAmt,ordFee,ordDone);
                  append(ordTbl,ordRow,ordBdy);
                  click("#pending,#finieshed",function (e) {
                    if (before) {
                      rmvClass("#"+before.id,'active');
                    }
                    addClass("#"+e.srcElement.id,"active");
                    var state=(e.srcElement.id=="pending")?1:0;
                    var fetchOrders=ajax("fetchOrders.php",function (data) {

                      var orders=data.text.split("|");
                      html('.ordTblBdy','');
                      if (orders.length<2) {
                        var empty=div(".empty");
                        var emptyImg=img("?src=../img/empty.svg");
                        append(empty,emptyImg);
                        append(ordBdy,empty);
                        return false;
                      }
                      var preview     =div('.orderPreview'),
                          previewClick=div('.orderPreviewClick'),
                          previewShow =div('.orderPreviewShow'),
                          previewh2   =h2('(Order Detail)'),
                          previewOId  =div(''),
                          previewAmt  =div(''),
                          previewDesc =div(''),
                          previewFee  =div('');
                          previewClose=div('(Close) .orderClose');
                          append(previewShow,previewh2,previewOId,previewAmt,previewDesc,previewFee,previewClose);
                          append(preview,previewClick,previewShow);
                          append(ordTbl,preview);
                      for (var i = 0; i < orders.length-1; i++) {
                            order=json(orders[i]);
                            ordRow=div('.ordRow #r-'+order.oId),
                            ordId=p('.oId #Op-'+order.oId),
                            ordDesc=p('.oDesc #Od-'+order.oId),
                            ordAmt=p('.oAmt #Oa-'+order.oId),
                            ordFee=p('.oFee #Of-'+order.oId),
                            ordDone=p('.oDone (Done) #'+order.oId);
                          //ordCre=p('.oCre');
                            html(ordId,order.oId);
                            html(ordDesc,order.description);
                            html(ordAmt,order.amount+"Ks");
                            html(ordFee,order.fees+"Ks");
                          //html(ordCre,order.createdTime);
                            append(ordRow,ordId,ordDesc,ordAmt,ordFee,ordDone);
                            append(ordBdy,ordRow);
                            if (!Number(order.pending)) {
                              hide(".oDone,.oDoneH");
                            }else {
                              show(".oDone,.oDoneH");
                            }
                      }
                      if ($(".orderClose,.orderPreviewClick")) {
                        click(".orderClose,.orderPreviewClick",function () {
                          rmvClass(".orderPreview","active");
                          rmvClass(".orderPreviewShow","active");
                        });
                      }
                      if ($(".ordRow")) {
                        click(".ordRow",function (e) {
                          var id=e.srcElement.id;
                          id=id.split("-");
                          var len=id.length;
                          if (len==2) {
                            id=id[1];
                            addClass(".orderPreview","active");
                            addClass(".orderPreviewShow","active");
                            html(previewOId,html('#Op-'+id));
                            html(previewAmt,"Amount: "+html('#Oa-'+id));
                            html(previewDesc,html('#Od-'+id));
                            html(previewFee,"Fee: "+html('#Of-'+id));
                          }
                          else {
                            id=id[0];
                            console.log(id);
                            var deleteOrd=ajax("finishedOrder.php",function (data) {
                              addClass("#r-"+data.text,"hide");
                              setTimeout(function () {
                                hide("#r-"+data.text);
                              },200);
                            });
                            deleteOrd.post("oId="+id);
                          }
                        });
                      }
                      html(H2,"Order Detail");
                    });
                    fetchOrders.post("crdId="+id+",state="+state);
                    before=e.srcElement;
                  });
                  click(".goHome",function () {
                    clickImg(imgDiv[0],0);
                  });
                  $("#pending").click();
                });
                click("#justdoit",function () {
                  var delApi=ajax('deleteApi.php',function(data) {
                    rmvClass('.apiDelPopUp','show');
                    fetchApi();
                  });
                  delApi.post("id="+delApiNo);
                });
                click(".apiDelPopUpClick,#blip",function () {
                    rmvClass('.apiDelPopUp','show');
                });
              }
              apiBefore=data.text;
            });
            fetchhApi.post();
          }
          function updateR() {
            var imgSrc="../img/";
            imgSrc+=(hasClass("#accR img","ed"))?"respected.png":"respect.png";
            $("#accR img").src=imgSrc;
          }
          function updateT() {
            var imgSrc="../img/";
            imgSrc+=(hasClass("#accT img","ed"))?"trusted.png":"trust.png";
            $("#accT img").src=imgSrc;
          }
          function updateH() {
            var imgSrc="../img/";
            imgSrc+=(hasClass("#accH img","ed"))?"hated.png":"hate.png";
            $("#accH img").src=imgSrc;
          }
          function deFobj(ratio) {
            var chartObj={
                type: 'line',
                data: {
                    labels:monthArr,
                    datasets: [
                    {
                        label: 'Income',
                        data:monthInc,
                        backgroundColor: 'rgba(0, 0, 0,0)',
                        borderColor:"#00E676",
                        pointBorderColor:"#00E676",
                        pointBackgroundColor:"#00E676",
                        pointStyle:'line'
                    },
                    {
                        label: 'Outcome',
                        data: monthOut,
                        backgroundColor: 'rgba(0, 0, 0, 0)',
                        fontColor: 'black',
                        fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                        fontSize:20,
                        borderColor:"#f50057",
                        pointBorderColor:"#f50057",
                        pointBackgroundColor:"#f50057",
                        pointHoverBackgroundColor:"rgba(250,250,250,0.6)",
                        pointStyle:'line'
                    },
                    {
                        label: 'Net',
                        data: monthDif,
                        backgroundColor: 'rgba(0, 0, 0, 0)',
                        fontColor: 'black',
                        fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                        fontSize:20,
                        borderColor:"#2979FF",
                        pointBackgroundColor:"#2979FF",
                        pointBorderColor:"#2979FF",
                        pointStyle:'line',
                    }]
                },
                options: {
                  spanGaps:true,
                   title: {
                display: true,
                text: n+' Portfolio',
                fontSize:20,
                fontColor: 'black',
                fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
            },
                    scales: {
                        xAxes: [{
                        gridLines: {
                            display:false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display:false
                        }
                    }]
                    },
                    tooltips: {
                        mode: 'point',
                    },
                    legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fillStyle: 'rgb(255,255,255)',
                    boxWidth:8,
                    padding:15,
                    fontSize:13,
                    fontColor: 'black',
                    usePointStyle:true
                },
                position:"bottom"
            },
                    responsive:true,
                    aspectRatio:ratio,
                }
            };
            return chartObj;
          }
          function getcurMnthPortfilio() {
            var ajaxPortfilio=ajax("getUserData.php",function (data) {
              data.text=data.text.split(",");
              var send=Number(data.text[0]);
              var reci=Number(data.text[1]);
              var dif=Number(data.text[2]);
              html("#thisMntSend",send+" Ks");
              html("#thisMntRec",reci+" Ks");
              html("#thisMntDif",dif+" Ks");
            });
            ajaxPortfilio.post("data=curMnthPortfilio");
          }
          function getcurYearPortfilio() {
            var ajaxPortfilio=ajax("getUserData.php",function (data) {
              console.log("Called");
              if (chartBefore) {
                if (chartBefore==data.text) {
                  return false;
                }
              }
              data.text=json(data.text);
                monthArr=data.text[0];
                for (var i = 0; i < data.text[1].length; i++) {
                  monthInc[i]=Number(data.text[1][i]);
                }
                for (var i = 0; i < data.text[2].length; i++) {
                  monthOut[i]=Number(data.text[2][i]);
                }
                for (var i = 0; i < data.text[3].length; i++) {
                  monthDif[i]=Number(data.text[3][i]);
                }
                var ctx1 = document.getElementById('myChart1');
                var ctx2 = document.getElementById('myChart2');
                var ctx3 = document.getElementById('myChart3');
                var ctx4 = document.getElementById('myChart4');
                var myChart1 = new Chart(ctx1,deFobj(2));
                var myChart2 = new Chart(ctx2,deFobj(1.5));
                var myChart3 = new Chart(ctx3,deFobj(1));
                var myChart4 = new Chart(ctx4,deFobj(0.7));
                chartBefore=json(data.text);
            });
            ajaxPortfilio.post("data=curYearPortfilio");
          }
          function updateRecentActivity() {
            var updateTable=ajax("fetchRecords.php",function (data) {
              var mobRecord=$("#mobRecordLists"),
                  pcRecord=$("#pcRecordLists"),
                  records=data.text;
                  records=records.split("/");
                  if (record01) {
                    record02=data.text;
                    if (record02==record01) {
                      console.log("No Updated");
                      return false;
                    }
                    else {
                      console.log("Updated");
                    }
                  }
                  if (records.length<=2) {
                    html(".recordLists",'');
                    record01=null;
                    return false;
                  }
                  records[0]=json(records[0]);
                  var mail=records[0]["mail"],
                  address=records[0]["address"];
                  html(mobRecord,'');
                  html(pcRecord,'');
                for (var i = 1; i < records.length-1; i++) {
                      recordObj=json(records[i]);
                  var type=recordObj["type"],
                      toAdd=recordObj["toAdd"],
                      fromAdd=recordObj["fromAdd"],
                      description=recordObj["description"],
                      amount=recordObj["amount"],
                      recordTp =(toAdd===mail  || toAdd===address)?'Recieve':'Send';
                      typClr=(toAdd===mail  || toAdd===address)?'get':'loss';
                      if (type=="transcation") {
                      recordImg=(toAdd===mail  || toAdd===address)?'recieve.svg':'send.svg';
                      }
                      else if (type=="shop") {
                      recordImg=(toAdd===mail  || toAdd===address)?'api.png':'shopping.png';
                      }
                      if (!description) {
                        if (type=="transcation" || type=="shop") {
                          description=(toAdd===mail || toAdd===address)?fromAdd:toAdd;
                        }
                        else {
                          description="Bought giftCard"
                        }
                      }
                      recordRow=div(".recordRow");
                      recordTyp=div(".recordType");
                      recordTypImg=img("?src=../img/"+recordImg);
                      recordTypP=p();
                      recordAmt=div(".recordDes,"+typClr);
                      recordRowMob=div(".recordRow");
                      recordTypMob=div(".recordType");
                      recordTypMobP1=p(".recordType");
                      recordTypMobP2=p(".recordType");
                      recordTypMobP3=p(".recordType,"+typClr);
                      html(recordTypP,description);
                      html(recordAmt,amount+"Ks");
                      html(recordTypMobP1,recordTp);
                      html(recordTypMobP2,description);
                      html(recordTypMobP3,amount+"Ks");
                      append(recordTyp,recordTypImg,recordTypP);
                      append(recordRow,recordTyp,recordAmt);
                      append(pcRecord,recordRow);
                      append(recordTypMob,recordTypMobP1,recordTypMobP2,recordTypMobP3);
                      append(recordRowMob,recordTypMob);
                      append(mobRecord,recordRowMob);
                      record01=data.text;
                }
            });
            updateTable.post("type=recent");
          }
          function getBalance() {
            var balanceAj=ajax("getUserData.php",function(data) {
              html("#balance",data.text+"Ks");
            });
            balanceAj.post("data=balance");
          }
          function updateDash() {
            getcurYearPortfilio();
            getcurMnthPortfilio();
            updateRecentActivity();
            getBalance();
            fetchApi();
          }
          function cancelSend(){
            i=0;
            $("#recMail").value=null;
            email="";
            keyPres=false;
            html("#amt","0Ks");
          tglClass(".sendMainDiv","show");
          }
          updateDash();
          dashboardUpd=setInterval(function (e) {

            updateDash();
          },6000);
          let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
          var email="",amount="",i=0,balance,em,desc=$("#descripe").value;
          $("#req").addEventListener("click",function() {
            html("#cpyAdd","Copy");
            tglClass(".reqMainDiv","show");
          });
          $(".reqClick").addEventListener("click",function() {

            tglClass(".reqMainDiv","show");
          });
          $("#send").addEventListener("click",function() {
            amount="";
            html("#amt","0 Ks");
            html("#notEnough","");
            keyPres=true;
            html("#continue","Continue");
            show(".pattern");
            hide(".sendConfirm");
            hide(".recieverDetail");
            show("#amt");
            tglClass(".sendMainDiv","show");
          });
          $(".sendClick").addEventListener("click",function() {
              scanner.stop();
              cancelSend();
          });
          getAdd=ajax("getUserData.php",function (data) {
            address=data.text;
            html("#mailAdd",address);
            $("#cpyAdd").addEventListener("click",function() {
              if (copy(html("#mailAdd"))) {
                html("#cpyAdd","Copied");
              }
              setTimeout(function () {
                $(".reqClick").click();
              },200)
            });
            var qrcode = new QRCode("Qr", {
                text: address,
                width: 200,
                height: 200,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
          });
          getAdd.post("data=adress");
          window.addEventListener("keypress",function (e) {
            if (keyPres) {
              if (e.charCode>=48 && e.charCode<=57 ) {
                if (amount.length<=6 && Number(amount+e.key)<=1000000) {
                  if (amount.length>1 && amount[0]=="0") {
                    amount=amount.substring(1,amount.length);
                  }
                  amount+=e.key;
                }
                else {
                  vibrate([200,200]);
                }
                html("#amt",amount+"  Ks");
              }
            }
          });
          window.addEventListener("keydown",function (e) {
            if (keyPres) {
              if (e.key=="Backspace") {
                amount=amount.substring(0,amount.length-1);
                html("#amt",amount+"  Ks");
              }
              else if (e.key=="Enter") {
                $("#continue").click();
              }
            }
          });
        }
        else if (fileLast=="transcation.php"){
          if (dashboardUpd) {
            clearInterval(dashboardUpd);
            dashboardUpd=false;
          }
          else if (profileUpd) {
            clearInterval(profileUpd);
            profileUpd=false;
          }
          var hideEle,recordArray=new Array();
          record01=null;record02=null;
          function tglCss() {
            tglClass("#menuTyp","show");
            tglClass("#curTyp","click");
          }
          function rmvCss() {
            rmvClass("#menuTyp","show");
            rmvClass("#curTyp","click");
          }
          click("#curTyp",tglCss);
          click("#menuTyp span",function (e) {
            if (hideEle) {
              rmvClass(hideEle,"hide");
              rmvClass(hideEle,"active");
            }
            var name=e.srcElement.innerHTML;
            recordReqTyp=name;
            addClass(e.srcElement,"hide");
            addClass(e.srcElement,"active");
            hideEle=e.srcElement;
            html("#curTyp span",name);
            updateRecord(name);
            rmvCss();
          });
          $("#firstClick").click();
          click(".done p,.tranPopUpClick",function () {
            rmvClass(".tranPopUp","show");
          })
          function updateRecord(sName) {
            var updateTable=ajax("fetchRecords.php",function (data) {
               var recordBody=$(".tableBody"),
                  records=data.text;
                  records=records.split("/");
                  if (record01) {
                    record02=data.text;
                    if (record02==record01) {
                      console.log("No Updated");
                      return false;
                    }
                    else {
                      console.log("Updated");
                    }
                  }
                  if (records.length<=2) {
                    html(".tableBody",'');
                    var divNotFound=div(".noRecordFound");
                    var imgNotFound=img("?src=../img/noRecordFound.svg");
                    append(divNotFound,imgNotFound);
                    append(recordBody,divNotFound);
                    record01="Null";
                    return false;
                  }
                  records[0]=json(records[0]);
                  var mail=records[0]["mail"],
                  address=records[0]["address"];
                html(".tableBody",'');
                for (var i = 1; i < records.length-1; i++) {
                  recordObj=json(records[i]);
                  var type=recordObj["type"],
                      id=recordObj["id"],
                      toAdd=recordObj["toAdd"],
                      fromAdd=recordObj["fromAdd"],
                      description=recordObj["description"],
                      amount=recordObj["amount"],
                      senderFee=recordObj["senderFee"],
                      recieverFee=recordObj["recieverFee"]
                      fee=(toAdd==mail)?recieverFee:senderFee,
                      dateTime=recordObj["date"];
                      dateTime=dateTime.split(" ");
                      date=dateTime[0];
                      time=dateTime[1];
                      date=date.split("-");
                      date=date[2]+"-"+date[1]+"-"+date[0];
                      recordImg="";
                      if (type=="transcation") {
                        recordImg=(toAdd===mail)?'recieve.svg':'send.svg';
                      }
                      else if (type=="exchange") {
                        recordImg=(toAdd===mail || toAdd===address)?'deposit.svg':'withdraw.svg';
                      }
                      else if (type=="topup") {
                        recordImg='card.svg';
                      }
                      else if (type=="shop") {
                        recordImg=(toAdd===mail || toAdd===address)?'api.png':'shopping.png';
                      }
                      if (!description) {
                        if (type=="transcation" || type=="exchange" || type=="shop") {
                          description=(toAdd===mail || toAdd===address)?fromAdd:toAdd;
                        }
                        else {
                          description="Bought giftCard"
                        }
                      }
                      recordRow=div(".tableRow #"+i);
                      recordDesc=div(".col01 #"+i);
                      recordAmt =div(".col02 #"+i);
                      recordFees=div(".col03 #"+i);
                      recordDate=div(".col04 #"+i);
                      recordDesI=img("?src=../img/"+recordImg+" #"+i);
                      recordDesP=p("#"+i);
                      html(recordDesP,description);
                      html(recordAmt,amount+"Ks");
                      html(recordFees,fee+"Ks");
                      html(recordDate,date);
                      recordDataObj[i]={
                        to:(toAdd===mail)?fromAdd:toAdd,
                        descripe:recordObj["description"],
                        fee:fee,
                        amt:amount,
                        date:date,
                        time:time,
                        imgPath:'../img/'+recordImg
                      };
                      append(recordDesc,recordDesI,recordDesP);
                      append(recordRow,recordDesc,recordAmt,recordFees,recordDate);
                      append(recordBody,recordRow);
                      click(recordRow,function (e) {
                        addClass(".tranPopUp","show");
                        var i=e.srcElement.id;
                        $(".row01ImgDiv img").src=recordDataObj[i].imgPath;
                        html("#row02To",recordDataObj[i].to);
                        html("#row02Desc",recordDataObj[i].descripe);
                        html("#row02Amt",'Amount: '+recordDataObj[i].amt+"Ks");
                        html("#row02Fee",'Fees: '+recordDataObj[i].fee+"Ks");
                        html("#row02Date",'Date:'+recordDataObj[i].date);
                        html("#row02Time",'Time'+recordDataObj[i].time);
                      });
                  record01=data.text;
                }
            });
            updateTable.post("type="+sName);
          }
          transcationUpd=setInterval(function updateR(){
            updateRecord(recordReqTyp);
          },6000);
        }
        else if (fileLast=="profile.php"){
          if (dashboardUpd) {
            clearInterval(dashboardUpd);
            dashboardUpd=false;
          }
          else if (transcationUpd) {
            clearInterval(transcationUpd);
            transcationUpd=false;
          }
          var session01,session02,session,profileData01;
          var reqDiv='',reloadAble=false,cPwd,cM,berforeGener,berforeState;
          function getProfile() {
            var getProfile=ajax("getUserData.php",
          function (data) {
            if (profileData01) {
              if (profileData01==data.text) {
                return false;
              }
            }
            var profileData=json(data.text);
            profileData["gener"]  =(profileData["gener"])?profileData["gener"]:"Gener";
            profileData["state"]  =(profileData["state"])?profileData["state"]:"State";
            profileData["respect"]=(Number(profileData["respect"])>999)?"999+":profileData["respect"];
            profileData["trust"]  =(Number(profileData["trust"])>999)?"999+":profileData["trust"];
            profileData["hate"]=(Number(profileData["hate"])>999)?"999+":profileData["hate"];
            $("#usrnameInput").value=profileData["useName"];
            $("#bioInput").value=profileData["bio"];
            $("#phone01Input").value=profileData["phone01"];
            $("#phone02Input").value=profileData["phone02"];
            $("#webInput").value=profileData["web"];
            $(".pP").src="";
            $(".pP").src=profileData["pic"];
            $("#usrPic").src="";
            $("#usrPic").src=profileData["pic"];
            html("#generBtn",profileData["gener"]);
            html("#stateBtn",profileData["state"]);
            text("#profileUsrName",profileData["useName"]);
            text("#profileBio",profileData["bio"]);
            html("#respect",profileData["respect"]);
            html("#trust",profileData["trust"]);
            html("#dislike",profileData["hate"]);
            $("#addInput").value=profileData["address"];
            profileData01=data.text;
          });
            getProfile.post("data=profile");
          }
          function uploadProfile() {
            var  data=new Array();
                 data[0]=$("#usrnameInput").value,
                 data[1]=$("#bioInput").value,
                 data[2]=$("#phone01Input").value,
                 data[3]=$("#phone02Input").value,
                 data[4]=$("#webInput").value,
                 data[5]=html("#generBtn"),
                 data[6]=html("#stateBtn"),
                 data[7]=$("#addInput").value;
                 if (!isUsername(data[0]) || data[0].length<3) {
                   addClass("#usrnameInput","err");
                   return false;
                 }
                 if (data[1].length>30 || data[1].length<0) {
                   addClass("#bioInput","err");
                   return false;
                 }
                 if (!isUsername(data[7])) {
                   addClass("#addInput","err");
                   return false;
                 }
                 if (data[4]) {
                   if (!isURL(data[4])) {
                     addClass("#webInput","err");
                     return false;
                   }
                 }
                 if (!isPhone(data[2])) {
                   addClass("#phone01Input","err");
                   return false;
                 }
                 if (!isPhone(data[3])) {
                   addClass("#phone02Input","err");
                   return false;
                 }
                 rmvClass("#usrnameInput,#bioInput,#webInput,#phone01Input,#phone02Input,#addInput","err");
            var uploadProfile=ajax("uploadProfile.php",
            function (data) {
              console.log(data.text);
              html("#saveBtn","Saved");
              setTimeout(function(){ html("#saveBtn","Save"); },1000);
              getProfile();
            },function () {
              html("#saveBtn","Error..");

            },function () {
              html("#saveBtn","Saving..");
            });
            uploadProfile.post("user="+data[0]+",bio="+data[1]+",phone01="+data[2]+",phone02="+data[3]+",web="+data[4]+",gener="+data[5]+",state="+data[6]+",address="+data[7]);
          }
          function tglPopUp() {
            tglClass(".popUp","show");
          }
          function destroySession(key) {
            var destroyer=ajax("destroySession.php",function (data) {
              if (data.text) {
                if (data.text=="current") {
                  location.reload();
                }
                getSession();
              }
            });
            destroyer.post("key="+key)
          }
          function getSession() {

            var getSess=ajax("getUserData.php",
            function (data) {
            var sessionHeader=$(".sessionBody");
            var d          = new Date();
            var currentSec = d.getTime()/1000;
            session=data.text;
            if (session01) {
              session02=data.text;
              if (session02==session01) {
                console.log("No Updated");
                return false;
              }
              else {
                console.log("Updated");
              }
            }
            session=session.split("/");
            html(".sessionBody",'');
            for (var i = 0; i < session.length-1; i++) {
              sessionObj=json(session[i]);
              var device=sessionObj["device"];
              var active=Number(sessionObj["active"]);
              var sessionKey=sessionObj["sessionKey"];
              time=convertTime(currentSec-sessionObj["times"]);
              sessionRow=div(".sessionRow");
              sessionTime=div(".col1 ("+time+")");
              sessionDevi=div(".col2 ("+device+")");
              sessionActive=div(".col3");
              activeStatus=span("");
              sessionStau=div(".col4");
              sessionStauSpan=span();
              sessionStauImg=img("?src=../img/cancel.png #"+sessionKey+" ");
              click(sessionStauImg,function (e) {
                destroySession(e.srcElement.id);
              });
              if (active) {
                addClass(activeStatus,"active");
              }
              append(sessionStauSpan,sessionStauImg);
              append(sessionStau,sessionStauSpan);
              append(sessionActive,activeStatus);
              append(sessionRow,sessionTime,sessionDevi,sessionActive,sessionStau);
              append(sessionHeader,sessionRow);
              session01=data.text;
            }
          });
            getSess.post("data=loginSessions");
          }
          profileUpd=setInterval(function updateProfile() {
            getSession();
            getProfile();
          },6000);
          click("#uplPp",function () {
            $("#pP").click();
          });
          $("#pP").addEventListener("change",function (e) {
            const url = 'uploadPp.php'
            const form = document.querySelector('form')
            const files = document.querySelector('[type=file]').files
            const formData = new FormData()
            for (let i = 0; i < files.length; i++) {
                let file = files[i]
                let fileArr=file.name.split(".");
                if (!(fileArr[1]=="png" || fileArr[1]=="jpg")) {
                  return false;
                }
                formData.append('files[]', file)
            }
            fetch(url,{
              method: 'POST',
              body: formData,
            }).then(response => {
              return response.text().then(function(text) {
                console.log(text);
                text=text.split(",");
                if (text[0]=="success") {
                                  console.log(text[1]);
                  $(".pP").src="";
                  $(".pP").src=text[1];
                  $("#usrPic").src="";
                  $("#usrPic").src=text[1];
                  $(".popUpClick").click();
                }
                else if (text[0]=="sizeBig") {

                }
                else if (text[0]=="extNotAllowed") {

                }
              });
            })
          });
          click("#saveBtn",uploadProfile);
          click("#generBtn",function () {
            addClass(".popUp,.generChoices","show");
          });
          click("#stateBtn",function () {
            addClass(".popUp,.stateChoices","show");
          });
          click(".popUpClick,#cancel",function () {
            if (reloadAble) {
              location.reload();
            }
            rmvClass(".enterEmail,.popUp,.generChoices,.stateChoices,.popUpChoices,.enterPassword,.newPassword,.changeEmail,.changePwd,.accDelete","show");
          });
          click("#more",function() {
            reloadAble=false;
            html(".enterPassword .done p","Submit");
            $("#curPwd").value=null;
            $("#newPwd1").value=null;
            $("#newPwd2").value=null;
            $("#newMail").value=null;
            html(".enterPassword  .err_msg","");
            addClass(".popUp,.popUpChoices","show");
          });
          click("#chngPwdBtn",function() {
            reqDiv="Password";
            //$("#curPwd").value=null;
            rmvClass(".popUpChoices","show");
            addClass(".popUp,.enterPassword","show");
          });
          click("#chngEmiBtn",function() {
            reqDiv="Email";
            //$("#curPwd").value=null;
            rmvClass(".popUpChoices","show");
            addClass(".popUp,.enterPassword","show");
          });
          click("#logoutBtn",function () {
            fetch("logout.php")
            .then(response => {
              window.location="../index.php";
            })
            .catch(err=>console.log(err));
          });
          click("#delAccBtn",function () {
            reqDiv="Delete";
            //$("#curPwd").value=null;
            rmvClass(".popUpChoices","show");
            addClass(".popUp,.enterPassword","show");
          });
          click(".enterPassword .done p",function () {

            var matchPwd=ajax("getUserData.php",function (data) {
              if (data.text) {
                console.log(data.text);
                rmvClass(".enterPassword","show");
                if (reqDiv=="Email") {
                  addClass('.enterEmail',"show");
                }
                else if (reqDiv=="Delete") {
                  var deleteAcc=ajax('modifyAcc.php',function (data) {
                    if (data.text) {
                      console.log(data.text);
                      reloadAble=true;
                      addClass('.accDelete',"show");
                    }
                  });
                  deleteAcc.post("data=delete");
                }
                else if (reqDiv=="Password") {
                  cPwd=$("#curPwd").value;
                  addClass('.newPassword',"show");
                }
              }else {
                html(".enterPassword .err_msg","Wrong password");
              }
            },function () {
              html(".enterPassword .err_msg","An error occur");
            },function () {
              html(".enterPassword .done p","Sending");
            });
            matchPwd.post("data=passwords/"+$("#curPwd").value);
          });
          click(".newPassword .done p",function () {
            var pwd01=$("#newPwd1").value;
            var pwd02=$("#newPwd2").value;
            if (pwd01.length<8) {
              html(".newPassword .err_msg","Password minium length is 8");
              return false;
            }
            if (cPwd==pwd01) {
              html(".newPassword .err_msg","New password can't be old password");
              return false;
            }
            if (pwd01===pwd02) {
              var changePwd=ajax("modifyAcc.php",function (data) {
                if(data.text){
                  reloadAble=true;
                  rmvClass(".newPassword","show");
                  addClass(".changePwd","show");
                }
                else {
                  html(".newPassword .err_msg","An unknown error");
                }
              },function () {
                html(".newPassword .done p","Sending...");
              },function () {
                html(".newPassword .err_msg","An error occur");
              },function () {
                html(".newPassword .done p","Sending");
              });
              changePwd.post('data=changePwd/'+pwd01);
            }else {
              html(".newPassword .err_msg","Passwords not match");
            }
          });
          click(".enterEmail .done p",function () {
            var mail=$("#newMail").value;
            if (!isEmail(mail)) {
              html(".enterEmail .err_msg","Invalid Email");
              return false;
            }
            var updateMail=ajax("modifyAcc.php",function (data) {
              html(".enterEmail .done p","Send");
              console.log(data.text);
              if (data.text) {
                if (data.text=="sameMail") {
                  rmvClass(".changeEmail","show");
                  html(".enterEmail .err_msg","New Email can't be old one");
                }
                else if (data.text=="exists") {
                  rmvClass(".changeEmail","show");
                  html(".enterEmail .err_msg","Email already exists");
                }
                else {
                  reloadAble=true;
                  rmvClass(".enterEmail","show");
                  addClass(".changeEmail","show");
                }
              }
              else {
                html(".enterEmail .err_msg","Error occur");
              }
            },function () {
              html(".enterEmail .err_msg","An error occur");
            },function () {
              html(".enterEmail .done p","Sending");
            });
            updateMail.post("data=changeMail/"+mail);
          });
          click(".changeEmail .done p,.changePwd .done p,.accDelete .done p",function () {
            location.reload();
          });
          click(".generChoices div",function (e) {
            if (!hasClass(e.srcElement,"done")) {
            var iD=e.srcElement.id;
            if(iD=="male" || iD=="maleS" || iD=="maleP") gener="#male";
            else if(iD=="female" || iD=="femaleS" || iD=="femaleP") gener="#female";
            else if(iD=="other" || iD=="otherS" || iD=="otherP") gener="#other";
              if (berforeGener) {
                rmvClass(berforeGener,"currentGener");
              }
              addClass(gener,"currentGener");
              berforeGener=gener;
            }
          });
          click(".stateChoices div",function (e) {
            if (!hasClass(e.srcElement,"done")) {
              var iD=e.srcElement.id;
              if(iD=="ygn"         || iD=="ygnS"  || iD=="ygnP") state="#ygn";
              else if(iD=="mdy"    || iD=="mdyS"  || iD=="mdyP") state="#mdy";
              else if(iD=="thni"   || iD=="thniS" || iD=="thniP")state="#thni";
              else if(iD=="mon"    || iD=="monS"  || iD=="monP") state="#mon";
              else if(iD=="aydy"   || iD=="aydyS" || iD=="aydyP")state="#aydy";
              else if(iD=="kyin"   || iD=="kyinS" || iD=="kyinP")state="#kyin";
              else if(iD=="bgo"    || iD=="bgoS"  || iD=="bgoP") state="#bgo";
              else if(iD=="rk"     || iD=="rkS"   || iD=="rkP")  state="#rk";
              else if(iD=="mgwe"   || iD=="mgweS" || iD=="mgweP")state="#mgwe";
              else if(iD=="kayh"   || iD=="kayhS" || iD=="kayhP")state="#kayh";
              else if(iD=="shn"    || iD=="shnS"  || iD=="shnP") state="#shn";
              else if(iD=="sgi"    || iD=="sgiS"  || iD=="sgiP") state="#sgi";
              else if(iD=="chi"    || iD=="chiS"  || iD=="chiP") state="#chi";
              else if (iD=="kchi"  || id=="kchiS" || iD=="kchiP")state="kchi";
                if (berforeState) {
                  rmvClass(berforeState,"currentState");
                }
                addClass(state,"currentState");
                berforeState=state;
          }
          });
          click(".generChoices .done p",function (e) {
            gnrTyp=html(gener+" p");
            html("#generBtn",gnrTyp);
            $(".popUpClick").click();
          });
          click(".stateChoices .done p",function (e) {
            statTyp=html(state+" p");
            html("#stateBtn",statTyp);
            $(".popUpClick").click();
          });
          getSession();
          getProfile();
        }
        else if (fileLast=="exchange.php"){
          if (dashboardUpd) {
            clearInterval(dashboardUpd);
            dashboardUpd=false;
          }
          else if (profileUpd) {
            clearInterval(profileUpd);
            profileUpd=false;
          }
          else if (transcationUpd) {
            clearInterval(transcationUpd);
            transcationUpd=false;
          }
          let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
          var accBalance;
          function getBalance() {
            var getAccBalance=ajax("getUserData.php",function (data) {
              accBalance=data.text;
            });
            getAccBalance.post('data=balance');
          }
          getBalance();
          var method='',amount='',balance,em,gateway,beforegateway,keyPres;
          click(".excTyp .done01 p",function (e) {
            method=e.srcElement.innerHTML;
            addClass(".excTypDiv","hide");
            showContent();
          });
          click(".exchangeAmt .pattern div",function (e) {
            var k=e.srcElement.innerText;
              if(!isNaN(k)){
                if (amount.length<=6 && Number(amount+k)<=1000000) {
                amount+=k;
                if (amount.length>1 && amount[0]=="0") {
                  amount=amount.substring(1,amount.length);
                }
              }
              else {
                vibrate([200,200]);
              }
              }else {
                amount=amount.substring(0,amount.length-1);
              }
              html(".exchangeAmt #amt",amount+"  MMK");
          });
          click(".exchangeAmt .keyPadDiv .done01 p",function () {
                balance=Number(amount);
                if (balance<10000) {
                  html("#notEnough","Minium "+method+" amount is 10000MMK");
                  return false;
                }else {
                  var sendAmt=ajax("getUserData.php",function (data) {
                    var dif=(method=="deposit")?3000000-data.text:data.text;
                    if (dif>=balance) {
                        html("#notEnough","");
                        hide("#amt");
                        hide(".pattern");
                        rmvClass(".exchangeAmt","active");
                        addClass(".selectPaymentDiv","active");
                        var getAvaGateWay=ajax("showAvailablePayments.php",function (data) {
                          var avaPyArr=data.text.split("/");
                          for (var i = 0; i < avaPyArr.length-1; i++) {
                            $("#"+avaPyArr[i]).style.display="flex";
                          }

                        });
                        getAvaGateWay.post("amt="+balance+",method="+method);
                    }
                    else {
                      if (method=="deposit") {
                        html("#notEnough","Your maximum deposit amount is "+dif+"MMK");
                      }
                      else if(method=="withdraw") {
                        html("#notEnough","Insufficent balance");
                      }
                    }
                  });
                  sendAmt.post("data=balance");
                }
          })
          click(".selectPaymentDiv .pymtTyp",function (e) {
            iD=e.srcElement.id;
            if     (iD=="wavepay"    || iD=="wavepayS"   || iD=="wavepayP")gateway="#wavepay";
            else if(iD=="coinbase"   || iD=="coinbaseS"  || iD=="coinbaseP")gateway="#coinbase";
            else if(iD=="m-pitesan"  || iD=="m-pitesanS" || iD=="m-pitesanP")gateway="#m-pitesan";
            else if(iD=="ok"         || iD=="okS"        || iD=="okP")gateway="#ok";
            else if(iD=="kbzpay"     || iD=="kbzpayS"    || iD=="kbzpayP")gateway="#kbzpay";
            else if(iD=="kbzbank"    || iD=="kbzbankS"   || iD=="kykbzbankPinP")gateway="#kbzbank";
            else if(iD=="ayayawady"  || iD=="ayayawadyS" || iD=="ayayawadyP")gateway="#ayayawady";
            else if(iD=="cb"         || iD=="cbS"        || iD=="cbP")gateway="#cb";
            if (beforegateway) {
              rmvClass(beforegateway,"currentPytTyp");
            }
            addClass(gateway,"currentPytTyp");
            beforegateway=gateway;
          });
          click(".flashDiv .done01 p",function() {
            var serial=$("#serial").value;
            var pin   =$("#pin").value;
            var req=ajax("deposit.php",function(data) {
              var ret=data.text;
              console.log(data.text);
              if (ret=="wrong") {
                html(".flashDiv .err_msg","Invalid serial number or pin");

              }
              else if (ret=="full") {
                html(".flashDiv .err_msg","Account balance has reached the maximum");
              }else {
                rmvClass(".flashDiv","active");
                addClass(".flashSuccess","active");
                ret=ret.split(",");
                html("#successP","Operation success."+ret[0]+"Ks has been added to your account.Your new balance is "+ret[1]+"Ks.");
              }
            });
            req.post("data=flash/"+serial+"|"+pin);
          });
          window.addEventListener("keypress",function (e) {
            if (keyPres) {
              if (e.charCode>=48 && e.charCode<=57 ) {
                if (amount.length<=6 && Number(amount+e.key)<=1000000) {
                  if (amount.length>1 && amount[0]=="0") {
                    amount=amount.substring(1,amount.length);
                  }
                  amount+=e.key;
                }
                else {
                  vibrate([200,200]);
                }
                html("#amt",amount+"  MMK");
              }
            }
          });
          window.addEventListener("keydown",function (e) {
            if (keyPres) {
              if (e.key=="Backspace") {
                amount=amount.substring(0,amount.length-1);
                html("#amt",amount+"  MMK");
              }
              else if (e.key=="Enter") {
                $(".keyPadDiv #continue").click();
              }
            }
          });
          click(".selectPaymentDiv #continue",function (){
            if (gateway) {
              if (gateway) {
                rmvClass(gateway,"currentPytTyp");
              }
              if (method=="deposit") {
                html("#detailText","Enter the adress,phone no or mail from which U will send money to us");
              }else {
                html("#detailText","Enter the adress,phone no or mail to which U want us to send money");
              }
                $("#recMail").value=null;
                $("#descripe").value=null;
                rmvClass(".selectPaymentDiv","active");
                addClass(".exchangeDetail","active");
                scanner.addListener('scan', function (content) {
                  $("#recMail").value=content;
                });
               Instascan.Camera.getCameras().then(function (cameras) {
              if (cameras.length > 0) {
                scanner.start(cameras[0]);
                html("#or","Or");
              } else {
                addClass("#preview","hide");
              }
                 }).catch(function (e) {
                addClass("#preview","hide");
            });
             }
          });
          click(".exchangeDetail .done01 p",function () {
            scanner.stop();
            var id=$("#recMail").value;
            var desc=$("#descripe").value;
            var file=method+".php";
            var gtw=gateway.substring(1,gateway.length);
            var exchange=ajax(file,function (data) {
              console.log(data.text);
              if(data.text){
                data.text=data.text.split(",");
                var success="Request has been sent to server.";
                var id=data.text[0];
                var amt=data.text[1];
                var gtw=(gateway=="#ok")?"OK Dollar":text(gateway);
                if (method=='deposit') {
                  success01="Please send "+amt+"MMK to "+id+" via  "+gtw+".<br><br>Note:Send money within 2 days or your requests will be canceled.";
                }
                else {
                  success01="Our team will send "+amt+"MMK from "+id+" to U via  "+gtw+" within 2-5 working day.";
                }
                success+=success01;
                html("#successExc",success);
                rmvClass(".exchangeDetail","active");
                addClass(".successExchange","active");
              }

            });
            exchange.post("data="+method+"/"+balance+"|"+id+"|"+desc+"|"+gtw);
          });
          click(".cancel01 p,.flashSuccess .done01 p,.successExchange .done01 p",function () {
            html(".err_msg","");
            html("#amt","0MMK");
            html("#successP","");
            $(".pattern").style.display="";
            $("#amt").style.display="";
            rmvClass(".selectPaymentDiv","active");
            rmvClass(".exchangeAmt","active");
            rmvClass(".exchangeDetail","active");
            rmvClass(".flashDiv","active");
            rmvClass(".flashSuccess","active");
            rmvClass(".successExchange","active");
            rmvClass(".excTypDiv","hide");
            method='';
            amount='';
            balance=null;
            em=null;
            gateway=null;
            beforegateway=null;
            keyPres=null;
            return true;
          });
          function showContent() {

            if (method=="flash") {
              addClass(".flashDiv","active");
            }
            else {
              keyPres=true;
              addClass(".exchangeAmt","active");
            }
          }
        }
        else if (fileLast=="shop.php"){
          if (dashboardUpd) {
            clearInterval(dashboardUpd);
            dashboardUpd=false;
          }
          else if (profileUpd) {
            clearInterval(profileUpd);
            profileUpd=false;
          }
          else if (transcationUpd) {
            clearInterval(transcationUpd);
            transcationUpd=false;
          }
          var cardType=new Array();
          cardType[0]={
            id:"mpt1",
            amount:1000,
            operator:"mpt",
            typ:"sim"
          };
          cardType[1]={
            id:"mpt3",
            amount:3000,
            operator:"mpt",
            typ:"sim"
          };
          cardType[2]={
            id:"mpt5",
            amount:5000,
            operator:"mpt",
            typ:"sim"
          };
          cardType[3]={
            id:"mpt10",
            amount:10000,
            operator:"mpt",
            typ:"sim"
          };
          cardType[4]={
            id:"tel1",
            amount:1000,
            operator:"telenor",
            typ:"sim"
          };
          cardType[5]={
            id:"tel3",
            amount:3000,
            operator:"telenor",
            typ:"sim"
          };
          cardType[6]={
            id:"tel5",
            amount:5000,
            operator:"telenor",
            typ:"sim"
          };
          cardType[7]={
            id:"tel10",
            amount:10000,
            operator:"telenor",
            typ:"sim"
          };
          cardType[8]={
            id:"ore1",
            amount:1000,
            operator:"oredoo",
            typ:"sim"
          };
          cardType[9]={
            id:"ore3",
            amount:3000,
            operator:"oredoo",
            typ:"sim"
          };
          cardType[10]={
            id:"ore5",
            amount:5000,
            operator:"oredoo",
            typ:"sim"
          };
          cardType[11]={
            id:"ore10",
            amount:10000,
            operator:"oredoo",
            typ:"sim"
          };
          cardType[12]={
            id:"mm1d",
            amount:250,
            operator:"myanmarnet",
            limit:"1d",
            typ:"wifi"
          };
          cardType[13]={
            id:"mm2g",
            amount:1000,
            operator:"myanmarnet",
            limit:"2g",
            typ:"wifi"
          };
          cardType[14]={
            id:"mm5d",
            amount:1000,
            operator:"myanmarnet",
            limit:"5d",
            typ:"wifi"
          };
          cardType[15]={
            id:"mm6d",
            amount:1200,
            operator:"myanmarnet",
            limit:"6d",
            typ:"wifi"
          };
          cardType[16]={
            id:"mm30d",
            amount:5000,
            operator:"myanmarnet",
            limit:"30d",
            typ:"wifi"
          };
          cardType[17]={
            id:"mm11g",
            amount:5000,
            operator:"myanmarnet",
            limit:"11g",
            typ:"wifi"
          };
          cardType[18]={
            id:"hi1g",
            amount:1000,
            operator:"hiwifi",
            limit:"1g",
            typ:"wifi"
          };
          cardType[19]={
            id:"hi2g",
            amount:1500,
            operator:"hiwifi",
            limit:"2g",
            typ:"wifi"
          };
          cardType[20]={
            id:"hi5g",
            amount:3500,
            operator:"hiwifi",
            limit:"5g",
            typ:"wifi"
          };
          cardType[21]={
            id:"hi7d",
            amount:1500,
            operator:"hiwifi",
            limit:"7d",
            typ:"wifi"
          };
          var amt,operator,typ,limit;
          click(".cardDivBtn p",function (e) {
            var id=e.srcElement.id;
            for (var i = 0; i < cardType.length; i++) {
              if(cardType[i].id==id){
                limit=(cardType[i].typ=="wifi")?cardType[i].limit:0;
                operator=cardType[i].operator;
                amt=cardType[i].amount;
                typ=cardType[i].typ;
                addClass(".shopPopUp","active");
                addClass(".cardConfirm","active");
              }
            }
          });
          click(".shopPopUpClick,.cardConfirm div:last-child p,#buyDone,#failOK",function () {
            rmvClass(".shopPopUp","active");
            rmvClass(".cardConfirm","active");
            rmvClass(".cardSuccess","active");
            rmvClass(".cardFail","active");
          });
          click("#confirm",function (){
            var cardAjax=ajax("buyCard.php",function (data) {
              rmvClass(".cardConfirm","active");
              if (data.text=="notEnough") {
                addClass(".cardFail","active");
                html("#crdNotEng","Insufficent Balance");
              }else if(data.text=="notFound"){
                addClass(".cardFail","active");
                html("#crdNotEng","Sorry,card is unavailable right now.Please choose another one");
              }else{
                $("#id img").src="../img/copy.png";
                $("#pin img").src="../img/copy.png";
                data.text=data.text.split(",");
                html("#id p",data.text[0]);
                if (typ=="sim") {
                  hide("#pin");
                }else {
                  $("#pin").style.display="";
                  html("#pin p",data.text[1]);
                }
                addClass(".cardSuccess","active");
              }

            });
            cardAjax.post("type="+typ+",operator="+operator+",amount="+amt+",limit="+limit);
          });
          click("#id img" ,function (){
            if(copy(html("#id p"))){
            $("#id img").src="../img/copied.png";
          }
          });
          click("#pin img",function (){
            if(copy(html("#pin p"))){
            $("#pin img").src="../img/copied.png";
          }
          });
        }
    },function (data) {    //Error

    },function (data) {    //Processing

         //show(loading);
    });
    bdyDom.get();
  }
});
window.addEventListener("online",function functionName() {
  var updateStatus=ajax("activeStatus.php",function (data) {
    console.log(data.text);
  });
  updateStatus.post("status="+navigator.onLine);
});
window.addEventListener("offline",function functionName() {
  var updateStatus=ajax("activeStatus.php",function (data) {
    console.log(data.text);
  });
  updateStatus.post("status="+navigator.onLine);

});
window.addEventListener('beforeunload', function(){
  var updateStatus=ajax("activeStatus.php",function (data) {
    console.log(data.text);
  });
  updateStatus.post("status="+false);    // ...
});
//#157AF2
//#1877F0
//#4285F4
//--#7B7D7F
