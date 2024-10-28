<?php

namespace App\Http\Controllers;

use App\Models\CarBody;
use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function store(Request $request, $id){
        Cars::where('id', $id)->update([
            'description' => $request->description,

            //اطلاعات اولیه خودرو
            'data' => [
                'brand' => $request->carBrand,
                'model' => $request->carModel,
                'tip' => $request->carTip,
                'color' => $request->carColor,
                'body' => $request->carBody,
                'gearbox' => $request->carGearbox,
                'engine_volume' => $request->carEngineVolume,
                'fuel_type' => $request->carFuel,
                'year' => $request-> carYear,
                'function' => $request->carFunction,
                'vin_code' => $request->carVinCode,
                'bachelor_date' => $request->bachelorDate,
            ],

            //بدنه
            'body' => [
                'engine_door' => $request->engineDoor,
                'box_door' => $request->boxDoor,
                'side_columns' => $request->sideColumns,
                'ceiling' => $request->ceiling,

                //گلگیر ها
                'right_front_fender' => $request->rightFrontFender,
                'left_front_fender' => $request->leftFrontFender,
                'right_rear_fender' => $request->rightRearFender,
                'left_rear_fender' => $request->leftRearFender,

                //در ها
                'left_rear_door' => $request->leftRearDoor,
                'right_rear_door' => $request->rightRearDoor,
                'left_front_door' => $request->leftFrontDoor,
                'right_front_door' => $request->rightFrontDoor,

                //شاسی ها
                'front_chassis' => $request->frontChassis,
                'rear_chassis' => $request->rearChassis,

                //سپر ها
                'front_bumper' => $request->frontBumper,
                'rear_bumper' => $request->rearBumoer,

                //رکاب ها
                'right_sirrup' => $request->rightSirrup,
                'left_sirrup' => $request->leftSirrup
            ],

            //بررسی تکنیکال
            'technical_check' => [
                'radiator' => $request->radiator,
                'battery' => $request->battery,
                'motor_mount' => $request->motorMount,
                'oil_leak' => $request->oilLeak,
                'oil_level_quality' => $request->oilLevelQuality,
                'compression' => $request->compression,
                'oil_consumption' => $request->oilConsumption,
                'black_blue_smoke' => $request->blackBlueSmoke,
                'radiator_water_level_quality' => $request->radiatorWaterLevelQuality,
                'engin_sound' => $request->engineSound,
                'dashboard_warning_lights' => $request->dashboardWarningLights,
                'brake_oil_level' => $request->brakeOilLevel,
            ],

            //آپشن ها
            'options' => [
                'airbag' => $request->airbag,
                'spare_key' => $request->spareKey,
                'oil_light' => $request->oilLight,
                'heating_system' => $request->heatingSystem,
                'cooling_system' => $request->coolingSystem,
                'cruise_control' => $request->cruiseControl,

                'headlight' => $request->headlight,
                'rear_light' => $request->rearLight,
                'ceiling_light' => $request->ceilingLight,
                'reverse_light' => $request->reverseLight,
                'reading_light' => $request->readingLight,
                'trunk_light' => $request->trunkLight,
                'front_left_window' => $request->frontLeftWindow,
                'front_right_window' => $request->frontRightWindow,
                'rear_glass' => $request->rearGlass,

                'front_wiper' => $request->frontWiper,
                'rear_wiper' => $request->rearWiper,
                'left_mirror_mechanism' => $request->leftMirrorMechanism,
                'right_mirror_mechanism' => $request->rightMirrorMechanism,
                'center_mirror' => $request->centerMirror,
                'mirror_indicator' => $request->mirrorIndicator,
                'rear_indicator' => $request->rearIndicator,

                'driver_seat_mechanism' => $request->driverSeatMechanism,
                'passenger_seat_mechanism' => $request->passengerSeatMechanism,
                'seat_cover' => $request->seatCover,
                'seat_memory' => $request->seatMemory,
                'cooler_heater' => $request->coolerHeater,

                'stereo' => $request->stereo,
                'speaker' => $request->speaker,
                'central_locking' => $request->centralLocking,
                'power_windows' => $request->powerWindows,

                'trunk_opener' => $request->trunkOpener,
                'hood_opener' => $request->hoodOpener,

                'front_left_door_panel' => $request->frontLeftDoorPanel,
                'front_right_door_panel' => $request->frontRightDoorPanel,
                'rear_left_door_panel' => $request->rearLeftDoorPanel,
                'rear_right_door_panel' => $request->rearRightDoorPanel,

                'handbrake_light' => $request->handbrakeLight,
                'ABS' => $request->ABS,
                'safety_belt' => $request->safetyBelt,
                'safety_belt_light' => $request->safetyBeltLight,
                'floor_mats' => $request->floorMats,

                'steering_wheel_shifter' => $request->steeringWheelShifter,
                'radar' => $request->radar,
                'door_handle_opener' => $request->doorHandleOpener,
            ],
            
            //لاستیک ها
            'wheels' => [
                //سلامت لاستیک ها
                'front_driver_tire' => $request->frontDriverTire,
                'front_passenger_tire' => $request->frontPassengerTire,
                'rear_driver_tire' => $request->rearDriverTire,
                'rear_passenger_tire' => $request->rearPassengerTire,
                'spare_tire' => $request->spareTire,

                'wheel_rim_or_cap' => $request->wheelRimOrCap,
                'jack_and_wheel_wrench' => $request->jackAndWheelWrench,
                'accessory_tools' => $request->accessoryTools,
            ],

            //خدمات دیاگ
            'diag' => [
                'engine_control' => $request->engineControl,
                'electronic_equipment' => $request->electronicEquipment,
                'electronic_stability_system' => $request->electronicStabilitySystem,
                'air_conditioning_system' => $request->airConditioningSystem,
                'ABS_system' => $request->ABSSystem,
                'smart_key_unit' => $request->smartKeyUnit,
                'odometer' => $request->odometer,
            ],

            //خدمات VIP
            'vip_services' => [
                //تست رانندگی
                'driving_test' => [
                   'car_start' => $request->carStart,
                    'cv_joints' => $request->cvJoints,
                    'shocks' => $request->shocks,
                    'cabin_noise' => $request->cabinNoise,
                    'engine_vibration' => $request->engineVibration,
                    'steering_system' => $request->steeringSystem,
                    'exhaust_smoke' => $request->exhaustSmoke,
                    'transmission_sound' => $request->transmissionSound,
                    'clutch_plate' => $request->clutchPlate,
                    'front_suspension' => $request->frontSuspension,
                    'brakes' => $request->brakes,
                    'water_temperature' => $request->waterTemperature,
                    'handbrake' => $request->handbrake,
                    'idle_performance' => $request->idlePerformance,
                    'steering_angle' => $request->steeringAngle,
                    'exhaust_sound' => $request->exhaustSound, 
                ],

                //قولنامه و حقوقی
                'legal' => [
                    'military_legal_inquiry' => $request->militaryLegalInquiry,
                    'traffic_violation_inquiry' => $request->trafficViolationInquiry,
                    'legal_contract_setup' => $request->legalContractSetup,
                ],

                //ارتقاء ظاهری خودرو
                'uprade' => [
                    'guaranteed_nanotechnology' => $request->guaranteedNanotechnology,
                    'line_removal' => $request->lineRemoval,
                    'polishing' => $request->polishing,
                    'paint_protection' => $request->paintProtection,
                    'approved_bodywork' => $request->approvedBodywork,
                    'approved_painting' => $request->approvedPainting,
                ]
            ]
        ]);

        return back()->with("success", true);
    }
}
