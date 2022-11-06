<?php

namespace App\Providers;

use App\Http\EndUser\Interfaces\HomeInterface;
use App\Http\EndUser\Interfaces\PatientInterface;
use App\Http\EndUser\Interfaces\ProfileInterface;
use App\Http\EndUser\Repositories\HomeRepository;
use App\Http\EndUser\Repositories\PatientRepository;
use App\Http\EndUser\Repositories\ProfileRepository;
use App\Http\Interfaces\AppointmentInterface;
use App\Http\Interfaces\BookingListInterface;
use App\Http\Interfaces\DepartmentInterface;
use App\Http\Interfaces\DoctorInterface;
use App\Http\Interfaces\PrescriptionInterface;
use App\Http\Repositories\AppointmentRepository;
use App\Http\Repositories\BookingListRepository;
use App\Http\Repositories\DepartmentRepository;
use App\Http\Repositories\DoctorRepository;
use App\Http\Repositories\PrescriptionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DoctorInterface::class, DoctorRepository::class);
        $this->app->bind(AppointmentInterface::class, AppointmentRepository::class);
        $this->app->bind(HomeInterface::class, HomeRepository::class);
        $this->app->bind(PatientInterface::class, PatientRepository::class);
        $this->app->bind(ProfileInterface::class, ProfileRepository::class);
        $this->app->bind(BookingListInterface::class, BookingListRepository::class);
        $this->app->bind(PrescriptionInterface::class, PrescriptionRepository::class);
        $this->app->bind(DepartmentInterface::class, DepartmentRepository::class);







    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
