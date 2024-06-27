async function load() {
    let stringsp = localStorage.getItem('spduocchon');
    let sp = JSON.parse(stringsp);
    let so = sp.ma
    let url="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/get-DC-by-id/"+so;
    var data=await getdata_API(url);
    document.getElementById("Ten").textContent = data.tenDC;
    document.getElementById("Tien").textContent = data.giaBan;
    document.getElementById("Anh").src = data.anh;
}
load();
async function callapi(url , options){
    const res = await fetch(url,options);
    const data = await res.json();
    return data;
  }
  async function add_api(url,data)
{
    const options = {
      method : "POST",
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify(data)};
     await callapi(url,options);
}
async function getdata_API(url)
{
    const options = {method : "GET"};
    const data = await callapi(url,options);
    return data;
}
async function up_API(apiUrl, data, callback)
{
  const option = { method: "POST",
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)}; 
        await callapi(apiUrl, option);
        if (callback) {
            callback();
        }
}
async function themgiohang(){
    let stringsp = localStorage.getItem('spduocchon');
    let sp = JSON.parse(stringsp);
    let so = sp.ma
    let url="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/get-DC-by-id/"+so;
    var data1=await getdata_API(url);   
    let maGioHang = localStorage.getItem('maGioHang') || 1;
    localStorage.setItem('maGioHang', ++maGioHang);
    var tensp = document.getElementById('Ten').innerHTML;
    var tien = document.getElementById('Tien').innerHTML;
    var anh = data1.anh;
    console.log(anh)
    ////
    
    if(data1.soLuong===0){
        alert("Số lượng sản phẩm đã hết")
        return;
      }
    let URL="https://localhost:7180/api/GioHangCTRL/create-GioHang";
    let data={
        maGioHang: maGioHang,
        maDC: sp.ma,
        tenDC: tensp,
        soLuong:1,
        anh:anh,
        gia: Number(tien)
    }
    console.log(data.gia);
     add_api(URL,data);
     alert("Thêm thành công");
     updt();
}
async function updt(){
  let stringsp = localStorage.getItem('spduocchon');
  let sp = JSON.parse(stringsp);
  let so = sp.ma
  let url="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/get-DC-by-id/"+so;
  var data1=await getdata_API(url);
    var tensp = document.getElementById('Ten').innerHTML;
    var tien = document.getElementById('Tien').innerHTML;
    var anh = document.getElementById('Anh');
    ////
    let URL="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/update-DoChoi";
    let data={
        MaDC:sp.ma ,
        TenDC: tensp,
        SoLuong:Number(data1.soLuong)-1,
        GiaBan: Number(tien) ,
        Anh: anh.src
    }
    up_API(URL, data, load)
}





























// function start() {
    
//     let maGioHang = localStorage.getItem('maGioHang') || 1;
//     localStorage.setItem('maGioHang', ++maGioHang);

//     let ma =JSON.parse(localStorage.getItem('spduocchon')) ;
//  let sanphamtimthay;

//     let stringthongtinsanpham = localStorage.getItem('listdochoi');
//     let tt = JSON.parse(stringthongtinsanpham);
//     for (let i = 0; i < tt.length; i++) {
//         if (tt[i].ma === ma.ma) {
//             sanphamtimthay=tt[i];
//             break;
//         }
//     }
//     console.log(sanphamtimthay);
//     debugger
//     let thongtinsanpham = {
//         magh: maGioHang,
//         ma: ma.ma,
//         ten:sanphamtimthay.ten,
//         anh: sanphamtimthay.anh,
//         tien: sanphamtimthay.tien,
//         sl: 1,
//     }

    
//     let ttsp = localStorage.getItem("sanphamgiohang");
//     let sanphamgiohang = JSON.parse(ttsp) || [];
//     sanphamgiohang.push(thongtinsanpham);
//     let stringsanphamgiohang = JSON.stringify(sanphamgiohang);
//     localStorage.setItem('sanphamgiohang', stringsanphamgiohang);
//     alert("Thêm thành công");
//     upsl();
// }
// function upsl(){
//     let stringsp = localStorage.getItem('spduocchon');
//     let sp = JSON.parse(stringsp);
//     let stringthongtinsanpham = localStorage.getItem('listdochoi');
//     let tt = JSON.parse(stringthongtinsanpham);
//     for (let i = 0; i < tt.length; i++) {
        
//         if (tt[i].ma === sp.ma) {
//             if(tt[i].sl>0){tt[i].sl= tt[i].sl-1;}
//             else{alert("Sản phẩm đã hết");}
//         }
//     }
//     localStorage.setItem('listdochoi',JSON.stringify(tt));
// }