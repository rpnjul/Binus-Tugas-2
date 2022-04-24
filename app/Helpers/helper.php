<?php


function checkPermission($role_id,$name)
{
    switch ($name) {
        default:
        case 'pegawai':
            $check = checkPegawai($role_id);
            break;
        case 'manager':
            $check = checkManager($role_id);
            break;
        case 'sdm':
            $check = checkSdm($role_id);
            break;
    }
    return $check;
}

function checkPegawai($roleId)
{
    $data = \App\Models\Role::where('name','Pegawai')->first();
    if($data->id==$roleId){
        return true;
    }

    return false;
}
function checkManager($roleId)
{
    $data = \App\Models\Role::where('name','Manager')->first();
    if($data->id==$roleId){
        return true;
    }

    return false;
}
function checkSdm($roleId)
{
    $data = \App\Models\Role::where('name','Sdm')->first();
    if($data->id==$roleId){
        return true;
    }

    return false;
}