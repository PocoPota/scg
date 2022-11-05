// ユーザー名入力
function NameInputChange(event){
    var username = event.currentTarget.value;
    document.getElementById('name').innerHTML = username;
}

var userNameInput = document.getElementById('usernameInput');
userNameInput.addEventListener('change', NameInputChange);

// アイコン指定方法選択部分
// function SelectWay(event){
//     var imgSelWay = event.currentTarget.value;
//     var urlWay = document.getElementById('url-way');
//     var fileWay = document.getElementById('file-way');
//     if(imgSelWay == 'url'){
//         urlWay.style.display = 'block';
//         fileWay.style.display = 'none';
//     }else if(imgSelWay == 'upload'){
//         urlWay.style.display = 'none';
//         fileWay.style.display = 'block';
//     }
// }

// var imgSel = document.getElementById('img-sel');
// imgSel.addEventListener('change', SelectWay);

// アイコン指定
// URL指定
// function imgUrlInputChange(event){
//     var imgUrl = event.currentTarget.value;
//     document.getElementById('icon').innerHTML = '<img src="' + imgUrl + '">';
// }

// var imgUrlInput = document.getElementById('url-way');
// imgUrlInput.addEventListener('change', imgUrlInputChange);

// アップロード指定(blob urlを使用)
document.getElementById('file-way').addEventListener('change', function (e) {
    var file = e.target.files[0];
    var blobUrl = window.URL.createObjectURL(file);

    document.getElementById('icon').innerHTML = '<img src="' + blobUrl + '">';
});


// 金額入力
function MoneyInputChange(event){
    var money = event.currentTarget.value;
    var money = Number(money);
    document.getElementById('money').innerHTML = '￥' + money.toLocaleString();

    var top = document.getElementById('superchat-top');
    var bottom = document.getElementById('superchat-bottom');
    var nameFont = document.getElementById('name');
    var moneyFont = document.getElementById('money');
    var textFont = document.getElementById('text');
    if(money <= 199){
        //青
        top.style.backgroundColor = '#1565C0';
        bottom.style.backgroundColor = '#1565C0';
        nameFont.style.color = '#ffffffb3';
        moneyFont.style.color = '#ffffff';
        textFont.style.color = '#ffffff';
    }else if(money <= 499){
        //水色
        top.style.backgroundColor = '#00B8D4';
        bottom.style.backgroundColor = '#00E5FF';
        nameFont.style.color = '#000000b3';
        moneyFont.style.color = '#000000';
        textFont.style.color = '#000000';
    }else if(money <= 999){
        //緑
        top.style.backgroundColor = '#00BFA5';
        bottom.style.backgroundColor = '#1DE9B6';
        nameFont.style.color = '#000000b3';
        moneyFont.style.color = '#000000';
        textFont.style.color = '#000000';
    }else if(money <= 1999){
        //黄色
        top.style.backgroundColor = '#FFB300';
        bottom.style.backgroundColor = '#FFCA28';
        nameFont.style.color = '#000000b3';
        moneyFont.style.color = '#000000';
        textFont.style.color = '#000000';
    }else if(money <= 4999){
        //オレンジ
        top.style.backgroundColor = '#E65100';
        bottom.style.backgroundColor = '#F57C00';
        nameFont.style.color = '#ffffffb3';
        moneyFont.style.color = '#ffffff';
        textFont.style.color = '#ffffff';
    }else if(money <= 9999){
        //マゼンタ
        top.style.backgroundColor = '#C2185B';
        bottom.style.backgroundColor = '#E91E63';
        nameFont.style.color = '#ffffffb3';
        moneyFont.style.color = '#ffffff';
        textFont.style.color = '#ffffff';
    }else{
        //赤
        top.style.backgroundColor = '#D00000';
        bottom.style.backgroundColor = '#E62117';
        nameFont.style.color = '#ffffffb3';
        moneyFont.style.color = '#ffffff';
        textFont.style.color = '#ffffff';
    }
}

var moneyInput = document.getElementById('moneyInput');
moneyInput.addEventListener('change', MoneyInputChange);

// コメント入力
function TextInputChange(event){
    var text = event.currentTarget.value;
    if(text == ''){
        document.getElementById('superchat-bottom').style.display = 'none';
        document.getElementById('superchat-top').style.borderBottomRightRadius = '4px';
        document.getElementById('superchat-top').style.borderBottomLeftRadius = '4px';
    }else{
        document.getElementById('superchat-bottom').style.display = 'block';
        document.getElementById('superchat-top').style.borderBottomRightRadius = '0px';
        document.getElementById('superchat-top').style.borderBottomLeftRadius = '0px';
        document.getElementById('text').innerHTML = text;
    }
}

var TextInput = document.getElementById('textInput');
textInput.addEventListener('change', TextInputChange);

// ダウンロード
var btn = document.getElementById("download-btn");
btn.addEventListener("click",() => {
  html2canvas(document.querySelector("#superchat")).then(canvas => { 
      let downloadEle = document.createElement("a");
      downloadEle.href = canvas.toDataURL("image/png");
      downloadEle.download = "superchat.png";
      downloadEle.click();
  });
})