<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\chitietcontroller;
use App\Http\Controllers\dangnhap_dangkicontroller;
use App\Http\Controllers\giohangcontroller;
use App\Http\Controllers\trangchucontroller;
use App\Http\Controllers\updatecontroller;
use App\Models\giohang;
use Illuminate\Support\Facades\Route;

Route::get('/main',[trangchucontroller::class,'main'])->name('main');
Route::get('/admin',[admincontroller::class,'admin'])->name('admin');

Route::prefix('admin')->group(function (){
    Route::get('/select', [admincontroller::class, 'select'])->name('select');
    Route::get('/selectadd', [admincontroller::class, 'create'])->name('selectadd');
    Route::get('/update/{id}', [admincontroller::class, 'update'])->name('update');
    Route::get('/loaidc', [admincontroller::class, 'themloai'])->name('loaidc');
    Route::get('/hoadon', [admincontroller::class, 'hoadon'])->name('hoadon');
});
Route::post('/add', [admincontroller::class, 'add'])->name('add');
Route::post('/addloai', [admincontroller::class, 'addloai'])->name('addloai');
Route::get('/sualoai/{id}', [admincontroller::class, 'sualoai'])->name('sualoai');

Route::post('/updateLoaiDC/{id}', [admincontroller::class, 'updateLoaiDC']);
Route::post('/suatrangthai/{id}', [admincontroller::class, 'trangthai'])->name('suatrangthai');
Route::post('/admin/dochoicongnghe/edit/{id}', [updatecontroller::class, 'update']);

Route::get('/admin/dochoicongnghe/delete/{id}', [admincontroller::class, 'destroy'])->name('dochoicongnghe.delete');
Route::get('/admin/loaidc/deleteloaidc/{id}', [admincontroller::class, 'destroyloai'])->name('loaidc.deleteloaidc');


Route::get('/chitiet/{id}', [chitietcontroller::class, 'chitiet'])->name('chitiet');


//giỏ hàng

Route::get('/giohang', [giohangcontroller::class, 'giohang'])->name('giohang');
Route::post('/giohang', [giohangcontroller::class, 'checkout']);
Route::get('/sanphamdamua', [giohangcontroller::class, 'sanphamdamua'])->name('sanphamdamua');
// chi tiết sản phẩm
Route::post('/themvaogiohang/{id}',[chitietcontroller::class,'themvaogiohang'])->name('themvaogiohang');
Route::get('/destroy/{id}', [giohangcontroller::class, 'destroy'])->name('xoagiohang');



Route::post('/dangki', [dangnhap_dangkicontroller::class, 'dangki'])->name('dangki');
Route::get('/hienthidangki', [dangnhap_dangkicontroller::class, 'hienthidangki']);
Route::get('/hienthidangnhap', [dangnhap_dangkicontroller::class, 'hienthidangnhap']);
Route::get('/dangnhap', [dangnhap_dangkicontroller::class, 'dangnhap'])->name('kiemtradangnhap');;