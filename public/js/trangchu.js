
async function getdata(){
  let url="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/Get-All";
  var data=await getdata_API(url);
  let htmlArray=[];
  for(let i=0; i<data.length;i++)
    {
      htmlArray.push(`
          <div class="sanpham" style="margin-bottom:110px;" >
          <img  style="width:100%;height: 100%;object-fit:cover;border-radius: 100px 10px 0 0px;" src="${data[i].anh}" alt="">
          <div style="height: 100px;width: 100%;background-color: #00483d;">
              <a Style="text-decoration:none ;" href="http://127.0.0.1:5500/html/ttsanpham_API.html"  onclick="getma(${data[i].maDC},${data[i].soLuong})"><h3 Style="color:rgb(255, 255, 255);width:200px;display:flex;justify-content: center">${data[i].tenDC}</h3></a><br>
              <h4 style="color: #0975f5;width:200px;display:flex;justify-content: center"id="Tien1">${(data[i].giaBan).toLocaleString()}₫</h4>
          </div>
        </div>`
     );
    }
     $('.item').html(htmlArray.join(''));

  }
window.addEventListener('load',getdata()); 
// function getma(ma)
// {
//   localStorage.setItem("ma",ma);
// }




function getma(ma,sl){
    
    let tt={
        ma,
        sl
    };
    var ttsp=JSON.stringify(tt);
    localStorage.setItem("spduocchon",ttsp);
}
/***/
var listImg = document.querySelectorAll(".broadcast-item");
var listClass = ['gallery__item--first',
'gallery__item--selectbefor', 
'gallery__item--last', 
'gallery__item--previous',
'gallery__item--selectafter', 
'gallery__item--next'
];
var currentIndex = 0;

function updateClasses() {
  for (let i = 0; i < listImg.length; i++) {
    listImg[i].classList.remove(...listClass); 
    listImg[i].classList.add(listClass[currentIndex]);
    currentIndex++;
    if (currentIndex >= listClass.length) {
      currentIndex = 0;
    }
  }
  around(listClass);
}

function around(listClass) {
  
    lastItem=listClass[listClass.length - 1];
  for (let i = listImg.length - 1; i > 0; i--) {
    listClass[i] = listClass[i - 1];
  }
  listClass[0] = lastItem;
}
document.addEventListener("DOMContentLoaded", function() {
    updateClasses();
    setInterval(updateClasses, 6000); 
  });
  async function callapi(url , options){
    const res = await fetch(url,options);
    const data = await res.json();
    return data;
  }
  async function getdata_API(url)
  {
      const options = {method : "GET"};
      const data = await callapi(url,options);
      return data;
  }