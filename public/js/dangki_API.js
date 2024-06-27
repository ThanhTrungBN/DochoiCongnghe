
// document.addEventListener("DOMContentLoaded", function() {
//     const registrationForm = document.getElementById("registrationForm");
//     const registerButton = document.getElementById("registerButton");

//     registerButton.addEventListener("click", function() {
//         // Kiểm tra dữ liệu đầu vào ở đây (ví dụ: kiểm tra xem email và mật khẩu có hợp lệ không).

//         // Hiển thị thông báo thành công (ví dụ):
//         alert("Đăng ký thành công!");

//         // Sau đó có thể chuyển hướng người dùng hoặc thực hiện các hành động khác sau khi đăng ký thành công.
//         window.location.href = "Dangnhap.html";
//     });
// });
async function callapi(url, options) {
  const res = await fetch(url, options);
  const data = await res.json();
  return data;
}
async function getdata_API(url) {
  const options = { method: "GET" };
  const data = await callapi(url, options);
  return data;
}
async function add_api(url, data) {
  debugger
  const options = {
    method: "POST",
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  };
  await callapi(url, options);
}

async function dangkitaikhoan() {
  let maKH = localStorage.getItem('makhachHang') || 1;
  localStorage.setItem('maKhachHang', ++maKH);
  var taikhoan = document.getElementById('diachi').value;
  var matkhau = document.getElementById('matkhau').value;
  var SDT = document.getElementById('sdt').value;
  var ten = document.getElementById('tenkhach').value;
  var nhaplaimk = document.getElementById('nhaplaimk').value;
  if (taikhoan === "" || matkhau === "" || SDT === "" || ten === "" || nhaplaimk === "") {
    alert("hãy điền đủ thông tin");
    return;
  }
  let urlkttk = "https://localhost:7180/api_DoChoiCongNghe/DangNhapctrl/Get-AllTKMK"
  let datakttk = await- getdata_API(urlkttk);
  for (let i = 0; i < datakttk.length; i++) {
    if(datakttk.TaiKhoan===taikhoan){
      alert("Tài khoản đã tồn tại");
      return;
    }
  }
  if (matkhau != nhaplaimk) {
    alert("mật khẩu chưa trùng khớp")
    return;
  }

let urlcr = "https://localhost:7180/api_DoChoiCongNghe/DangNhapctrl/create";
let data = {
  TaiKhoan: taikhoan,
  matkhau: matkhau
}
let urlcrkh = "https://localhost:7180/api/KhachHangCtrl/create-KhachHang";
let datakh = {
  maKhachHang: maKH,
  tenKhachHang: ten,
  sdt: SDT,
  diachi: taikhoan
}
alert("đăng kí thành công")
add_api(urlcr, data);
add_api(urlcrkh, datakh)
}
