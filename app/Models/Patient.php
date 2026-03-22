<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'first_name',
        'middle_name',
        'last_name',
        'birthday',
        'gender',
        'address',
        'contact_number',
        'nationality',
    ];

    // Encrypt before saving
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = Crypt::encryptString($value);
    }

    public function setMiddleNameAttribute($value)
    {
        $this->attributes['middle_name'] = $value ? Crypt::encryptString($value) : null;
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = Crypt::encryptString($value);
    }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Crypt::encryptString($value);
    }

    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = Crypt::encryptString($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = Crypt::encryptString($value);
    }

    public function setContactNumberAttribute($value)
    {
        $this->attributes['contact_number'] = Crypt::encryptString($value);
    }

    public function setNationalityAttribute($value)
    {
        $this->attributes['nationality'] = Crypt::encryptString($value);
    }

    // Decrypt when reading
    public function getFirstNameAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getMiddleNameAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    public function getLastNameAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getBirthdayAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getGenderAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getAddressAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getContactNumberAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function getNationalityAttribute($value)
    {
        return Crypt::decryptString($value);
    }
}