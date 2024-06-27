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
  async function up_API(apiUrl, data)
  {
    const option = { method: "POST",
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify(data)}; 
          await callapi(apiUrl, option);
  }
  async function dlt_API(apiUrl,MAGH )
  {
    let URL = `${apiUrl}?id=${MAGH}`;
    debugger
          const option = { method: "DELETE" };
          await callapi(URL, option);
          alert("Bạn đã xóa thành công !");
          start()
  };
async function start() {
    let stringthongtinsanpham = localStorage.getItem('sanphamgiohang');
    let tt = JSON.parse(stringthongtinsanpham);
    let urlget="https://localhost:7180/api/GioHangCTRL/getallgiohang";
    let urldel="https://localhost:7180/api/GioHangCTRL/delete-GioHang";
    var data = await getdata_API(urlget);
    var htmlArray =[]
    for(let i=0; i<data.length;i++)
    {
      htmlArray.push(`
    <div class="sanpham" > 
        <div style="width: 55px;height:50px;" ><img src="${data[i].anh}" alt=""></div>
        <div>
            <table>
                <tr>
                    <td>
                        <div class="nut" id="nuttru" onclick="GiamSoLuong(${data[i].maGioHang},${data[i].maDC})">-</div>
                        <span id="${data[i].maGioHang}">${data[i].soLuong}</span>
                        <div class="nut" id="nutcong" onclick="TangSoLuong(${data[i].maGioHang},${data[i].maDC})">+</div>
                    </td>
                    <td>${data[i].gia}</td>
                    <td onclick="dlt_API('${urldel}',${data[i].maGioHang})">Xóa</td>    
                </tr>
            </table>
        </div>
    </div>` );
    $('.sanphamcha').html(htmlArray.join(''))

}
}

async function GiamSoLuong(magh,ma) {
    let urlgetdc="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/get-DC-by-id/"+ma;
    var data1=await getdata_API(urlgetdc);
    var a = document.getElementById(magh);
    let urlupslgh="https://localhost:7180/api/GioHangCTRL/update-GioHang";
    let urlupslsp="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/update-DoChoi";
    if(Number(a.textContent)===1){
        alert("Số lượng đã đạt giới hạn")
        return;
    }
    let dataslgh={
        maGioHang: magh,
        maDC: ma,
        tenDC: data1.tenDC,
        soLuong: Number(a.textContent) - 1,
        anh: data1.anh,
        gia: data1.giaBan
      }
      a.textContent = String(Number(a.textContent) - 1);  
    let dataslsp={
        MaDC:ma,
        TenDC: data1.tenDC,
        SoLuong:Number(data1.soLuong)+1,
        GiaBan: data1.giaBan ,
        Anh: data1.anh
    }
    up_API(urlupslsp, dataslsp)
    up_API(urlupslgh, dataslgh)
}
async function TangSoLuong(magh,ma) {
    let urlgetdc="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/get-DC-by-id/"+ma;
    var data1=await getdata_API(urlgetdc);
    var a = document.getElementById(magh);
    let urlupslgh="https://localhost:7180/api/GioHangCTRL/update-GioHang";
    let urlupslsp="https://localhost:7180/api_DoChoiCongNghe/DoChoictrl/update-DoChoi";
    if(data1.soLuong===0){
        alert("Số lượng đã đạt giới hạn")
        return;
    }
    let dataslgh={
        maGioHang: magh,
        maDC: ma,
        tenDC: data1.tenDC,
        soLuong: Number(a.textContent) + 1,
        anh: data1.anh,
        gia: data1.giaBan
      }
      a.textContent = String(Number(a.textContent) + 1);  
    let dataslsp={
        MaDC:ma,
        TenDC:data1.tenDC,
        SoLuong:Number(data1.soLuong)-1,
        GiaBan: data1.giaBan ,
        Anh: data1.anh
    }
    up_API(urlupslsp, dataslsp)
    up_API(urlupslgh, dataslgh)
  
}
start()
function Delete(magh,ma) {
    let data = localStorage.getItem('sanphamgiohang');
    let sp = JSON.parse(data);
    
    let ttsp = localStorage.getItem('listdochoi');
    let list = JSON.parse(ttsp);

    var a = document.getElementById(magh);
    for (let i = 0; i < list.length; i++) {    
        if (list[i].ma === ma) { 
                list[i].sl=Number(a.textContent) 
                localStorage.setItem('listdochoi',JSON.stringify(list))           
                start()
        }
    }
    for (let i = 0; i < sp.length; i++) {
        if (sp[i].magh === magh) {
            sp.splice(i, 1); // Sử dụng splice để xóa phần tử tại vị trí i
            localStorage.setItem('sanphamgiohang', JSON.stringify(sp)); // Lưu lại danh sách đã cập nhật vào Local Storage
            start(); // Gọi lại hàm để cập nhật danh sách hiển thị
            break;
        }
    }   
   
}


