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
                        <select name="airbag" id="airbag" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="spare_key">سوئیچ یدک:</label>
                        <select name="spare_key" id="spare_key" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="oil_light">چراغ روغن:</label>
                        <select name="oil_light" id="oil_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="heating_system">سیستم گرمایش:</label>
                        <select name="heating_system" id="heating_system" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cooling_system">سیستم سرمایش:</label>
                        <select name="cooling_system" id="cooling_system" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cruise_control">کروز کنترل:</label>
                        <select name="cruise_control" id="cruise_control" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="airbag">ایربگ:</label>
                        <select name="airbag" id="airbag" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="spare_key">سوئیچ یدک:</label>
                        <select name="spare_key" id="spare_key" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="oil_light">چراغ روغن:</label>
                        <select name="oil_light" id="oil_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>            

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="driver_seat_mechanism">مکانیزم صندلی راننده:</label>
                        <select name="driver_seat_mechanism" id="driver_seat_mechanism" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="passenger_seat_mechanism">مکانیزم صندلی شاگرد:</label>
                        <select name="passenger_seat_mechanism" id="passenger_seat_mechanism" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="seat_cover">روکش صندلی:</label>
                        <select name="seat_cover" id="seat_cover" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="seat_memory">حافظه صندلی:</label>
                        <select name="seat_memory" id="seat_memory" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cooler_heater">سیستم گرمایش و سرمایش:</label>
                        <select name="cooler_heater" id="cooler_heater" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="stereo">ضبط:</label>
                        <select name="stereo" id="stereo" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="speaker">باند:</label>
                        <select name="speaker" id="speaker" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="central_locking">قفل مرکزی:</label>
                        <select name="central_locking" id="central_locking" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="power_windows">پاور ویندوز:</label>
                        <select name="power_windows" id="power_windows" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="trunk_opener">دکمه صندوق پران:</label>
                        <select name="trunk_opener" id="trunk_opener" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hood_opener">اهرم کاپوت:</label>
                        <select name="hood_opener" id="hood_opener" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="front_left_door_panel">رودری جلو چپ:</label>
                        <select name="front_left_door_panel" id="front_left_door_panel" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="front_right_door_panel">رودری جلو راست:</label>
                        <select name="front_right_door_panel" id="front_right_door_panel" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rear_left_door_panel">رودری عقب چپ:</label>
                        <select name="rear_left_door_panel" id="rear_left_door_panel" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rear_right_door_panel">رودری عقب راست:</label>
                        <select name="rear_right_door_panel" id="rear_right_door_panel" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="handbrake_light">چراغ ترمز دستی:</label>
                        <select name="handbrake_light" id="handbrake_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ABS">ABS:</label>
                        <select name="ABS" id="ABS" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="safety_belt">کمربند ایمنی:</label>
                        <select name="safety_belt" id="safety_belt" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="safety_belt_light">چراغ کمربند:</label>
                        <select name="safety_belt_light" id="safety_belt_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="floor_mats">کفپوش:</label>
                        <select name="floor_mats" id="floor_mats" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="steering_wheel_shifter">دسته دنده پشت فرمان:</label>
                        <select name="steering_wheel_shifter" id="steering_wheel_shifter" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="radar">رادار:</label>
                        <select name="radar" id="radar" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="door_handle_opener">دستگیره درب:</label>
                        <select name="door_handle_opener" id="door_handle_opener" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rear_indicator">راهنمای عقب:</label>
                        <select name="rear_indicator" id="rear_indicator" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div> 
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="headlight">چراغ جلو:</label>
                        <select name="headlight" id="headlight" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rear_light">چراغ عقب:</label>
                        <select name="rear_light" id="rear_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ceiling_light">چراغ سقف:</label>
                        <select name="ceiling_light" id="ceiling_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="reverse_light">چراغ دنده عقب:</label>
                        <select name="reverse_light" id="reverse_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="reading_light">چراغ مطالعه:</label>
                        <select name="reading_light" id="reading_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="trunk_light">چراغ صندوق:</label>
                        <select name="trunk_light" id="trunk_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="front_left_window">شیشه جلو چپ:</label>
                        <select name="front_left_window" id="front_left_window" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="front_right_window">شیشه جلو راست:</label>
                        <select name="front_right_window" id="front_right_window" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rear_glass">شیشه عقب:</label>
                        <select name="rear_glass" id="rear_glass" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="front_wiper">برف پاک کن جلو:</label>
                        <select name="front_wiper" id="front_wiper" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rear_wiper">برف پاک کن عقب:</label>
                        <select name="rear_wiper" id="rear_wiper" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="left_mirror_mechanism">مکانیزم آینه چپ:</label>
                        <select name="left_mirror_mechanism" id="left_mirror_mechanism" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="right_mirror_mechanism">مکانیزم آینه راست:</label>
                        <select name="right_mirror_mechanism" id="right_mirror_mechanism" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="center_mirror">آینه وسط:</label>
                        <select name="center_mirror" id="center_mirror" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mirror_indicator">راهنمای آینه:</label>
                        <select name="mirror_indicator" id="mirror_indicator" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="sunroof">سانروف:</label>
                        <select name="sunroof" id="sunroof" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dashboard_light">چراغ داشبورد:</label>
                        <select name="dashboard_light" id="dashboard_light" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="steering_wheel">فرمان:</label>
                        <select name="steering_wheel" id="steering_wheel" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="horn">بوق:</label>
                        <select name="horn" id="horn" class="form-control">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>   
                
                <!-- دیاگ -->
                <h4 class="mt-4">دیاگ</h4>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="engine_control">کنترل موتور:</label>
                                <select name="engine_control" id="engine_control" class="form-control">
                                    <option value="سالم">سالم</option>
                                    <option value="ناسالم">ناسالم</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="electronic_equipment">تجهیزات الکترونیکی:</label>
                                <select name="electronic_equipment" id="electronic_equipment" class="form-control">
                                    <option value="سالم">سالم</option>
                                    <option value="ناسالم">ناسالم</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="electronic_stability_system">سیستم پایداری الکترونیکی:</label>
                                <select name="electronic_stability_system" id="electronic_stability_system" class="form-control">
                                    <option value="سالم">سالم</option>
                                    <option value="ناسالم">ناسالم</option>
                                </select>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="air_conditioning_system">سیستم تهویه مطبوع:</label>
                                <select name="air_conditioning_system" id="air_conditioning_system" class="form-control">
                                    <option value="سالم">سالم</option>
                                    <option value="ناسالم">ناسالم</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ABS_system">سیستم ABS:</label>
                                <select name="ABS_system" id="ABS_system" class="form-control">
                                    <option value="سالم">سالم</option>
                                    <option value="ناسالم">ناسالم</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="smart_key_unit">واحد کلید هوشمند:</label>
                                <select name="smart_key_unit" id="smart_key_unit" class="form-control">
                                    <option value="سالم">سالم</option>
                                    <option value="ناسالم">ناسالم</option>
                                </select>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="odometer">کیلومتر شمار:</label>
                                <select name="odometer" id="odometer" class="form-control">
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