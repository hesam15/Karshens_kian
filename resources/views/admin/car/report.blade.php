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

            <form action="{{route('sendReport')}}" method="POST">
                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
            
                <!-- Car Data -->
                <h4>Car Information</h4>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="carBrand">Brand:</label>
                        <select class="form-control" id="carBrand" name="carBrand">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carModel">Model:</label>
                        <select class="form-control" id="carModel" name="carModel">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carTip">Tip:</label>
                        <select class="form-control" id="carTip" name="carTip">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="carColor">Color:</label>
                        <select class="form-control" id="carColor" name="carColor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carBody">Body:</label>
                        <select class="form-control" id="carBody" name="carBody">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carGearbox">Gearbox:</label>
                        <select class="form-control" id="carGearbox" name="carGearbox">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="carEngineVolume">Engine Volume:</label>
                        <select class="form-control" id="carEngineVolume" name="carEngineVolume">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carFuel">Fuel Type:</label>
                        <select class="form-control" id="carFuel" name="carFuel">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carYear">Year:</label>
                        <select class="form-control" id="carYear" name="carYear">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="carFunction">Function:</label>
                        <select class="form-control" id="carFunction" name="carFunction">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carVinCode">VIN Code:</label>
                        <select class="form-control" id="carVinCode" name="carVinCode">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bachelorDate">Bachelor Date:</label>
                        <select class="form-control" id="bachelorDate" name="bachelorDate">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
            
                <!-- Body Details -->
                <h4>Body Details</h4>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="engineDoor">Engine Door:</label>
                        <select class="form-control" id="engineDoor" name="engineDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="boxDoor">Box Door:</label>
                        <select class="form-control" id="boxDoor" name="boxDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sideColumns">Side Columns:</label>
                        <select class="form-control" id="sideColumns" name="sideColumns">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="ceiling">Ceiling:</label>
                        <select class="form-control" id="ceiling" name="ceiling">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rightFrontFender">Right Front Fender:</label>
                        <select class="form-control" id="rightFrontFender" name="rightFrontFender">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftFrontFender">Left Front Fender:</label>
                        <select class="form-control" id="leftFrontFender" name="leftFrontFender">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="rightRearFender">Right Rear Fender:</label>
                        <select class="form-control" id="rightRearFender" name="rightRearFender">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftRearFender">Left Rear Fender:</label>
                        <select class="form-control" id="leftRearFender" name="leftRearFender">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftRearDoor">Left Rear Door:</label>
                        <select class="form-control" id="leftRearDoor" name="leftRearDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="rightRearDoor">Right Rear Door:</label>
                        <select class="form-control" id="rightRearDoor" name="rightRearDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftFrontDoor">Left Front Door:</label>
                        <select class="form-control" id="leftFrontDoor" name="leftFrontDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rightFrontDoor">Right Front Door:</label>
                        <select class="form-control" id="rightFrontDoor" name="rightFrontDoor">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="frontChassis">Front Chassis:</label>
                        <select class="form-control" id="frontChassis" name="frontChassis">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rearChassis">Rear Chassis:</label>
                        <select class="form-control" id="rearChassis" name="rearChassis">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="frontBumper">Front Bumper:</label>
                        <select class="form-control" id="frontBumper" name="frontBumper">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="rearBumper">Rear Bumper:</label>
                        <select class="form-control" id="rearBumper" name="rearBumper">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rightSirrup">Right Sirrup:</label>
                        <select class="form-control" id="rightSirrup" name="rightSirrup">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leftSirrup">Left Sirrup:</label>
                        <select class="form-control" id="leftSirrup" name="leftSirrup">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
            
                <!-- Technical Check -->
                <h4>Technical Check</h4>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="radiator">Radiator:</label>
                        <select class="form-control" id="radiator" name="radiator">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="battery">Battery:</label>
                        <select class="form-control" id="battery" name="battery">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="motorMount">Motor Mount:</label>
                        <select class="form-control" id="motorMount" name="motorMount">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="oilLeak">Oil Leak:</label>
                        <select class="form-control" id="oilLeak" name="oilLeak">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="oilLevelQuality">Oil Level Quality:</label>
                        <select class="form-control" id="oilLevelQuality" name="oilLevelQuality">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="compression">Compression:</label>
                        <select class="form-control" id="compression" name="compression">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="oilConsumption">Oil Consumption:</label>
                        <select class="form-control" id="oilConsumption" name="oilConsumption">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="blackBlueSmoke">Black/Blue Smoke:</label>
                        <select class="form-control" id="blackBlueSmoke" name="blackBlueSmoke">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="radiatorWaterLevelQuality">Radiator Water Level Quality:</label>
                        <select class="form-control" id="radiatorWaterLevelQuality" name="radiatorWaterLevelQuality">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="engineSound">Engine Sound:</label>
                        <select class="form-control" id="engineSound" name="engineSound">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dashboardWarningLights">Dashboard Warning Lights:</label>
                        <select class="form-control" id="dashboardWarningLights" name="dashboardWarningLights">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="brakeOilLevel">Brake Oil Level:</label>
                        <select class="form-control" id="brakeOilLevel" name="brakeOilLevel">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
            
                <!-- Options -->
                <h4>Options</h4>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="airbag">Airbag:</label>
                        <select class="form-control" id="airbag" name="airbag">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="spareKey">Spare Key:</label>
                        <select class="form-control" id="spareKey" name="spareKey">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="oilLight">Oil Light:</label>
                        <select class="form-control" id="oilLight" name="oilLight">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="heatingSystem">Heating System:</label>
                        <select class="form-control" id="heatingSystem" name="heatingSystem">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coolingSystem">Cooling System:</label>
                        <select class="form-control" id="coolingSystem" name="coolingSystem">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="soundSystem">Sound System:</label>
                        <select class="form-control" id="soundSystem" name="soundSystem">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="soundSystem">Sound System:</label>
                    <select class="form-control" id="soundSystem" name="soundSystem">
                        <option value="سالم">سالم</option>
                        <option value="ناسالم">ناسالم</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="navigationSystem">Navigation System:</label>
                        <select class="form-control" id="navigationSystem" name="navigationSystem">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parkingSensors">Parking Sensors:</label>
                        <select class="form-control" id="parkingSensors" name="parkingSensors">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rearCamera">Rear Camera:</label>
                        <select class="form-control" id="rearCamera" name="rearCamera">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="sunroof">Sunroof:</label>
                        <select class="form-control" id="sunroof" name="sunroof">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="leatherSeats">Leather Seats:</label>
                        <select class="form-control" id="leatherSeats" name="leatherSeats">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="heatedSeats">Heated Seats:</label>
                        <select class="form-control" id="heatedSeats" name="heatedSeats">
                            <option value="سالم">سالم</option>
                            <option value="ناسالم">ناسالم</option>
                        </select>
                    </div>
                </div>
        
                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <button type="submit" class="btn btn-primary mt-4">ثبت نوبت</button>
            </form>
        </div>
    </div>
@endsection