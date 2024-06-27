// document.addEventListener("DOMContentLoaded", function() {
//     const loginForm = document.getElementById("loginForm");
//     const loginButton = document.getElementById("loginButton");

//     loginButton.addEventListener("click", function() {
//         // Kiểm tra dữ liệu đầu vào ở đây (ví dụ: kiểm tra xem email và mật khẩu có hợp lệ không).

//         // Hiển thị thông báo thành công (ví dụ):
//         alert("Đăng nhập thành công!");

//         // Chuyển hướng sau khi đăng nhập thành công (ví dụ: trang "Trangchu.html").
//         window.location.href = "http://127.0.0.1:5500/html/TRANGCHU.HTML";
//     });
// });
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
  async function dangnhap(){
    
    var TK=document.getElementById('TK').value;
    var MK=document.getElementById('MK').value;
    let url="https://localhost:7180/api_DoChoiCongNghe/DangNhapctrl/Get-AllTKMK"
    let data = await getdata_API(url);
    for(let i = 0; i < data.length; i++){
        if(data[i].taiKhoan===TK&&data[i].matKhau===MK){
            if(data[i].taiKhoan==="admin"){
                alert("Đăng nhập thành công")
                window.location.href="http://127.0.0.1:5500/html/Quantri_API.html";
                return; 
            }
            alert("Đăng nhập thành công")
            window.location.href="http://127.0.0.1:5500/html/TRANGCHU_API.HTML";
            return;
        }
    }
    alert("Đăng nhập thất bại")
  }