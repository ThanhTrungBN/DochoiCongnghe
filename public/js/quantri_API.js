
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
async function add_api(url,data)
{
  debugger
    const options = {
      method : "POST",
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify(data)};
     await callapi(url,options);
}
async function up_API(apiUrl, data, callback)
{
  const option = { method: "POST",
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)}; 
        await callapi(apiUrl, option);
        alert("Bạn đã sửa thành công !");
        if (callback) {
            callback();
        }
}
async function dlt_API(apiUrl,MALOAI,callback )
{
  let URL = `${apiUrl}?id=${MALOAI}`;
  debugger
        const option = { method: "DELETE" };
        await callapi(URL, option);
        alert("Bạn đã xóa thành công !");
        if (callback) {
            callback();
        }
};

////
window.addEventListener('load',getdata2);

async function savedata(){
    var masp = document.getElementById('Ma').value;
    var tensp = document.getElementById('Ten').value;
    var soluong = document.getElementById('Soluong').value;
    var tien = document.getElementById('Tien').value;
    var anh = document.getElementById('Link').value;
    ////
    let URL="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/create-DoChoi";
    let data={
      MaDC: Number(masp) ,
        TenDC: tensp,
        SoLuong:Number(soluong),
        GiaBan: Number(tien) ,
        Anh: anh
    }
     add_api(URL,data);
      // Làm mới các trường nhập
      document.getElementById('Ma').value = '';
      document.getElementById('Ten').value = '';
      document.getElementById('Soluong').value = '';
      document.getElementById('Tien').value = '';
      document.getElementById('Link').value = '';
        document.getElementById("aa").style.display='block';
        document.getElementById("sp").style.display='none';
}
function anhien1(id){
  var anhienma = ["aa","sp"];
for (let i = 0; i < anhienma.length; i++) {
  if(anhienma[i]!=id)
  {
    document.getElementById(anhienma[i]).style.display='none';
  }
  else{     
    document.getElementById(id).style.display='block';
  }
}
}
async function getdata2(){
    let url="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/Get-All";
    var data=await getdata_API(url);
    let htmlArray=[];
    let urldel="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/delete-DoChoi";
    let URL="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/update-DoChoi";
    for(let i=0; i<data.length;i++)
    {
      htmlArray.push(`
            <tr a>
            <td style="overflow: hidden;"> <input style="width:98%" value="${data[i].anh}" class="ipma" id="Anh1" type="text"></td>
            <td><input style="width:98%" value="${data[i].tenDC}" class="ipma" id="Ten1" type="text"></td>
            <td><input style="width:98%" value="${data[i].giaBan.toLocaleString()}" class="ipma" id="Tien1" type="text"></td>
            <td><input style="width:98%" value="${data[i].soLuong}" class="ipma" id="Sl1" type="text"></td>
            <td  onclick="dlt_API('${urldel}',${data[i].maDC},getdata2)">Xóa</td>
            <td  onclick="update('${URL}', ${data[i].maDC},this)">Sửa</td>
          </tr>  
            ` );
            
    }
        $('.update').html(htmlArray.join(''));      
} 

function Delete(ma) {
    let data = localStorage.getItem('listdochoi');
    let sp=JSON.parse(data);
      for (let i = 0; i < sp.length; i++) {
        if (sp[i].ma === ma) {
        sp.splice(i, 1); // Sử dụng splice để xóa phần tử tại vị trí i
          localStorage.setItem('listdochoi', JSON.stringify(sp)); // Lưu lại danh sách đã cập nhật vào Local Storage
          getdata2(); // Gọi lại hàm để cập nhật danh sách hiển thị
          break;
        }
      }
     }
async function update(URL,ma,button){
  const div = button.parentNode;
    var Anh = div.querySelector("#Anh1");
    var Ten = div.querySelector("#Ten1");
    var Tien = div.querySelector("#Tien1");
    var SoLuong = div.querySelector("#Sl1");
debugger
    let url="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/Get-All";
    var data=await getdata_API(url);
    console.log(data);
    for(let i=0; i<data.length;i++)
    {
      if(Ten.value ===""||Tien.value ===""||SoLuong.value === "")
              {
                alert("giá trị nhập trống");
                break;
              }
        if(data[i].maDC===ma){
          let data_up={
            maDC:ma,
              tenDC:Ten.value,
              soLuong:SoLuong.value,
              giaBan:Tien.value,
              anh:Anh.value
          }
          up_API(URL,data_up,getdata2)
        }
    }
    
}
// function Update(button , ma){
//   const div = button.parentNode;
//   var Anh = div.querySelector("#Anh1");
//   var Ten = div.querySelector("#Ten1");
//   var Tien = div.querySelector("#Tien1");
//   var SoLuong = div.querySelector("#Sl1");
//   let data = localStorage.getItem('listdochoi');
//   let sp=JSON.parse(data);
//     for (let i = 0; i < sp.length; i++) {
//       if (sp[i].ma == ma) {
        
//         if(Ten.value ===""||Tien.value ===""||SoLuong.value === "")
//         {
//           alert("giá trị nhập trống");
//           getdata2();
//           break;
//         }
//           sp[i].anh= Anh.value;
//           sp[i].ten = Ten.value;
//           sp[i].tien = Tien.value;
//           sp[i].sl = SoLuong.value;
//           alert("Sửa thành công");
//         localStorage.setItem('listdochoi', JSON.stringify(sp)); // Lưu lại danh sách đã cập nhật vào Local Storage
//         getdata2(); // Gọi lại hàm để cập nhật danh sách hiển thị
//         break;
//       }
//     }
// }

  


  