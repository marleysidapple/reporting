<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    /**
     * Get all the patients.
     *
     * @param  void
     * @return Collection
     */
    public function patients()
    {
        $patients = User::whereHas('roles', function ($q) {
            $q->where('name', 'patient');
        })->get();

        return $patients;
    }

    /*
    * saving new patient
    * save to db
    */
    public function savePatients($data)
    {
        return User::create($data);
    }

    /**
     * Get selected patient.
     *
     * @param  void
     * @return Collection
     */
    public function findPatient($id)
    {
        return User::find($id);
    }

    /**
     * updating selected patient
     *
     * @param  void
     * @return Collection
     */
    public function updatePatients($id, $data)
    {
        return User::where('id', $id)->update($data);
    }


    /*
    * list operators
    *
    */
    public function operators()
    {
         $operators = User::whereHas('roles', function ($q) {
            $q->where('name', 'operator');
        })->get();

        return $operators;
    }



    public function saveOperator($data)
    {
        return User::create($data);
    }


    /*
    * find operator
    *
    */
    public function findOperator($id)
    {
        return User::find($id);
    }


    /*
    * updating operator
    * 
    */
    public function updateOperator($id, $data)
    {
         return User::where('id', $id)->update($data); 
    }

}
