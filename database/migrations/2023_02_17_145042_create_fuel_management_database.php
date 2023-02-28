<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelManagementDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         // Roles table
         Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Permissions table
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Role-Permission table
        Schema::create('role_permission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        // Customers table
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->text('address');
            $table->bigInteger('user_id');
            $table->timestamps();
        });

        // Vehicles table
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('type_id')->constrained('vehicle_types')->onDelete('cascade');
            $table->timestamps();
        });

        // Employee table
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('station_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->integer('phone_no')->nullable();
            $table->timestamps();
        });

        // Vehicle types table
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
            $table->integer('quota')->nullable();
            $table->timestamps();
        });

        // Token table
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('station_id')->constrained()->onDelete('cascade');
            $table->float('fuel_quantity');
            $table->dateTime('expected_time');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });

       //Locations Table
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Stations table
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->string('station_name');
            $table->string('address');
            $table->float('fuel_stock');
            $table->float('fuel_capacity');
            $table->enum('status', ['Open', 'Closed']);
            $table->timestamps();
        });
    
        Schema::create('fuel_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('id')->on('stations');
            $table->float('fuel_qty');
            $table->dateTime('requested_date');
            $table->dateTime('expected_time');
            $table->enum('status', ['Scheduled', 'Delivered', 'Cancelled', 'OnProgress']);
            $table->timestamps();
        });
    
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('token_id');
            $table->foreign('token_id')->references('id')->on('fuel_requests');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('users');
            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('id')->on('stations');
            $table->enum('status', ['Scheduled', 'Delivered', 'Cancelled']);
            $table->timestamps();
        });
    
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('fuel_requests');
            $table->float('amount');
            $table->enum('status', ['Pending', 'Paid', 'Cancelled']);
            $table->timestamps();
        });

        Schema::create('messages', function (Blueprint $table){
            $table->id();
            $table->string('message', '200');
            $table->foreignId('user_id');
            $table->enum('status', ['not_read, read']);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('fuel_requests');
        Schema::dropIfExists('stations');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('tokens');
        Schema::dropIfExists('vehicle_types');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('users');
        Schema::dropIfExists('role_permission');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');

    }
}
