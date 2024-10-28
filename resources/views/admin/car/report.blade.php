@extends('layouts.app')

@section('title' , 'داشبورد')

@section('content')
    <div class="card" style="width:50%;margin:0 auto;">
        <div class="card-body">
            <div class="card-title border-bottom">
                <h5>فرم ثبت خودرو</h3>
            </div>
            @if(Session("success"))
                <div class="alert alert-success" style="color:white;">
                    با موفقیت ثبت شد.
                </div>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            @endif

            <form action="{{route('store.report' , ['id' => $carId])}}" method="POST">
                @csrf

                <!-- Car Data -->
                <h4 class="mt-4">اطلاعات خودرو</h4>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="carBrand">برند:</label>
                        <input type="text" class="form-control" id="carBrand" name="carBrand" placeholder="برند خودرو را وارد کنید">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carModel">مدل:</label>
                        <input type="text" class="form-control" id="carModel" name="carModel" placeholder="مدل خودرو را وارد کنید">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carTip">نوع:</label>
                        <input type="text" class="form-control" id="carTip" name="carTip" placeholder="نوع خودرو را وارد کنید">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="carColor">رنگ:</label>
                        <input type="text" class="form-control" id="carColor" name="carColor" placeholder="رنگ خودرو را وارد کنید">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carBody">بدنه:</label>
                        <input type="text" class="form-control" id="carBody" name="carBody" placeholder="بدنه خودرو را وارد کنید">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carGearbox">گیربکس:</label>
                        <input type="text" class="form-control" id="carGearbox" name="carGearbox" placeholder="گیربکس خودرو را وارد کنید">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="carEngineVolume">حجم موتور:</label>
                        <input type="text" class="form-control" id="carEngineVolume" name="carEngineVolume" placeholder="حجم موتور را وارد کنید">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carFuel">نوع سوخت:</label>
                        <input type="text" class="form-control" id="carFuel" name="carFuel" placeholder="نوع سوخت را وارد کنید">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carYear">سال:</label>
                        <input type="text" class="form-control" id="carYear" name="carYear" placeholder="سال تولید را وارد کنید">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="carFunction">کارکرد:</label>
                        <input type="text" class="form-control" id="carFunction" name="carFunction" placeholder="عملکرد خودرو را وارد کنید">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carVinCode">کد VIN:</label>
                        <input type="text" class="form-control" id="carVinCode" name="carVinCode" placeholder="کد VIN را وارد کنید">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bachelorDate">تاریخ ساخت:</label>
                        <input type="text" class="form-control" id="year" name="bachelorDate" placeholder="تاریخ ساخت را وارد کنید">
                    </div>
                </div>

                <!-- Body Details -->
                <h4 class="mt-3">جزئیات بدنه</h4>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="engineDoor">در موتور:</label>
                        <select class="form-control" id="engineDoor" name="engineDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="boxDoor">در باکس:</label>
                        <select class="form-control" id="boxDoor" name="boxDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sideColumns">ستون‌های جانبی:</label>
                        <select class="form-control" id="sideColumns" name="sideColumns">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="ceiling">سقف:</label>
                        <select class="form-control" id="ceiling" name="ceiling">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rightFrontFender">گلگیر جلو راست:</label>
                        <select class="form-control" id="rightFrontFender" name="rightFrontFender">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftFrontFender">گلگیر جلو چپ:</label>
                        <select class="form-control" id="leftFrontFender" name="leftFrontFender">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="rightRearFender">گلگیر عقب راست:</label>
                        <select class="form-control" id="rightRearFender" name="rightRearFender">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftRearFender">گلگیر عقب چپ:</label>
                        <select class="form-control" id="leftRearFender" name="leftRearFender">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftRearDoor">در عقب چپ:</label>
                        <select class="form-control" id="leftRearDoor" name="leftRearDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="rightRearDoor">در عقب راست:</label>
                        <select class="form-control" id="rightRearDoor" name="rightRearDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftFrontDoor">در جلو چپ:</label>
                        <select class="form-control" id="leftFrontDoor" name="leftFrontDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rightFrontDoor">در جلو راست:</label>
                        <select class="form-control" id="rightFrontDoor" name="rightFrontDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="frontChassis">شاسی جلو:</label>
                        <select class="form-control" id="frontChassis" name="frontChassis">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rearChassis">شاسی عقب:</label>
                        <select class="form-control" id="rearChassis" name="rearChassis">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="frontBumper">بامپر جلو:</label>
                        <select class="form-control" id="frontBumper" name="frontBumper">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="rearBumper">بامپر عقب:</label>
                        <select class="form-control" id="rearBumper" name="rearBumper">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rightSirrup">سیرپ راست:</label>
                        <select class="form-control" id="rightSirrup" name="rightSirrup">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftSirrup">سیرپ چپ:</label>
                        <select class="form-control" id="leftSirrup" name="leftSirrup">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>

                <!-- Technical Check -->
                <h4 class="mt-4">بررسی فنی</h4>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="radiator">رادیاتور:</label>
                        <select class="form-control" id="radiator" name="radiator">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="battery">باطری:</label>
                        <select class="form-control" id="battery" name="battery">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="motorMount">پایه موتور:</label>
                        <select class="form-control" id="motorMount" name="motorMount">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="oilLeak">نشت روغن:</label>
                        <select class="form-control" id="oilLeak" name="oilLeak">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="oilLevelQuality">کیفیت سطح روغن:</label>
                        <select class="form-control" id="oilLevelQuality" name="oilLevelQuality">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="compression">فشرده‌سازی:</label>
                        <select class="form-control" id="compression" name="compression">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="oilConsumption">مصرف روغن:</label>
                        <select class="form-control" id="oilConsumption" name="oilConsumption">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="blackBlueSmoke">دود سیاه/آبی:</label>
                        <select class="form-control" id="blackBlueSmoke" name="blackBlueSmoke">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="radiatorWaterLevelQuality">کیفیت سطح آب رادیاتور:</label>
                        <select class="form-control" id="radiatorWaterLevelQuality" name="radiatorWaterLevelQuality">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="engineSound">صدای موتور:</label>
                        <select class="form-control" id="engineSound" name="engineSound">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dashboardWarningLights">چراغ‌های هشدار داشبورد:</label>
                        <select class="form-control" id="dashboardWarningLights" name="dashboardWarningLights">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="brakeOilLevel">سطح روغن ترمز:</label>
                        <select class="form-control" id="brakeOilLevel" name="brakeOilLevel">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>

                <!-- Options -->
                <h4 class="mt-4">آپشن ها</h4>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="airbag">ایربگ:</label>
                        <select class="form-control" id="airbag" name="airbag">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="spareKey">کلید یدکی:</label>
                        <select class="form-control" id="spareKey" name="spareKey">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="oilLight">چراغ روغن:</label>
                        <select class="form-control" id="oilLight" name="oilLight">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="heatingSystem">سیستم گرمایش:</label>
                        <select class="form-control" id="heatingSystem" name="heatingSystem">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coolingSystem">سیستم خنک‌کننده:</label>
                        <select class="form-control" id="coolingSystem" name="coolingSystem">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="soundSystem">سیستم صوتی:</label>
                        <select class="form-control" id="soundSystem" name="soundSystem">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="navigationSystem">سیستم ناوبری:</label>
                        <select class="form-control" id="navigationSystem" name="navigationSystem">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parkingSensors">حسگرهای پارک:</label>
                        <select class="form-control" id="parkingSensors" name="parkingSensors">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rearCamera">دوربین عقب:</label>
                        <select class="form-control" id="rearCamera" name="rearCamera">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="sunroof">سانروف:</label>
                        <select class="form-control" id="sunroof" name="sunroof">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leatherSeats">صندلی‌های چرم:</label>
                        <select class="form-control" id="leatherSeats" name="leatherSeats">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="heatedSeats">صندلی‌های گرمکن‌دار:</label>
                        <select class="form-control" id="heatedSeats" name="heatedSeats">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>

                 <!-- Description -->
                <h4 class="mt-4">توضیحات</h4>
                <div class="form-group">
                    <label for="carDescription">توضیحات خودرو:</label>
                    <textarea class="form-control" id="carDescription" name="carDescription" rows="4" placeholder="لطفاً توضیحات اضافی درباره خودرو را وارد کنید..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-4">ثبت نوبت</button>
            </form>
        </div>
    </div>
@endsection